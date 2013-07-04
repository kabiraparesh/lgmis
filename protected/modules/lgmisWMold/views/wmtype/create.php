<?php
/* @var $this WmtypeController */
/* @var $model Wmtype */

$this->breadcrumbs=array(
	'Wmtypes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Wmtype', 'url'=>array('index')),
	array('label'=>'Manage Wmtype', 'url'=>array('admin')),
);
?>

<h1>Create Wmtype</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>