<?php
$this->breadcrumbs=array(
	Yii::t('application','Rplocations')=>array('index'),
	Yii::t('application', $model->idrplocation),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Rplocation'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Rplocation'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Rplocation'))), 'url'=>array('update', 'id'=>$model->idrplocation)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Rplocation'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idrplocation),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Rplocation'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Rplocation'))) . ' #' . $model->idrplocation;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idrplocation',
		'location',
	),
)); ?>
