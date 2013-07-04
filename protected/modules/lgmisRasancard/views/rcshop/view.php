<?php
$this->breadcrumbs=array(
	Yii::t('application','Rcshops')=>array('index'),
	Yii::t('application', $model->idrcshop),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Rcshop'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Rcshop'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Rcshop'))), 'url'=>array('update', 'id'=>$model->idrcshop)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Rcshop'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idrcshop),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Rcshop'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Rcshop'))) . ' #' . $model->idrcshop;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idrcshop',
		'sname',
		'idccward',
		'saddress',
		'owname',
		'owaddress',
		'sphone',
		'owphone',
		'sdate',
		'edate',
	),
)); ?>
