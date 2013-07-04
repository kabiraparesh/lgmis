<?php
$this->breadcrumbs=array(
	Yii::t('application','Cmgroups')=>array('index'),
	Yii::t('application',$model->idcmgroup)=>array('view','id'=>$model->idcmgroup),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Cmgroup'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Cmgroup'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Cmgroup'))), 'url'=>array('view', 'id'=>$model->idcmgroup)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Cmgroup'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Cmgroup'))) ;?> <?php echo $model->idcmgroup; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>