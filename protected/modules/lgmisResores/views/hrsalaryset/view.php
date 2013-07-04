<?php
$this->breadcrumbs=array(
	Yii::t('application','Hrsalarysets')=>array('index'),
	Yii::t('application', $model->idhrsalaryset),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Hrsalaryset'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Hrsalaryset'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Hrsalaryset'))), 'url'=>array('update', 'id'=>$model->idhrsalaryset)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Hrsalaryset'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idhrsalaryset),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Hrsalaryset'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Hrsalaryset'))) . ' #' . $model->idhrsalaryset;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		//'idhrsalaryset',
		'idccfyear',
		'dafix',
		'da',
		'hra',
		'ca',
		'cca',
		'specialpay',
		'wa',
		'pf',
		'ir',
		'dpf',
		'lpf',
		'fa',
		'ga',
		'gpf',
		'hrent',
		'wrent',
		'fbs',
		'scst',
	),
)); ?>
