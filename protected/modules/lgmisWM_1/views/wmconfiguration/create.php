<?php
/* @var $this WmconfigurationController */
/* @var $model Wmconfiguration */

$this->breadcrumbs=array(
	'Wmconfigurations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Wmconfiguration', 'url'=>array('index')),
	array('label'=>'Manage Wmconfiguration', 'url'=>array('admin')),
);
?>

<h1>Create Wmconfiguration</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>