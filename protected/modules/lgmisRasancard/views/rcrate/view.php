<?php
$this->breadcrumbs=array(
	Yii::t('application','Rcrates')=>array('index'),
	Yii::t('application', $model->idrcrate),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Rcrate'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Rcrate'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Rcrate'))), 'url'=>array('update', 'id'=>$model->idrcrate)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Rcrate'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idrcrate),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Rcrate'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Rcrate'))) . ' #' . $model->idrcrate;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idrcrate',
		'idccfyear',
		'whitercard',
		'bluercard',
		'yellowrcard',
		'newrcard',
		'renewrcard',
		'reviewrcard',
	),
)); ?>
