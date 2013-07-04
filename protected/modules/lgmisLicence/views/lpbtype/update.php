<?php
$this->breadcrumbs=array(
	Yii::t('application','Lpbtypes')=>array('index'),
	Yii::t('application',$model->idlpbtype)=>array('view','id'=>$model->idlpbtype),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Lpbtype'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Lpbtype'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Lpbtype'))), 'url'=>array('view', 'id'=>$model->idlpbtype)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Lpbtype'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Lpbtype'))) ;?> <?php echo $model->idlpbtype; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>