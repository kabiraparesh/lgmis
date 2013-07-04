<?php
$this->breadcrumbs=array(
	Yii::t('application','Bdbirthinformers')=>array('index'),
	Yii::t('application',$model->idbdbirthinformer)=>array('view','id'=>$model->idbdbirthinformer),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Bdbirthinformer'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Bdbirthinformer'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Bdbirthinformer'))), 'url'=>array('view', 'id'=>$model->idbdbirthinformer)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Bdbirthinformer'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Bdbirthinformer'))) ;?> <?php echo $model->idbdbirthinformer; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>