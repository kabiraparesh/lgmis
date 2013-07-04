<?php

class RpdemandHelper {


	public static function encodePkey($data){
		$idcczone = $data->idcccolony0->idccward0->idcczone;
		$idccward = $data->idcccolony0->idccward;
		$idrpshop = $data->idrpshop;
		return sprintf("%02s%02s%05s", $idcczone, $idccward, $idrpshop);
	}

public function getIdccfyear(){
     $idccfyear =  Yii::app()->db->createCommand()->select('MAX(idccfyear)')->from('{{rpdemand}}')->queryScalar();
     if(!isset($idccfyear) || $idccfyear == NULL){
         $idccfyear = Yii::app()->session['ccfyear']->idccfyear;
     }
     return $idccfyear;
 }

 public function getPeriod() {
     $idccfyear = $this->getIdccfyear();
     $period =  Yii::app()->db->createCommand()->select('MAX(period)')->from('{{rpdemand}}')->where("idccfyear=$idccfyear")->queryScalar();
     if(!$period){
         $period = 0;
     }
     return $period;
 }

	/*public function getWmconfiguration($idwmtype, $idwmsize, $wmtape) {
		$idccfyear = Yii::app()->session['ccfyear']->idccfyear;
		$criteria = new CDbCriteria(array(
				'condition' => 'idccfyear = :idccfyear And idwmtype=:idwmtype And idwmsize=:idwmsize And wmtape=:idwmsize',
				'params' => array(':idccfyear' => Yii::app()->session['ccfyear']->idccfyear, ':idwmtype' => $idwmtype, ':idwmsize'=>$idwmsize, ':wmtape'=>$idwmsize)
		));
		return Wmconfiguration::model()->find($criteria);
	}*/
	public function generateDemandForFirstMonthshop($rpshop, $period) {
		$rpoldbalance = 0;
		$surcharge = 0;
		$status = 2;		//regenerated
		if(!empty($rpshop->params)){
			//syslog(LOG_WARNING, $wmmaster->params);
			$params = json_decode($rpshop->params, true);
			$rpoldbalance = $params[1]['value'];
			$surcharge = $params[3]['value'];
		}

		$rpdiract = $this->getRpshop($rpshop->monthlyrent, $rpshop->monthlysurcharge);

		$criteria = new CDbCriteria(array(
				'condition' => 'idrpshop = :idrpshop And idccfyear = :idccfyear And period=:period',
				'params' => array(':idrpshop' => $rpshop->idrpshop, ':idccfyear' => Yii::app()->session['ccfyear']->idccfyear, ':period'=>$period)
		));
		$rpdemand = Rpdemand::model()->find($criteria);
		if ($rpdemand == null) {
			$rpdemand = new Rpdemand();
			$rpdemand->idccfyear = Yii::app()->session['ccfyear']->idccfyear;
			$rpdemand->period = $period;
			$rpdemand->idrpshop = $rpshop->idrpshop;
			$status = 1;		//created
		}
		$rpdemand->rpoldbalance=$rpoldbalance + $surcharge;
		$rpdemand->rpsurcharge=$rpdiract->monthlysurcharge;
		$rpdemand->rpdemandamt=$rpdiract->monthlyrent;
		$rpdemand->save();
		return $status;
	}

        public function generateDemandForFirstMonthrate($rprate, $period) {
		$rpoldbalance = 0;
		$surcharge = 0;
		$status = 2;		//regenerated
		if(!empty($rprate->params)){
			//syslog(LOG_WARNING, $wmmaster->params);
			$params = json_decode($rprate->params, true);
			$rpoldbalance = $params[1]['value'];
			$surcharge = $params[3]['value'];
		}

		$rpdiract = $this->getRprate($rprate->monthlycharges, $rprate->surcharge);

		$criteria = new CDbCriteria(array(
				'condition' => 'idrprate = :idrprate And idccfyear = :idccfyear And period=:period',
				'params' => array(':idrprate' => $rprate->idrpshop, ':idccfyear' => Yii::app()->session['ccfyear']->idccfyear, ':period'=>$period)
		));
		$rpdemand = Rpdemand::model()->find($criteria);
		if ($rpdemand == null) {
			$rpdemand = new Rpdemand();
			$rpdemand->idccfyear = Yii::app()->session['ccfyear']->idccfyear;
			$rpdemand->period = $period;
			$rpdemand->idrprate = $rprate->idrprate;
			$status = 1;		//created
		}
		$rpdemand->rpoldbalance=$rpoldbalance + $surcharge;
		$rpdemand->rpsurcharge=$rpdiract->surcharge;
		$rpdemand->rpdemandamt=$rpdiract->monthlycharges;
		$rpdemand->save();
		return $status;
	}

