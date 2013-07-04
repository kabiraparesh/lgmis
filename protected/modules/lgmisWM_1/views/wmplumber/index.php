<?php
/* @var $this WmplumberController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Wmplumbers',
);

$this->menu=array(
	array('label'=>'Create Wmplumber', 'url'=>array('create')),
	array('label'=>'Manage Wmplumber', 'url'=>array('admin')),
);
?>

<h1>Wmplumbers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
