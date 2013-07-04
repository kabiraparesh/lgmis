<?php
$this->breadcrumbs=array(
	Yii::t('application','Lplicencies')=>array('index'),
	Yii::t('application', $model->idlplicency),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Lplicency'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Lplicency'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Lplicency'))), 'url'=>array('update', 'id'=>$model->idlplicency)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Lplicency'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idlplicency),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Lplicency'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Lplicency'))) . ' #' . $model->idlplicency;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idlplicency',
		'licencyname',
		'licencyage',
		'idccsex',
		'licencyaddress',
		'idlpapplicant',
		'licencycontact',
	),
)); ?>
