<?php

/*
 * To change this template, choose Tools | Templates
* and open the template in the editor.
*/

/**
 * Description of RpHelper
 *
 * @author ict
 */
class RpHelper {

	public function generateRpconfiguration($generate = false) {
		$idccfyear = Yii::app()->session['ccfyear']->idccfyear;
		$criteria = new CDbCriteria(array(
				'condition' => 'idccfyear = :idccfyear',
				'params' => array(':idccfyear' => $idccfyear)
		));
		$count = 0;
		$jsonmessage = array();
		$status = 'Success';
		$message = LgmisWMModule::t('Rpconfiguration will generating for financial year {fyear}. Are you sure?', array('{fyear}' => Yii::app()->session['ccfyear']->fyear));
		if ($generate) {
			//delete any old entries...
			Rpconfiguration::model()->deleteAll($criteria);
			//add new entries
			$sql = "INSERT INTO {{wmconfiguration}} (idccfyear, idwmtype, idwmsize, wmtape)
			SELECT $idccfyear as idccfyear, idwmtype, idwmsize, wmtape FROM
			{{wmtype}},
			{{wmsize}},
			(select 1 as wmtape union all select 2 as wmtape union all select 3 as wmtape) t";
			$connection = Yii::app()->db;
			$command = $connection->createCommand($sql);
			$rowCount = $command->execute();
		} else {
			$count = Rpconfiguration::model()->count($criteria);
		}
		if ($count > 0) {
			$status = 'Exists';
			$message = LgmisWMModule::t('Rpconfiguration already generated for financial year {fyear}. These items will be permanently deleted and cannot be recovered. Are you sure?', array('{fyear}' => Yii::app()->session['ccfyear']->fyear));
		}
		$jsonmessage['status'] = $status;
		$jsonmessage['message'] = $message;
		return CJSON::encode($jsonmessage);
	}

	public static function encodePkey($data){
		$idcczone = $data->idcccolony0->idccward0->idcczone;
		$idccward = $data->idcccolony0->idccward;
		$idwmmaster = $data->idwmmaster;
		return sprintf("%02s%02s%05s", $idcczone, $idccward, $idwmmaster);
	}

	public function getPeriod() {
		$idccfyear = Yii::app()->session['ccfyear']->idccfyear;
		$period = Yii::app()->db->createCommand()->select('MAX(period)')->from('{{rpdemand}}')->where("idccfyear=$idccfyear")->queryScalar();
		if(!$period){
			$period = 0;
		}
	
		return $period;
	}

	public function getRpconfiguration($idwmtype, $idwmsize, $wmtape) {
		$idccfyear = Yii::app()->session['ccfyear']->idccfyear;
		$criteria = new CDbCriteria(array(
				'condition' => 'idccfyear = :idccfyear And idwmtype=:idwmtype And idwmsize=:idwmsize And wmtape=:idwmsize',
				'params' => array(':idccfyear' => Yii::app()->session['ccfyear']->idccfyear, ':idwmtype' => $idwmtype, ':idwmsize'=>$idwmsize, ':wmtape'=>$idwmsize)
		));
		return Rpconfiguration::model()->find($criteria);
	}

	public function generateDemandForFirstMonth($wmmaster, $period) {
		$wmoldbalance = 0;
		$surcharge = 0;
		$status = 2;		//regenerated
		if(!empty($wmmaster->params)){
			//syslog(LOG_WARNING, $wmmaster->params);
			$params = json_decode($wmmaster->params, true);
			$wmoldbalance = $params[1]['value'];
			$surcharge = $params[3]['value'];
		}

		$wmconfiguration = $this->getRpconfiguration($wmmaster->idwmtype, $wmmaster->idwmsize, $wmmaster->wmtape);

		$criteria = new CDbCriteria(array(
				'condition' => 'idwmmaster = :idwmmaster And idccfyear = :idccfyear And period=:period',
				'params' => array(':idwmmaster' => $wmmaster->idwmmaster, ':idccfyear' => Yii::app()->session['ccfyear']->idccfyear, ':period'=>$period)
		));
		$wmdemand = Rpdemand::model()->find($criteria);
		if ($wmdemand == null) {
			$wmdemand = new Rpdemand();
			$wmdemand->idccfyear = Yii::app()->session['ccfyear']->idccfyear;
			$wmdemand->period = $period;
			$wmdemand->idwmmaster = $wmmaster->idwmmaster;
			$status = 1;		//created
		}
		$wmdemand->wmoldbalance=$wmoldbalance + $surcharge;
		$wmdemand->wmsurcharge=$wmconfiguration->surcharge;
		$wmdemand->wmdemandamt=$wmconfiguration->monthlycharges;
		$wmdemand->save();
		return $status;
	}

