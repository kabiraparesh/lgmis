<?php
$this->breadcrumbs=array(
	Yii::t('application','Hremployeebasics')=>array('index'),
	Yii::t('application',$model->idhremployeebasic)=>array('view','id'=>$model->idhremployeebasic),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Hremployeebasic'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Hremployeebasic'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Hremployeebasic'))), 'url'=>array('view', 'id'=>$model->idhremployeebasic)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Hremployeebasic'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Hremployeebasic'))) ;?> <?php echo $model->idhremployeebasic; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>