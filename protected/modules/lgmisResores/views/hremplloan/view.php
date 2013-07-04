<?php
$this->breadcrumbs=array(
	Yii::t('application','Hremplloans')=>array('index'),
	Yii::t('application', $model->idhremplloan),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Hremplloan'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Hremplloan'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Hremplloan'))), 'url'=>array('update', 'id'=>$model->idhremplloan)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Hremplloan'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idhremplloan),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Hremplloan'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Hremplloan'))) . ' #' . $model->idhremplloan;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idhremplloan',
		'idhremployee',
		'loannumber',
		'loandate',
		'loanamount',
		'installmentamt',
		'installmentstartdate',
		'installmentenddate',
		'loantype',
		'loanaccountno',
		'loanbankname',
		'loannarration',
	),
)); ?>
