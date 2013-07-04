<?php
$this->breadcrumbs=array(
	Yii::t('application','Bdbirthapplications')=>array('index'),
	Yii::t('application', $model->idbdbirthapplication),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Bdbirthapplication'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Bdbirthapplication'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Bdbirthapplication'))), 'url'=>array('update', 'id'=>$model->idbdbirthapplication)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Bdbirthapplication'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idbdbirthapplication),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Bdbirthapplication'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Bdbirthapplication'))) . ' #' . $model->idbdbirthapplication;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idbdbirthapplication',
		'idbdbirthinformer',
		'applicationdate',
		'idccstatus',
		'applicantname',
		'applicantaddress',
		'dob',
	),
)); ?>
