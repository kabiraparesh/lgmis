<?php
$this->breadcrumbs=array(
	Yii::t('application','Rpmarkets')=>array('index'),
	Yii::t('application', $model->idrpmarket),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Rpmarket'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Rpmarket'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Rpmarket'))), 'url'=>array('update', 'id'=>$model->idrpmarket)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Rpmarket'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idrpmarket),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Rpmarket'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Rpmarket'))) . ' #' . $model->idrpmarket;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		//'idrpmarket',
		'mktname',
		'idcccolony',
		'idrplocation',
		'idccbillingperiod',
	),
)); ?>
