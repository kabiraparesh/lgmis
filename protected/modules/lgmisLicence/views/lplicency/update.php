<?php
$this->breadcrumbs=array(
	Yii::t('application','Lplicencies')=>array('index'),
	Yii::t('application',$model->idlplicency)=>array('view','id'=>$model->idlplicency),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Lplicency'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Lplicency'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Lplicency'))), 'url'=>array('view', 'id'=>$model->idlplicency)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Lplicency'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Lplicency'))) ;?> <?php echo $model->idlplicency; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>