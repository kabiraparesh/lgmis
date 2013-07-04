<?php
$this->breadcrumbs=array(
	Yii::t('application','Cczones')=>array('index'),
	Yii::t('application',$model->idcczone)=>array('view','id'=>$model->idcczone),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Cczone'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Cczone'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Cczone'))), 'url'=>array('view', 'id'=>$model->idcczone)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Cczone'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Cczone'))) ;?> <?php echo $model->idcczone; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>