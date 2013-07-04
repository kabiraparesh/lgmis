<?php

class PropertytaxController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
//	public $layout='//layouts/column2';
//        public $layout = '//layouts/eastsouthwest';
    public $layout = '//layouts/main';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('generate', 'generateAll', 'generateAllBetma'),
                'users' => array('*'),
            ),
//			array('allow', // allow authenticated user to perform 'create' and 'update' actions
//				'actions'=>array('create','update'),
//				'users'=>array('@'),
//			),
//			array('allow', // allow admin user to perform 'admin' and 'delete' actions
//				'actions'=>array('popupview', 'admin','delete'),
//				'users'=>array('admin'),
//			),
//			array('deny',  // deny all users
//				'users'=>array('*'),
//			),
        );
    }

    public function getDemand($id) {
        //Initialize demand array 
        $demand = array();
        $demand['propertytax'] = 0;
        $demand['servicetax'] = 0;
        $demand['minsamekittax'] = 0;
        $demand['samekittax'] = 0;
        $demand['waterpttax'] = 0;
        $demand['educess'] = 0;
        $demand['subcess1'] = 0;
        $demand['subcess2'] = 0;
        $demand['pttaxdiscount'] = 0;
        $demand['pttaxsurcharge'] = 0;
        $demand['resbhada'] = 0;
        $demand['combhada'] = 0;
        $demand['rentbhada'] = 0;
        $demand['resbhadadis'] = 0;
        $demand['combhadadis'] = 0;
        $demand['rentbhadadis'] = 0;
        $demand['resbhadaothdis'] = 0;
        $demand['combhadaothdis'] = 0;
        $demand['rentbhadaothdis'] = 0;
        $demand['resbhada12kdis'] = 0;
        $demand['combhada12kdis'] = 0;
        $demand['rentbhada12kdis'] = 0;
        $demand['respttax'] = 0;
        $demand['compttax'] = 0;
        $demand['rentpttax'] = 0;
        $demand['resptselfdis'] = 0;
        $demand['comptselfdis'] = 0;
        $demand['rentptselfdis'] = 0;
        $demand['grand_exsumptor_amount'] = 0;
        $demand['total_demand_currentyear'] = 0;
        //Initialization end

        $ptmaster = Ptmaster::model()->findByPk($id);
        if (!isset($ptmaster)) {
            return null;
        }
        $propertydetails = json_decode($ptmaster->propertydetails, true);
        //$propertydetails[5] contains grand totals

        $criteria = new CDbCriteria(array(
                    'condition' => 'idptrange = :idptrange And idptpropertyon = :idptpropertyon And idccfyear = :idccfyear',
                    'params' => array(':idptrange' => $ptmaster->idptrange, ':idptpropertyon' => $ptmaster->idptpropertyon, ':idccfyear' => Yii::app()->session['ccfyear']->idccfyear)
                ));
        $ptbhadarate = Ptbhadarate::model()->find($criteria);

        $criteria = new CDbCriteria(array(
                    'condition' => 'idptrange = :idptrange And idccfyear = :idccfyear',
                    'params' => array(':idptrange' => $ptmaster->idptrange, ':idccfyear' => Yii::app()->session['ccfyear']->idccfyear)
                ));
        $pttaxrate = Pttaxrate::model()->find($criteria);

        //1nd Table
        $residential_total = 0;
        $commercial_total = 0;
        $rental_total = 0;
        $grand_total = 0;

        $residential_total += $propertydetails[5]['aresidential'] * $ptbhadarate->aresidential;
        $residential_total += $propertydetails[5]['bresidential'] * $ptbhadarate->bresidential;
        $residential_total += $propertydetails[5]['cresidential'] * $ptbhadarate->cresidential;
        $residential_total += $propertydetails[5]['dresidential'] * $ptbhadarate->dresidential;
        $residential_total += $propertydetails[5]['eresidential'] * $ptbhadarate->eresidential;

        $commercial_total += $propertydetails[5]['acommercial'] * $ptbhadarate->acommercial;
        $commercial_total += $propertydetails[5]['bcommercial'] * $ptbhadarate->bcommercial;
        $commercial_total += $propertydetails[5]['ccommercial'] * $ptbhadarate->ccommercial;
        $commercial_total += $propertydetails[5]['dcommercial'] * $ptbhadarate->dcommercial;
        $commercial_total += $propertydetails[5]['ecommercial'] * $ptbhadarate->ecommercial;

        $rental_total += $propertydetails[5]['arental'] * $ptbhadarate->aresidential;
        $rental_total += $propertydetails[5]['brental'] * $ptbhadarate->bresidential;
        $rental_total += $propertydetails[5]['crental'] * $ptbhadarate->cresidential;
        $rental_total += $propertydetails[5]['drental'] * $ptbhadarate->dresidential;
        $rental_total += $propertydetails[5]['erental'] * $ptbhadarate->eresidential;

        $grand_total = $residential_total + $commercial_total + $rental_total;
        syslog(LOG_WARNING, 'grandtotal... ' . "$residential_total  $commercial_total  $rental_total $grand_total");

        if ($grand_total > 4800) {
            $permanentdiscount_residential = $residential_total * $pttaxrate->permanentdiscount / 100;
            $permanentdiscount_rental = $rental_total * $pttaxrate->permanentdiscount / 100;
            $permanentdiscount_commercial = $commercial_total * $pttaxrate->permanentdiscount / 100;

            $otherdiscount_residential = $residential_total * $pttaxrate->otherdiscount / 100;
            $otherdiscount_rental = $rental_total * $pttaxrate->otherdiscount / 100;
            $otherdiscount_commercial = $commercial_total * $pttaxrate->otherdiscount / 100;

            $discount12k_residential = $residential_total * $pttaxrate->discount12k / 100;
            $discount12k_rental = $rental_total * $pttaxrate->discount12k / 100;
            $discount12k_commercial = $commercial_total * $pttaxrate->discount12k / 100;

            $grand_discount_residential = $residential_total - ($permanentdiscount_residential + $otherdiscount_residential + $discount12k_residential);
            $grand_discount_rental = $rental_total - ($permanentdiscount_rental + $otherdiscount_rental + $discount12k_rental);
            $grand_discount_commercial = $commercial_total - ($permanentdiscount_commercial + $otherdiscount_commercial + $discount12k_commercial);

            $grand_discount = $grand_discount_residential + $grand_discount_rental + $grand_discount_commercial;

            $pttaxrate_residential = $grand_discount_residential * $pttaxrate->pttaxrate / 100;
            $pttaxrate_commercial = $grand_discount_commercial * $pttaxrate->pttaxrate / 100;
            $pttaxrate_rental = $grand_discount_rental * $pttaxrate->pttaxrate / 100;

            $ptselfusediscount_residential = $pttaxrate_residential * $pttaxrate->selfusediscount / 100;
            $ptselfusediscount_commercial = 0;
            $ptselfusediscount_rental = 0;

            $grand_pttaxrate_residential = $ptselfusediscount_residential;
            $grand_pttaxrate_commercial = $pttaxrate_commercial;
            $grand_pttaxrate_rental = $pttaxrate_rental;

            $grand_pttaxrate = round($grand_pttaxrate_residential + $grand_pttaxrate_commercial + $grand_pttaxrate_rental);

            //2nd Table
            $ptexsumptors = array();
            $idptexsumptors = explode(",", $ptmaster->idptexsumtors);
            $grand_exsumptor_amount = 0;
            foreach (Ptexsumptor::model()->findAll() as $ptexsumptor) {
                if (in_array($ptexsumptor->idptexsumptor, $idptexsumptors)) {
                    $ptexsumptors[$ptexsumptor->idptexsumptor] = array($ptexsumptor, round($grand_pttaxrate * $ptexsumptor->rebate / 100));
                    $grand_exsumptor_amount += round($grand_pttaxrate * $ptexsumptor->rebate / 100);
                } else {
                    $ptexsumptors[$ptexsumptor->idptexsumptor] = array($ptexsumptor, 0);
                }
            }
            //grand_pttaxrate after deducting exsumptor
            $grand_pttaxrate -= $grand_exsumptor_amount;

            //3rd Table            
            $minsamekittax = $pttaxrate->minsamekittax;
            $samekittax = round($grand_pttaxrate * $pttaxrate->samekittax / 100);
            $waterpttax = round($grand_pttaxrate * $pttaxrate->waterpttax / 100);
            $educess = round($grand_pttaxrate * $pttaxrate->educess / 100);
//            $subcess1 = round($grand_pttaxrate * $pttaxrate->subcess1 / 100);
//            $subcess2 = round($grand_pttaxrate * $pttaxrate->subcess2 / 100);
//            $subcess = $subcess1 + $subcess2;
            $subcess1 = round($grand_discount_residential * $pttaxrate->subcess1 / 100);
            $subcess2 = round(($grand_discount_rental + $grand_discount_commercial) * $pttaxrate->subcess2 / 100);
            $subcess = $subcess1 + $subcess2;
            $total_demand_currentyear = $grand_pttaxrate + $minsamekittax + $samekittax + $waterpttax + $educess + $subcess;

            $pttaxdiscount = round($grand_pttaxrate * $pttaxrate->pttaxdiscount / 100);
            $pttaxsurcharge = round($total_demand_currentyear * $pttaxrate->pttaxsurcharge / 100);

            //Service Tax Calculation
            $servicetax = 0;
            if (isset($ptmaster->idptservicetax) && $ptmaster->idptservicetax > 0) {
                //Todo: calculate...
                $criteria = new CDbCriteria(array(
                            'condition' => 'idccfyear = :idccfyear And idptservicetax = :idptservicetax',
                            'params' => array(':idccfyear' => Yii::app()->session['ccfyear']->idccfyear, ':idptservicetax' => $ptmaster->idptservicetax)
                        ));
                $ptservicetax = Ptservicetax::model()->find($criteria);
                if (isset($ptservicetax)) {
                    $servicetax = $total_demand_currentyear * $ptservicetax->taxrate / 100;
                }
            }
        } else {
            $permanentdiscount_residential = 0;
            $permanentdiscount_rental = 0;
            $permanentdiscount_commercial = 0;

            $otherdiscount_residential = 0;
            $otherdiscount_rental = 0;
            $otherdiscount_commercial = 0;

            $discount12k_residential = 0;
            $discount12k_rental = 0;
            $discount12k_commercial = 0;

            $grand_discount_residential = 0;
            $grand_discount_rental = 0;
            $grand_discount_commercial = 0;

            $grand_discount = $grand_discount_residential + $grand_discount_rental + $grand_discount_commercial;

            $pttaxrate_residential = 0;
            $pttaxrate_commercial = 0;
            $pttaxrate_rental = 0;

            $ptselfusediscount_residential = 0;
            $ptselfusediscount_commercial = 0;
            $ptselfusediscount_rental = 0;

            $grand_pttaxrate_residential = 0;
            $grand_pttaxrate_commercial = 0;
            $grand_pttaxrate_rental = 0;

            $grand_pttaxrate = 0;

            //2nd Table
            $ptexsumptors = array();
            $idptexsumptors = explode(",", $ptmaster->idptexsumtors);
            $grand_exsumptor_amount = 0;
            foreach (Ptexsumptor::model()->findAll() as $ptexsumptor) {
                $ptexsumptors[$ptexsumptor->idptexsumptor] = array($ptexsumptor, 0);
            }
            //grand_pttaxrate after deducting exsumptor
            $grand_pttaxrate -= $grand_exsumptor_amount;

            //3rd Table            
            $minsamekittax = $pttaxrate->minsamekittax;
            $samekittax = 0;
            $waterpttax = 0;
            $educess = 0;
            $subcess1 = 0;
            $subcess2 = 0;
            $subcess = $subcess1 + $subcess2;
            $total_demand_currentyear = $grand_pttaxrate + $minsamekittax + $samekittax + $waterpttax + $educess + $subcess;

            $pttaxdiscount = 0;
            $pttaxsurcharge = round($total_demand_currentyear * $pttaxrate->pttaxsurcharge / 100);

            //Service Tax Calculation
            $servicetax = 0;
            if (isset($ptmaster->idptservicetax) && $ptmaster->idptservicetax > 0) {
                //Todo: calculate...
                $criteria = new CDbCriteria(array(
                            'condition' => 'idccfyear = :idccfyear And idptservicetax = :idptservicetax',
                            'params' => array(':idccfyear' => Yii::app()->session['ccfyear']->idccfyear, ':idptservicetax' => $ptmaster->idptservicetax)
                        ));
                $ptservicetax = Ptservicetax::model()->find($criteria);
                if (isset($ptservicetax)) {
                    $servicetax = $total_demand_currentyear * $ptservicetax->taxrate / 100;
                }
            }
        }

        $demand['propertytax'] = $grand_pttaxrate;
        $demand['servicetax'] = $servicetax;
        $demand['minsamekittax'] = $minsamekittax;
        $demand['samekittax'] = $samekittax;
        $demand['waterpttax'] = $waterpttax;
        $demand['educess'] = $educess;
        $demand['subcess1'] = $subcess1;
        $demand['subcess2'] = $subcess2;
        $demand['pttaxdiscount'] = $pttaxdiscount;
        $demand['pttaxsurcharge'] = $pttaxsurcharge;
        $demand['resbhada'] = $residential_total;
        $demand['combhada'] = $commercial_total;
        $demand['rentbhada'] = $rental_total;
        $demand['resbhadadis'] = $permanentdiscount_residential;
        $demand['combhadadis'] = $permanentdiscount_commercial;
        $demand['rentbhadadis'] = $permanentdiscount_rental;
        $demand['resbhadaothdis'] = $otherdiscount_residential;
        $demand['combhadaothdis'] = $otherdiscount_commercial;
        $demand['rentbhadaothdis'] = $otherdiscount_rental;
        $demand['resbhada12kdis'] = $discount12k_residential;
        $demand['combhada12kdis'] = $discount12k_commercial;
        $demand['rentbhada12kdis'] = $discount12k_rental;
        $demand['respttax'] = $pttaxrate_residential;
        $demand['compttax'] = $pttaxrate_commercial;
        $demand['rentpttax'] = $pttaxrate_rental;
        $demand['resptselfdis'] = $ptselfusediscount_residential;
        $demand['comptselfdis'] = $ptselfusediscount_commercial;
        $demand['rentptselfdis'] = $ptselfusediscount_rental;
        $demand['grand_exsumptor_amount'] = $grand_exsumptor_amount;
        $demand['total_demand_currentyear'] = $total_demand_currentyear;



//            echo "$minsamekittax $samekittax $waterpttax $educess $subcess1 $subcess2 $total_demand_currentyear $pttaxdiscount $pttaxsurcharge<br/>";           
//            echo $grand_pttaxrate;
//            echo "$grand_pttaxrate_residential $grand_pttaxrate_commercial $grand_pttaxrate_rental<br/>";
//            echo "$ptselfusediscount_residential<br/>";
//            echo "$pttaxrate_residential $pttaxrate_commercial $pttaxrate_rental<br/>";
//            echo "$grand_discount_residential $grand_discount_rental $grand_discount_commercial<br/>";            
//            echo "$discount12k_residential $discount12k_rental $discount12k_commercial<br/>";
//            echo "$permanentdiscount_residential $permanentdiscount_rental $permanentdiscount_commercial<br/>";
//            echo "$otherdiscount_residential $otherdiscount_rental $otherdiscount_commercial<br/>";
//            echo "$residential_total $commercial_total $rental_total $grand_total ";            
        return $demand;
    }

    public function actionGenerate($id) {
        $demand = $this->getDemand($id);
        if (isset($demand)) {
            $criteria = new CDbCriteria(array(
                        'condition' => 'idptmaster = :idptmaster And idccfyear = :idccfyear',
                        'params' => array(':idptmaster' => $id, ':idccfyear' => Yii::app()->session['ccfyear']->idccfyear)
                    ));
            $pttransaction = Pttransaction::model()->find($criteria);
            if ($pttransaction == null) {
                $pttransaction = new Pttransaction();
                $pttransaction->idccfyear = Yii::app()->session['ccfyear']->idccfyear;
                $pttransaction->idptmaster = $id;
            }
            $pttransaction->propertytax = $demand['propertytax'];
            $pttransaction->servicetax = $demand['servicetax'];
            $pttransaction->minsamekittax = $demand['minsamekittax'];
            $pttransaction->samekittax = $demand['samekittax'];
            $pttransaction->waterpttax = $demand['waterpttax'];
            $pttransaction->educess = $demand['educess'];
            $pttransaction->subcess1 = $demand['subcess1'];
            $pttransaction->subcess2 = $demand['subcess2'];
            $pttransaction->pttaxdiscount = $demand['pttaxdiscount'];
            $pttransaction->pttaxsurcharge = $demand['pttaxsurcharge'];
            $pttransaction->resbhada = $demand['resbhada'];
            $pttransaction->combhada = $demand['combhada'];
            $pttransaction->rentbhada = $demand['rentbhada'];
            $pttransaction->resbhadadis = $demand['resbhadadis'];
            $pttransaction->combhadadis = $demand['combhadadis'];
            $pttransaction->rentbhadadis = $demand['rentbhadadis'];
            $pttransaction->resbhadaothdis = $demand['resbhadaothdis'];
            $pttransaction->combhadaothdis = $demand['combhadaothdis'];
            $pttransaction->rentbhadaothdis = $demand['rentbhadaothdis'];
            $pttransaction->resbhada12kdis = $demand['resbhada12kdis'];
            $pttransaction->combhada12kdis = $demand['combhada12kdis'];
            $pttransaction->rentbhada12kdis = $demand['rentbhada12kdis'];
            $pttransaction->respttax = $demand['respttax'];
            $pttransaction->compttax = $demand['compttax'];
            $pttransaction->rentpttax = $demand['rentpttax'];
            $pttransaction->resptselfdis = $demand['resptselfdis'];
            $pttransaction->comptselfdis = $demand['comptselfdis'];
            $pttransaction->rentptselfdis = $demand['rentptselfdis'];

            $pttransaction->save();
        }
    }

//    public function actionGenerateAll() {
//        $ptmasters = Ptmaster::model()->findAll();
//        foreach ($ptmasters as $ptmaster) {
//            $this->actionGenerate($ptmaster->idptmaster);
//        }
//    }

    public function actionGenerateAll() {
        $propertytaxHelper = new PropertytaxHelper();
        $propertytaxHelper->generateAll();
//        syslog(LOG_WARNING, 'generateAll... ');
        
        echo CJSON::encode(array(
            'status' => "success",
        ));
        exit;
    }

    public function actionGenerateAllBetma() {    	
    	$propertytaxHelper = new PropertytaxHelper();
    	$propertytaxHelper->generateAllBetma();
    	//        syslog(LOG_WARNING, 'generateAll... ');
    
    	echo CJSON::encode(array(
    			'status' => "success",
    	));
    	exit;
    }
    

}
