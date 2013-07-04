<?php
$this->breadcrumbs=array(
	Yii::t('application','Ssnominees')=>array('index'),
	Yii::t('application', $model->name),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Ssnominee'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Ssnominee'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Ssnominee'))), 'url'=>array('update', 'id'=>$model->idssnominee)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Ssnominee'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idssnominee),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Ssnominee'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Ssnominee'))) . ' #' . $model->idssnominee;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idssnominee',
		'name',
		'age',
		'idccrelation',
		'idssapplication',
	),
)); ?>
