<?php
$this->breadcrumbs=array(
	Yii::t('application','Hrsalarysets')=>array('index'),
	Yii::t('application',$model->idhrsalaryset)=>array('view','id'=>$model->idhrsalaryset),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Hrsalaryset'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Hrsalaryset'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Hrsalaryset'))), 'url'=>array('view', 'id'=>$model->idhrsalaryset)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Hrsalaryset'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Hrsalaryset'))) ;?> <?php echo $model->idhrsalaryset; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>