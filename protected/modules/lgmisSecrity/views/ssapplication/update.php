<?php
$this->breadcrumbs=array(
	Yii::t('application','Ssapplications')=>array('index'),
	Yii::t('application',$model->name)=>array('view','id'=>$model->idssapplication),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Ssapplication'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Ssapplication'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Ssapplication'))), 'url'=>array('view', 'id'=>$model->idssapplication)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Ssapplication'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Ssapplication'))) ;?> <?php echo $model->idssapplication; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>