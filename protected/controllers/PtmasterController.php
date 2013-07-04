<?php

class PtmasterController extends Controller
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
						'actions'=>array('index', 'view', 'viewPttransaction', 'jsonmessage', 'jsonmessageCccolony', 'viewLedger', 'ledger'),
						'users'=>array('*'),
				),
				array('allow', // allow authenticated user to perform 'create' and 'update' actions
						'actions'=>array('create','update'),
						'users'=>array('@'),
				),
				array('allow', // allow admin user to perform 'admin' and 'delete' actions
						'actions'=>array('popupview', 'admin','delete', 'transfer'),
						'users'=>array('admin'),
				),
				array('allow', // allow admin user to perform 'admin' and 'delete' actions
						'actions'=>array('popupview', 'admin', 'transfer'),
						'users'=>array('user', 'user1', 'user2'),
				),
				array('deny',  // deny all users
						'users'=>array('*'),
				),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)	{
		if (isset($_REQUEST['isAjaxRequest']) && $_REQUEST['isAjaxRequest'] == 1) {
			$model = $this->loadModel($id);
			//                    Yii::app()->clientscript->scriptMap['jquery.js'] = false;
			//                    Yii::app()->clientscript->scriptMap['jquery-ui.min.js'] = false;
			echo $this->renderPartial('view', array('model' => $this->loadModel($id), 'dataProvider' => $model->porpertydetailsDataProviderView()));
			Yii::app()->end();
			exit();
		} else {
			$this->render('view', array(
					'model' => $this->loadModel($id)
			));
		}
	}

	public function actionViewPttransaction($id)	{
		$propertytaxHelper = new PropertytaxHelper();
		$propertytaxHelper->generate($id);
		$criteria = new CDbCriteria(array(
				'condition' => 'idptmaster = :idptmaster And idccfyear = :idccfyear',
				'params' => array(':idptmaster' => $id, ':idccfyear' => Yii::app()->session['ccfyear']->idccfyear)
		));
		$pttransaction = Pttransaction::model()->find($criteria);
		$grand_oldpropertytax = 0;
		if(isset($pttransaction)){
			$grand_oldpropertytax = $pttransaction->oldpropertytax+$pttransaction->oldservicetax+$pttransaction->oldminsamekittax+$pttransaction->oldsamekittax+$pttransaction->oldwaterpttax+$pttransaction->oldeducess+$pttransaction->oldsubcess1+$pttransaction->oldsubcess2-$pttransaction->oldpttaxdiscount+$pttransaction->oldpttaxsurcharge;
			$grand_currentpropertytax = $pttransaction->propertytax+$pttransaction->servicetax+$pttransaction->minsamekittax+$pttransaction->samekittax+$pttransaction->waterpttax+$pttransaction->educess+$pttransaction->subcess1+$pttransaction->subcess2;
		}
		if (isset($_REQUEST['isAjaxRequest']) && $_REQUEST['isAjaxRequest'] == 1) {
			Yii::app()->clientscript->scriptMap['jquery.js'] = false;
			Yii::app()->clientscript->scriptMap['jquery-ui.min.js'] = false;
			echo $this->renderPartial('/pttransaction/view', array('model' => $pttransaction, 'grand_oldpropertytax'=>$grand_oldpropertytax, 'grand_currentpropertytax'=>$grand_currentpropertytax), true, true);
			Yii::app()->end();
			exit();
		} else {
			$this->render('/pttransaction/view', array(
					'model' => $this->loadModel(Pttransaction::model()->find($criteria)),
			));
		}
	}


	public function actionLedger(){
		echo $this->renderPartial('/ptmaster/ledgerform', true, true);
	}

	public function actionViewLedger($id)	{
		if (strlen($id) == 9) {
			$id = substr($id, 4);
			$id = ltrim($id, '0');
			$propertytaxHelper = new PropertytaxHelper();
			$propertytaxHelper->generate($id);
			$criteria = new CDbCriteria(array(
					'condition' => 'idptmaster = :idptmaster And idccfyear = :idccfyear',
					'params' => array(':idptmaster' => $id, ':idccfyear' => 1)
			));
			$pttransaction = Pttransaction::model()->find($criteria);
			$grand_oldpropertytax = 0;
			if (isset($pttransaction)) {
				$grand_oldpropertytax = $pttransaction->oldpropertytax + $pttransaction->oldservicetax + $pttransaction->oldminsamekittax + $pttransaction->oldsamekittax + $pttransaction->oldwaterpttax + $pttransaction->oldeducess + $pttransaction->oldsubcess1 + $pttransaction->oldsubcess2 - $pttransaction->oldpttaxdiscount + $pttransaction->oldpttaxsurcharge;
				$grand_currentpropertytax = $pttransaction->propertytax + $pttransaction->servicetax + $pttransaction->minsamekittax + $pttransaction->samekittax + $pttransaction->waterpttax + $pttransaction->educess + $pttransaction->subcess1 + $pttransaction->subcess2;
				echo $this->renderPartial('/ptmaster/ledger', array('model' => $pttransaction, 'grand_oldpropertytax' => $grand_oldpropertytax, 'grand_currentpropertytax' => $grand_currentpropertytax), true, true);
			}
		} else {
			echo "<div style='width: 100%; padding: 10px; background-color: lightgray; font-weight: bold; color: red;'>" . Yii::t("application", "Invalid Account No.") . "</div>";
		}
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Ptmaster;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Ptmaster']))
		{
			$model->attributes=$_POST['Ptmaster'];
			//                        syslog(LOG_WARNING, 'exsumptors4... ' . $_REQUEST['idptexsumtors']);
			$model->propertydetails = json_encode($_POST['propertydetails']);
			if(isset($_REQUEST['idptexsumtors'])){
				$model->idptexsumtors = implode(',', $_REQUEST['idptexsumtors']);
			}
			else{
				$model->idptexsumtors = '';
			}
			
			$params = $this->getParams($model);
			$params['newproperty'] = $model->newproperty;
			$params = CJSON::encode($params);
			$model->params = $params;

			$status = 'Failure';
			if ($model->save()) {
				Yii::app()->session['idccward'] = $model->idccward;
				Yii::app()->session['idcccolony'] = $model->idcccolony;
				Yii::app()->session['idptrange'] = $model->idptrange;
				Yii::app()->session['idptpropertyon'] = $model->idptpropertyon;
				Yii::app()->session['idpttype'] = $model->idpttype;


				$criteria = new CDbCriteria(array(
						'condition' => 'idptmaster = :idptmaster And idccfyear = :idccfyear',
						'params' => array(':idptmaster' => $model->idptmaster, ':idccfyear' => Yii::app()->session['ccfyear']->idccfyear)
				));
				$pttransaction = Pttransaction::model()->find($criteria);
				if($pttransaction == null){
					$pttransaction = new Pttransaction();
					$pttransaction->idccfyear = Yii::app()->session['ccfyear']->idccfyear;
					$pttransaction->idptmaster = $model->idptmaster;
				}
				$pttransaction->oldpropertytax = $model->oldpropertytax;
				$pttransaction->oldservicetax = $model->oldservicetax;
				$pttransaction->oldminsamekittax = $model->oldminsamekittax;
				$pttransaction->oldsamekittax = $model->oldsamekittax;
				$pttransaction->oldwaterpttax = $model->oldwaterpttax;
				$pttransaction->oldeducess = $model->oldeducess;
				$pttransaction->oldsubcess1 = $model->oldsubcess1;
				$pttransaction->oldsubcess2 = $model->oldsubcess2;
				$pttransaction->oldpttaxdiscount = $model->oldpttaxdiscount;
				$pttransaction->oldpttaxsurcharge = $model->oldpttaxsurcharge;

				$pttransaction->save();

				$status = 'Success';
			}
			syslog(LOG_WARNING, 'error... ' . print_r($model->getErrors(), true) );

			echo CJSON::encode(array(
					'status' => $status,
			));
			exit;
		} else {
			if (isset($_REQUEST['isAjaxRequest']) && $_REQUEST['isAjaxRequest'] == 1) {
				//                        Yii::app()->clientscript->scriptMap['jquery.js'] = false;
				//                        Yii::app()->clientscript->scriptMap['jquery-ui.min.js'] = false;
				//                        echo $this->renderPartial('_form', array('model' => $model), true, true);
				//                        exit();

				if(isset(Yii::app()->session['idccward'])){
					$model->idccward = Yii::app()->session['idccward'];
				}
				if(isset(Yii::app()->session['idcccolony'])){
					$model->idcccolony = Yii::app()->session['idcccolony'];
				}
				if(isset(Yii::app()->session['idptrange'])){
					$model->idptrange = Yii::app()->session['idptrange'];
				}
				if(isset(Yii::app()->session['idptpropertyon'])){
					$model->idptpropertyon = Yii::app()->session['idptpropertyon'];
				}
				if(isset(Yii::app()->session['idpttype'])){
					$model->idpttype = Yii::app()->session['idpttype'];
				}

				$model->propertytax = 1;

				$this->render('create', array(
						'model' => $model, 'dataProvider' => $model->porpertydetailsDataProvider(),
				));
			}
		}
	}

	public function initOldtransaction(&$model){
		$criteria = new CDbCriteria(array(
				'condition' => 'idptmaster = :idptmaster',
				'params' => array(':idptmaster' => $model->idptmaster)
		));
		$pttransaction = Pttransaction::model()->find($criteria);
		/*
		 oldpropertytax, oldservicetax, oldminsamekittax, oldsamekittax,
		oldwaterpttax, oldeducess, oldsubcess1, oldsubcess2,
		oldpttaxdiscount, oldpttaxsurcharge,
		*/
		if($pttransaction != null){
			$model->oldpropertytax = $pttransaction->oldpropertytax;
			$model->oldservicetax = $pttransaction->oldservicetax;
			$model->oldminsamekittax = $pttransaction->oldminsamekittax;
			$model->oldsamekittax = $pttransaction->oldsamekittax;
			$model->oldwaterpttax = $pttransaction->oldwaterpttax;
			$model->oldeducess = $pttransaction->oldeducess;
			$model->oldsubcess1 = $pttransaction->oldsubcess1;
			$model->oldsubcess2 = $pttransaction->oldsubcess2;
			$model->oldpttaxdiscount = $pttransaction->oldpttaxdiscount;
			$model->oldpttaxsurcharge = $pttransaction->oldpttaxsurcharge;
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

		if(isset($_POST['Ptmaster']))
		{
			$model->attributes=$_POST['Ptmaster'];

			//                        syslog(LOG_WARNING, 'exsumptors4... ' . $_REQUEST['idptexsumtors']);
			$model->propertydetails = json_encode($_POST['propertydetails']);
			if(isset($_REQUEST['idptexsumtors'])){
				$model->idptexsumtors = implode(',', $_REQUEST['idptexsumtors']);
			}
			else{
				$model->idptexsumtors = '';
			}
			
 			$params = $this->getParams($model);
 			$params['newproperty'] = $model->newproperty;
 			$params = CJSON::encode($params);
 			$model->params = $params;
 			
// 			echo $_POST['newproperty']; exit;
			$status = 'Failure';
			if ($model->save()) {
				Yii::app()->session['idccward'] = $model->idccward;
				Yii::app()->session['idcccolony'] = $model->idcccolony;
				Yii::app()->session['idptrange'] = $model->idptrange;
				Yii::app()->session['idptpropertyon'] = $model->idptpropertyon;
				Yii::app()->session['idpttype'] = $model->idpttype;


				$criteria = new CDbCriteria(array(
						'condition' => 'idptmaster = :idptmaster',
						'params' => array(':idptmaster' => $model->idptmaster)
				));
				$pttransaction = Pttransaction::model()->find($criteria);
				if($pttransaction == null){
					$pttransaction = new Pttransaction();
					$pttransaction->idccfyear = Yii::app()->session['ccfyear']->idccfyear;
					$pttransaction->idptmaster = $model->idptmaster;
				}
				$pttransaction->oldpropertytax = $model->oldpropertytax;
				$pttransaction->oldservicetax = $model->oldservicetax;
				$pttransaction->oldminsamekittax = $model->oldminsamekittax;
				$pttransaction->oldsamekittax = $model->oldsamekittax;
				$pttransaction->oldwaterpttax = $model->oldwaterpttax;
				$pttransaction->oldeducess = $model->oldeducess;
				$pttransaction->oldsubcess1 = $model->oldsubcess1;
				$pttransaction->oldsubcess2 = $model->oldsubcess2;
				$pttransaction->oldpttaxdiscount = $model->oldpttaxdiscount;
				$pttransaction->oldpttaxsurcharge = $model->oldpttaxsurcharge;


				$pttransaction->save();
				//                            syslog(LOG_WARNING, 'oldpropertytax... ' . $model->oldpropertytax);
				$status = 'Success';
			}

			echo CJSON::encode(array(
					'status' => $status,
			));
			exit;
		} else {
			if (isset($_REQUEST['isAjaxRequest']) && $_REQUEST['isAjaxRequest'] == 1) {
				//                            Yii::app()->clientscript->scriptMap['jquery.js'] = false;
				//                            Yii::app()->clientscript->scriptMap['jquery-ui.min.js'] = false;
				//                            echo $this->renderPartial('_form', array('model' => $model), true, true);
				$this->initOldtransaction($model);
				$params = $this->getParams($model);
				if(isset($params) && isset($params['newproperty']) && $params['newproperty'] == 1){
					$model->newproperty = 1;
				}
				else{
					$model->newproperty = 0;
				}
				$this->render('update', array(
						'model' => $model, 'dataProvider' => $model->porpertydetailsDataProvider(),
				));

				//exit();
			}
		}
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	/**
	 Important Note by Kabira:
	 Delete is disable... please check afterword
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			//			$this->loadModel($id)->delete();

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
		$dataProvider=new CActiveDataProvider('Ptmaster');
		$this->render('index',array(
				'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Ptmaster('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Ptmaster']))
			$model->attributes=$_GET['Ptmaster'];

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

		$model=new Ptmaster('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Ptmaster']))
			$model->attributes=$_GET['Ptmaster'];

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
		$model=Ptmaster::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && ($_POST['ajax']==='ptmaster-form' || $_POST['ajax']==='transfer-form'))
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
			$model=Ptmaster::model()->findByPk($_REQUEST['cid']);
			if($model){
				$jsonmessage['message'] = $model->caseno ;
			}
		}

		header('Content-type: application/json');
		echo CJSON::encode($jsonmessage);
		Yii::app()->end();
	}

	public function actionJsonmessageCccolony() {
		$jsonmessage = array();
		$jsonmessage['status code'] = 200;
		$jsonmessage['message'] = ' - ' ;

		//            $model1=new Ptmaster;
		//            $model1->attributes=$_POST['Ptmaster'];

		if(isset ($_REQUEST['cid']) && isset($_REQUEST['idccward'])){
			$criteria = new CDbCriteria(array(
					'condition' => 'idccward = :idccward',
					'params' => array(':idccward' => $_REQUEST['idccward'])
			));

			$model=Cccolony::model()->findByPk($_REQUEST['cid'], $criteria);
			if($model){
				$jsonmessage['message'] = $model->colonyname;
			}
		}

		header('Content-type: application/json');
		echo CJSON::encode($jsonmessage);
		Yii::app()->end();
	}

	public function actionTransferOld($id){
		$params = array();
		$transfer = array();
			
		$ptmaster = Ptmaster::model()->findByPk($id);
			
		if(isset($ptmaster->params)){
			$params = CJSON::decode($ptmaster->params);
		}
			
		if(isset($params['transfer'])){
			$transfer = $params['transfer'];
		}

		$transfer[] = array("ownername"=>$ptmaster->ownername, "fathername"=>$ptmaster->fathername, "owneraddress"=>$ptmaster->owneraddress);
		$params['transfer'] = $transfer;
		$params = CJSON::encode($params);
		$ptmaster->params = $params;
		$ptmaster->save();
	}

	public function getParams($ptmaster){
		$params = array();
	
		if(isset($ptmaster->params)){
			$params = CJSON::decode($ptmaster->params);
		}
			
		return $params;
	}
		
	public function getTransferParams($ptmaster){
		$params = array();
		$transfer = array();

		if(isset($ptmaster->params)){
			$params = CJSON::decode($ptmaster->params);
		}
			
		if(isset($params['transfer'])){
			$transfer = $params['transfer'];
		}

		$transfer[] = array("ownername"=>$ptmaster->ownername, "fathername"=>$ptmaster->fathername, "owneraddress"=>$ptmaster->owneraddress);
		$params['transfer'] = $transfer;
		$params = CJSON::encode($params);
		return $params;
	}


	public function actionTransfer($id){
		$model=$this->loadModel($id);
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);
// 		syslog(LOG_WARNING, $_POST['ajax']);

		if(isset($_POST['Ptmaster']))
		{
			// 			$ownername = $model->ownername;
			// 			$fathername = $model->fathername;
			// 			$owneraddress = $model->owneraddress;

			$params = $this->getTransferParams($model);

			$model->attributes=$_POST['Ptmaster'];
			$model->params = $params;

			$status = 'Failure';
			if ($model->save()) {
				$status = 'Success';
			}
			syslog(LOG_WARNING, $status);
			echo CJSON::encode(array(
					'status' => $status,
			));
			exit;
		} else {
			if (isset($_REQUEST['isAjaxRequest']) && $_REQUEST['isAjaxRequest'] == 1) {
				Yii::app()->clientscript->scriptMap['jquery.js'] = false;
				Yii::app()->clientscript->scriptMap['jquery-ui.min.js'] = false;
				echo $this->renderPartial('transfer', array('model' => $model), true, true);
			}
		}
	}
}
