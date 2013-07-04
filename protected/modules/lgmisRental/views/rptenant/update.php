<?php
$this->breadcrumbs=array(
	Yii::t('application','Rptenants')=>array('index'),
	Yii::t('application',$model->idrptenant)=>array('view','id'=>$model->idrptenant),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Rptenant'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Rptenant'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Rptenant'))), 'url'=>array('view', 'id'=>$model->idrptenant)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Rptenant'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Rptenant'))) ;?> <?php echo $model->idrptenant; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>