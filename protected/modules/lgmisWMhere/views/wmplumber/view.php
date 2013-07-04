<?php
/* @var $this WmplumberController */
/* @var $model Wmplumber */

$this->breadcrumbs=array(
	'Wmplumbers'=>array('index'),
	$model->idwmplumber,
);

$this->menu=array(
	array('label'=>'List Wmplumber', 'url'=>array('index')),
	array('label'=>'Create Wmplumber', 'url'=>array('create')),
	array('label'=>'Update Wmplumber', 'url'=>array('update', 'id'=>$model->idwmplumber)),
	array('label'=>'Delete Wmplumber', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idwmplumber),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Wmplumber', 'url'=>array('admin')),
);
?>

<h1><?php echo LgmisWMModule::t('View {title}', array('{title}'=>LgmisWMModule::t('Wmplumber'))) . ' #' . $model->idwmplumber;?></h1>

<?php $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idwmplumber',
		'plumbername',
		'address',
		'details',
		'phoneno',
	),
)); ?>
