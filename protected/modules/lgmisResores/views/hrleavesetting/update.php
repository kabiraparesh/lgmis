<?php
$this->breadcrumbs=array(
	Yii::t('application','Hrleavesettings')=>array('index'),
	Yii::t('application',$model->idhrleavesetting)=>array('view','id'=>$model->idhrleavesetting),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Hrleavesetting'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Hrleavesetting'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Hrleavesetting'))), 'url'=>array('view', 'id'=>$model->idhrleavesetting)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Hrleavesetting'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Hrleavesetting'))) ;?> <?php echo $model->idhrleavesetting; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>