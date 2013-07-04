<?php
$this->breadcrumbs=array(
	Yii::t('application','Rptenants')=>array('index'),
	Yii::t('application', $model->idrptenant),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Rptenant'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Rptenant'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Rptenant'))), 'url'=>array('update', 'id'=>$model->idrptenant)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Rptenant'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idrptenant),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Rptenant'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Rptenant'))) . ' #' . $model->idrptenant;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idrptenant',
		'idrpshop',
		'tenantname',
		'tenantaddress',
		'tenantcity',
		'tenantcontact',
		'hirefrom',
		'shopname',
		'headoffice',
		'registrationno',
	),
)); ?>
