<?php
$this->breadcrumbs=array(
	Yii::t('application','Rpdemandreceipts')=>array('index'),
	Yii::t('application',$model->idrpdemandreceipt)=>array('view','id'=>$model->idrpdemandreceipt),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Rpdemandreceipt'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Rpdemandreceipt'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Rpdemandreceipt'))), 'url'=>array('view', 'id'=>$model->idrpdemandreceipt)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Rpdemandreceipt'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Rpdemandreceipt'))) ;?> <?php echo $model->idrpdemandreceipt; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>