<?php
$this->breadcrumbs=array(
	Yii::t('application','Cmcategories')=>array('index'),
	Yii::t('application', $model->idcmcategories),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Cmcategories'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Cmcategories'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Cmcategories'))), 'url'=>array('update', 'id'=>$model->idcmcategories)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Cmcategories'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idcmcategories),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Cmcategories'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Cmcategories'))) . ' #' . $model->idcmcategories;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idcmcategories',
		'categoriesname',
		'idcmgroup',
	),
)); ?>
