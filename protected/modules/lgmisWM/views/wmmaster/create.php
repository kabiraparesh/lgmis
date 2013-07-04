<?php
/* @var $this WmmasterController */
/* @var $model Wmmaster */

$this->breadcrumbs=array(
	'Wmmasters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Wmmaster', 'url'=>array('index')),
	array('label'=>'Manage Wmmaster', 'url'=>array('admin')),
);
?>

<h1>Create Wmmaster</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>