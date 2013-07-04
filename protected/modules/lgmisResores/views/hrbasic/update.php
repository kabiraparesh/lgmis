<?php
$this->breadcrumbs=array(
	Yii::t('application','Hrbasics')=>array('index'),
	Yii::t('application',$model->idhrbasic)=>array('view','id'=>$model->idhrbasic),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Hrbasic'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Hrbasic'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Hrbasic'))), 'url'=>array('view', 'id'=>$model->idhrbasic)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Hrbasic'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Hrbasic'))) ;?> <?php echo $model->idhrbasic; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>