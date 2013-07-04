<?php
$this->breadcrumbs=array(
	Yii::t('application','Lpapplicants')=>array('index'),
	Yii::t('application',$model->idlpapplicant)=>array('view','id'=>$model->idlpapplicant),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Lpapplicant'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Lpapplicant'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Lpapplicant'))), 'url'=>array('view', 'id'=>$model->idlpapplicant)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Lpapplicant'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Lpapplicant'))) ;?> <?php echo $model->idlpapplicant; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>