<?php
$this->breadcrumbs=array(
	Yii::t('application','Pttaxrates')=>array('index'),
	Yii::t('application', $model->idpttaxrate),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Pttaxrate'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Pttaxrate'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Pttaxrate'))), 'url'=>array('update', 'id'=>$model->idpttaxrate)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Pttaxrate'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idpttaxrate),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Pttaxrate'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Pttaxrate'))) . ' #' . $model->idpttaxrate;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idpttaxrate',
		'permanentdiscount',
		'otherdiscount',
		'discount12k',
		'pttaxrate',
		'selfusediscount',
		'panelty',
		'minsamekittax',
		'samekittax',
		'waterpttax',
		'educess',
		'subcess1',
		'subcess2',
		'pttaxdiscount',
		'pttaxsurcharge',
		'idccfyear',
	),
)); ?>