	public function generateDemandrpshop($rpshop, $idccfyear, $period) {
		$rpdiract = $this->getRpshop($rpshop->monthlyrent, $rpshop->monthlysurcharge);

		$rpoldbalance = 0;
		$surcharge = 0;
		$status = 2;		//regenerated
		$currentdemand = $this->getDemand($rpshop->idrpshop, $idccfyear, $period-1);
		$rpoldbalance = $currentdemand[0][1] + $currentdemand[0][4];
		$surcharge = $currentdemand[1][1];
		if($currentdemand[0][4] > 0){
			$surcharge += $rpdiract->monthlysurcharge;
		}

		$rpdemand = new Rpdemand();
		$rpdemand->idccfyear = $idccfyear;
		$rpdemand->period = $period;
		$rpdemand->idrpshop = $rpshop->idrpshop;

		$rpdemand->rpoldbalance=$rpoldbalance;
		$rpdemand->rpsurcharge=$surcharge;
		$rpdemand->rpdemandamt=$rpdiract->monthlyrent;
 		//echo $rpdemand->idccfyear."".$rpdemand->period." ".$rpdemand->idrpshop. " " . $rpdemand->rpoldbalance . " " . $rpdemand->rpsurcharge . " " . $rpdemand->rpdemandamt . "<br/><br/>";
		$rpdemand->save();
               // print_r($rpdemand->getErrors());
                 /* if (!$rpdemand->save()) {
				$status = 0;
				$message = CHtml::errorSummary($rpdemand, NULL, NULL, array('style'=>'color: red; margin-left: 20px;'));
				$message = htmlspecialchars($message);
				$message = htmlentities($message, ENT_QUOTES, "UTF-8");
			}
		return $message;*/
                
                return $status;
	}

        public function generateDemandrprate($rprate, $idccfyear, $period) {
		$rpdiract = $this->getRprate($rprate->monthlycharges, $rprate->surcharge);

		$rpoldbalance = 0;
		$surcharge = 0;
		$status = 2;		//regenerated
		$currentdemand = $this->getDemand($rprate->idrprate, $idccfyear, $period-1);
		$rpoldbalance = $currentdemand[0][1] + $currentdemand[0][4];
		$surcharge = $currentdemand[1][1];
		if($currentdemand[0][4] > 0){
			$surcharge += $rpdiract->surcharge;
		}

		$rpdemand = new Rpdemand();
		$rpdemand->idccfyear = $idccfyear;
		$rpdemand->period = $period;
		$rpdemand->idrpshop = $rpshop->idrpshop;

		$rpdemand->rpoldbalance=$rpoldbalance;
		$rpdemand->rpsurcharge=$surcharge;
		$rpdemand->rpdemandamt=$rpdiract->monthlycharges;
// 		echo $rpdemand->idrpshop. " " . $rpdemand->rpoldbalance . " " . $rpdemand->wmsurcharge . " " . $rpdemand->rpdemandamt . "<br/><br/>";
		$rpdemand->save();
		return $status;
	}

	public function generateDemandAll() {
    $rpshops = Rpshop::model()->findAll();
    $period = $this->getPeriod();
    $idccfyear = $this->getIdccfyear();
    $period++;
    $status = -1;
    if($period >=1 && $period <= 12){
        foreach ($rpshops as $rpshop) {
           // $status = $this->generateDemand($rpshop, $idccfyear, $period);
            $status = $this->generateDemandrpshop($rpshop, $idccfyear, $period);
            
        }
    }
    //          syslog(LOG_WARNING, strip_tags($status));
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

		$criteria = new CDbCriteria(array(
				'condition' => 'idrpshop = :idrpshop And idccfyear = :idccfyear And period=:period',
				'params' => array(':idrpshop' => $idrpshop, ':idccfyear' => Yii::app()->session['ccfyear']->idccfyear, ':period'=>$this->getPeriod())
		));
		$rpdemand = Rpdemand::model()->find($criteria);
		return $rpdemand->idrpdemand;
	}

