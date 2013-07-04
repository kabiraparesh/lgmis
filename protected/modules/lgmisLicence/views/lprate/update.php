<?php
$this->breadcrumbs=array(
	Yii::t('application','Lprates')=>array('index'),
	Yii::t('application',$model->idlprate)=>array('view','id'=>$model->idlprate),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Lprate'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Lprate'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Lprate'))), 'url'=>array('view', 'id'=>$model->idlprate)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Lprate'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Lprate'))) ;?> <?php echo $model->idlprate; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>