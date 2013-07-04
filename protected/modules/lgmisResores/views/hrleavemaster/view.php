<?php
$this->breadcrumbs=array(
	Yii::t('application','Hrleavemasters')=>array('index'),
	Yii::t('application', $model->idhrleavemaster),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Hrleavemaster'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Hrleavemaster'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Hrleavemaster'))), 'url'=>array('update', 'id'=>$model->idhrleavemaster)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Hrleavemaster'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idhrleavemaster),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Hrleavemaster'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Hrleavemaster'))) . ' #' . $model->idhrleavemaster;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idhrleavemaster',
		'idhremployee',
		'foryear',
		'formonth',
		'workingdays',
		'attendence',
		'casualleave',
		'medicalleave',
		'paidleave',
		'otherleave',
		'idccfyear',
		'earnedleave',
	),
)); ?>
