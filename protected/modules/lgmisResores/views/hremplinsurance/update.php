<?php
$this->breadcrumbs=array(
	Yii::t('application','Hremplinsurances')=>array('index'),
	Yii::t('application',$model->idhremplinsurance)=>array('view','id'=>$model->idhremplinsurance),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Hremplinsurance'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Hremplinsurance'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Hremplinsurance'))), 'url'=>array('view', 'id'=>$model->idhremplinsurance)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Hremplinsurance'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Hremplinsurance'))) ;?> <?php echo $model->idhremplinsurance; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>