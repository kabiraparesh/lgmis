<?php
$this->breadcrumbs=array(
	Yii::t('application','Ssgrants')=>array('index'),
	Yii::t('application',$model->idssgrant)=>array('view','id'=>$model->idssgrant),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Ssgrant'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Ssgrant'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Ssgrant'))), 'url'=>array('view', 'id'=>$model->idssgrant)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Ssgrant'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Ssgrant'))) ;?> <?php echo $model->idssgrant; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>