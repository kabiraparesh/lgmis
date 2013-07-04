<?php
$this->breadcrumbs=array(
	Yii::t('application','Bddeathinformers')=>array('index'),
	Yii::t('application',$model->idbddeathinformer)=>array('view','id'=>$model->idbddeathinformer),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Bddeathinformer'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Bddeathinformer'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Bddeathinformer'))), 'url'=>array('view', 'id'=>$model->idbddeathinformer)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Bddeathinformer'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Bddeathinformer'))) ;?> <?php echo $model->idbddeathinformer; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>