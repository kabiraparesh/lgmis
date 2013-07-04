<?php

class PttransactionController extends Controller
{
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
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view', 'jsonmessage', 'getDemand'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('popupview', 'admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
        
        public function actionGetDemand(){
                //$id -> idptmaster
                $id=0;
                if(isset ($_REQUEST['id'])){
                    $id = $_REQUEST['id'];
                }
                
                $criteria = new CDbCriteria(array(
                    'with' => array(
                        'idptmaster0'=>array(
                            'condition' => 'idptmaster0.idptmaster =:idptmaster',
                            'params' => array(':idptmaster' => $id)
                        ),
                    ),
                    'condition' => 'idccfyear = :idccfyear',
                    'params'    => array(':idccfyear' => Yii::app()->session['ccfyear']->idccfyear),
                ));

                
//                $criteria = new CDbCriteria(array(
//                    'condition' => 'idptmaster = :idptmaster',
//                    'params' => array(':idpttransaction' => $id)
////                    'condition' => 'idpttransaction = :idpttransaction And idccfyear = :idccfyear',
////                    'params' => array(':idpttransaction' => $id, ':idccfyear' => Yii::app()->session['ccfyear']->idccfyear)
//                ));
                $pttransaction = Pttransaction::model()->find($criteria);
                $status = 'Success';
                $message = '';
                $demandnumber = '';
                $demandinname = '';
                $demandamount = '0';
                $oldfddemandreceipts = array();
                $oldamountpaid = 0;
                
                if(!isset($pttransaction)){
                    $status = 'Failure';
                    $message = Yii::t('application', 'Try again! Invalid demand no.');
                }
                else{
                    $status = 'Success';
                    
                    $criteria = new CDbCriteria(array(
                        'condition' => 'demandnumber = :demandnumber',
                        'params' => array(':demandnumber' => $pttransaction->idpttransaction)
                    ));
                    $fddemandreceipts = Fddemandreceipt::model()->findAll($criteria);
                    foreach($fddemandreceipts as $fddemandreceipt){
                        $oldamountpaid += $fddemandreceipt->amountpaid;
                        $oldfddemandreceipts[] = $fddemandreceipt;
                    }
                    
                    $grand_propertytax = 
                        ($pttransaction->oldpropertytax+$pttransaction->oldservicetax+$pttransaction->oldminsamekittax+$pttransaction->oldsamekittax+$pttransaction->oldwaterpttax+$pttransaction->oldeducess+$pttransaction->oldsubcess1+$pttransaction->oldsubcess2-$pttransaction->oldpttaxdiscount+$pttransaction->oldpttaxsurcharge);
                        + 
                        ($pttransaction->propertytax+$pttransaction->servicetax+$pttransaction->minsamekittax+$pttransaction->samekittax+$pttransaction->waterpttax+$pttransaction->educess+$pttransaction->subcess1+$pttransaction->subcess2)
                    ;
                    
                    $message .= "<table style='' border='0' cellspacing='0' cellpadding='0'>";
                    
                    $message .= "<tr>";
                    $message .= "<th style='width:125px; text-align: left;'>";
                    $message .= Yii::t('application', 'Demandinname');
                    $message .= Yii::t('application', ': ');
                    $message .= "</th>";
                    $message .= "<td>";
                    $message .= $pttransaction->idptmaster0->ownername;
                    $message .= "</td>";
                    $message .= "</tr>";
                    
                    $message .= "<tr>";
                    $message .= "<th style='width:125px; text-align: left;'>";
                    $message .= Yii::t('application', 'Demandamount');
                    $message .= Yii::t('application', ': ');
                    $message .= "</th>";
                    $message .= "<td>";
                    $message .= $grand_propertytax;
                    $message .= "</td>";
                    $message .= "</tr>";
                    
                    $message .= "<tr>";
                    $message .= "<th style='width:125px; text-align: left;'>";
                    $message .= Yii::t('application', 'Oldamountpaid');
                    $message .= Yii::t('application', ': ');
                    $message .= "</th>";
                    $message .= "<td>";
                    $message .= $oldamountpaid;
                    $message .= "</td>";
                    $message .= "</tr>";
                    $message .= "</table>";
                    
                    $demandnumber = $pttransaction->idpttransaction;
                    $demandinname = $pttransaction->idptmaster0->ownername;
                    $demandamount = $grand_propertytax;
                }
                echo CJSON::encode(array(
                    'status' => $status,
                    'message' => $message,
                    'demandnumber' => $demandnumber,
                    'demandinname' => $demandinname,
                    'demandamount' => $demandamount,
                    'oldamountpaid' => $oldamountpaid,
                    'oldfddemandreceipts' => $oldfddemandreceipts,
                ));
                exit;                
        }

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)	{
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Pttransaction;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Pttransaction']))
		{
			$model->attributes=$_POST['Pttransaction'];
                        $status = 'Failure';
                        if ($model->save()) {
                            $status = 'Success';
                        }

                        echo CJSON::encode(array(
                            'status' => $status,
                        ));
                        exit;
                } else {
                    if (isset($_REQUEST['isAjaxRequest']) && $_REQUEST['isAjaxRequest'] == 1) {
                        Yii::app()->clientscript->scriptMap['jquery.js'] = false;
                        Yii::app()->clientscript->scriptMap['jquery-ui.min.js'] = false;
                        echo $this->renderPartial('_form', array('model' => $model), true, true);
                        exit();
                    }
            }
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Pttransaction']))
		{
			$model->attributes=$_POST['Pttransaction'];
                        $status = 'Failure';
                        if ($model->save()) {
                            $status = 'Success';
                        }

                        echo CJSON::encode(array(
                            'status' => $status,
                        ));
                        exit;
                } else {
                        if (isset($_REQUEST['isAjaxRequest']) && $_REQUEST['isAjaxRequest'] == 1) {
                            Yii::app()->clientscript->scriptMap['jquery.js'] = false;
                            Yii::app()->clientscript->scriptMap['jquery-ui.min.js'] = false;
                            echo $this->renderPartial('_form', array('model' => $model), true, true);
                            exit();
                        }
                }
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Pttransaction');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Pttransaction('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pttransaction']))
			$model->attributes=$_GET['Pttransaction'];

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
	public function actionPopupview()
	{
                /* 
                 * Stop jquery loading twice problem... 
                 * http://www.yiiframework.com/forum/index.php/topic/19205-jquery-loaded-twice/
                 * 
                 */
                $cs=Yii::app()->clientScript;
                $cs->scriptMap=array((YII_DEBUG ?  'jquery.js':'jquery.min.js')=>false,);                
                Yii::app()->clientscript->scriptMap['jquery.yiigridview.js'] = false;
                
		$model=new Pttransaction('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pttransaction']))
			$model->attributes=$_GET['Pttransaction'];

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
	public function loadModel($id)
	{
		$model=Pttransaction::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='pttransaction-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}        

        public function actionJsonmessage() {
            $jsonmessage = array();
            $jsonmessage['status code'] = 200;
            $jsonmessage['message'] = ' - ' ;
            if(isset ($_REQUEST['cid'])){
                $model=Pttransaction::model()->findByPk($_REQUEST['cid']);
                if($model){
                    $jsonmessage['message'] = $model->idptmaster ;
                }
            }

            header('Content-type: application/json');
            echo CJSON::encode($jsonmessage);
            Yii::app()->end();
        }
        
}