	public function generateDemand($wmmaster, $period) {
		$wmoldbalance = 0;
		$surcharge = 0;
		$status = 2;		//regenerated
	
		$wmconfiguration = $this->getRpconfiguration($wmmaster->idwmtype, $wmmaster->idwmsize, $wmmaster->wmtape);
	
		$criteria = new CDbCriteria(array(
				'condition' => 'idwmmaster = :idwmmaster And idccfyear = :idccfyear And period=:period',
				'params' => array(':idwmmaster' => $wmmaster->idwmmaster, ':idccfyear' => Yii::app()->session['ccfyear']->idccfyear, ':period'=>$period)
		));
		$wmdemand = Rpdemand::model()->find($criteria);
		if ($wmdemand == null) {
			$wmdemand = new Rpdemand();
			$wmdemand->idccfyear = Yii::app()->session['ccfyear']->idccfyear;
			$wmdemand->period = $period;
			$wmdemand->idwmmaster = $wmmaster->idwmmaster;
			$status = 1;		//created
		}
		
		$details = $this->getRpdemandreceiptTotal($wmmaster->idwmmaster, $period);
		
		$details['waterpre'] + $details['watercur'];
		$wmdemand->wmoldbalance=$wmoldbalance + $surcharge;
		$wmdemand->wmsurcharge=$wmconfiguration->surcharge;
		$wmdemand->wmdemandamt=$wmconfiguration->monthlycharges;
		$wmdemand->save();
		return $status;
	}
	
	
	public function generateRpdemand($period) {
		$wmmasters = Rpmaster::model()->findAll();
		$status = -1;
		if($period >=1 && $period <= 12){
			foreach ($wmmasters as $wmmaster) {
				$status = $this->generateDemand($wmmaster, $period);
			}
		}
		//  		syslog(LOG_WARNING, strip_tags($status));
		return $status;
	}

	public function getAmountPaid($details) {
		$total = 0;

		if (isset($details)) {
			$jsonss = json_decode($details, true);
			$array = array();
			foreach ($jsonss as $jsons) {
				$array[$jsons['name']] = $jsons['value'];
			}
			for ($i = 0; $i < 2; $i++) {
				$total += $array["details-inputgrid[" . $i . "][amount]"] + $array["details-inputgrid[" . $i . "][discount]"];
			}
		}

		return $total;
	}


	public function getIdrpdemand($idrpshop){
		$rpshop = Rpshop::model()->findByPk($idrpshop);
echo "gggggggg".$idrpshop;
		$criteria = new CDbCriteria(array(
				'condition' => 'idrpshop = :idrpshop And idccfyear = :idccfyear And period=:period',
				'params' => array(':idrpshop' => $idrpshop, ':idccfyear' => Yii::app()->session['ccfyear']->idccfyear, ':period'=>$this->getPeriod())
		));
        $rpdemand = Rpdemand::model()->find($criteria);
		return $rpdemand->idrpdemand;
	}

	public function getRpdemandreceiptDetails($idwmdemand){
		$criteria = new CDbCriteria(array(
				'condition' => 'idwmdemand = :idwmdemand',
				'params' => array(':idwmdemand' => $idwmdemand)
		));
		$details = array();

		$wmdemandreceipts = Rpdemandreceipt::model()->findAll($criteria);
		foreach ($wmdemandreceipts as $wmdemandreceipt){
			$jsonss = json_decode($wmdemandreceipt->details, true);
			$array = array();
			foreach ($jsonss as $jsons) {
				$array[$jsons['name']] = $jsons['value'];
			}
			$details[] = $array;
			// 			syslog(LOG_WARNING, $array["details-inputgrid[0][previousdeposite]"]);
		}
		return $details;
	}

