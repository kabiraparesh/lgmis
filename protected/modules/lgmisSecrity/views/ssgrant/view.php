<?php
$this->breadcrumbs=array(
	Yii::t('application','Ssgrants')=>array('index'),
	Yii::t('application', $model->idssgrant),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Ssgrant'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Ssgrant'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Ssgrant'))), 'url'=>array('update', 'id'=>$model->idssgrant)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Ssgrant'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idssgrant),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Ssgrant'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Ssgrant'))) . ' #' . $model->idssgrant;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idssgrant',
		'type',
		'amount',
		'reason',
	),
)); ?>
