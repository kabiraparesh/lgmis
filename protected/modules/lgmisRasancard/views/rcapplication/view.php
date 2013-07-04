<?php
$this->breadcrumbs=array(
	Yii::t('application','Rcapplications')=>array('index'),
	Yii::t('application', $model->idrcapplication),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Rcapplication'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Rcapplication'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Rcapplication'))), 'url'=>array('update', 'id'=>$model->idrcapplication)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Rcapplication'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idrcapplication),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Rcapplication'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Rcapplication'))) . ' #' . $model->idrcapplication;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idrcapplication',
		'adate',
		'propertyno',
		'aname',
		'aaddress',
		'idccward',
		'livingfrom',
		'idccoccupation',
		'idccreligion',
		'idcccategory',
		'idccbpl',
		'idrccolor',
		'idccstatus',
		'reqdoc',
		'idfddemandreceipt',
		'idrcshop',
		'csdate',
		'idrcfamdetail',
	),
)); ?>
