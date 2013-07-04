<?php
class TestController extends Controller {
	
	public function actionImport(){
		$wmdemandHelper = new WmdemandHelper;
		$wmdemandHelper->import("/var/www/html2012/mcmis2012/watertaxbalance.xls");
	}
	
	public function actionGenerateall(){
		$wmdemandHelper = new WmdemandHelper();
		$wmdemandHelper->generateDemandAll();
	}
	
	public function actionGenerate(){
		$wmdemandHelper = new WmdemandHelper;
		$demands = $wmdemandHelper->getDemand(4);
		echo $demands[0][1];
		echo "<br/>";
		foreach($demands as $demand){
			echo print_r($demand, true) . "<br/>";
		}
		echo "<br/><br/><br/>";
		$wmmaster = Wmmaster::model()->findByPk(5);
		$wmdemandHelper->generateDemand($wmmaster);
// 		$wmdemandHelper->generateDemandAll(); 
	}
	
	public function actionTest3(){
// 		$helper = new WmHelper();
		$helper = new WmdemandHelper();
		$rows = $helper->getDemand(1, 1, 2);
		foreach($rows as $row){
			echo print_r($row, true) . "<hr/><br/><br/>";					
		}
	}
	
	public function actionTest2(){
		$idwmdemand = 5029;
		$idwmmaster = 1;
		$period = 2;
		$idccfyear=Yii::app()->session['ccfyear']->idccfyear;

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
	}
	
	public function actionTest1(){
		$idwmdemand = 5029;
		$helper = new WmHelper();
		$rows = $helper->getWmdemandreceiptDetails($idwmdemand);
		$waterpre = 0;
		$watercur = 0;
		$surchargepre = 0;
		$surchargecur = 0;
		foreach($rows as $row){
//  			echo print_r($row, true) . "<hr/><br/><br/>";
 			$waterpre += $row['details-inputgrid[0][previousdeposite]'] + $row['details-inputgrid[0][previousdiscount]'] ;
 			$watercur += $row['details-inputgrid[0][currentdeposite]'] + $row['details-inputgrid[0][currentdiscount]'] ;
 			$surchargepre += $row['details-inputgrid[1][previousdeposite]'] + $row['details-inputgrid[1][previousdiscount]'] ;
 			$surchargecur += $row['details-inputgrid[1][currentdeposite]'] + $row['details-inputgrid[1][currentdiscount]'] ;
		}
		$details = array('waterpre'=>$waterpre, 'watercur'=>$watercur, 'surchargepre'=>$surchargepre, 'surchargecur'=>$surchargecur);
		print_r($details);
		echo "<hr/><br/><br/>";
		$idccfyear = Yii::app()->session['ccfyear']->idccfyear;
		$period = Yii::app()->db->createCommand()->select('MAX(period)')->from('{{wmdemand}}')->where("idccfyear=$idccfyear")->queryScalar();
		if(!$period){
			$period = 0;
		}
		echo $period;
				
// 		echo $waterpre;
		
	}
}
?>