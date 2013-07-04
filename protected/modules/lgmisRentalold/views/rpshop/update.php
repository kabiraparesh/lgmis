<?php
$this->breadcrumbs=array(
	Yii::t('application','Rpshops')=>array('index'),
	Yii::t('application',$model->idrpshop)=>array('view','id'=>$model->idrpshop),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Rpshop'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Rpshop'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Rpshop'))), 'url'=>array('view', 'id'=>$model->idrpshop)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Rpshop'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Rpshop'))) ;?> <?php echo $model->idrpshop; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>