<?php
$this->breadcrumbs=array(
	Yii::t('application','Hremplearnleaves')=>array('index'),
	Yii::t('application', $model->idhremplearnleave),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Hremplearnleave'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Hremplearnleave'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Hremplearnleave'))), 'url'=>array('update', 'id'=>$model->idhremplearnleave)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Hremplearnleave'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idhremplearnleave),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Hremplearnleave'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Hremplearnleave'))) . ' #' . $model->idhremplearnleave;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		//'idhremplearnleave',
		'idhremployee',
		'earnedleaveno',
		'earnedleavedate',
		'earnedleavestartmonth',
		'earnedleaveendmonth',
		'earnedleave',
		'earnedleavepayment',
		'givenamount',
		'earnedleavenarration',
	),
)); ?>
