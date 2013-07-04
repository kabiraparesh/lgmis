<?php
$this->breadcrumbs=array(
	Yii::t('application','Ptranges')=>array('index'),
	Yii::t('application', $model->idptrange),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Ptrange'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Ptrange'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Ptrange'))), 'url'=>array('update', 'id'=>$model->idptrange)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Ptrange'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idptrange),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Ptrange'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Ptrange'))) . ' #' . $model->idptrange;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idptrange',
		'rangeno',
		'rangename',
	),
)); ?>
