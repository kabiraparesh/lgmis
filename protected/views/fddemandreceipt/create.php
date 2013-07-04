<?php
$this->breadcrumbs=array(
	Yii::t('application', 'Fddemandreceipts')=>array('index'),
	Yii::t('application', 'Create'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Fddemandreceipt'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Fddemandreceipt'))), 'url'=>array('admin')),
);
?>

<h1><?php  echo Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Fddemandreceipt'))); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>