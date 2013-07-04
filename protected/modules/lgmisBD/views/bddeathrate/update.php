<?php
$this->breadcrumbs=array(
	Yii::t('application','Bddeathrates')=>array('index'),
	Yii::t('application',$model->idbddeathrate)=>array('view','id'=>$model->idbddeathrate),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Bddeathrate'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Bddeathrate'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Bddeathrate'))), 'url'=>array('view', 'id'=>$model->idbddeathrate)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Bddeathrate'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Bddeathrate'))) ;?> <?php echo $model->idbddeathrate; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>