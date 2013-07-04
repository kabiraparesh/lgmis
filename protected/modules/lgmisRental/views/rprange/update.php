<?php
$this->breadcrumbs=array(
	Yii::t('application','Rpranges')=>array('index'),
	Yii::t('application',$model->idrprange)=>array('view','id'=>$model->idrprange),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Rprange'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Rprange'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Rprange'))), 'url'=>array('view', 'id'=>$model->idrprange)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Rprange'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Rprange'))) ;?> <?php echo $model->idrprange; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>