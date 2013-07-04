<?php
/* @var $this WmtypeController */
/* @var $model Wmtype */

$this->breadcrumbs=array(
	'Wmtypes'=>array('index'),
	$model->idwmtype,
);

$this->menu=array(
	array('label'=>'List Wmtype', 'url'=>array('index')),
	array('label'=>'Create Wmtype', 'url'=>array('create')),
	array('label'=>'Update Wmtype', 'url'=>array('update', 'id'=>$model->idwmtype)),
	array('label'=>'Delete Wmtype', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idwmtype),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Wmtype', 'url'=>array('admin')),
);
?>

<h1><?php echo LgmisWMModule::t('View {title}', array('{title}'=>LgmisWMModule::t('Wmtype'))) . ' #' . $model->idwmtype;?></h1>

<?php $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idwmtype',
		'wmtype',
	),
)); ?>
