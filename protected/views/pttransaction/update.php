<?php
$this->breadcrumbs=array(
	Yii::t('application','Pttransactions')=>array('index'),
	Yii::t('application',$model->idpttransaction)=>array('view','id'=>$model->idpttransaction),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Pttransaction'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Pttransaction'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Pttransaction'))), 'url'=>array('view', 'id'=>$model->idpttransaction)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Pttransaction'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Pttransaction'))) ;?> <?php echo $model->idpttransaction; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>