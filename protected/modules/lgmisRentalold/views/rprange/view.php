<?php
$this->breadcrumbs=array(
	Yii::t('application','Rpranges')=>array('index'),
	Yii::t('application', $model->idrprange),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Rprange'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Rprange'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Rprange'))), 'url'=>array('update', 'id'=>$model->idrprange)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Rprange'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idrprange),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Rprange'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Rprange'))) . ' #' . $model->idrprange;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idrprange',
		'rangetype',
	),
)); ?>
