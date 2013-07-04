<?php
$this->breadcrumbs=array(
	Yii::t('application','Rprates')=>array('index'),
	Yii::t('application', $model->idrprate),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Rprate'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Rprate'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Rprate'))), 'url'=>array('update', 'id'=>$model->idrprate)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Rprate'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idrprate),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Rprate'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Rprate'))) . ' #' . $model->idrprate;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idrprate',
		'idccfyear',
		'idrplocation',
		'idrprange',
		'monthlycharges',
		'surcharge',
	),
)); ?>
