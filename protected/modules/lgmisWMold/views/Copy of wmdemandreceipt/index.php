<?php
/* @var $this WmdemandreceiptController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Wmdemandreceipts',
);

$this->menu=array(
	array('label'=>'Create Wmdemandreceipt', 'url'=>array('create')),
	array('label'=>'Manage Wmdemandreceipt', 'url'=>array('admin')),
);
?>

<h1>Wmdemandreceipts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
