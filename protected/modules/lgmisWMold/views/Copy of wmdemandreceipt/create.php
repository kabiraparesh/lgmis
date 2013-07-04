<?php
/* @var $this WmdemandreceiptController */
/* @var $model Wmdemandreceipt */

$this->breadcrumbs=array(
	'Wmdemandreceipts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Wmdemandreceipt', 'url'=>array('index')),
	array('label'=>'Manage Wmdemandreceipt', 'url'=>array('admin')),
);
?>

<h1>Create Wmdemandreceipt</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>