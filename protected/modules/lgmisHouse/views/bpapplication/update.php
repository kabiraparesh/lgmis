<?php
$this->breadcrumbs=array(
	Yii::t('application','Bpapplications')=>array('index'),
	Yii::t('application',$model->idbpapplication)=>array('view','id'=>$model->idbpapplication),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Bpapplication'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Bpapplication'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Bpapplication'))), 'url'=>array('view', 'id'=>$model->idbpapplication)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Bpapplication'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Bpapplication'))) ;?> <?php echo $model->idbpapplication; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>