	public function getDemand($idrpshop, $idccfyear = -1, $period = -1){
		$previousbalance = 0;
		$currentbalance = 0;
		$previoussurcharge = 0;
		$currentsurcharge = 0;
		
		$rpshop = Rpshop::model()->findByPk($idrpshop);
		
		if($idccfyear == -1){
			$idccfyear = Yii::app()->session['ccfyear']->idccfyear;			
		}
		if($period == -1){
			$period = $this->getPeriod();			
		}

		$criteria = new CDbCriteria(array(
				'condition' => 'idrpshop = :idrpshop And idccfyear = :idccfyear And period=:period',
				'params' => array(':$idrpshop' => $idrpshop, ':idccfyear' => $idccfyear, ':period'=>$period)
		));
		$rpdemand = Rpdemand::model()->find($criteria);

		if($rpdemand){		
			$wmmaster_previousdemand = 0;
			$wmmaster_currentdemand = 0;
			$wmsurcharge_previousdemand = 0;
			$wmsurcharge_currentdemand = 0;
			$details = $this->getRpdemandreceiptDetails($wmdemand->idwmdemand);
			foreach($details as $detail){
				$wmmaster_previousdemand += $detail["details-inputgrid[0][previousdeposite]"] + $detail["details-inputgrid[0][previousdiscount]"];
				$wmsurcharge_previousdemand += $detail["details-inputgrid[1][previousdeposite]"] + $detail["details-inputgrid[1][previousdiscount]"];
				$wmmaster_currentdemand += $detail["details-inputgrid[0][currentdeposite]"] + $detail["details-inputgrid[0][currentdiscount]"];
				$wmsurcharge_currentdemand += $detail["details-inputgrid[1][currentdeposite]"] + $detail["details-inputgrid[1][currentdiscount]"];
			}
			$previousbalance = $wmdemand->wmoldbalance - $wmmaster_previousdemand;
			$currentbalance = $wmdemand->wmdemandamt - $wmmaster_currentdemand;
			$previoussurcharge = $wmdemand->wmsurcharge - $wmsurcharge_previousdemand;
			$currentsurcharge = 0 - $wmsurcharge_currentdemand;
		}


		$data = array();
		$data[] = array(
                    LgmisRentalModule::t('Rpshop'),
				$previousbalance,
				0,
				0,
				$currentbalance,
				0,
				0,
				0,
		);
		$data[] = array(
				LgmisRentalModule::t('Rpsurcharge'),
				$previoussurcharge,
				0,
				0,
				0,
				0,
				0,
				0,
		);

		return $data;



		// 		$criteria = new CDbCriteria(array(
		// 				'condition' => 'idwmdemand = :idwmdemand',
		// 				'params' => array(':idwmdemand' => $wmdemand->idwmdemand)
		// 		));
		//  		$wmdemandreceipt = Rpdemandreceipt::model()->find($criteria);
			

	}

