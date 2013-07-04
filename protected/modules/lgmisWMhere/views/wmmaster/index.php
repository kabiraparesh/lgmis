<?php
/* @var $this WmmasterController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Wmmasters',
);

$this->menu=array(
	array('label'=>'Create Wmmaster', 'url'=>array('create')),
	array('label'=>'Manage Wmmaster', 'url'=>array('admin')),
);
?>

<h1>Wmmasters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
