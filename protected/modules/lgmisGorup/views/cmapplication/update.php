<?php
$this->breadcrumbs=array(
	Yii::t('application','Cmapplications')=>array('index'),
	Yii::t('application',$model->idcmapplication)=>array('view','id'=>$model->idcmapplication),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Cmapplication'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Cmapplication'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Cmapplication'))), 'url'=>array('view', 'id'=>$model->idcmapplication)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Cmapplication'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Cmapplication'))) ;?> <?php echo $model->idcmapplication; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>