	public function getRpdemand($idwmmaster){
		$wmmaster = Rpmaster::model()->findByPk($idwmmaster);
		//syslog(LOG_WARNING,'hiiiiiiiii'.$this->getPeriod());
		$criteria = new CDbCriteria(array(
				'condition' => 'idwmmaster = :idwmmaster And idccfyear = :idccfyear And period=:period',
				'params' => array(':idwmmaster' => $idwmmaster, ':idccfyear' => Yii::app()->session['ccfyear']->idccfyear, ':period'=>$this->getPeriod())
		));
		$wmdemand = Rpdemand::model()->find($criteria);

		$details = $this->getRpdemandreceiptDetails($wmdemand->idwmdemand);
		$wmmaster_previousdemand_depositeamount = 0;
		$wmmaster_currentdemand_depositeamount = 0;
		$wmsurcharge_previousdemand_depositeamount = 0;
		$wmsurcharge_currentdemand_depositeamount = 0;

		$wmsurcharge_previousdiscount_depositeamount = 0;
		$wmsurcharge_currentdiscount_depositeamount = 0;

		foreach($details as $detail){
			$wmmaster_previousdemand_depositeamount += $detail["details-inputgrid[0][previousdeposite]"] + $detail["details-inputgrid[0][previousdiscount]"];
			$wmsurcharge_previousdemand_depositeamount += $detail["details-inputgrid[1][previousdeposite]"] + $detail["details-inputgrid[1][previousdiscount]"];
			$wmmaster_currentdemand_depositeamount += $detail["details-inputgrid[0][currentdeposite]"] + $detail["details-inputgrid[0][currentdiscount]"];
			$wmsurcharge_currentdemand_depositeamount += $detail["details-inputgrid[1][currentdeposite]"] + $detail["details-inputgrid[1][currentdiscount]"];
		}


		$wmmaster_previousdeposite_total = 0;
		$wmmaster_previousdiscount_total = 0;
		$wmmaster_currentdeposite_total = 0;
		$wmmaster_currentdiscount_total = 0;
		$wmsurcharge_previousdeposite_total = 0;
		$wmsurcharge_previousdiscount_total = 0;
		$wmsurcharge_currentdeposite_total = 0;
		$wmsurcharge_currentdiscount_total = 0;

		foreach($details as $detail){
			$wmmaster_previousdeposite_total += $detail["details-inputgrid[0][previousdeposite]"];
			$wmmaster_previousdiscount_total += $detail["details-inputgrid[0][previousdiscount]"];
			$wmmaster_currentdeposite_total += $detail["details-inputgrid[0][currentdeposite]"];
			$wmmaster_currentdiscount_total += $detail["details-inputgrid[0][currentdiscount]"];
				
			$wmsurcharge_previousdeposite_total += $detail["details-inputgrid[1][previousdeposite]"];
			$wmsurcharge_previousdiscount_total += $detail["details-inputgrid[1][previousdiscount]"];
			$wmsurcharge_currentdeposite_total += $detail["details-inputgrid[1][currentdeposite]"];
			$wmsurcharge_currentdiscount_total += $detail["details-inputgrid[1][currentdiscount]"];
		}

		// 		$previousbalance = $wmdemand->wmoldbalance - $wmmaster_previousdemand_depositeamount;
		// 		$currentbalance = $wmdemand->wmdemandamt - $wmmaster_currentdemand_depositeamount;
		// 		$previoussurcharge = $wmdemand->wmsurcharge - $wmsurcharge_previousdemand_depositeamount;
		// 		$currentsurcharge = 0 - $wmsurcharge_currentdemand_depositeamount;

		$previousbalance = $wmdemand->wmoldbalance;
		$currentbalance = $wmdemand->wmdemandamt;
		$previoussurcharge = $wmdemand->wmsurcharge;
		$currentsurcharge = 0;
		
		if($wmmaster->wmmasterflag == 0){
			$currentbalance = 0;
			$currentsurcharge = 0;				
		}
		
		$data = array();
		$data[] = array(
				LgmisWMModule::t('Rpmaster'),
				$previousbalance,
				$wmmaster_previousdeposite_total,
				$wmmaster_previousdiscount_total,
				$currentbalance,
				$wmmaster_currentdeposite_total,
				$wmmaster_currentdiscount_total,
		);
		$data[] = array(
				LgmisWMModule::t('Rpsurcharge'),
				$previoussurcharge,
				$wmsurcharge_previousdeposite_total,
				$wmsurcharge_previousdiscount_total,
				0,
				$wmsurcharge_currentdeposite_total,
				$wmsurcharge_currentdiscount_total,
		);
		return array('data'=>$data, 'wmdemand'=>$wmdemand);
	}
	
	public function getRpdemandreceiptTotal($idwmmaster, $idccfyear, $period){		
// 		$idccfyear=Yii::app()->session['ccfyear']->idccfyear;
		
		$criteria = new CDbCriteria(array(
				'with' => array(
						'idwmdemand0' => array(
								'condition' => 'idwmdemand0.idwmmaster=:idwmmaster And idccfyear=:idccfyear And period=:period',
								'params' => array(':idwmmaster' => $idwmmaster, ':idccfyear' => $idccfyear, ':period' => $period)
						),
				),
		));
		
		$details = array();
		
		$waterpre = 0;
		$watercur = 0;
		$surchargepre = 0;
		$surchargecur = 0;
		
		$wmdemandreceipts = Rpdemandreceipt::model()->findAll($criteria);
		foreach ($wmdemandreceipts as $wmdemandreceipt){
			$jsonss = json_decode($wmdemandreceipt->details, true);
				
			$waterpre += $jsonss[1]['value'] + $jsonss[2]['value'];
			$watercur += $jsonss[3]['value'] + $jsonss[4]['value'];
			$surchargepre += $jsonss[7]['value'] + $jsonss[8]['value'];
			$surchargecur += $jsonss[9]['value'] + $jsonss[10]['value'];
		}
		$details = array('waterpre'=>$waterpre, 'watercur'=>$watercur, 'surchargepre'=>$surchargepre, 'surchargecur'=>$surchargecur);
// 		$demands = $this->getDemand($idwmmaster, $idccfyear, $period);
		return $details;
	}
}

?>
