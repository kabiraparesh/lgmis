<?php
$this->breadcrumbs=array(
	Yii::t('application','Bparearates')=>array('index'),
	Yii::t('application', $model->idbparearate),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Bparearate'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Bparearate'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Bparearate'))), 'url'=>array('update', 'id'=>$model->idbparearate)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Bparearate'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idbparearate),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Bparearate'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Bparearate'))) . ' #' . $model->idbparearate;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		//'idbparearate',
		'idccfyear',
		'idbpusagetype',
		'raterange',
		'scheduleperiod',
	),
)); ?>
