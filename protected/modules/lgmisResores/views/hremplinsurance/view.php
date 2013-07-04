<?php
$this->breadcrumbs=array(
	Yii::t('application','Hremplinsurances')=>array('index'),
	Yii::t('application', $model->idhremplinsurance),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Hremplinsurance'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Hremplinsurance'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Hremplinsurance'))), 'url'=>array('update', 'id'=>$model->idhremplinsurance)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Hremplinsurance'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idhremplinsurance),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Hremplinsurance'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Hremplinsurance'))) . ' #' . $model->idhremplinsurance;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idhremplinsurance',
		'idhremployee',
		'policynumber',
		'policydate',
		'policyamount',
		'policyinstallment',
		'totalpremium',
		'premiumstartdate',
		'premiumenddate',
		'insurancenarration',
	),
)); ?>
