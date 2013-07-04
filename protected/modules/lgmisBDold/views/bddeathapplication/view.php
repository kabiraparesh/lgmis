<?php
$this->breadcrumbs=array(
	Yii::t('application','Bddeathapplications')=>array('index'),
	Yii::t('application', $model->idbddeathapplication),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Bddeathapplication'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Bddeathapplication'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Bddeathapplication'))), 'url'=>array('update', 'id'=>$model->idbddeathapplication)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Bddeathapplication'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idbddeathapplication),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Bddeathapplication'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Bddeathapplication'))) . ' #' . $model->idbddeathapplication;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idbddeathapplication',
		'idbddeathinformer',
		'applicationdate',
		'idccstatus',
		'applicantname',
		'applicantaddress',
		'age',
		'dateofdeath',
	),
)); ?>
