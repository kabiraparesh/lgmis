<?php
$this->breadcrumbs=array(
	Yii::t('application','Rcrates')=>array('index'),
	Yii::t('application',$model->idrcrate)=>array('view','id'=>$model->idrcrate),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Rcrate'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Rcrate'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Rcrate'))), 'url'=>array('view', 'id'=>$model->idrcrate)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Rcrate'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Rcrate'))) ;?> <?php echo $model->idrcrate; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>