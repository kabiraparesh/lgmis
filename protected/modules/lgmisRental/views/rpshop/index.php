<?php
$this->breadcrumbs=array(
	Yii::t('application', 'Rpshops'),
);

$this->menu=array(
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Rpshop'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Rpshop'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'Rpshops');?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
