<?php
$this->breadcrumbs=array(
	Yii::t('application', 'Lptypes'),
);

$this->menu=array(
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Lptype'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Lptype'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'Lptypes');?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
