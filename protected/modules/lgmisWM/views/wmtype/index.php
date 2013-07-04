<?php
/* @var $this WmtypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Wmtypes',
);

$this->menu=array(
	array('label'=>'Create Wmtype', 'url'=>array('create')),
	array('label'=>'Manage Wmtype', 'url'=>array('admin')),
);
?>

<h1>Wmtypes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
