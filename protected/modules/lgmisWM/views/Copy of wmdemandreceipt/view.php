<?php
/* @var $this WmdemandreceiptController */
/* @var $model Wmdemandreceipt */

$this->breadcrumbs=array(
	'Wmdemandreceipts'=>array('index'),
	$model->idwmdemandreceipt,
);

$this->menu=array(
	array('label'=>'List Wmdemandreceipt', 'url'=>array('index')),
	array('label'=>'Create Wmdemandreceipt', 'url'=>array('create')),
	array('label'=>'Update Wmdemandreceipt', 'url'=>array('update', 'id'=>$model->idwmdemandreceipt)),
	array('label'=>'Delete Wmdemandreceipt', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idwmdemandreceipt),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Wmdemandreceipt', 'url'=>array('admin')),
);
?>

<h1><?php echo LgmisWMModule::t('View {title}', array('{title}'=>LgmisWMModule::t('Wmdemandreceipt'))) . ' #' . $model->idwmdemandreceipt;?></h1>

<?php $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idwmdemandreceipt',
		'demanddate',
		'idccdepartment',
		'idwmdemand',
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
	),
)); ?>
