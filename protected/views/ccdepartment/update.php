<?php
$this->breadcrumbs=array(
	Yii::t('application','Ccdepartments')=>array('index'),
	Yii::t('application',$model->idccdepartment)=>array('view','id'=>$model->idccdepartment),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Ccdepartment'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Ccdepartment'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Ccdepartment'))), 'url'=>array('view', 'id'=>$model->idccdepartment)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Ccdepartment'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Ccdepartment'))) ;?> <?php echo $model->idccdepartment; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>