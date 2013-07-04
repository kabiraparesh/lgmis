<?php
$this->breadcrumbs=array(
	Yii::t('application','Bpapplications')=>array('index'),
	Yii::t('application', $model->idbpapplication),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Bpapplication'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Bpapplication'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Bpapplication'))), 'url'=>array('update', 'id'=>$model->idbpapplication)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Bpapplication'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idbpapplication),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Bpapplication'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Bpapplication'))) . ' #' . $model->idbpapplication;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		//'idbpapplication',
		'applicantname',
		'applicantaddress',
		'plotstatus',
		'idbpusagetype',
		'idnewbpusagetype',
		'newconstructionarea',
		'groundfloorarea',
		'firstfloorarea',
		'secondfloorarea',
		'abovethirdbasement',
		'earthqcertificate',
		'registrycopy',
		'khasaramap',
		'blueprint',
		'applicationdate',
		'caseno',
		'otherdetails',
		'idccfyear',
		'idccstatus',
		'permissiondate',
	),
)); ?>
