<?php
$this->breadcrumbs=array(
	Yii::t('application','Hrleavesettings')=>array('index'),
	Yii::t('application', $model->idhrleavesetting),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Hrleavesetting'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Hrleavesetting'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Hrleavesetting'))), 'url'=>array('update', 'id'=>$model->idhrleavesetting)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Hrleavesetting'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idhrleavesetting),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Hrleavesetting'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Hrleavesetting'))) . ' #' . $model->idhrleavesetting;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		//'idhrleavesetting',
		'casualleave',
		'medicalleave',
		'paidleave',
		'otherleave',
		'idccfyear',
		'earnedleave',
	),
)); ?>
