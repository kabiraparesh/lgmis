<?php
$this->breadcrumbs=array(
	Yii::t('application','Rcfamdetails')=>array('index'),
	Yii::t('application', $model->name),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Rcfamdetail'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Rcfamdetail'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Rcfamdetail'))), 'url'=>array('update', 'id'=>$model->idrcfamdetail)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Rcfamdetail'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idrcfamdetail),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Rcfamdetail'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Rcfamdetail'))) . ' #' . $model->idrcfamdetail;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		//'idrcfamdetail',
		'name',
		'age',
		'idccrelation',
		'voterno',
		'hfname',
		'headoffamily',
		'idrcapplication',
	),
)); ?>
