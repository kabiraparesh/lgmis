<?php
$this->breadcrumbs=array(
	Yii::t('application','Hrbasics')=>array('index'),
	Yii::t('application', $model->idhrbasic),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Hrbasic'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Hrbasic'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Hrbasic'))), 'url'=>array('update', 'id'=>$model->idhrbasic)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Hrbasic'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idhrbasic),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Hrbasic'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Hrbasic'))) . ' #' . $model->idhrbasic;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		//'idhrbasic',
		'start',
		'increment',
		'endto',
		'display',
	),
)); ?>
