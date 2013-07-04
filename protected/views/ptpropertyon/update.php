<?php
$this->breadcrumbs=array(
	Yii::t('application','Ptpropertyons')=>array('index'),
	Yii::t('application',$model->idptpropertyon)=>array('view','id'=>$model->idptpropertyon),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Ptpropertyon'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Ptpropertyon'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Ptpropertyon'))), 'url'=>array('view', 'id'=>$model->idptpropertyon)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Ptpropertyon'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Ptpropertyon'))) ;?> <?php echo $model->idptpropertyon; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>