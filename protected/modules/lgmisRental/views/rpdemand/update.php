<?php
$this->breadcrumbs=array(
	Yii::t('application','Rpdemands')=>array('index'),
	Yii::t('application',$model->idrpdemand)=>array('view','id'=>$model->idrpdemand),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Rpdemand'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Rpdemand'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Rpdemand'))), 'url'=>array('view', 'id'=>$model->idrpdemand)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Rpdemand'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Rpdemand'))) ;?> <?php echo $model->idrpdemand; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>