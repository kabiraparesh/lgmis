<?php
$this->breadcrumbs=array(
	Yii::t('application','Ssnominees')=>array('index'),
	Yii::t('application',$model->name)=>array('view','id'=>$model->idssnominee),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Ssnominee'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Ssnominee'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Ssnominee'))), 'url'=>array('view', 'id'=>$model->idssnominee)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Ssnominee'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Ssnominee'))) ;?> <?php echo $model->idssnominee; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>