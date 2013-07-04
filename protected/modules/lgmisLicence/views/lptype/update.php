<?php
$this->breadcrumbs=array(
	Yii::t('application','Lptypes')=>array('index'),
	Yii::t('application',$model->idlptype)=>array('view','id'=>$model->idlptype),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Lptype'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Lptype'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Lptype'))), 'url'=>array('view', 'id'=>$model->idlptype)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Lptype'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Lptype'))) ;?> <?php echo $model->idlptype; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>