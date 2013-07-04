<?php
/* @var $this WmdemandController */
/* @var $model Wmdemand */

$this->breadcrumbs=array(
	'Wmdemands'=>array('index'),
	$model->idwmdemand=>array('view','id'=>$model->idwmdemand),
	'Update',
);

$this->menu=array(
	array('label'=>'List Wmdemand', 'url'=>array('index')),
	array('label'=>'Create Wmdemand', 'url'=>array('create')),
	array('label'=>'View Wmdemand', 'url'=>array('view', 'id'=>$model->idwmdemand)),
	array('label'=>'Manage Wmdemand', 'url'=>array('admin')),
);
?>

<h1>Update Wmdemand <?php echo $model->idwmdemand; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>