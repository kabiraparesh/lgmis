<?php
/* @var $this WmdemandreceiptController */
/* @var $model Wmdemandreceipt */

$this->breadcrumbs=array(
	'Wmdemandreceipts'=>array('index'),
	$model->idwmdemandreceipt=>array('view','id'=>$model->idwmdemandreceipt),
	'Update',
);

$this->menu=array(
	array('label'=>'List Wmdemandreceipt', 'url'=>array('index')),
	array('label'=>'Create Wmdemandreceipt', 'url'=>array('create')),
	array('label'=>'View Wmdemandreceipt', 'url'=>array('view', 'id'=>$model->idwmdemandreceipt)),
	array('label'=>'Manage Wmdemandreceipt', 'url'=>array('admin')),
);
?>

<h1>Update Wmdemandreceipt <?php echo $model->idwmdemandreceipt; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>