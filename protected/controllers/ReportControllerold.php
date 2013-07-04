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

	public function actionTransactionReportForm() {
		echo $this->render('/report/transactionReportForm', array());
	}

	public function actionRecoveryReportForm() {
		echo $this->render('/report/recoveryReportForm', array());
	}

public function actionRecoveryReport($startdate=111, $enddate=99999999999) {
		$criteria = new CDbCriteria(array(
				'condition' => 'demanddate >= :startdate And demanddate <= :enddate',
				'params' => array(':startdate'=>$startdate, ':enddate'=>$enddate)
		));
		$fddemandreceipts = Fddemandreceipt::model()->findAll($criteria);
	
		$rows = array();
			
		foreach ($fddemandreceipts as $fddemandreceipt) {
	
			if (isset($fddemandreceipt->details)) {
				$grandtotal = 0;
				$totalamount = 0;
				$totaldiscount = 0;
	
				$jsonss = json_decode($fddemandreceipt->details, true);
				$array = array();
				foreach ($jsonss as $jsons) {
					$array[$jsons['name']] = $jsons['value'];
				}
	
				$totalamount =
				$array["details-inputgrid[0][amount]"]
				+ $array["details-inputgrid[1][amount]"]
				+ $array["details-inputgrid[2][amount]"]
				+ $array["details-inputgrid[3][amount]"]
				+ $array["details-inputgrid[4][amount]"]
				+ $array["details-inputgrid[5][amount]"]
				+ $array["details-inputgrid[6][amount]"]
				+ $array["details-inputgrid[7][amount]"]
				+ $array["details-inputgrid[8][amount]"]
				+ $array["details-inputgrid[9][amount]"];
	
				$totaldiscount =
				$array["details-inputgrid[0][discount]"]
				+ $array["details-inputgrid[1][discount]"]
				+ $array["details-inputgrid[2][discount]"]
				+ $array["details-inputgrid[3][discount]"]
				+ $array["details-inputgrid[4][discount]"]
				+ $array["details-inputgrid[5][discount]"]
				+ $array["details-inputgrid[6][discount]"]
				+ $array["details-inputgrid[7][discount]"]
				+ $array["details-inputgrid[8][discount]"]
				+ $array["details-inputgrid[9][discount]"];
	
				//$grandtotal = $totalamount + $totaldiscount;
				$grandtotal = $totalamount;
	
				$totalPropertytax_previous= 0;
				$totalMinsamekittax_previous= 0;
				$totalSamekittax_previous= 0;
				$totalEducess_previous= 0;
				$totalSubcess1_previous= 0;
				$totalSubcess2_previous= 0;
				$totalPropertytax_current= 0;
				$totalMinsamekittax_current= 0;
				$totalSamekittax_current= 0;
				$totalEducess_current= 0;
				$totalSubcess1_current= 0;
				$totalSubcess2_current= 0;
	
				$adhibhar_previous= 0;
				$adhibhar_current= 0;
	
	
	
				if($fddemandreceipt->receipttype == 1){
					$totalPropertytax_previous = $array["details-inputgrid[0][amount]"] ;
					$totalMinsamekittax_previous = $array["details-inputgrid[1][amount]"];
					$totalSamekittax_previous = $array["details-inputgrid[2][amount]"] ;
					$totalEducess_previous = $array["details-inputgrid[3][amount]"] ;
					$totalSubcess1_previous = $array["details-inputgrid[4][amount]"];
					$totalSubcess2_previous = $array["details-inputgrid[5][amount]"];
	
					$adhibhar_previous = $array["details-inputgrid[7][amount]"];
				}
	
				if($fddemandreceipt->receipttype == 0){
					$totalPropertytax_current = $array["details-inputgrid[0][amount]"] ;
					$totalMinsamekittax_current = $array["details-inputgrid[1][amount]"];
					$totalSamekittax_current = $array["details-inputgrid[2][amount]"];
					$totalEducess_current = $array["details-inputgrid[3][amount]"];
					$totalSubcess1_current = $array["details-inputgrid[4][amount]"];
					$totalSubcess2_current = $array["details-inputgrid[5][amount]"];
						
					$adhibhar_current = $array["details-inputgrid[7][amount]"];
				}
	
	
				$pttransaction = Pttransaction::model()->findByPK($fddemandreceipt->demandnumber);
				$id = sprintf("%02s%02s%05s", $pttransaction->idptmaster0->idccward0->idcczone, $pttransaction->idptmaster0->idccward, $pttransaction->idptmaster);
				$rows[] = array(
						$pttransaction->idptmaster0->caseno,
						$fddemandreceipt->demanddate,
						$fddemandreceipt->receiptbookno,
						$fddemandreceipt->receiptno,
						$pttransaction->idptmaster0->ownername . "  " . $pttransaction->idptmaster0->fathername,
						$pttransaction->idptmaster0->idccward0->idcczone,
						$pttransaction->idptmaster0->idccward,
						$totalamount,
						$totaldiscount,
						$grandtotal,
	
						$totalPropertytax_previous,
						$totalMinsamekittax_previous,
						$totalSamekittax_previous,
						$totalEducess_previous,
						$totalSubcess1_previous,
						$totalSubcess2_previous,
						$totalPropertytax_previous+
						$totalMinsamekittax_previous+
						$totalSamekittax_previous+
						$totalEducess_previous+
						$totalSubcess1_previous+
						$totalSubcess2_previous+
						$adhibhar_previous
						,
	
	
						$totalPropertytax_current,
						$totalMinsamekittax_current,
						$totalSamekittax_current,
						$totalEducess_current,
						$totalSubcess1_current,
						$totalSubcess2_current,
						$totalPropertytax_current+
						$totalMinsamekittax_current+
						$totalSamekittax_current+
						$totalEducess_current+
						$totalSubcess1_current+
						$totalSubcess2_current+
						$adhibhar_current
						,
	
						$fddemandreceipt->narration,
	
						$adhibhar_previous,
						$adhibhar_current,
						$pttransaction->idptmaster,
						$fddemandreceipt->idfddemandreceipt,
	
	
				);
			}
		}
		echo $this->renderPartial('/report/recoveryReport', array('rows' => $rows, 'startdate'=>$startdate, 'enddate'=>$enddate), true, true);
	}
	
	
	
	/*public function actionRecoveryReport($startdate=111, $enddate=99999999999) {
		$criteria = new CDbCriteria(array(
				'condition' => 'demanddate >= :startdate And demanddate <= :enddate',
				'params' => array(':startdate'=>$startdate, ':enddate'=>$enddate)
		));
		$fddemandreceipts = Fddemandreceipt::model()->findAll($criteria);
	
		$rows = array();
			
		foreach ($fddemandreceipts as $fddemandreceipt) {
	
			if (isset($fddemandreceipt->details)) {
				$grandtotal = 0;
				$totalamount = 0;
				$totaldiscount = 0;
	
				$jsonss = json_decode($fddemandreceipt->details, true);
				$array = array();
				foreach ($jsonss as $jsons) {
					$array[$jsons['name']] = $jsons['value'];
				}
	
				$totalamount =
				$array["details-inputgrid[0][amount]"]
				+ $array["details-inputgrid[1][amount]"]
				+ $array["details-inputgrid[2][amount]"]
				+ $array["details-inputgrid[3][amount]"]
				+ $array["details-inputgrid[4][amount]"]
				+ $array["details-inputgrid[5][amount]"]
				+ $array["details-inputgrid[6][amount]"]
				+ $array["details-inputgrid[7][amount]"]
				+ $array["details-inputgrid[8][amount]"]
				+ $array["details-inputgrid[9][amount]"];
	
				$totaldiscount =
				$array["details-inputgrid[0][discount]"]
				+ $array["details-inputgrid[1][discount]"]
				+ $array["details-inputgrid[2][discount]"]
				+ $array["details-inputgrid[3][discount]"]
				+ $array["details-inputgrid[4][discount]"]
				+ $array["details-inputgrid[5][discount]"]
				+ $array["details-inputgrid[6][discount]"]
				+ $array["details-inputgrid[7][discount]"]
				+ $array["details-inputgrid[8][discount]"]
				+ $array["details-inputgrid[9][discount]"];
	
				$grandtotal = $totalamount + $totaldiscount;
	
				$totalPropertytax_previous= 0;
				$totalMinsamekittax_previous= 0;
				$totalSamekittax_previous= 0;
				$totalEducess_previous= 0;
				$totalSubcess1_previous= 0;
				$totalSubcess2_previous= 0;
				$totalPropertytax_current= 0;
				$totalMinsamekittax_current= 0;
				$totalSamekittax_current= 0;
				$totalEducess_current= 0;
				$totalSubcess1_current= 0;
				$totalSubcess2_current= 0;
	
				$adhibhar_previous= 0;
				$adhibhar_current= 0;
	
	
	
				if($fddemandreceipt->receipttype == 1){
					$totalPropertytax_previous = $array["details-inputgrid[0][amount]"] + $array["details-inputgrid[0][discount]"];
					$totalMinsamekittax_previous = $array["details-inputgrid[1][amount]"] + $array["details-inputgrid[1][discount]"];
					$totalSamekittax_previous = $array["details-inputgrid[2][amount]"] + $array["details-inputgrid[2][discount]"];
					$totalEducess_previous = $array["details-inputgrid[3][amount]"] + $array["details-inputgrid[3][discount]"];
					$totalSubcess1_previous = $array["details-inputgrid[4][amount]"] + $array["details-inputgrid[4][discount]"];
					$totalSubcess2_previous = $array["details-inputgrid[5][amount]"] + $array["details-inputgrid[5][discount]"];
	
					$adhibhar_previous = $array["details-inputgrid[7][amount]"] + $array["details-inputgrid[7][discount]"];
				}
	
				if($fddemandreceipt->receipttype == 0){
					$totalPropertytax_current = $array["details-inputgrid[0][amount]"] + $array["details-inputgrid[0][discount]"];
					$totalMinsamekittax_current = $array["details-inputgrid[1][amount]"] + $array["details-inputgrid[1][discount]"];
					$totalSamekittax_current = $array["details-inputgrid[2][amount]"] + $array["details-inputgrid[2][discount]"];
					$totalEducess_current = $array["details-inputgrid[3][amount]"] + $array["details-inputgrid[3][discount]"];
					$totalSubcess1_current = $array["details-inputgrid[4][amount]"] + $array["details-inputgrid[4][discount]"];
					$totalSubcess2_current = $array["details-inputgrid[5][amount]"] + $array["details-inputgrid[5][discount]"];
						
					$adhibhar_current = $array["details-inputgrid[7][amount]"] + $array["details-inputgrid[7][discount]"];
				}
	
	
				$pttransaction = Pttransaction::model()->findByPK($fddemandreceipt->demandnumber);
				$id = sprintf("%02s%02s%05s", $pttransaction->idptmaster0->idccward0->idcczone, $pttransaction->idptmaster0->idccward, $pttransaction->idptmaster);
				$rows[] = array(
						$pttransaction->idptmaster0->caseno,
						$fddemandreceipt->demanddate,
						$fddemandreceipt->receiptbookno,
						$fddemandreceipt->receiptno,
						$pttransaction->idptmaster0->ownername . "  " . $pttransaction->idptmaster0->fathername,
						$pttransaction->idptmaster0->idccward0->idcczone,
						$pttransaction->idptmaster0->idccward,
						$totalamount,
						$totaldiscount,
						$grandtotal,
	
						$totalPropertytax_previous,
						$totalMinsamekittax_previous,
						$totalSamekittax_previous,
						$totalEducess_previous,
						$totalSubcess1_previous,
						$totalSubcess2_previous,
						$totalPropertytax_previous+
						$totalMinsamekittax_previous+
						$totalSamekittax_previous+
						$totalEducess_previous+
						$totalSubcess1_previous+
						$totalSubcess2_previous+
						$adhibhar_previous
						,
	
	
						$totalPropertytax_current,
						$totalMinsamekittax_current,
						$totalSamekittax_current,
						$totalEducess_current,
						$totalSubcess1_current,
						$totalSubcess2_current,
						$totalPropertytax_current+
						$totalMinsamekittax_current+
						$totalSamekittax_current+
						$totalEducess_current+
						$totalSubcess1_current+
						$totalSubcess2_current+
						$adhibhar_current
						,
	
						$fddemandreceipt->narration,
	
						$adhibhar_previous,
						$adhibhar_current,
						$pttransaction->idptmaster,
						$fddemandreceipt->idfddemandreceipt,
	
	
				);
			}
		}
		echo $this->renderPartial('/report/recoveryReport', array('rows' => $rows, 'startdate'=>$startdate, 'enddate'=>$enddate), true, true);
	}*/
	
	
	public function actionRecoveryReport24122012($startdate=111, $enddate=99999999999) {
		$criteria = new CDbCriteria(array(
				'condition' => 'demanddate >= :startdate And demanddate <= :enddate',
				'params' => array(':startdate'=>$startdate, ':enddate'=>$enddate)
		));
		$fddemandreceipts = Fddemandreceipt::model()->findAll($criteria);
		
		$rows = array();
		 
		foreach ($fddemandreceipts as $fddemandreceipt) {
		
			if (isset($fddemandreceipt->details)) {
				$grandtotal = 0;
				$totalamount = 0;
				$totaldiscount = 0;
		
				$jsonss = json_decode($fddemandreceipt->details, true);
				$array = array();
				foreach ($jsonss as $jsons) {
					$array[$jsons['name']] = $jsons['value'];
				}
		
				$totalamount =
				$array["details-inputgrid[0][amount]"]
				+ $array["details-inputgrid[1][amount]"]
				+ $array["details-inputgrid[2][amount]"]
				+ $array["details-inputgrid[3][amount]"]
				+ $array["details-inputgrid[4][amount]"]
				+ $array["details-inputgrid[5][amount]"]
				+ $array["details-inputgrid[6][amount]"]
				+ $array["details-inputgrid[7][amount]"]
				+ $array["details-inputgrid[8][amount]"]
				+ $array["details-inputgrid[9][amount]"];
		
				$totaldiscount =
				$array["details-inputgrid[0][discount]"]
				+ $array["details-inputgrid[1][discount]"]
				+ $array["details-inputgrid[2][discount]"]
				+ $array["details-inputgrid[3][discount]"]
				+ $array["details-inputgrid[4][discount]"]
				+ $array["details-inputgrid[5][discount]"]
				+ $array["details-inputgrid[6][discount]"]
				+ $array["details-inputgrid[7][discount]"]
				+ $array["details-inputgrid[8][discount]"]
				+ $array["details-inputgrid[9][discount]"];
		
				$grandtotal = $totalamount - $totaldiscount;

				$totalPropertytax_previous= 0;
				$totalMinsamekittax_previous= 0;
				$totalSamekittax_previous= 0;
				$totalEducess_previous= 0;
				$totalSubcess1_previous= 0;
				$totalSubcess2_previous= 0;
				$totalPropertytax_current= 0;
				$totalMinsamekittax_current= 0;
				$totalSamekittax_current= 0;
				$totalEducess_current= 0;
				$totalSubcess1_current= 0;
				$totalSubcess2_current= 0;
				
				$adhibhar_previous= 0;
				$adhibhar_current= 0;
				
				
				
				if($fddemandreceipt->receipttype == 1){
					$totalPropertytax_previous = $array["details-inputgrid[0][amount]"] - $array["details-inputgrid[0][discount]"];  
					$totalMinsamekittax_previous = $array["details-inputgrid[1][amount]"] - $array["details-inputgrid[1][discount]"];
					$totalSamekittax_previous = $array["details-inputgrid[2][amount]"] - $array["details-inputgrid[2][discount]"];
					$totalEducess_previous = $array["details-inputgrid[3][amount]"] - $array["details-inputgrid[3][discount]"];
					$totalSubcess1_previous = $array["details-inputgrid[4][amount]"] - $array["details-inputgrid[4][discount]"];
					$totalSubcess2_previous = $array["details-inputgrid[5][amount]"] - $array["details-inputgrid[5][discount]"];

					$adhibhar_previous = $array["details-inputgrid[7][amount]"] - $array["details-inputgrid[7][discount]"];
				}
				
				if($fddemandreceipt->receipttype == 0){
					$totalPropertytax_current = $array["details-inputgrid[0][amount]"] - $array["details-inputgrid[0][discount]"];  
					$totalMinsamekittax_current = $array["details-inputgrid[1][amount]"] - $array["details-inputgrid[1][discount]"];
					$totalSamekittax_current = $array["details-inputgrid[2][amount]"] - $array["details-inputgrid[2][discount]"];
					$totalEducess_current = $array["details-inputgrid[3][amount]"] - $array["details-inputgrid[3][discount]"];
					$totalSubcess1_current = $array["details-inputgrid[4][amount]"] - $array["details-inputgrid[4][discount]"];
					$totalSubcess2_current = $array["details-inputgrid[5][amount]"] - $array["details-inputgrid[5][discount]"];
					
					$adhibhar_current = $array["details-inputgrid[7][amount]"] - $array["details-inputgrid[7][discount]"];
				}
				
				
				$pttransaction = Pttransaction::model()->findByPK($fddemandreceipt->demandnumber);
				$id = sprintf("%02s%02s%05s", $pttransaction->idptmaster0->idccward0->idcczone, $pttransaction->idptmaster0->idccward, $pttransaction->idptmaster);
				$rows[] = array(
						$pttransaction->idptmaster0->caseno,
						$fddemandreceipt->demanddate,
						$fddemandreceipt->receiptbookno,
						$fddemandreceipt->receiptno,
						$pttransaction->idptmaster0->ownername . " / " . $pttransaction->idptmaster0->fathername,
						$pttransaction->idptmaster0->idccward0->idcczone,
						$pttransaction->idptmaster0->idccward,
						$totalamount,
						$totaldiscount,
						$grandtotal,
						
						$totalPropertytax_previous,
						$totalMinsamekittax_previous,
						$totalSamekittax_previous,
						$totalEducess_previous,
						$totalSubcess1_previous,
						$totalSubcess2_previous,						
						$totalPropertytax_previous+
						$totalMinsamekittax_previous+
						$totalSamekittax_previous+
						$totalEducess_previous+
						$totalSubcess1_previous+
						$totalSubcess2_previous+
						$adhibhar_previous
						,
						
						
						$totalPropertytax_current,
						$totalMinsamekittax_current,
						$totalSamekittax_current,
						$totalEducess_current,
						$totalSubcess1_current,
						$totalSubcess2_current,
						$totalPropertytax_current+
						$totalMinsamekittax_current+
						$totalSamekittax_current+
						$totalEducess_current+
						$totalSubcess1_current+
						$totalSubcess2_current+
						$adhibhar_current
						,

						$fddemandreceipt->narration,
						
						$adhibhar_previous,
						$adhibhar_current,

						
				);
			}
		}
		echo $this->renderPartial('/report/recoveryReport', array('rows' => $rows, 'startdate'=>$startdate, 'enddate'=>$enddate), true, true);		
	}

	public function actionRecoveryReportOld($startdate=111, $enddate=99999999999) {
		$criteria = new CDbCriteria(array(
				'condition' => 'demanddate >= :startdate And demanddate <= :enddate',
				'params' => array(':startdate'=>$startdate, ':enddate'=>$enddate)
		));
		$fddemandreceipts = Fddemandreceipt::model()->findAll($criteria);
	
		$rows = array();
			
		foreach ($fddemandreceipts as $fddemandreceipt) {
	
			if (isset($fddemandreceipt->details)) {
				$grandtotal = 0;
				$totalamount = 0;
				$totaldiscount = 0;
	
				$jsonss = json_decode($fddemandreceipt->details, true);
				$array = array();
				foreach ($jsonss as $jsons) {
					$array[$jsons['name']] = $jsons['value'];
				}
	
				$totalamount =
				$array["details-inputgrid[0][amount]"]
				+ $array["details-inputgrid[1][amount]"]
				+ $array["details-inputgrid[2][amount]"]
				+ $array["details-inputgrid[3][amount]"]
				+ $array["details-inputgrid[4][amount]"]
				+ $array["details-inputgrid[5][amount]"]
				+ $array["details-inputgrid[6][amount]"]
				+ $array["details-inputgrid[7][amount]"]
				+ $array["details-inputgrid[8][amount]"]
				+ $array["details-inputgrid[9][amount]"];
	
				$totaldiscount =
				$array["details-inputgrid[0][discount]"]
				+ $array["details-inputgrid[1][discount]"]
				+ $array["details-inputgrid[2][discount]"]
				+ $array["details-inputgrid[3][discount]"]
				+ $array["details-inputgrid[4][discount]"]
				+ $array["details-inputgrid[5][discount]"]
				+ $array["details-inputgrid[6][discount]"]
				+ $array["details-inputgrid[7][discount]"]
				+ $array["details-inputgrid[8][discount]"]
				+ $array["details-inputgrid[9][discount]"];
	
				$grandtotal = $totalamount - $totaldiscount;
	
				$totalPropertytax_previous= 0;
				$totalMinsamekittax_previous= 0;
				$totalSamekittax_previous= 0;
				$totalEducess_previous= 0;
				$totalSubcess1_previous= 0;
				$totalSubcess2_previous= 0;
				$totalPropertytax_current= 0;
				$totalMinsamekittax_current= 0;
				$totalSamekittax_current= 0;
				$totalEducess_current= 0;
				$totalSubcess1_current= 0;
				$totalSubcess2_current= 0;
	
	
				if($fddemandreceipt->receipttype == 1){
					$totalPropertytax_previous = $array["details-inputgrid[0][amount]"] - $array["details-inputgrid[0][discount]"];
					$totalMinsamekittax_previous = $array["details-inputgrid[1][amount]"] - $array["details-inputgrid[1][discount]"];
					$totalSamekittax_previous = $array["details-inputgrid[2][amount]"] - $array["details-inputgrid[2][discount]"];
					$totalEducess_previous = $array["details-inputgrid[3][amount]"] - $array["details-inputgrid[3][discount]"];
					$totalSubcess1_previous = $array["details-inputgrid[4][amount]"] - $array["details-inputgrid[4][discount]"];
					$totalSubcess2_previous = $array["details-inputgrid[5][amount]"] - $array["details-inputgrid[5][discount]"];
				}
	
				if($fddemandreceipt->receipttype == 0){
					$totalPropertytax_current = $array["details-inputgrid[0][amount]"] - $array["details-inputgrid[0][discount]"];
					$totalMinsamekittax_current = $array["details-inputgrid[1][amount]"] - $array["details-inputgrid[1][discount]"];
					$totalSamekittax_current = $array["details-inputgrid[2][amount]"] - $array["details-inputgrid[2][discount]"];
					$totalEducess_current = $array["details-inputgrid[3][amount]"] - $array["details-inputgrid[3][discount]"];
					$totalSubcess1_current = $array["details-inputgrid[4][amount]"] - $array["details-inputgrid[4][discount]"];
					$totalSubcess2_current = $array["details-inputgrid[5][amount]"] - $array["details-inputgrid[5][discount]"];
				}
	
	
				$pttransaction = Pttransaction::model()->findByPK($fddemandreceipt->demandnumber);
				$id = sprintf("%02s%02s%05s", $pttransaction->idptmaster0->idccward0->idcczone, $pttransaction->idptmaster0->idccward, $pttransaction->idptmaster);
				$rows[] = array(
						$pttransaction->idptmaster0->caseno,
						$fddemandreceipt->demanddate,
						$fddemandreceipt->receiptbookno,
						$fddemandreceipt->receiptno,
						$pttransaction->idptmaster0->ownername,
						$pttransaction->idptmaster0->idccward0->idcczone,
						$pttransaction->idptmaster0->idccward,
						$totalamount,
						$totaldiscount,
						$grandtotal,
	
						$totalPropertytax_previous,
						$totalMinsamekittax_previous,
						$totalSamekittax_previous,
						$totalEducess_previous,
						$totalSubcess1_previous,
						$totalSubcess2_previous,
						$totalPropertytax_previous+
						$totalMinsamekittax_previous+
						$totalSamekittax_previous+
						$totalEducess_previous+
						$totalSubcess1_previous+
						$totalSubcess2_previous,
	
	
						$totalPropertytax_current,
						$totalMinsamekittax_current,
						$totalSamekittax_current,
						$totalEducess_current,
						$totalSubcess1_current,
						$totalSubcess2_current,
						$totalPropertytax_current+
						$totalMinsamekittax_current+
						$totalSamekittax_current+
						$totalEducess_current+
						$totalSubcess1_current+
						$totalSubcess2_current,
	
						$fddemandreceipt->narration,
	
	
				);
			}
		}
		echo $this->renderPartial('/report/recoveryReport', array('rows' => $rows, 'startdate'=>$startdate, 'enddate'=>$enddate), true, true);
	}
	
	
	public function actionTransactionReport($startdate, $enddate) {
		$criteria = new CDbCriteria(array(
				'condition' => 'demanddate >= :startdate And demanddate <= :enddate',
				'params' => array(':startdate'=>$startdate, ':enddate'=>$enddate)
		));
		$fddemandreceipts = Fddemandreceipt::model()->findAll($criteria);
	
		$rows = array();
		 
		foreach ($fddemandreceipts as $fddemandreceipt) {
	
			if (isset($fddemandreceipt->details)) {
				$grandtotal = 0;
				$totalamount = 0;
				$totaldiscount = 0;
	
				$jsonss = json_decode($fddemandreceipt->details, true);
				$array = array();
				foreach ($jsonss as $jsons) {
					$array[$jsons['name']] = $jsons['value'];
				}
	
				$totalamount =
				$array["details-inputgrid[0][amount]"]
				+ $array["details-inputgrid[1][amount]"]
				+ $array["details-inputgrid[2][amount]"]
				+ $array["details-inputgrid[3][amount]"]
				+ $array["details-inputgrid[4][amount]"]
				+ $array["details-inputgrid[5][amount]"]
				//+ $array["details-inputgrid[6][amount]"]
				+ $array["details-inputgrid[7][amount]"];
			//	+ $array["details-inputgrid[8][amount]"]
			//	+ $array["details-inputgrid[9][amount]"];
	
				$totaldiscount =
				$array["details-inputgrid[0][discount]"]
				+ $array["details-inputgrid[1][discount]"]
				+ $array["details-inputgrid[2][discount]"]
				+ $array["details-inputgrid[3][discount]"]
				+ $array["details-inputgrid[4][discount]"]
				+ $array["details-inputgrid[5][discount]"]
				//+ $array["details-inputgrid[6][discount]"]
				+ $array["details-inputgrid[7][discount]"];
			//	+ $array["details-inputgrid[8][discount]"]
			//	+ $array["details-inputgrid[9][discount]"];
	
				//$grandtotal = $totalamount - $totaldiscount;
				$grandtotal = $totalamount + $totaldiscount;
	
	
	
				$pttransaction = Pttransaction::model()->findByPK($fddemandreceipt->demandnumber);
				$id = sprintf("%02s%02s%05s", $pttransaction->idptmaster0->idccward0->idcczone, $pttransaction->idptmaster0->idccward, $pttransaction->idptmaster);
				$rows[] = array(
						// idfddemandreceipt , encodePkey($demandsdetail['ptmaster']->idccward0->idcczone, $demandsdetail['ptmaster']->idccward, $demandsdetail['ptmaster']->idptmaster);
						 
						$pttransaction->idptmaster0->caseno,
						$fddemandreceipt->demanddate,
						$fddemandreceipt->receiptbookno,
						$fddemandreceipt->receiptno,
						$pttransaction->idptmaster0->ownername,
						$pttransaction->idptmaster0->idccward0->idcczone,
						$pttransaction->idptmaster0->idccward,
						$totalamount,
						$totaldiscount,
						$grandtotal,
						$fddemandreceipt->idfddemandreceipt,
						$pttransaction->idptmaster,
						$pttransaction->idptmaster0->fathername);
			}
		}
		//   echo $this->renderPartial('/report/recoveryReport', array('rows' => $rows, 'startdate'=>$startdate, 'enddate'=>$enddate), true, true);
		echo $this->renderPartial('/report/transactionReport', array('rows' => $rows, 'startdate'=>$startdate, 'enddate'=>$enddate), true, true);
	
	}
	
    public function actionTransactionReport24122012($startdate, $enddate) {
    	$criteria = new CDbCriteria(array(
    			'condition' => 'demanddate >= :startdate And demanddate <= :enddate',
    			'params' => array(':startdate'=>$startdate, ':enddate'=>$enddate)
    	));    	 
	    $fddemandreceipts = Fddemandreceipt::model()->findAll($criteria);
        
        $rows = array();
       
        foreach ($fddemandreceipts as $fddemandreceipt) {
        
        	if (isset($fddemandreceipt->details)) {
        		$grandtotal = 0;
        		$totalamount = 0;
        		$totaldiscount = 0;
        		
        		$jsonss = json_decode($fddemandreceipt->details, true);
        		$array = array();
        		foreach ($jsonss as $jsons) {
        			$array[$jsons['name']] = $jsons['value'];
        		}
        		
        		$totalamount = 
	        		$array["details-inputgrid[0][amount]"] 
	        		+ $array["details-inputgrid[1][amount]"] 
	        		+ $array["details-inputgrid[2][amount]"]  
	        		+ $array["details-inputgrid[3][amount]"]
	        		+ $array["details-inputgrid[4][amount]"]
	        		+ $array["details-inputgrid[5][amount]"]
	        		+ $array["details-inputgrid[6][amount]"]
	        		+ $array["details-inputgrid[7][amount]"]
	        		+ $array["details-inputgrid[8][amount]"]
	        		+ $array["details-inputgrid[9][amount]"];
        		
        		$totaldiscount =
	        		$array["details-inputgrid[0][discount]"]
	        		+ $array["details-inputgrid[1][discount]"]
	        		+ $array["details-inputgrid[2][discount]"]
	        		+ $array["details-inputgrid[3][discount]"]
	        		+ $array["details-inputgrid[4][discount]"]
	        		+ $array["details-inputgrid[5][discount]"]
	        		+ $array["details-inputgrid[6][discount]"]
	        		+ $array["details-inputgrid[7][discount]"]
	        		+ $array["details-inputgrid[8][discount]"]
	        		+ $array["details-inputgrid[9][discount]"];
        		
        		//$grandtotal = $totalamount - $totaldiscount;
        		$grandtotal = $totalamount + $totaldiscount;
        		
        		
        		        		
        		$pttransaction = Pttransaction::model()->findByPK($fddemandreceipt->demandnumber);
        		$id = sprintf("%02s%02s%05s", $pttransaction->idptmaster0->idccward0->idcczone, $pttransaction->idptmaster0->idccward, $pttransaction->idptmaster);        		
        		$rows[] = array(
        				// idfddemandreceipt , encodePkey($demandsdetail['ptmaster']->idccward0->idcczone, $demandsdetail['ptmaster']->idccward, $demandsdetail['ptmaster']->idptmaster);
        			  
        				$pttransaction->idptmaster0->caseno, 
        		     	$fddemandreceipt->demanddate, 
        				$fddemandreceipt->receiptbookno, 
        				$fddemandreceipt->receiptno, 
        				$pttransaction->idptmaster0->ownername, 
						$pttransaction->idptmaster0->idccward0->idcczone,
        				$pttransaction->idptmaster0->idccward, 
        				$totalamount, 
        				$totaldiscount, 
        				$grandtotal,
        				$fddemandreceipt->idfddemandreceipt,
        				$pttransaction->idptmaster,
        				$pttransaction->idptmaster0->fathername);
        	}
        }
     //   echo $this->renderPartial('/report/recoveryReport', array('rows' => $rows, 'startdate'=>$startdate, 'enddate'=>$enddate), true, true);        
        echo $this->renderPartial('/report/transactionReport', array('rows' => $rows, 'startdate'=>$startdate, 'enddate'=>$enddate), true, true);
        
	}
	
	
	public function actionTransactionReportOldByGG($startdate, $enddate) {
		$criteria = new CDbCriteria(array(
				'condition' => 'demanddate >= :startdate And demanddate <= :enddate',
				'params' => array(':startdate'=>$startdate, ':enddate'=>$enddate)
		));
		$fddemandreceipts = Fddemandreceipt::model()->findAll($criteria);
	
		$rows = array();
		 
		foreach ($fddemandreceipts as $fddemandreceipt) {
	
			if (isset($fddemandreceipt->details)) {
				$grandtotal = 0;
				$totalamount = 0;
				$totaldiscount = 0;
	
				$jsonss = json_decode($fddemandreceipt->details, true);
				$array = array();
				foreach ($jsonss as $jsons) {
					$array[$jsons['name']] = $jsons['value'];
				}
	
				$totalamount =
				$array["details-inputgrid[0][amount]"]
				+ $array["details-inputgrid[1][amount]"]
				+ $array["details-inputgrid[2][amount]"]
				+ $array["details-inputgrid[3][amount]"]
				+ $array["details-inputgrid[4][amount]"]
				+ $array["details-inputgrid[5][amount]"]
				+ $array["details-inputgrid[6][amount]"]
				+ $array["details-inputgrid[7][amount]"]
				+ $array["details-inputgrid[8][amount]"]
				+ $array["details-inputgrid[9][amount]"];
	
				$totaldiscount =
				$array["details-inputgrid[0][discount]"]
				+ $array["details-inputgrid[1][discount]"]
				+ $array["details-inputgrid[2][discount]"]
				+ $array["details-inputgrid[3][discount]"]
				+ $array["details-inputgrid[4][discount]"]
				+ $array["details-inputgrid[5][discount]"]
				+ $array["details-inputgrid[6][discount]"]
				+ $array["details-inputgrid[7][discount]"]
				+ $array["details-inputgrid[8][discount]"]
				+ $array["details-inputgrid[9][discount]"];
	
				$grandtotal = $totalamount - $totaldiscount;
	
	
				$pttransaction = Pttransaction::model()->findByPK($fddemandreceipt->demandnumber);
				$id = sprintf("%02s%02s%05s", $pttransaction->idptmaster0->idccward0->idcczone, $pttransaction->idptmaster0->idccward, $pttransaction->idptmaster);
				$rows[] = array(
					
						$pttransaction->idptmaster0->caseno,
						$fddemandreceipt->demanddate,
						$fddemandreceipt->receiptbookno,
						$fddemandreceipt->receiptno,
						$pttransaction->idptmaster0->ownername,
						$pttransaction->idptmaster0->idccward0->idcczone,
						$pttransaction->idptmaster0->idccward,
						$totalamount,
						$totaldiscount,
						$grandtotal);
			}
		}
		//   echo $this->renderPartial('/report/recoveryReport', array('rows' => $rows, 'startdate'=>$startdate, 'enddate'=>$enddate), true, true);
		echo $this->renderPartial('/report/transactionReport', array('rows' => $rows, 'startdate'=>$startdate, 'enddate'=>$enddate), true, true);
	
	}
	

    public function getDemand($id) {
        $data = array();

        $criteria = new CDbCriteria(array(
                    'with' => array(
                        'idptmaster0' => array(
                            'condition' => 'idptmaster0.idptmaster =:idptmaster',
                            'params' => array(':idptmaster' => $id)
                        ),
                    ),
                    'condition' => 'idccfyear = :idccfyear',
                    'params' => array(':idccfyear' => Yii::app()->session['ccfyear']->idccfyear),
                ));


        $pttransaction = Pttransaction::model()->find($criteria);
        $status = 'Success';
        $message = '';
        $demandnumber = '';
        $demandinname = '';
        $demandamount = '0';
        $oldfddemandreceipts = array();
        $oldamountpaid = 0;


        $propertytaxpaid = 0;
        $servicetaxpaid = 0;
        $minsamekittaxpaid = 0;
        $samekittaxpaid = 0;
        $waterpttaxpaid = 0;
        $educesspaid = 0;
        $subcess1paid = 0;
        $subcess2paid = 0;
        $pttaxdiscountpaid = 0;
        $pttaxsurchargepaid = 0;
        $amountpaid = 0;
        $discountpaid = 0;


        if (isset($pttransaction)) {
            $criteria = new CDbCriteria(array(
                        'condition' => 'demandnumber = :demandnumber',
                        'params' => array(':demandnumber' => $pttransaction->idpttransaction)
                    ));
            $fddemandreceipts = Fddemandreceipt::model()->findAll($criteria);
            foreach ($fddemandreceipts as $fddemandreceipt) {
                $oldamountpaid += $fddemandreceipt->amountpaid;
                $oldfddemandreceipts[] = $fddemandreceipt;

                if (isset($fddemandreceipt->details)) {
                    $jsonss = json_decode($fddemandreceipt->details, true);
                    $array = array();
                    foreach ($jsonss as $jsons) {
                        $array[$jsons['name']] = $jsons['value'];
                    }
                    $propertytaxpaid += $array["details-inputgrid[0][amount]"] + $array["details-inputgrid[0][discount]"];
                    $minsamekittaxpaid += $array["details-inputgrid[1][amount]"] + $array["details-inputgrid[1][discount]"];
                    $samekittaxpaid += $array["details-inputgrid[2][amount]"] + $array["details-inputgrid[2][discount]"];
                    $educesspaid += $array["details-inputgrid[3][amount]"] + $array["details-inputgrid[3][discount]"];

                    $subcess1paid += $array["details-inputgrid[4][amount]"] + $array["details-inputgrid[4][discount]"];
                    $subcess2paid += $array["details-inputgrid[5][amount]"] + $array["details-inputgrid[5][discount]"];

                    $pttaxdiscountpaid += $array["details-inputgrid[6][amount]"] + $array["details-inputgrid[6][discount]"];
                    $pttaxsurchargepaid += $array["details-inputgrid[7][amount]"] + $array["details-inputgrid[7][discount]"];
                    $servicetaxpaid += $array["details-inputgrid[8][amount]"] + $array["details-inputgrid[8][discount]"];
                    $waterpttaxpaid += $array["details-inputgrid[9][amount]"] + $array["details-inputgrid[9][discount]"];
                }
            }

            $data[] = array(
                Yii::t('application', 'Propertytax'),
                $pttransaction->oldpropertytax,
                $pttransaction->propertytax,
                $pttransaction->oldpropertytax + $pttransaction->propertytax,
                isset($propertytaxpaid) ? $propertytaxpaid : 0,
                0,
                0,
                0,
            );
            $data[] = array(
                Yii::t('application', 'Minsamekittax'),
                $pttransaction->oldminsamekittax,
                $pttransaction->minsamekittax,
                $pttransaction->oldminsamekittax + $pttransaction->minsamekittax,
                $minsamekittaxpaid,
                0,
                0,
                0,
            );
            $data[] = array(
                Yii::t('application', 'Samekittax'),
                $pttransaction->oldsamekittax,
                $pttransaction->samekittax,
                $pttransaction->oldsamekittax + $pttransaction->samekittax,
                $samekittaxpaid,
                0,
                0,
                0,
            );
            $data[] = array(
                Yii::t('application', 'Educess'),
                $pttransaction->oldeducess,
                $pttransaction->educess,
                $pttransaction->oldeducess + $pttransaction->educess,
                $educesspaid,
                0,
                0,
                0,
            );
            $data[] = array(
                Yii::t('application', 'Subcess1'),
                $pttransaction->oldsubcess1,
                $pttransaction->subcess1,
                $pttransaction->oldsubcess1 + $pttransaction->subcess1,
                $subcess1paid,
                0,
                0,
                0,
            );
            $data[] = array(
                Yii::t('application', 'Subcess2'),
                $pttransaction->oldsubcess2,
                $pttransaction->subcess2,
                $pttransaction->oldsubcess2 + $pttransaction->subcess2,
                $subcess1paid,
                0,
                0,
                0,
            );
            $data[] = array(
                Yii::t('application', 'Pttaxdiscount'),
                $pttransaction->oldpttaxdiscount,
                $pttransaction->pttaxdiscount,
                $pttransaction->oldpttaxdiscount + $pttransaction->pttaxdiscount,
                $pttaxdiscountpaid,
                0,
                0,
                0,
            );
            $data[] = array(
                Yii::t('application', 'Pttaxsurcharge'),
                $pttransaction->oldpttaxsurcharge,
                $pttransaction->pttaxsurcharge,
                $pttransaction->oldpttaxsurcharge + $pttransaction->pttaxsurcharge,
                $pttaxsurchargepaid,
                0,
                0,
                0,
            );
//             $data[] = array(
//                 Yii::t('application', 'Servicetax'),
//                 $pttransaction->oldservicetax,
//                 $pttransaction->servicetax,
//                 $pttransaction->oldservicetax + $pttransaction->servicetax,
//                 $servicetaxpaid,
//                 0,
//                 0,
//                 0,
//             );
//             $data[] = array(
//                 Yii::t('application', 'Waterpttax'),
//                 $pttransaction->oldwaterpttax,
//                 $pttransaction->waterpttax,
//                 $pttransaction->oldwaterpttax + $pttransaction->waterpttax,
//                 $waterpttaxpaid,
//                 0,
//                 0,
//                 0,
//             );
        }
        return array('data' => $data, 'pttransaction' => $pttransaction);
    }

    public function actionViewBill($id) {
        $demand = $this->getDemand($id);
        echo $this->renderPartial('/report/bill', array('model' => $demand['pttransaction'], 'demand' => $demand), true, true);
    }

    /*
     * $id -> idccward
     * if $id == 0 => generate report for all wards...
     */

    public function actionViewBills($id) {
        if ($id == 0) {
            $ptmasters = Ptmaster::model()->findAll();
        } else {
            $criteria = new CDbCriteria(array(
                        'condition' => 'idccward = :idccward',
                        'params' => array(':idccward' => $id)
                    ));

            $ptmasters = Ptmaster::model()->findAll($criteria);
        }
        foreach ($ptmasters as $ptmaster) {
            $demand = $this->getDemand($ptmaster->idptmaster);
            echo $this->renderPartial('/report/bill', array('model' => $demand['pttransaction'], 'demand' => $demand), true, true);
        }
    }

    public function actionWardwiseDemand($id) {
        $criteria = new CDbCriteria(array(
                    'condition' => 'idccward = :idccward',
                    'params' => array(':idccward' => $id)
                ));

        $ptmasters = Ptmaster::model()->findAll($criteria);
        $demands = array();
        $idccward = 0;
        $demandsdetails = array();
        foreach ($ptmasters as $ptmaster) {
            $idccward = $ptmaster->idccward;
            $demandsdetails[] = array('ptmaster' => $ptmaster, 'demand' => $this->getDemand($ptmaster->idptmaster));
        }
        echo $this->renderPartial('/report/wardwisedemand', array('wardno' => $idccward, 'demandsdetails' => $demandsdetails), true, true);
    }

    public function actionViewBillOld($id) {

        $criteria = new CDbCriteria(array(
                    'with' => array(
                        'idptmaster0' => array(
                            'condition' => 'idptmaster0.idptmaster =:idptmaster',
                            'params' => array(':idptmaster' => $id)
                        ),
                    ),
                    'condition' => 'idccfyear = :idccfyear',
                    'params' => array(':idccfyear' => Yii::app()->session['ccfyear']->idccfyear),
                ));


        $pttransaction = Pttransaction::model()->find($criteria);

        $criteria = new CDbCriteria(array(
                    'condition' => 'demandnumber = :demandnumber',
                    'params' => array(':demandnumber' => $pttransaction->idpttransaction)
                ));
        $fddemandreceipts = Fddemandreceipt::model()->findAll($criteria);

        foreach ($fddemandreceipts as $fddemandreceipt) {
            echo $fddemandreceipt->idfddemandreceipt . "<br/>";
        }




//        $criteria = new CDbCriteria(array(
//                    'condition' => 'idptmaster = :idptmaster And idccfyear = :idccfyear',
//                    'params' => array(':idptmaster' => $id, ':idccfyear' => 1)
//                ));
//        $pttransaction = Pttransaction::model()->find($criteria);
//        $grand_oldpropertytax = 0;
//        if (isset($pttransaction)) {
//            $grand_oldpropertytax = $pttransaction->oldpropertytax + $pttransaction->oldservicetax + $pttransaction->oldminsamekittax + $pttransaction->oldsamekittax + $pttransaction->oldwaterpttax + $pttransaction->oldeducess + $pttransaction->oldsubcess1 + $pttransaction->oldsubcess2 - $pttransaction->oldpttaxdiscount + $pttransaction->oldpttaxsurcharge;
//            $grand_currentpropertytax = $pttransaction->propertytax + $pttransaction->servicetax + $pttransaction->minsamekittax + $pttransaction->samekittax + $pttransaction->waterpttax + $pttransaction->educess + $pttransaction->subcess1 + $pttransaction->subcess2;
//            echo $this->renderPartial('/ptmaster/ledger', array('model' => $pttransaction, 'grand_oldpropertytax' => $grand_oldpropertytax, 'grand_currentpropertytax' => $grand_currentpropertytax), true, true);
//        }
    }

    public function actionWardwiseDemandDetailed($id) {
        $criteria = new CDbCriteria(array(
                    'condition' => 'idccward = :idccward',
                    'params' => array(':idccward' => $id)
                ));

        $ptmasters = Ptmaster::model()->findAll($criteria);
        $demands = array();
        $idccward = 0;
        $demandsdetails = array();
        foreach ($ptmasters as $ptmaster) {
            $idccward = $ptmaster->idccward;
            $demandsdetails[] = array('ptmaster' => $ptmaster, 'demand' => $this->getDemand($ptmaster->idptmaster));
        }
        echo $this->renderPartial('/report/wardwisedemanddetailed', array('wardno' => $idccward, 'demandsdetails' => $demandsdetails), true, true);
    }

    public function actionReport($id, $report = 1) {
        $criteria = new CDbCriteria(array(
                    'condition' => 'idccward = :idccward',
                    'params' => array(':idccward' => $id)
                ));

        $ptmasters = Ptmaster::model()->findAll($criteria);
        $demands = array();
        $idccward = 0;
        $demandsdetails = array();
        foreach ($ptmasters as $ptmaster) {
            $idccward = $ptmaster->idccward;
            $demandsdetails[] = array('ptmaster' => $ptmaster, 'demand' => $this->getDemand($ptmaster->idptmaster));
        }
        echo $this->renderPartial('/report/report' . $report, array('wardno' => $idccward, 'demandsdetails' => $demandsdetails), true, true);
    }

    public function actionReport4() {
        $ccwards = Ccward::model()->findAll();
        $wards = array();
        foreach ($ccwards as $ccward) {
            $criteria = new CDbCriteria(array(
                        'condition' => 'idccward = :idccward',
                        'params' => array(':idccward' => $ccward->idccward)
                    ));

            $ptmasters = Ptmaster::model()->findAll($criteria);
            $idccward = 0;
            $demandsdetails = array();

            $totalarea_residential = 0;
            $totalarea_commercial = 0;
            $totalarea_rental = 0;
            $total_area = 0;

            $propertytax_propertycount = 0;         //propertytax > 0
            $propertytax_propertyarea = 0;          //propertytax > 0
            $minsamekittax_propertycount = 0;       //minsamekittax > 0
            $minsamekittax_propertyarea = 0;        //minsamekittax > 0
            $total_propertycount = 0;               //totalarea > 0
            $total_plotcount = 0;                   //totalarea == 0
            $exsumptor_propertycount = 0;            //mandir/masjid parmarthik
            $totalresidential_propertycount = 0;    //residential + rental
            $totalcommercial_propertycount = 0;     //commercial
            $totalresidential_propertyarea = 0;     //residential + rental
            $totalcommercial_propertyarea = 0;      //commercial



            foreach ($ptmasters as $ptmaster) {
//                syslog(LOG_WARNING, '$ccward... ' . $ccward->idccward . ' -> ' . $ptmaster->idptmaster);

                $demand = $this->getDemand($ptmaster->idptmaster);
                $propertydetails = json_decode($ptmaster->propertydetails, true);

                $totalarea_residential += $propertydetails[5]['aresidential'] + $propertydetails[5]['bresidential'] + $propertydetails[5]['cresidential'] + $propertydetails[5]['dresidential'] + $propertydetails[5]['eresidential'];
                $totalarea_commercial += $propertydetails[5]['acommercial'] + $propertydetails[5]['bcommercial'] + $propertydetails[5]['ccommercial'] + $propertydetails[5]['dcommercial'] + $propertydetails[5]['ecommercial'];
                $totalarea_rental += $propertydetails[5]['arental'] + $propertydetails[5]['brental'] + $propertydetails[5]['crental'] + $propertydetails[5]['drental'] + $propertydetails[5]['erental'];
                $totalarea = $totalarea_residential + $totalarea_commercial + $totalarea_rental;


                if ($demand['data'][0][2] > 0) {      //[0][2] => propertytax value
                    $propertytax_propertycount++;
                    $propertytax_propertyarea += $totalarea;
                }
                else{
                    if ($demand['data'][1][2] > 0) {      //[1][2] => minsamekittax value
                        $minsamekittax_propertycount++;
                        $minsamekittax_propertyarea += $totalarea;
                    }
                }
                if ($totalarea > 0) {
                    $total_propertycount++;
                } else {
                    $total_plotcount++;
                }

                if ($ptmaster->idptexsumtors != '') {
                    if (in_array(4, explode(",", $ptmaster->idptexsumtors))) {
                        $exsumptor_propertycount++;
                    }
                }

                if ($totalarea_residential + $totalarea_rental > 0) {
                    $totalresidential_propertycount++;
                    $totalresidential_propertyarea += $totalarea_residential + $totalarea_rental;
                }
                if ($totalarea_commercial > 0) {
                    $totalcommercial_propertycount++;
                    $totalcommercial_propertyarea += $totalarea_commercial;
                }
            }

            $wards[] = array(
                'idccward' => $ccward->idccward,
                'propertytax_propertycount' => $propertytax_propertycount,
                'propertytax_propertyarea' => $propertytax_propertyarea,
                'minsamekittax_propertycount' => $minsamekittax_propertycount,
                'minsamekittax_propertyarea' => $minsamekittax_propertyarea,
                'total_propertycount' => $total_propertycount,
                'total_plotcount' => $total_plotcount,
                'exsumptor_propertycount' => $exsumptor_propertycount,
                'totalresidential_propertycount' => $totalresidential_propertycount,
                'totalcommercial_propertycount' => $totalcommercial_propertycount,
                'totalresidential_propertyarea' => $totalresidential_propertyarea,
                'totalcommercial_propertyarea' => $totalcommercial_propertyarea,
            );
        }

        echo $this->renderPartial('/report/report4', array('wards' => $wards), true, true);
    }

    public function actionReport5() {
        $ccwards = Ccward::model()->findAll();
        $wards = array();
        foreach ($ccwards as $ccward) {
            $criteria = new CDbCriteria(array(
                        'condition' => 'idccward = :idccward',
                        'params' => array(':idccward' => $ccward->idccward)
                    ));

            $ptmasters = Ptmaster::model()->findAll($criteria);

            $propertytax_demand = 0;
            $propertytax_outstanding = 0;
            $minsamekittax_demand = 0;
            $minsamekittax_outstanding = 0;
//            $demandamt = 0;
//            $paidamt = 0;
            
            foreach ($ptmasters as $ptmaster) {
//                syslog(LOG_WARNING, '$ccward... ' . $ccward->idccward . ' -> ' . $ptmaster->idptmaster);
                $demand = $this->getDemand($ptmaster->idptmaster);
                $demandamt = $demand['data'][0][3] + $demand['data'][1][3] + $demand['data'][2][3] + $demand['data'][9][3] + $demand['data'][3][3] + $demand['data'][4][3] + $demand['data'][5][3];                
                $paidamt = $demand['data'][0][4] + $demand['data'][1][4] + $demand['data'][2][4] + $demand['data'][9][4] + $demand['data'][3][4] + $demand['data'][4][4] + $demand['data'][5][3];
                
                if ($demand['data'][0][2] > 0) {      //[0][2] => propertytax value
                    $propertytax_demand += $demandamt;
                    $propertytax_outstanding += $demandamt - $paidamt;
                }
                else{
                    if ($demand['data'][1][2] > 0) {      //[1][2] => minsamekittax value
                        $minsamekittax_demand += $demandamt;
                        $minsamekittax_outstanding += $demandamt - $paidamt;
                    }
                }
            }
//                echo $paidamt; exit;
            $wards[] = array(
                'idccward' => $ccward->idccward,
                'propertytax_demand' => $propertytax_demand,
                'propertytax_outstanding' => $propertytax_outstanding,
                'propertytax_total' => $propertytax_demand,
                'minsamekittax_demand' => $minsamekittax_demand,
                'minsamekittax_outstanding' => $minsamekittax_outstanding,
                'minsamekittax_total' => $minsamekittax_demand,
                'total' => $propertytax_demand + $minsamekittax_demand,
            );
        }

        echo $this->renderPartial('/report/report5', array('wards' => $wards), true, true);
    }

}

?>
