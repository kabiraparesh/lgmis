<?php
/* @var $this WmplumberController */
/* @var $model Wmplumber */

$this->breadcrumbs=array(
	'Wmplumbers'=>array('index'),
	$model->idwmplumber=>array('view','id'=>$model->idwmplumber),
	'Update',
);

$this->menu=array(
	array('label'=>'List Wmplumber', 'url'=>array('index')),
	array('label'=>'Create Wmplumber', 'url'=>array('create')),
	array('label'=>'View Wmplumber', 'url'=>array('view', 'id'=>$model->idwmplumber)),
	array('label'=>'Manage Wmplumber', 'url'=>array('admin')),
);
?>

<h1>Update Wmplumber <?php echo $model->idwmplumber; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>