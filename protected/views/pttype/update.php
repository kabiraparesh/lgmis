<?php
$this->breadcrumbs=array(
	Yii::t('application','Pttypes')=>array('index'),
	Yii::t('application',$model->idpttype)=>array('view','id'=>$model->idpttype),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Pttype'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Pttype'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Pttype'))), 'url'=>array('view', 'id'=>$model->idpttype)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Pttype'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Pttype'))) ;?> <?php echo $model->idpttype; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>