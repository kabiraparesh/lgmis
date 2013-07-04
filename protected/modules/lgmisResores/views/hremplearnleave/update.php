<?php
$this->breadcrumbs=array(
	Yii::t('application','Hremplearnleaves')=>array('index'),
	Yii::t('application',$model->idhremplearnleave)=>array('view','id'=>$model->idhremplearnleave),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Hremplearnleave'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Hremplearnleave'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Hremplearnleave'))), 'url'=>array('view', 'id'=>$model->idhremplearnleave)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Hremplearnleave'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Hremplearnleave'))) ;?> <?php echo $model->idhremplearnleave; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>