<?php

class WmdemandreceiptController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
				'accessControl', // perform access control for CRUD operations
				'postOnly + delete', // we only allow deletion via POST request
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
						'actions'=>array('index','view'),
						'users'=>array('*'),
				),
				array('allow', // allow authenticated user to perform 'create' and 'update' actions
						'actions'=>array('create','update'),
						'users'=>array('@'),
				),
				array('allow', // allow admin user to perform 'admin' and 'delete' actions
						'actions'=>array('admin','delete'),
						'users'=>array('admin'),
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
	public function actionView($id)
	{
		Yii::app()->clientscript->scriptMap['jquery.js'] = false;
		echo $this->renderPartial('view', array('model' => $this->loadModel($id)), true, true);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Wmdemandreceipt;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		$cs = Yii::app()->clientScript;
		$cs->scriptMap = array((YII_DEBUG ? 'jquery.js' : 'jquery.min.js') => false,);
		
		
		if(isset($_POST['Wmdemandreceipt']))
		{
			$model->attributes=$_POST['Wmdemandreceipt'];
				
			$status = 1;
			$message = '';
// 			$model->details = json_encode($model->details);
// 			if (FALSE) {
			if (!$model->save()) {
				$status = 0;
				$message = CHtml::errorSummary($model, NULL, NULL, array('style'=>'color: red; margin-left: 20px;'));
			}
			else{
				$message = LgmisWMModule::t('Record has been created successfully...');
			}
// 			syslog(LOG_WARNING, "message: " . $message);
				
			echo CJSON::encode(array(
					'status' => $status,
					'message' => $message,
			));
		}
		else{
//  			syslog(LOG_WARNING, "id: " . $_GET['id']);
			$id = isset($_GET['id']) ? $_GET['id'] : 0;
			$wmhelper = new WmHelper();
			$model->idccdepartment = 2;
			$model->paymenttype = 1;
			$model->idwmdemand = $wmhelper->getIdwmdemand($id);
			
			date_default_timezone_set('Asia/Calcutta'); // Add in your index.php file or you can set in php.ini
			$model->demanddate=date('Y-m-d');
				
			
			Yii::app()->clientscript->scriptMap['jquery.js'] = false;
            Yii::app()->clientscript->scriptMap['jquery-ui.min.js'] = false;
			echo $this->renderPartial('_form', array('model' => $model, 'data' => $wmhelper->getDemand($id)), true, true);
			exit;
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

		if(isset($_POST['Wmdemandreceipt']))
		{
			$model->attributes=$_POST['Wmdemandreceipt'];

			$status = 1;
			$message = '';
			if (!$model->save()) {
				$status = 0;
				$message = CHtml::errorSummary($model, NULL, NULL, array('style'=>'color: red; margin-left: 20px;'));
			}
			else{
				$message = LgmisWMModule::t('Record has been updated successfully...');
			}

			echo CJSON::encode(array(
					'status' => $status,
					'message' => $message,
			));
		}
		else{
			Yii::app()->clientscript->scriptMap['jquery.js'] = false;
			echo $this->renderPartial('_form', array('model' => $model), true, true);
		}
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$status = 1;
		$error = '';
		if (!$this->loadModel($id)->delete()) {
			$status = 0;
			$error = CHtml::errorSummary($model, NULL, NULL, array('style' => 'color: red;'));
		}

		echo CJSON::encode(array(
				'status' => $status,
				'error' => $error,
		));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Wmdemandreceipt');
		$this->render('index',array(
				'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Wmdemandreceipt('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Wmdemandreceipt']))
			$model->attributes=$_GET['Wmdemandreceipt'];

		$this->render('admin',array(
				'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Wmdemandreceipt::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='wmdemandreceipt-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
