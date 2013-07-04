<?php
/* @var $this WmconfigurationController */
/* @var $model Wmconfiguration */

$this->breadcrumbs=array(
	'Wmconfigurations'=>array('index'),
	$model->idwmconfiguration,
);

$this->menu=array(
	array('label'=>'List Wmconfiguration', 'url'=>array('index')),
	array('label'=>'Create Wmconfiguration', 'url'=>array('create')),
	array('label'=>'Update Wmconfiguration', 'url'=>array('update', 'id'=>$model->idwmconfiguration)),
	array('label'=>'Delete Wmconfiguration', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idwmconfiguration),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Wmconfiguration', 'url'=>array('admin')),
);
?>

<h1><?php echo LgmisWMModule::t('View {title}', array('{title}'=>LgmisWMModule::t('Wmconfiguration'))) . ' #' . $model->idwmconfiguration;?></h1>

<?php $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idwmconfiguration',
		'idccfyear',
		'idwmtype',
		'idwmsize',
		'wmtape',
		'newconncharge',
		'tempconncharge',
		'reconncharge',
		'tempdisconncharge',
		'surcharge',
		'monthlycharges',
	),
)); ?>
