<?php
/* @var $this WmmasterController */
/* @var $model Wmmaster */

$this->breadcrumbs=array(
	'Wmmasters'=>array('index'),
	$model->idwmmaster=>array('view','id'=>$model->idwmmaster),
	'Update',
);

$this->menu=array(
	array('label'=>'List Wmmaster', 'url'=>array('index')),
	array('label'=>'Create Wmmaster', 'url'=>array('create')),
	array('label'=>'View Wmmaster', 'url'=>array('view', 'id'=>$model->idwmmaster)),
	array('label'=>'Manage Wmmaster', 'url'=>array('admin')),
);
?>

<h1>Update Wmmaster <?php echo $model->idwmmaster; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>