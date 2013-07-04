<?php
class WmdemandHelper_1{

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
// 			$details = $this->getWmdemandreceiptDetails($wmdemand->idwmdemand);
			$details = $this->getWmdemandreceiptTotal($idwmmaster, $idccfyear, $period);
// 			foreach($details as $detail){
// 				$wmmaster_previousdemand += $detail["details-inputgrid[0][previousdeposite]"] + $detail["details-inputgrid[0][previousdiscount]"];
// 				$wmsurcharge_previousdemand += $detail["details-inputgrid[1][previousdeposite]"] + $detail["details-inputgrid[1][previousdiscount]"];
// 				$wmmaster_currentdemand += $detail["details-inputgrid[0][currentdeposite]"] + $detail["details-inputgrid[0][currentdiscount]"];
// 				$wmsurcharge_currentdemand += $detail["details-inputgrid[1][currentdeposite]"] + $detail["details-inputgrid[1][currentdiscount]"];
// 			}
			$previousbalance = $wmdemand->wmoldbalance - $details['waterpre'];
			$currentbalance = $wmdemand->wmdemandamt - $details['watercur'];
			$previoussurcharge = $wmdemand->wmsurcharge - $details['surchargepre'];
			$currentsurcharge = 0 - $details['surchargecur'];
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
				$currentsurcharge,
				0,
				0,
				0,
		);

		return $data;
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
		return $details;
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


	public function getPeriod() {
		$idccfyear = Yii::app()->session['ccfyear']->idccfyear;
		$period = Yii::app()->db->createCommand()->select('MAX(period)')->from('{{wmdemand}}')->where("idccfyear=$idccfyear")->queryScalar();
		if(!$period){
			$period = 0;
		}
		return $period;
	}


}
?>