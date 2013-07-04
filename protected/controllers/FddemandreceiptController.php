<?php

class FddemandreceiptController extends Controller {

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
                'actions' => array('index', 'view', 'jsonmessage'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('popupview', 'admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        if (isset($_REQUEST['isAjaxRequest']) && $_REQUEST['isAjaxRequest'] == 1) {
            Yii::app()->clientscript->scriptMap['jquery.js'] = false;
            Yii::app()->clientscript->scriptMap['jquery-ui.min.js'] = false;
            echo $this->renderPartial('view', array('model' => $this->loadModel($id)), true, true);
            Yii::app()->end();
            exit();
        } else {
            $this->render('view', array(
                'model' => $this->loadModel($id),
            ));
        }
    }

    
    //duplicate -> afterword move it to model...
    public function getDemand($id) {
        //$id -> idptmaster

        $data = array();
        //array(Yii::t('application', 'Propertytax'), 0, 0, 0, 4, 5, 8, 5),


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

//        $propertytaxpaid = 0;
//        $minsamekittaxpaid = 0;
//,propertytax,servicetax,minsamekittax,samekittax,waterpttax,educess,subcess1,subcess2,pttaxdiscount,pttaxsurcharge,
//paid=0;$propertytaxpaid=0;$servicetaxpaid=0;$minsamekittaxpaid=0;$samekittaxpaid=0;$waterpttaxpaid=0;$educesspaid=0;$subcess1paid=0;$subcess2paid=0;$pttaxdiscountpaid=0;$pttaxsurchargepaid=0;$

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
                    
                    
                    
                    
//                    for ($i = 0; $i < 10; $i++) {
//                        $id = "details-inputgrid[" . $i . "][amount]";
//                        $propertytaxpaid += $array["details-inputgrid[" . $i . "][amount]"] + $array["details-inputgrid[" . $i . "][discount]"];
//                    }
                }
            }

            $data[] = array(
                Yii::t('application', 'Propertytax'),
                $pttransaction->oldpropertytax,
                $pttransaction->propertytax,
                $pttransaction->oldpropertytax + $pttransaction->propertytax,
                $propertytaxpaid,
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
                $subcess2paid,
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
            $data[] = array(
                Yii::t('application', 'Servicetax'),
                $pttransaction->oldservicetax,
                $pttransaction->servicetax,
                $pttransaction->oldservicetax + $pttransaction->servicetax,
                $servicetaxpaid,
                0,
                0,
                0,
            );
            $data[] = array(
                Yii::t('application', 'Waterpttax'),
                $pttransaction->oldwaterpttax,
                $pttransaction->waterpttax,
                $pttransaction->oldwaterpttax + $pttransaction->waterpttax,
                $waterpttaxpaid,
                0,
                0,
                0,
            );




//                    $status = 'Success';
//                    
//                    $criteria = new CDbCriteria(array(
//                        'condition' => 'demandnumber = :demandnumber',
//                        'params' => array(':demandnumber' => $pttransaction->idpttransaction)
//                    ));
//                    $fddemandreceipts = Fddemandreceipt::model()->findAll($criteria);
//                    foreach($fddemandreceipts as $fddemandreceipt){
//                        $oldamountpaid += $fddemandreceipt->amountpaid;
//                        $oldfddemandreceipts[] = $fddemandreceipt;
//                    }
//                    
//                    $grand_propertytax = 
//                        ($pttransaction->oldpropertytax+$pttransaction->oldservicetax+$pttransaction->oldminsamekittax+$pttransaction->oldsamekittax+$pttransaction->oldwaterpttax+$pttransaction->oldeducess+$pttransaction->oldsubcess1+$pttransaction->oldsubcess2-$pttransaction->oldpttaxdiscount+$pttransaction->oldpttaxsurcharge);
//                        + 
//                        ($pttransaction->propertytax+$pttransaction->servicetax+$pttransaction->minsamekittax+$pttransaction->samekittax+$pttransaction->waterpttax+$pttransaction->educess+$pttransaction->subcess1+$pttransaction->subcess2)
//                    ;
        }
        return $data;
    }

    public function getAmountPaid($details) {
        $total = 0;

        if (isset($details)) {
            $jsonss = json_decode($details, true);
            $array = array();
            foreach ($jsonss as $jsons) {
                $array[$jsons['name']] = $jsons['value'];
            }
            for ($i = 0; $i < 10; $i++) {
                $total += $array["details-inputgrid[" . $i . "][amount]"] + $array["details-inputgrid[" . $i . "][discount]"];
            }
        }

        return $total;
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Fddemandreceipt;
        $model->idccdepartment = 1;
        $model->paymenttype = 1;
        $model->demanddate = date("Y/m/d");
        if (isset($_REQUEST['id'])) {
            $criteria = new CDbCriteria(array(
                        'with' => array(
                            'idptmaster0' => array(
                                'condition' => 'idptmaster0.idptmaster =:idptmaster',
                                'params' => array(':idptmaster' => $_REQUEST['id'])
                            ),
                        ),
                        'condition' => 'idccfyear = :idccfyear',
                        'params' => array(':idccfyear' => Yii::app()->session['ccfyear']->idccfyear),
                    ));


            $pttransaction = Pttransaction::model()->find($criteria);
            $model->demandnumber = $pttransaction->idpttransaction;
//            $model->demandnumber = $_REQUEST['id'];
        }


        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        $cs = Yii::app()->clientScript;
        $cs->scriptMap = array((YII_DEBUG ? 'jquery.js' : 'jquery.min.js') => false,);
//                $cs->scriptMap=array((YII_DEBUG ?  'jquery.js':'jquery.min.js')=>false,);


        if (isset($_POST['Fddemandreceipt'])) {
            $model->attributes = $_POST['Fddemandreceipt'];
            $model->amountpaid = $this->getAmountPaid($model->details);
//            syslog(LOG_WARNING, 'details... ' . print_r($_POST['Fddemandreceipt'], true));
//            syslog(LOG_WARNING, 'details... ' . $model->details);
            $status = 'Failure';
            if ($model->save()) {
                $status = 'Success';
            }
            syslog(LOG_WARNING, 'errors... ' . print_r($model->getErrors(), true));


            echo CJSON::encode(array(
                'status' => $status,
            ));
            exit;
        } else {
            if (isset($_REQUEST['isAjaxRequest']) && $_REQUEST['isAjaxRequest'] == 1) {
                Yii::app()->clientscript->scriptMap['jquery.js'] = false;
                Yii::app()->clientscript->scriptMap['jquery-ui.min.js'] = false;
                $model->receipttype=0;
                echo $this->renderPartial('_form', array('model' => $model, 'idptmaster' => '', 'data' => $this->getDemand($_REQUEST['id'])), true, true);
                exit();
            }
        }
    }

