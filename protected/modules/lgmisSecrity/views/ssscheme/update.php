<?php
$this->breadcrumbs=array(
	Yii::t('application','Ssschemes')=>array('index'),
	Yii::t('application',$model->name)=>array('view','id'=>$model->idssscheme),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Ssscheme'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Ssscheme'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Ssscheme'))), 'url'=>array('view', 'id'=>$model->idssscheme)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Ssscheme'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Ssscheme'))) ;?> <?php echo $model->idssscheme; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>