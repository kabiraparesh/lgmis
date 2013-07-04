<?php
$this->breadcrumbs=array(
	Yii::t('application','Bparearates')=>array('index'),
	Yii::t('application',$model->idbparearate)=>array('view','id'=>$model->idbparearate),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Bparearate'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Bparearate'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Bparearate'))), 'url'=>array('view', 'id'=>$model->idbparearate)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Bparearate'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Bparearate'))) ;?> <?php echo $model->idbparearate; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>