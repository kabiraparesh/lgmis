<?php
$this->breadcrumbs=array(
	Yii::t('application','Rprates')=>array('index'),
	Yii::t('application',$model->idrprate)=>array('view','id'=>$model->idrprate),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Rprate'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Rprate'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Rprate'))), 'url'=>array('view', 'id'=>$model->idrprate)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Rprate'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Rprate'))) ;?> <?php echo $model->idrprate; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>