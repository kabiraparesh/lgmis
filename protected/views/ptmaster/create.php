<?php
$this->breadcrumbs=array(
	Yii::t('application', 'Ptmasters')=>array('index'),
	Yii::t('application', 'Create'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Ptmaster'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Ptmaster'))), 'url'=>array('admin')),
);
?>

<?php
$this->setPageTitle(Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Ptmaster'))));
?>
<?php //echo $this->renderPartial('_form', array('model'=>$model)); ?>
<?php //echo $this->renderPartial('_form', array('model'=>$model, 'dataProvider' => $dataProvider), true, true); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model, 'dataProvider' => $dataProvider)); ?>

