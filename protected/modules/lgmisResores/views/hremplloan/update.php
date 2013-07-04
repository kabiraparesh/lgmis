<?php
$this->breadcrumbs=array(
	Yii::t('application','Hremplloans')=>array('index'),
	Yii::t('application',$model->idhremplloan)=>array('view','id'=>$model->idhremplloan),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Hremplloan'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Hremplloan'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Hremplloan'))), 'url'=>array('view', 'id'=>$model->idhremplloan)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Hremplloan'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Hremplloan'))) ;?> <?php echo $model->idhremplloan; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>