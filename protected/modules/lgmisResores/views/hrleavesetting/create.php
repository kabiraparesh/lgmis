<?php
$this->breadcrumbs=array(
	Yii::t('application', 'Hrleavesettings')=>array('index'),
	Yii::t('application', 'Create'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Hrleavesetting'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Hrleavesetting'))), 'url'=>array('admin')),
);
?>

<h1><?php  echo Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Hrleavesetting'))); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>