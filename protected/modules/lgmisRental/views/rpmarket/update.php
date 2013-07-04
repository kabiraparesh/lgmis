<?php
$this->breadcrumbs=array(
	Yii::t('application','Rpmarkets')=>array('index'),
	Yii::t('application',$model->idrpmarket)=>array('view','id'=>$model->idrpmarket),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Rpmarket'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Rpmarket'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Rpmarket'))), 'url'=>array('view', 'id'=>$model->idrpmarket)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Rpmarket'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Rpmarket'))) ;?> <?php echo $model->idrpmarket; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>