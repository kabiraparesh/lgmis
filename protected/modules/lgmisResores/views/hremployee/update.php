<?php
$this->breadcrumbs=array(
	Yii::t('application','Hremployees')=>array('index'),
	Yii::t('application',$model->idhremployee)=>array('view','id'=>$model->idhremployee),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Hremployee'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Hremployee'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Hremployee'))), 'url'=>array('view', 'id'=>$model->idhremployee)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Hremployee'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Hremployee'))) ;?> <?php echo $model->idhremployee; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>