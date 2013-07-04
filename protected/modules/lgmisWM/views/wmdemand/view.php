<?php
/* @var $this WmdemandController */
/* @var $model Wmdemand */

$this->breadcrumbs=array(
	'Wmdemands'=>array('index'),
	$model->idwmdemand,
);

$this->menu=array(
	array('label'=>'List Wmdemand', 'url'=>array('index')),
	array('label'=>'Create Wmdemand', 'url'=>array('create')),
	array('label'=>'Update Wmdemand', 'url'=>array('update', 'id'=>$model->idwmdemand)),
	array('label'=>'Delete Wmdemand', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idwmdemand),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Wmdemand', 'url'=>array('admin')),
);
?>

<h1><?php echo LgmisWMModule::t('View {title}', array('{title}'=>LgmisWMModule::t('Wmdemand'))) . ' #' . $model->idwmdemand;?></h1>

<?php $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idwmdemand',
		'idwmmaster',
		'idccfyear',
		'period',
		'wmoldbalance',
		'wmsurcharge',
		'wmdemandamt',
		'wmdemanddate',
	),
)); ?>
