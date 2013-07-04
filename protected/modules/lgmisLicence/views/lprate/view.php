<?php
$this->breadcrumbs=array(
	Yii::t('application','Lprates')=>array('index'),
	Yii::t('application', $model->idlprate),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Lprate'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Lprate'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Lprate'))), 'url'=>array('update', 'id'=>$model->idlprate)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Lprate'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idlprate),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Lprate'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Lprate'))) . ' #' . $model->idlprate;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idlprate',
		'idccfyear',
		'idlpbnature',
		'naturerate',
		'renewalrate',
		'cancelationrate',
		'penaltyrate',
	),
)); ?>
