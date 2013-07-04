<?php
$this->breadcrumbs=array(
	Yii::t('application','Cmcomplaints')=>array('index'),
	Yii::t('application',$model->idcmcomplaint)=>array('view','id'=>$model->idcmcomplaint),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Cmcomplaint'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Cmcomplaint'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Cmcomplaint'))), 'url'=>array('view', 'id'=>$model->idcmcomplaint)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Cmcomplaint'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Cmcomplaint'))) ;?> <?php echo $model->idcmcomplaint; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>