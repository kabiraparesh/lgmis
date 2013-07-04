<?php
$this->breadcrumbs=array(
	Yii::t('application','Cmapplications')=>array('index'),
	Yii::t('application', $model->idcmapplication),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Cmapplication'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Cmapplication'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Cmapplication'))), 'url'=>array('update', 'id'=>$model->idcmapplication)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Cmapplication'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idcmapplication),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Cmapplication'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Cmapplication'))) . ' #' . $model->idcmapplication;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idcmapplication',
		'idcmsource',
		'applicantname',
		'applicantaddress',
		'idccstatus',
		'idcmprioritylevel',
		'idcmperiod',
		'idcmcategories',
		'description',
		'complaintlocation',
		'idcccolony',
		'applicantphone',
		'applicantmobile',
		'applicantemail',
	),
)); ?>
