<?php
$this->breadcrumbs=array(
	Yii::t('application', 'Hremplinsurances'),
);

$this->menu=array(
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Hremplinsurance'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Hremplinsurance'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'Hremplinsurances');?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
