<?php
$this->breadcrumbs=array(
	Yii::t('application','Hremplmembers')=>array('index'),
	Yii::t('application',$model->idhremplmember)=>array('view','id'=>$model->idhremplmember),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Hremplmember'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Hremplmember'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Hremplmember'))), 'url'=>array('view', 'id'=>$model->idhremplmember)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Hremplmember'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Hremplmember'))) ;?> <?php echo $model->idhremplmember; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>