//	public function actionCreate()
//	{
//		$model=new Fddemandreceipt;
//                $model->idccdepartment = 1;
//                $model->paymenttype = 1;
//                $model->demanddate = date("Y/m/d");
//
//		// Uncomment the following line if AJAX validation is needed
//		$this->performAjaxValidation($model);
//
//		if(isset($_POST['Fddemandreceipt']))
//		{
//			$model->attributes=$_POST['Fddemandreceipt'];
//                        $status = 'Failure';
//                        if ($model->save()) {
//                            $status = 'Success';
//                        }
//                        syslog(LOG_WARNING, 'errors... ' . print_r($model->getErrors(), true));
//                        
//
//                        echo CJSON::encode(array(
//                            'status' => $status,
//                        ));
//                        exit;
//                } else {
//                    if (isset($_REQUEST['isAjaxRequest']) && $_REQUEST['isAjaxRequest'] == 1) {
//                        Yii::app()->clientscript->scriptMap['jquery.js'] = false;
//                        Yii::app()->clientscript->scriptMap['jquery-ui.min.js'] = false;
//                        echo $this->renderPartial('_form', array('model' => $model, 'idptmaster' => ''), true, true);
//                        exit();
//                    }
//            }
//	}

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['Fddemandreceipt'])) {
            $model->attributes = $_POST['Fddemandreceipt'];
            $status = 'Failure';
            if ($model->save()) {
                $status = 'Success';
            }

            echo CJSON::encode(array(
                'status' => $status,
            ));
            exit;
        } else {
            $pttransaction = Pttransaction::model()->findByPk($model->demandnumber);
            $idptmaster = '';
            if (isset($pttransaction)) {
                $idptmaster = $pttransaction->idptmaster;
            }


            if (isset($_REQUEST['isAjaxRequest']) && $_REQUEST['isAjaxRequest'] == 1) {
                Yii::app()->clientscript->scriptMap['jquery.js'] = false;
                Yii::app()->clientscript->scriptMap['jquery-ui.min.js'] = false;
                echo $this->renderPartial('_form', array('model' => $model, 'idptmaster' => $idptmaster), true, true);
                exit();
            }
        }
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Fddemandreceipt');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Fddemandreceipt('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Fddemandreceipt']))
            $model->attributes = $_GET['Fddemandreceipt'];

        if (isset($_REQUEST['isAjaxRequest']) && $_REQUEST['isAjaxRequest'] == '1') {
            $this->renderPartial('admin', array('model' => $model, 'isAjaxRequest' => $_REQUEST['isAjaxRequest']), false, true);
        } else {
            $this->render('admin', array(
                'model' => $model,
            ));
        }
    }

    /**
     * Manages popupview.
     */
    public function actionPopupview() {
        /*
         * Stop jquery loading twice problem... 
         * http://www.yiiframework.com/forum/index.php/topic/19205-jquery-loaded-twice/
         * 
         */
        $cs = Yii::app()->clientScript;
        $cs->scriptMap = array((YII_DEBUG ? 'jquery.js' : 'jquery.min.js') => false,);
        Yii::app()->clientscript->scriptMap['jquery.yiigridview.js'] = false;

        $model = new Fddemandreceipt('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Fddemandreceipt']))
            $model->attributes = $_GET['Fddemandreceipt'];

        $params = array(
            'model' => $model,
            'id' => isset($_REQUEST['id']) ? $_REQUEST['id'] : '',
            'isAjaxRequest' => 1,
        );

        Yii::app()->clientscript->scriptMap['jquery.js'] = false;
        if (isset($_REQUEST['isAjaxRequest']) && $_REQUEST['isAjaxRequest'] == '1') {
            //        if (!isset($_GET['ajax'])){
            $this->renderPartial('popupview', $params, false, true);
            Yii::app()->end();
        } else {
            $this->render('popupview', $params);
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Fddemandreceipt::model()->findByPk((int) $id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'fddemandreceipt-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionJsonmessage() {
        $jsonmessage = array();
        $jsonmessage['status code'] = 200;
        $jsonmessage['message'] = ' - ';
        if (isset($_REQUEST['cid'])) {
            $model = Fddemandreceipt::model()->findByPk($_REQUEST['cid']);
            if ($model) {
                $jsonmessage['message'] = $model->demanddate;
            }
        }

        header('Content-type: application/json');
        echo CJSON::encode($jsonmessage);
        Yii::app()->end();
    }

}