	public function getrpdemandreceiptDetails($idrpdemand){
		$criteria = new CDbCriteria(array(
				'condition' => 'idrpdemand = :idrpdemand',
				'params' => array(':idrpdemand' => $idrpdemand)
		));
		$details = array();

		$rpdemandreceipts = Rpdemandreceipt::model()->findAll($criteria);
		foreach ($rpdemandreceipts as $rpdemandreceipt){
			$jsonss = json_decode($rpdemandreceipt->details, true);
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
			// 			$idccfyear = Yii::app()->session['ccfyear']->idccfyear;
			$idccfyear = $this->getIdccfyear();
		}
		if($period == -1){
			$period = $this->getPeriod();
		}

		$criteria = new CDbCriteria(array(
				'condition' => 'idrpshop = :idrpshop And idccfyear = :idccfyear And period=:period',
				'params' => array(':idrpshop' => $idrpshop, ':idccfyear' => $idccfyear, ':period'=>$period)
		));
		$rpdemand = Rpdemand::model()->find($criteria);

		if($rpdemand){
			$rpshop_previousdemand = 0;
			$rpshop_currentdemand = 0;
			$rpsurcharge_previousdemand = 0;
			$rpsurcharge_currentdemand = 0;
			$details = $this->getRpdemandreceiptDetails($rpdemand->idrpdemand);
			foreach($details as $detail){
				$rpshop_previousdemand += $detail["details-inputgrid[0][previousdeposite]"] + $detail["details-inputgrid[0][previousdiscount]"];
				$rpsurcharge_previousdemand += $detail["details-inputgrid[1][previousdeposite]"] + $detail["details-inputgrid[1][previousdiscount]"];
				$rpshop_currentdemand += $detail["details-inputgrid[0][currentdeposite]"] + $detail["details-inputgrid[0][currentdiscount]"];
				$rpsurcharge_currentdemand += $detail["details-inputgrid[1][currentdeposite]"] + $detail["details-inputgrid[1][currentdiscount]"];
			}
			$previousbalance = $rpdemand->rpoldbalance - $rpshop_previousdemand;
			$currentbalance = $rpdemand->rpdemandamt - $rpshop_currentdemand;
			$previoussurcharge = $rpdemand->rpsurcharge - $rpsurcharge_previousdemand;
			$currentsurcharge = 0 - $rpsurcharge_currentdemand;
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
				LgmisRentalModule::t('rpsurcharge'),
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
		// 				'condition' => 'idrpdemand = :idrpdemand',
		// 				'params' => array(':idrpdemand' => $rpdemand->idrpdemand)
		// 		));
		//  		$rpdemandreceipt = rpdemandreceipt::model()->find($criteria);
			

	}

	public function getRpdemand($idrpshop){
		$rpshop = Rpshop::model()->findByPk($idrpshop);

		$criteria = new CDbCriteria(array(
				'condition' => 'idrpshop = :idrpshop And idccfyear = :idccfyear And period=:period',
				'params' => array(':idrpshop' => $idrpshop, ':idccfyear' => Yii::app()->session['ccfyear']->idccfyear, ':period'=>$this->getPeriod())
		));
		$rpdemand = Rpdemand::model()->find($criteria);

		$details = $this->getRpdemandreceiptDetails($rpdemand->idrpdemand);
		$rpshop_previousdemand_depositeamount = 0;
		$rpshop_currentdemand_depositeamount = 0;
		$rpsurcharge_previousdemand_depositeamount = 0;
		$rpsurcharge_currentdemand_depositeamount = 0;

		$rpsurcharge_previousdiscount_depositeamount = 0;
		$rpsurcharge_currentdiscount_depositeamount = 0;

		foreach($details as $detail){
			$rpshop_previousdemand_depositeamount += $detail["details-inputgrid[0][previousdeposite]"] + $detail["details-inputgrid[0][previousdiscount]"];
			$rpsurcharge_previousdemand_depositeamount += $detail["details-inputgrid[1][previousdeposite]"] + $detail["details-inputgrid[1][previousdiscount]"];
			$rpshop_currentdemand_depositeamount += $detail["details-inputgrid[0][currentdeposite]"] + $detail["details-inputgrid[0][currentdiscount]"];
			$rpsurcharge_currentdemand_depositeamount += $detail["details-inputgrid[1][currentdeposite]"] + $detail["details-inputgrid[1][currentdiscount]"];
		}


		$rpshop_previousdeposite_total = 0;
		$rpshop_previousdiscount_total = 0;
		$rpshop_currentdeposite_total = 0;
		$rpshop_currentdiscount_total = 0;
		$rpsurcharge_previousdeposite_total = 0;
		$rpsurcharge_previousdiscount_total = 0;
		$rpsurcharge_currentdeposite_total = 0;
		$rpsurcharge_currentdiscount_total = 0;

		foreach($details as $detail){
			$rpshop_previousdeposite_total += $detail["details-inputgrid[0][previousdeposite]"];
			$rpshop_previousdiscount_total += $detail["details-inputgrid[0][previousdiscount]"];
			$rpshop_currentdeposite_total += $detail["details-inputgrid[0][currentdeposite]"];
			$rpshop_currentdiscount_total += $detail["details-inputgrid[0][currentdiscount]"];

			$rpsurcharge_previousdeposite_total += $detail["details-inputgrid[1][previousdeposite]"];
			$rpsurcharge_previousdiscount_total += $detail["details-inputgrid[1][previousdiscount]"];
			$rpsurcharge_currentdeposite_total += $detail["details-inputgrid[1][currentdeposite]"];
			$rpsurcharge_currentdiscount_total += $detail["details-inputgrid[1][currentdiscount]"];
		}

		// 		$previousbalance = $rpdemand->rpoldbalance - $rpshop_previousdemand_depositeamount;
		// 		$currentbalance = $rpdemand->rpdemandamt - $rpshop_currentdemand_depositeamount;
		// 		$previoussurcharge = $rpdemand->wmsurcharge - $rpsurcharge_previousdemand_depositeamount;
		// 		$currentsurcharge = 0 - $rpsurcharge_currentdemand_depositeamount;

		$previousbalance = $rpdemand->rpoldbalance;
		$currentbalance = $rpdemand->rpdemandamt;
		$previoussurcharge = $rpdemand->wmsurcharge;
		$currentsurcharge = 0;

		if($wmmaster->wmmasterflag == 0){
			$currentbalance = 0;
			$currentsurcharge = 0;
		}

		$data = array();
		$data[] = array(
				LgmisRentalModule::t('Wmmaster'),
				$previousbalance,
				$rpshop_previousdeposite_total,
				$rpshop_previousdiscount_total,
				$currentbalance,
				$rpshop_currentdeposite_total,
				$rpshop_currentdiscount_total,
		);
		$data[] = array(
				LgmisRentalModule::t('Wmsurcharge'),
				$previoussurcharge,
				$rpsurcharge_previousdeposite_total,
				$rpsurcharge_previousdiscount_total,
				0,
				$rpsurcharge_currentdeposite_total,
				$rpsurcharge_currentdiscount_total,
		);
		return array('data'=>$data, 'rpdemand'=>$rpdemand);
	}

	public function getRpdemandreceiptTotal($idrpshop, $idccfyear, $period){
		// 		$idccfyear=Yii::app()->session['ccfyear']->idccfyear;

		$criteria = new CDbCriteria(array(
				'with' => array(
						'idrpdemand0' => array(
								'condition' => 'idrpdemand0.idrpshop=:idrpshop And idccfyear=:idccfyear And period=:period',
								'params' => array(':idrpshop' => $idrpshop, ':idccfyear' => $idccfyear, ':period' => $period)
						),
				),
		));

		$details = array();

		$waterpre = 0;
		$watercur = 0;
		$surchargepre = 0;
		$surchargecur = 0;

		$rpdemandreceipts = Rpdemandreceipt::model()->findAll($criteria);
		foreach ($rpdemandreceipts as $rpdemandreceipt){
			$jsonss = json_decode($rpdemandreceipt->details, true);

			$waterpre += $jsonss[1]['value'] + $jsonss[2]['value'];
			$watercur += $jsonss[3]['value'] + $jsonss[4]['value'];
			$surchargepre += $jsonss[7]['value'] + $jsonss[8]['value'];
			$surchargecur += $jsonss[9]['value'] + $jsonss[10]['value'];
		}
		$details = array('waterpre'=>$waterpre, 'watercur'=>$watercur, 'surchargepre'=>$surchargepre, 'surchargecur'=>$surchargecur);
		// 		$demands = $this->getDemand($idrpshop, $idccfyear, $period);
		return $details;
	}


	public function getRpshop($saralno, $connectionno){
		/*$criteria = new CDbCriteria(array(
				'condition' => 'saralno = :saralno And connectionno = :connectionno',
				'params' => array(':saralno' => $saralno, 'connectionno' => $connectionno)
		));*/
                $criteria = new CDbCriteria(array(
				'condition' => 'monthlyrent = :monthlyrent And monthlysurcharge = :monthlysurcharge',
				'params' => array(':monthlyrent' => $saralno, 'monthlysurcharge' => $connectionno)
		));
      
		$rpshop = Rpshop::model()->find($criteria);
		return $rpshop;
	}

	public function clearDB(){
		$connection=Yii::app()->db;

		$sql = "Delete from {{rpdemandreceipt}} where idrpdemandreceipt>0";
		$command=$connection->createCommand($sql);
		$command->execute();

		$sql = "ALTER TABLE {{rpdemandreceipt}} AUTO_INCREMENT = 1";
		$command=$connection->createCommand($sql);
		$command->execute();

		$sql = "Delete from {{rpdemand}} where idrpdemand>0";
		$command=$connection->createCommand($sql);
		$command->execute();

		$sql = "ALTER TABLE {{rpdemand}} AUTO_INCREMENT = 1";
		$command=$connection->createCommand($sql);
		$command->execute();

	}

	public function import($inputFileName){
		$this->clearDB();
		include 'PHPExcel/IOFactory.php';

		$inputFileType = 'Excel5';

		$objReader = PHPExcel_IOFactory::createReader($inputFileType);
		$objPHPExcel = $objReader->load($inputFileName);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

		$i = 0;
		foreach($sheetData as $key=>$val){
			if($i<1){
				$i++;
				continue;
			}
			if(!empty($val['A'])){
				if($val['H']==1){
					$idrpshop = $this->getRpshop($val['A'], $val['B'])->idrpshop;
					$rpdemandamt = 0;
					$rpoldbalance = 0;
					if($val['I'] <= 300){
						$rpdemandamt = 300;
					}
					else{
						$rpdemandamt = $val['I'] - $val['J'];
					}
					$rpoldbalance = empty($val['J'])? 0 : $val['J'];
					$rpdemand = new Rpdemand();
					$rpdemand->idrpshop = $idrpshop;
					$rpdemand->idccfyear = 1;
					$rpdemand->period = 7;
					$rpdemand->rpoldbalance = $rpoldbalance;
					$rpdemand->wmsurcharge = 0;
					$rpdemand->rpdemandamt = $rpdemandamt;
					$rpdemand->save();

					$rpdemandreceipt = new rpdemandreceipt();
					$details = '[{"name":"details-inputgrid[0][particulars]","value":"जलकर"},{"name":"details-inputgrid[0][previousdeposite]","value":"0"},{"name":"details-inputgrid[0][previousdiscount]","value":"0"},{"name":"details-inputgrid[0][currentdeposite]","value":"'.$val['K'].'"},{"name":"details-inputgrid[0][currentdiscount]","value":"0"},{"name":"details-inputgrid[0][balance]","value":"0"},{"name":"details-inputgrid[1][particulars]","value":"अधिभार"},{"name":"details-inputgrid[1][previousdeposite]","value":"0"},{"name":"details-inputgrid[1][previousdiscount]","value":"0"},{"name":"details-inputgrid[1][currentdeposite]","value":"0"},{"name":"details-inputgrid[1][currentdiscount]","value":"0"},{"name":"details-inputgrid[1][balance]","value":"0"}]';
					$rpdemandreceipt->idccdepartment = 2;
					$rpdemandreceipt->idrpdemand = $rpdemand->idrpdemand;
					$rpdemandreceipt->paymenttype = 1;
					$rpdemandreceipt->details = $details;
					$rpdemandreceipt->save();
				}

				// 				echo $val['A'] . " - " . $rpoldbalance . " - " . $rpdemandamt . "<br/>";
			}
		}
	}

}

?>
