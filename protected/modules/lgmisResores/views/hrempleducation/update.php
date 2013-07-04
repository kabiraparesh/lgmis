<?php
$this->breadcrumbs=array(
	Yii::t('application','Hrempleducations')=>array('index'),
	Yii::t('application',$model->idhrempleducation)=>array('view','id'=>$model->idhrempleducation),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Hrempleducation'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Hrempleducation'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Hrempleducation'))), 'url'=>array('view', 'id'=>$model->idhrempleducation)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Hrempleducation'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Hrempleducation'))) ;?> <?php echo $model->idhrempleducation; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>