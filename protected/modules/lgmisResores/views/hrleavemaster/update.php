<?php
$this->breadcrumbs=array(
	Yii::t('application','Hrleavemasters')=>array('index'),
	Yii::t('application',$model->idhrleavemaster)=>array('view','id'=>$model->idhrleavemaster),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Hrleavemaster'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Hrleavemaster'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Hrleavemaster'))), 'url'=>array('view', 'id'=>$model->idhrleavemaster)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Hrleavemaster'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Hrleavemaster'))) ;?> <?php echo $model->idhrleavemaster; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>