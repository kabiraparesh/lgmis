<?php
/* @var $this WmplumberController */
/* @var $model Wmplumber */

$this->breadcrumbs=array(
	'Wmplumbers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Wmplumber', 'url'=>array('index')),
	array('label'=>'Manage Wmplumber', 'url'=>array('admin')),
);
?>

<h1>Create Wmplumber</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>