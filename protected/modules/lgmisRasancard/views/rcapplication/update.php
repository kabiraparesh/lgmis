<?php
$this->breadcrumbs=array(
	Yii::t('application','Rcapplications')=>array('index'),
	Yii::t('application',$model->idrcapplication)=>array('view','id'=>$model->idrcapplication),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Rcapplication'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Rcapplication'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Rcapplication'))), 'url'=>array('view', 'id'=>$model->idrcapplication)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Rcapplication'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Rcapplication'))) ;?> <?php echo $model->idrcapplication; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>