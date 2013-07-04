<?php
$this->breadcrumbs=array(
	Yii::t('application','Bdbirthrates')=>array('index'),
	Yii::t('application', $model->idbdbirthrate),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Bdbirthrate'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Bdbirthrate'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Bdbirthrate'))), 'url'=>array('update', 'id'=>$model->idbdbirthrate)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Bdbirthrate'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idbdbirthrate),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Bdbirthrate'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Bdbirthrate'))) . ' #' . $model->idbdbirthrate;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idbdbirthrate',
		'bdbirthperiod',
		'bdbirthrate',
		'idccfyear',
	),
)); ?>
