<?php
$this->breadcrumbs=array(
	Yii::t('application','Hremployeebasics')=>array('index'),
	Yii::t('application', $model->idhremployeebasic),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Hremployeebasic'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Hremployeebasic'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Hremployeebasic'))), 'url'=>array('update', 'id'=>$model->idhremployeebasic)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Hremployeebasic'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idhremployeebasic),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Hremployeebasic'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Hremployeebasic'))) . ' #' . $model->idhremployeebasic;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		//'idhremployeebasic',
		'idhremployee',
		'orderno',
		'orderdate',
		'idhrpost',
		'salaryapplifrom',
		'nextincrement',
		'idccward',
		'workingplace',
		'workingshift',
		'bankaccountno',
		'bankname',
		'bankaddress',
		'bankifsccode',
		'actualbasic',
		'basicless',
		'isworker',
		'issuspend',
		'isondeputation',
		'isnewpayscale',
		'newpayscaledate',
		'pfopening',
		'pfloanopening',
		'filenumber',
		'ispensiongiven',
		'pensionstartdate',
		'pensionstopdate',
		'pensionstopreason',
		'narration',
	),
)); ?>
