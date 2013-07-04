<?php
$this->breadcrumbs=array(
	Yii::t('application','Lpwellwishers')=>array('index'),
	Yii::t('application', $model->idwellwisher),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Lpwellwisher'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Lpwellwisher'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Lpwellwisher'))), 'url'=>array('update', 'id'=>$model->idwellwisher)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Lpwellwisher'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idwellwisher),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Lpwellwisher'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Lpwellwisher'))) . ' #' . $model->idwellwisher;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idwellwisher',
		'wishername',
		'wisherage',
		'idccsex',
		'wisheraddress',
		'idlpapplicant',
		'wishercontact',
	),
)); ?>
