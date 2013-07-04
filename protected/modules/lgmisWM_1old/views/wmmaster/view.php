<?php
/* @var $this WmmasterController */
/* @var $model Wmmaster */

$this->breadcrumbs=array(
	'Wmmasters'=>array('index'),
	$model->idwmmaster,
);

$this->menu=array(
	array('label'=>'List Wmmaster', 'url'=>array('index')),
	array('label'=>'Create Wmmaster', 'url'=>array('create')),
	array('label'=>'Update Wmmaster', 'url'=>array('update', 'id'=>$model->idwmmaster)),
	array('label'=>'Delete Wmmaster', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idwmmaster),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Wmmaster', 'url'=>array('admin')),
);
?>

<h1><?php echo LgmisWMModule::t('View {title}', array('{title}'=>LgmisWMModule::t('Wmmaster'))) . ' #' . $model->idwmmaster;?></h1>

<?php $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idwmmaster',
		'idccfyear',
		'wmappdate',
		'ownername',
		'idptmaster',
		'idwmtype',
		'idwmsize',
		'wmtape',
		'idwmplumber',
		'idccstatus',
		'mainlindia',
		'mainlindis',
		'wmdetails',
		'wmmasterflag',
		'idwmexsumptor',
		'params',
	),
)); ?>
