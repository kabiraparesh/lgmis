<?php
class UploadExcelController extends Controller{
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
						'actions'=>array('create','update','upload'),
						'users'=>array('@'),
				),
				array('deny',  // deny all users
						'users'=>array('*'),
				),
		);
	}
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new UploadExcel;
	
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);
		
		if(isset($_POST['UploadExcel']))
		{
			$model->attributes=$_POST['UploadExcel'];
	
			$status = 1;
			$message = '';
			if(!$model->validate()){
				$status = 0;
				$message = strip_tags(CHtml::errorSummary(array($model)));				
			}
			else{
				if($file=CUploadedFile::getInstance($model,'upload_file'))
				{
// 					syslog(LOG_WARNING, $file->tempName);
					$wmdemandHelper = new WmdemandHelper();
					$wmdemandHelper->import($file->tempName);
				}
				
				$message = LgmisWMModule::t('Import operation completed...');				
			}
				
			
// 			if (!$model->save()) {
// 				$status = 0;
// 				$message = CHtml::errorSummary($model, NULL, NULL, array('style'=>'color: red; margin-left: 20px;'));
// 			}
// 			else{
// 				$message = LionsdbModule::t('Record has been created successfully...');
// 			}
	
			echo CJSON::encode(array(
					'status' => $status,
					'message' => $message,
			));
		}
		else{
// 			Yii::app()->clientscript->scriptMap['jquery.js'] = false;
			echo $this->render('_form', array('model' => $model), true, true);
		}
	}
	
	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='uploadexcel-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}	
	
}
?>