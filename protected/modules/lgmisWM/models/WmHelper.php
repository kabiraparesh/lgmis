<?php

/*
 * To change this template, choose Tools | Templates
* and open the template in the editor.
*/

/**
 * Description of WmHelper
 *
 * @author ict
 */
class WmHelper {

	public function generateWmconfiguration($generate = false) {
		$idccfyear = Yii::app()->session['ccfyear']->idccfyear;
		$criteria = new CDbCriteria(array(
				'condition' => 'idccfyear = :idccfyear',
				'params' => array(':idccfyear' => $idccfyear)
		));
		$count = 0;
		$jsonmessage = array();
		$status = 'Success';
		$message = LgmisWMModule::t('Wmconfiguration will generating for financial year {fyear}. Are you sure?', array('{fyear}' => Yii::app()->session['ccfyear']->fyear));
		if ($generate) {
			//delete any old entries...
			Wmconfiguration::model()->deleteAll($criteria);
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
			$count = Wmconfiguration::model()->count($criteria);
		}
		if ($count > 0) {
			$status = 'Exists';
			$message = LgmisWMModule::t('Wmconfiguration already generated for financial year {fyear}. These items will be permanently deleted and cannot be recovered. Are you sure?', array('{fyear}' => Yii::app()->session['ccfyear']->fyear));
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
		$period = Yii::app()->db->createCommand()->select('MAX(period)')->from('{{wmdemand}}')->where("idccfyear=$idccfyear")->queryScalar();
		if(!$period){
			$period = 0;
		}
	
		return $period;
	}

	public function getWmconfiguration($idwmtype, $idwmsize, $wmtape) {
		$idccfyear = Yii::app()->session['ccfyear']->idccfyear;
		$criteria = new CDbCriteria(array(
				'condition' => 'idccfyear = :idccfyear And idwmtype=:idwmtype And idwmsize=:idwmsize And wmtape=:idwmsize',
				'params' => array(':idccfyear' => Yii::app()->session['ccfyear']->idccfyear, ':idwmtype' => $idwmtype, ':idwmsize'=>$idwmsize, ':wmtape'=>$idwmsize)
		));
		return Wmconfiguration::model()->find($criteria);
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

		$wmconfiguration = $this->getWmconfiguration($wmmaster->idwmtype, $wmmaster->idwmsize, $wmmaster->wmtape);

		$criteria = new CDbCriteria(array(
				'condition' => 'idwmmaster = :idwmmaster And idccfyear = :idccfyear And period=:period',
				'params' => array(':idwmmaster' => $wmmaster->idwmmaster, ':idccfyear' => Yii::app()->session['ccfyear']->idccfyear, ':period'=>$period)
		));
		$wmdemand = Wmdemand::model()->find($criteria);
		if ($wmdemand == null) {
			$wmdemand = new Wmdemand();
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
	
		$wmconfiguration = $this->getWmconfiguration($wmmaster->idwmtype, $wmmaster->idwmsize, $wmmaster->wmtape);
	
		$criteria = new CDbCriteria(array(
				'condition' => 'idwmmaster = :idwmmaster And idccfyear = :idccfyear And period=:period',
				'params' => array(':idwmmaster' => $wmmaster->idwmmaster, ':idccfyear' => Yii::app()->session['ccfyear']->idccfyear, ':period'=>$period)
		));
		$wmdemand = Wmdemand::model()->find($criteria);
		if ($wmdemand == null) {
			$wmdemand = new Wmdemand();
			$wmdemand->idccfyear = Yii::app()->session['ccfyear']->idccfyear;
			$wmdemand->period = $period;
			$wmdemand->idwmmaster = $wmmaster->idwmmaster;
			$status = 1;		//created
		}
		
		$details = $this->getWmdemandreceiptTotal($wmmaster->idwmmaster, $period);
		
		$details['waterpre'] + $details['watercur'];
		$wmdemand->wmoldbalance=$wmoldbalance + $surcharge;
		$wmdemand->wmsurcharge=$wmconfiguration->surcharge;
		$wmdemand->wmdemandamt=$wmconfiguration->monthlycharges;
		$wmdemand->save();
		return $status;
	}
	
	
	public function generateWmdemand($period) {
		$wmmasters = Wmmaster::model()->findAll();
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


	public function getIdwmdemand($idwmmaster){
		$wmmaster = Wmmaster::model()->findByPk($idwmmaster);

		$criteria = new CDbCriteria(array(
				'condition' => 'idwmmaster = :idwmmaster And idccfyear = :idccfyear And period=:period',
				'params' => array(':idwmmaster' => $idwmmaster, ':idccfyear' => Yii::app()->session['ccfyear']->idccfyear, ':period'=>$this->getPeriod())
		));
		$wmdemand = Wmdemand::model()->find($criteria);
		return $wmdemand->idwmdemand;
	}

	public function getWmdemandreceiptDetails($idwmdemand){
		$criteria = new CDbCriteria(array(
				'condition' => 'idwmdemand = :idwmdemand',
				'params' => array(':idwmdemand' => $idwmdemand)
		));
		$details = array();

		$wmdemandreceipts = Wmdemandreceipt::model()->findAll($criteria);
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

	public function getDemand($idwmmaster, $idccfyear = -1, $period = -1){
		$previousbalance = 0;
		$currentbalance = 0;
		$previoussurcharge = 0;
		$currentsurcharge = 0;
		
		$wmmaster = Wmmaster::model()->findByPk($idwmmaster);
		
		if($idccfyear == -1){
			$idccfyear = Yii::app()->session['ccfyear']->idccfyear;			
		}
		if($period == -1){
			$period = $this->getPeriod();			
		}

		$criteria = new CDbCriteria(array(
				'condition' => 'idwmmaster = :idwmmaster And idccfyear = :idccfyear And period=:period',
				'params' => array(':idwmmaster' => $idwmmaster, ':idccfyear' => $idccfyear, ':period'=>$period)
		));
		$wmdemand = Wmdemand::model()->find($criteria);

		if($wmdemand){		
			$wmmaster_previousdemand = 0;
			$wmmaster_currentdemand = 0;
			$wmsurcharge_previousdemand = 0;
			$wmsurcharge_currentdemand = 0;
			$details = $this->getWmdemandreceiptDetails($wmdemand->idwmdemand);
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
				LgmisWMModule::t('Wmmaster'),
				$previousbalance,
				0,
				0,
				$currentbalance,
				0,
				0,
				0,
		);
		$data[] = array(
				LgmisWMModule::t('Wmsurcharge'),
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
		//  		$wmdemandreceipt = Wmdemandreceipt::model()->find($criteria);
			

	}

	public function getWmdemand($idwmmaster){
		$wmmaster = Wmmaster::model()->findByPk($idwmmaster);
		//syslog(LOG_WARNING,'hiiiiiiiii'.$this->getPeriod());
		$criteria = new CDbCriteria(array(
				'condition' => 'idwmmaster = :idwmmaster And idccfyear = :idccfyear And period=:period',
				'params' => array(':idwmmaster' => $idwmmaster, ':idccfyear' => Yii::app()->session['ccfyear']->idccfyear, ':period'=>$this->getPeriod())
		));
		$wmdemand = Wmdemand::model()->find($criteria);

		$details = $this->getWmdemandreceiptDetails($wmdemand->idwmdemand);
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
				LgmisWMModule::t('Wmmaster'),
				$previousbalance,
				$wmmaster_previousdeposite_total,
				$wmmaster_previousdiscount_total,
				$currentbalance,
				$wmmaster_currentdeposite_total,
				$wmmaster_currentdiscount_total,
		);
		$data[] = array(
				LgmisWMModule::t('Wmsurcharge'),
				$previoussurcharge,
				$wmsurcharge_previousdeposite_total,
				$wmsurcharge_previousdiscount_total,
				0,
				$wmsurcharge_currentdeposite_total,
				$wmsurcharge_currentdiscount_total,
		);
		return array('data'=>$data, 'wmdemand'=>$wmdemand);
	}
	
	public function getWmdemandreceiptTotal($idwmmaster, $idccfyear, $period){		
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
		
		$wmdemandreceipts = Wmdemandreceipt::model()->findAll($criteria);
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
