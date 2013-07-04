<?php
/* @var $this WmdemandController */
/* @var $model Wmdemand */

$this->breadcrumbs=array(
	'Wmdemands'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Wmdemand', 'url'=>array('index')),
	array('label'=>'Manage Wmdemand', 'url'=>array('admin')),
);
?>

<h1>Create Wmdemand</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>