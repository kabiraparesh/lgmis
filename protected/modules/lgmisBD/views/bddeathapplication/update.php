<?php
$this->breadcrumbs=array(
	Yii::t('application','Bddeathapplications')=>array('index'),
	Yii::t('application',$model->idbddeathapplication)=>array('view','id'=>$model->idbddeathapplication),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Bddeathapplication'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Bddeathapplication'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Bddeathapplication'))), 'url'=>array('view', 'id'=>$model->idbddeathapplication)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Bddeathapplication'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Bddeathapplication'))) ;?> <?php echo $model->idbddeathapplication; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>