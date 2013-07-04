<?php
$this->breadcrumbs=array(
	Yii::t('application','Bdbirthinformers')=>array('index'),
	Yii::t('application', $model->idbdbirthinformer),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Bdbirthinformer'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Bdbirthinformer'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Bdbirthinformer'))), 'url'=>array('update', 'id'=>$model->idbdbirthinformer)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Bdbirthinformer'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idbdbirthinformer),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Bdbirthinformer'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Bdbirthinformer'))) . ' #' . $model->idbdbirthinformer;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idbdbirthinformer',
		'informername',
		'informeraddress',
		'childname',
		'dob',
		'timeofbirth',
		'idccsex',
		'fathername',
		'fathereducation',
		'mothername',
		'idccreligion',
		'motheroccupation',
		'fatheroccupation',
		'deliverymethod',
		'birthplace',
	),
)); ?>
