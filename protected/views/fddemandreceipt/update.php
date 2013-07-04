<?php
$this->breadcrumbs=array(
	Yii::t('application','Fddemandreceipts')=>array('index'),
	Yii::t('application',$model->idfddemandreceipt)=>array('view','id'=>$model->idfddemandreceipt),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Fddemandreceipt'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Fddemandreceipt'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Fddemandreceipt'))), 'url'=>array('view', 'id'=>$model->idfddemandreceipt)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Fddemandreceipt'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Fddemandreceipt'))) ;?> <?php echo $model->idfddemandreceipt; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>