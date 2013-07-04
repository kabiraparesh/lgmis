<?php
$this->breadcrumbs=array(
	Yii::t('application','Rpshops')=>array('index'),
	Yii::t('application', $model->idrpshop),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Rpshop'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Rpshop'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Rpshop'))), 'url'=>array('update', 'id'=>$model->idrpshop)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Rpshop'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idrpshop),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Rpshop'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Rpshop'))) . ' #' . $model->idrpshop;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idrpshop',
		'shopno',
		'shopname',
		'address',
		'idrpmarket',
		'idrprange',
		'monthlyrent',
		'monthlysurcharge',
	),
)); ?>
