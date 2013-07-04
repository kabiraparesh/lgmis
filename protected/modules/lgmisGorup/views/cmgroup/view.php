<?php
$this->breadcrumbs=array(
	Yii::t('application','Cmgroups')=>array('index'),
	Yii::t('application', $model->idcmgroup),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Cmgroup'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Cmgroup'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Cmgroup'))), 'url'=>array('update', 'id'=>$model->idcmgroup)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Cmgroup'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idcmgroup),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Cmgroup'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Cmgroup'))) . ' #' . $model->idcmgroup;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idcmgroup',
		'groupname',
		'idccdepartment',
	),
)); ?>
