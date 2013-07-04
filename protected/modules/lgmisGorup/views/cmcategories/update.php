<?php
$this->breadcrumbs=array(
	Yii::t('application','Cmcategories')=>array('index'),
	Yii::t('application',$model->idcmcategories)=>array('view','id'=>$model->idcmcategories),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Cmcategories'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Cmcategories'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Cmcategories'))), 'url'=>array('view', 'id'=>$model->idcmcategories)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Cmcategories'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Cmcategories'))) ;?> <?php echo $model->idcmcategories; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>