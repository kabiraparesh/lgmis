<?php
$this->breadcrumbs=array(
	Yii::t('application','Bpusagetypes')=>array('index'),
	Yii::t('application',$model->idbpusagetype)=>array('view','id'=>$model->idbpusagetype),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Bpusagetype'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Bpusagetype'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Bpusagetype'))), 'url'=>array('view', 'id'=>$model->idbpusagetype)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Bpusagetype'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Bpusagetype'))) ;?> <?php echo $model->idbpusagetype; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>