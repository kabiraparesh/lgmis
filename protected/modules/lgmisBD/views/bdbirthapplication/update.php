<?php
$this->breadcrumbs=array(
	Yii::t('application','Bdbirthapplications')=>array('index'),
	Yii::t('application',$model->idbdbirthapplication)=>array('view','id'=>$model->idbdbirthapplication),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Bdbirthapplication'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Bdbirthapplication'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Bdbirthapplication'))), 'url'=>array('view', 'id'=>$model->idbdbirthapplication)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Bdbirthapplication'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Bdbirthapplication'))) ;?> <?php echo $model->idbdbirthapplication; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>