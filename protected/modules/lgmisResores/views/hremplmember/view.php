<?php
$this->breadcrumbs=array(
	Yii::t('application','Hremplmembers')=>array('index'),
	Yii::t('application', $model->idhremplmember),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Hremplmember'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Hremplmember'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Hremplmember'))), 'url'=>array('update', 'id'=>$model->idhremplmember)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Hremplmember'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idhremplmember),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Hremplmember'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Hremplmember'))) . ' #' . $model->idhremplmember;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idhremplmember',
		'membername',
		'memberage',
		'idccsex',
		'idccrelation',
		'issuccessor',
		'idhremployee',
	),
)); ?>
