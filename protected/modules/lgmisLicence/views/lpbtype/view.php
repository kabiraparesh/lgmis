<?php
$this->breadcrumbs=array(
	Yii::t('application','Lpbtypes')=>array('index'),
	Yii::t('application', $model->idlpbtype),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Lpbtype'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Lpbtype'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Lpbtype'))), 'url'=>array('update', 'id'=>$model->idlpbtype)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Lpbtype'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idlpbtype),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Lpbtype'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Lpbtype'))) . ' #' . $model->idlpbtype;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idlpbtype',
		'btype',
	),
)); ?>
