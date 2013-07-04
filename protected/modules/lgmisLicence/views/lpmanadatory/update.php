<?php
$this->breadcrumbs=array(
	Yii::t('application','Lpmanadatories')=>array('index'),
	Yii::t('application',$model->idlpmanadatory)=>array('view','id'=>$model->idlpmanadatory),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Lpmanadatory'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Lpmanadatory'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Lpmanadatory'))), 'url'=>array('view', 'id'=>$model->idlpmanadatory)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Lpmanadatory'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Lpmanadatory'))) ;?> <?php echo $model->idlpmanadatory; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>