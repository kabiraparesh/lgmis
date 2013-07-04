<?php
$this->breadcrumbs=array(
	Yii::t('application','Bddeathrates')=>array('index'),
	Yii::t('application', $model->idbddeathrate),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Bddeathrate'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Bddeathrate'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Bddeathrate'))), 'url'=>array('update', 'id'=>$model->idbddeathrate)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Bddeathrate'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idbddeathrate),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Bddeathrate'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Bddeathrate'))) . ' #' . $model->idbddeathrate;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idbddeathrate',
		'deathperiod',
		'rate',
		'idccfyear',
	),
)); ?>
