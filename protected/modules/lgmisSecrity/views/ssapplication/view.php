<?php
$this->breadcrumbs=array(
	Yii::t('application','Ssapplications')=>array('index'),
	Yii::t('application', $model->name),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Ssapplication'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Ssapplication'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Ssapplication'))), 'url'=>array('update', 'id'=>$model->idssapplication)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Ssapplication'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idssapplication),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Ssapplication'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Ssapplication'))) . ' #' . $model->idssapplication;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idssapplication',
		'type',
		'name',
		'fhname',
		'markident',
		'dob',
		'idcccategory',
		'remmitaddress',
		'permanentadd',
		'domicileadd',
		'yearreskling',
		'monincome',
		'immproperty',
		'presentresiding',
		'bornresiding',
		'incometax',
		'servicedetail',
		'pansionreceipt',
		'nationnality',
		'idccsex',
		'dodhusband',
		'freedomfighter',
		'addfreedfighter',
		'idccstatus',
		'bankbranch',
		'bankaccountno',
		'ifsccode',
		'documentssubmit',
	),
)); ?>
