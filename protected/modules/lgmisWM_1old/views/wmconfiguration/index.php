<?php
/* @var $this WmconfigurationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Wmconfigurations',
);

$this->menu=array(
	array('label'=>'Create Wmconfiguration', 'url'=>array('create')),
	array('label'=>'Manage Wmconfiguration', 'url'=>array('admin')),
);
?>

<h1>Wmconfigurations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
