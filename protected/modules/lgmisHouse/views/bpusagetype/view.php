<?php
$this->breadcrumbs=array(
	Yii::t('application','Bpusagetypes')=>array('index'),
	Yii::t('application', $model->idbpusagetype),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Bpusagetype'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Bpusagetype'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Bpusagetype'))), 'url'=>array('update', 'id'=>$model->idbpusagetype)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Bpusagetype'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idbpusagetype),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Bpusagetype'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Bpusagetype'))) . ' #' . $model->idbpusagetype;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idbpusagetype',
		'usagetype',
		'description',
	),
)); ?>
