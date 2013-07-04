<?php
$this->breadcrumbs=array(
	Yii::t('application','Lpbnatures')=>array('index'),
	Yii::t('application',$model->idlpbnature)=>array('view','id'=>$model->idlpbnature),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Lpbnature'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Lpbnature'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Lpbnature'))), 'url'=>array('view', 'id'=>$model->idlpbnature)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Lpbnature'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Lpbnature'))) ;?> <?php echo $model->idlpbnature; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>