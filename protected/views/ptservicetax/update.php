<?php
$this->breadcrumbs=array(
	Yii::t('application','Ptservicetaxes')=>array('index'),
	Yii::t('application',$model->idptservicetax)=>array('view','id'=>$model->idptservicetax),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Ptservicetax'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Ptservicetax'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Ptservicetax'))), 'url'=>array('view', 'id'=>$model->idptservicetax)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Ptservicetax'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Ptservicetax'))) ;?> <?php echo $model->idptservicetax; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>