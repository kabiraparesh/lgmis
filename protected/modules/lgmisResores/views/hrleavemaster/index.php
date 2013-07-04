<?php
$this->breadcrumbs=array(
	Yii::t('application', 'Hrleavemasters'),
);

$this->menu=array(
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Hrleavemaster'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Hrleavemaster'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'Hrleavemasters');?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
