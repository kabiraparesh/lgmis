<?php
$this->breadcrumbs=array(
	Yii::t('application','Ptservicetaxes')=>array('index'),
	Yii::t('application', $model->idptservicetax),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Ptservicetax'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Ptservicetax'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Ptservicetax'))), 'url'=>array('update', 'id'=>$model->idptservicetax)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Ptservicetax'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idptservicetax),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Ptservicetax'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Ptservicetax'))) . ' #' . $model->idptservicetax;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idptservicetax',
		'servicetype',
		'taxrate',
		'idccfyear',
	),
)); ?>
