<?php
$this->breadcrumbs=array(
	Yii::t('application','Rcfamdetails')=>array('index'),
	Yii::t('application',$model->name)=>array('view','id'=>$model->idrcfamdetail),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Rcfamdetail'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Rcfamdetail'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Rcfamdetail'))), 'url'=>array('view', 'id'=>$model->idrcfamdetail)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Rcfamdetail'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Rcfamdetail'))) ;?> <?php echo $model->idrcfamdetail; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>