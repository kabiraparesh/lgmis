<?php
$this->breadcrumbs=array(
	Yii::t('application','Rplocations')=>array('index'),
	Yii::t('application',$model->idrplocation)=>array('view','id'=>$model->idrplocation),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Rplocation'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Rplocation'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Rplocation'))), 'url'=>array('view', 'id'=>$model->idrplocation)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Rplocation'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Rplocation'))) ;?> <?php echo $model->idrplocation; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>