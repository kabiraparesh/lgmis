<?php
$this->breadcrumbs=array(
	Yii::t('application','Ptpropertyons')=>array('index'),
	Yii::t('application', $model->idptpropertyon),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Ptpropertyon'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Ptpropertyon'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Ptpropertyon'))), 'url'=>array('update', 'id'=>$model->idptpropertyon)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Ptpropertyon'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idptpropertyon),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Ptpropertyon'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Ptpropertyon'))) . ' #' . $model->idptpropertyon;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idptpropertyon',
		'propertyon',
	),
)); ?>
