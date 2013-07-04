<?php
$this->breadcrumbs=array(
	Yii::t('application','Rpdemandreceipts')=>array('index'),
	Yii::t('application', $model->idrpdemandreceipt),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Rpdemandreceipt'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Rpdemandreceipt'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Rpdemandreceipt'))), 'url'=>array('update', 'id'=>$model->idrpdemandreceipt)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Rpdemandreceipt'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idrpdemandreceipt),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Rpdemandreceipt'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Rpdemandreceipt'))) . ' #' . $model->idrpdemandreceipt;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idrpdemandreceipt',
		'demanddate',
		'idccdepartment',
		'idrpdemand',
		'demandinname',
		'demandamount',
		'amountpaid',
		'paymenttype',
		'chequeddpayorderno',
		'chequeddpayorderdate',
		'bankname',
		'branchname',
		'windowno',
		'username',
		'receiptbookno',
		'receiptno',
		'details',
		'narration',
	),
)); ?>
