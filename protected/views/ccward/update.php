<?php
$this->breadcrumbs=array(
	Yii::t('application','Ccwards')=>array('index'),
	Yii::t('application',$model->idccward)=>array('view','id'=>$model->idccward),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Ccward'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Ccward'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Ccward'))), 'url'=>array('view', 'id'=>$model->idccward)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Ccward'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Ccward'))) ;?> <?php echo $model->idccward; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>