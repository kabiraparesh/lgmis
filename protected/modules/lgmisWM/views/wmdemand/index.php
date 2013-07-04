<?php
/* @var $this WmdemandController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Wmdemands',
);

$this->menu=array(
	array('label'=>'Create Wmdemand', 'url'=>array('create')),
	array('label'=>'Manage Wmdemand', 'url'=>array('admin')),
);
?>

<h1>Wmdemands</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
