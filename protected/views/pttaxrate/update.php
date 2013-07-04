<?php
$this->breadcrumbs=array(
	Yii::t('application','Pttaxrates')=>array('index'),
	Yii::t('application',$model->idpttaxrate)=>array('view','id'=>$model->idpttaxrate),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Pttaxrate'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Pttaxrate'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Pttaxrate'))), 'url'=>array('view', 'id'=>$model->idpttaxrate)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Pttaxrate'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Pttaxrate'))) ;?> <?php echo $model->idpttaxrate; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>