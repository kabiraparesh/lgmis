<?php
$this->breadcrumbs=array(
	Yii::t('application','Ptranges')=>array('index'),
	Yii::t('application',$model->idptrange)=>array('view','id'=>$model->idptrange),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Ptrange'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Ptrange'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Ptrange'))), 'url'=>array('view', 'id'=>$model->idptrange)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Ptrange'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Ptrange'))) ;?> <?php echo $model->idptrange; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>