<?php
$this->breadcrumbs=array(
	Yii::t('application','Fddemandreceipts')=>array('index'),
	Yii::t('application', $model->idfddemandreceipt),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Fddemandreceipt'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Fddemandreceipt'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Fddemandreceipt'))), 'url'=>array('update', 'id'=>$model->idfddemandreceipt)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Fddemandreceipt'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idfddemandreceipt),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Fddemandreceipt'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Fddemandreceipt'))) . ' #' . $model->idfddemandreceipt;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idfddemandreceipt',
		'demanddate',
		'idccdepartment',
		'demandnumber',
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
	),
)); ?>
