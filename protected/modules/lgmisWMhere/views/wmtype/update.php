<?php
/* @var $this WmtypeController */
/* @var $model Wmtype */

$this->breadcrumbs=array(
	'Wmtypes'=>array('index'),
	$model->idwmtype=>array('view','id'=>$model->idwmtype),
	'Update',
);

$this->menu=array(
	array('label'=>'List Wmtype', 'url'=>array('index')),
	array('label'=>'Create Wmtype', 'url'=>array('create')),
	array('label'=>'View Wmtype', 'url'=>array('view', 'id'=>$model->idwmtype)),
	array('label'=>'Manage Wmtype', 'url'=>array('admin')),
);
?>

<h1>Update Wmtype <?php echo $model->idwmtype; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>