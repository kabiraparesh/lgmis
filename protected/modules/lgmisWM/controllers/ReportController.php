<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ReportController
 *
 * @author ict
 */
class ReportController extends Controller {


	public function actionWmmasterwiseDemand($id) {
		$wmmaster = Wmmaster::model()->findByPk($id);
		$wmhelper = new WmHelper();
			$data = $wmhelper->getWmdemand($id);
			//echo $this->renderPartial('/report/bill', array('data'=>$data['data'], 'wmdemand'=>$data['wmdemand'], 'wmmaster'=>$wmmaster, true, true));
			echo $this->renderPartial('/report/bill', array('data'=>$data['data'], 'wmdemand'=>$data['wmdemand'], 'wmmaster'=>$wmmaster,'period'=>$wmhelper->getPeriod(), true, true));
			
	}
	
	
    public function actionWardwiseDemand($id) {
        $criteria = new CDbCriteria(array(
        		'with' => array(
        				'idcccolony0' => array(
        						'condition' => 'idcccolony0.idccward=:idccward',
        						'params' => array(':idccward' => $id)
        				),
        		),
        ));
        
        $wmmasters = Wmmaster::model()->findAll($criteria);
        $wmhelper = new WmHelper(); 
        foreach ($wmmasters as $wmmaster) {
        	$data = $wmhelper->getWmdemand($wmmaster->idwmmaster);
//  	        echo $this->renderPartial('/report/bill', array('data'=>$data, 'wmmaster'=>$wmmaster, true, true));

			echo $this->renderPartial('/report/bill', array('data'=>$data['data'], 'wmdemand'=>$data['wmdemand'], 'wmmaster'=>$wmmaster, 'period'=>$wmhelper->getPeriod()), true, true);
        }
//         echo $this->renderPartial('/report/wardwisedemand', array('wardno' => $idccward, 'demandsdetails' => $demandsdetails), true, true);
    }
    
    public function actionWardwiseDemandReport($id) {
    	$criteria = new CDbCriteria(array(
    			'with' => array(
    					'idcccolony0' => array(
    							'condition' => 'idcccolony0.idccward=:idccward',
    							'params' => array(':idccward' => $id)
    					),
    			),
    	));
    
    	$wmmasters = Wmmaster::model()->findAll($criteria);
     	$wmhelper = new WmHelper();
    	$rows = array();
    	foreach ($wmmasters as $wmmaster) {
    		$data = $wmhelper->getWmdemand($wmmaster->idwmmaster);
    		$data['wmmaster'] = $wmmaster;
     		$rows[] = $data;
//     		echo $this->renderPartial('/report/wardwiseDemandReport', array('data'=>$data, 'wmmaster'=>$wmmaster, 'period'=>$wmhelper->getPeriod(), true, true));
    	}
    	
     	echo $this->renderPartial('/report/wardwiseDemandReport', array('rows'=>$rows, 'period'=>$wmhelper->getPeriod(), 'idccward'=>$id, true, true));
    	//         echo $this->renderPartial('/report/wardwisedemand', array('wardno' => $idccward, 'demandsdetails' => $demandsdetails), true, true);
    }
    
    public function actionTransactionReport($startdate, $enddate) {
    	 
    	$criteria = new CDbCriteria(array(
    		'condition' => 'demanddate >= :startdate And demanddate <= :enddate',
    		'params' => array(':startdate'=>$startdate, ':enddate'=>$enddate)
    	));
    	$details = array();
    	 
    	$wmdemandreceipts = Wmdemandreceipt::model()->findAll($criteria);
    	foreach ($wmdemandreceipts as $wmdemandreceipt){
    		
    		$jsonss = json_decode($wmdemandreceipt->details, true);
    		$array = array();
    		foreach ($jsonss as $jsons) {
    			$array[$jsons['name']] = $jsons['value'];
    		}
    		$wmmaster_previousdemand = $array["details-inputgrid[0][previousdeposite]"] + $array["details-inputgrid[0][previousdiscount]"];
    		$wmsurcharge_previousdemand = $array["details-inputgrid[1][previousdeposite]"] + $array["details-inputgrid[1][previousdiscount]"];
    		$wmmaster_currentdemand = $array["details-inputgrid[0][currentdeposite]"] + $array["details-inputgrid[0][currentdiscount]"];
    		$wmsurcharge_currentdemand = $array["details-inputgrid[1][currentdeposite]"] + $array["details-inputgrid[1][currentdiscount]"];
    		
    		$details[] = array(
    				"wmdemandreceipt" => $wmdemandreceipt,
    				"wmmaster_previousdemand" => $wmmaster_previousdemand,    				
    				"wmsurcharge_previousdemand" => $wmsurcharge_previousdemand,    				
    				"wmmaster_currentdemand" => $wmmaster_currentdemand,    				
    				"wmsurcharge_currentdemand" => $wmsurcharge_currentdemand,
    				"grand_total" => $wmmaster_previousdemand + $wmsurcharge_previousdemand + $wmmaster_currentdemand + $wmsurcharge_currentdemand,		
    		);
    		
    	}
//     	foreach($details as $detail){
//     		echo "<br/>" . $detail["wmdemandreceipt"]->demanddate;
//     		echo "<br/><hr/><br/>";
//     	}    	
    	echo $this->renderPartial('/report/transactionReport', array('rows'=>$details, 'startdate'=>$startdate, 'enddate'=>$enddate, true, true));
    }

    public function actionTransactionReportForm() {
    	echo $this->render('/report/transactionReportForm', array());
    }
    
    
}

?>
