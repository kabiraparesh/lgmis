<?php
$this->breadcrumbs=array(
	Yii::t('application','Hrposts')=>array('index'),
	Yii::t('application',$model->idhrpost)=>array('view','id'=>$model->idhrpost),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Hrpost'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Hrpost'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Hrpost'))), 'url'=>array('view', 'id'=>$model->idhrpost)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Hrpost'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Hrpost'))) ;?> <?php echo $model->idhrpost; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>