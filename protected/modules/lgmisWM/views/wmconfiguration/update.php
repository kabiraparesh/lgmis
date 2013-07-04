<?php
/* @var $this WmconfigurationController */
/* @var $model Wmconfiguration */

$this->breadcrumbs=array(
	'Wmconfigurations'=>array('index'),
	$model->idwmconfiguration=>array('view','id'=>$model->idwmconfiguration),
	'Update',
);

$this->menu=array(
	array('label'=>'List Wmconfiguration', 'url'=>array('index')),
	array('label'=>'Create Wmconfiguration', 'url'=>array('create')),
	array('label'=>'View Wmconfiguration', 'url'=>array('view', 'id'=>$model->idwmconfiguration)),
	array('label'=>'Manage Wmconfiguration', 'url'=>array('admin')),
);
?>

<h1>Update Wmconfiguration <?php echo $model->idwmconfiguration; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>