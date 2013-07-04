<?php
$this->breadcrumbs=array(
	Yii::t('application','Bddeathinformers')=>array('index'),
	Yii::t('application', $model->idbddeathinformer),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Bddeathinformer'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Bddeathinformer'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Bddeathinformer'))), 'url'=>array('update', 'id'=>$model->idbddeathinformer)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Bddeathinformer'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idbddeathinformer),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Bddeathinformer'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Bddeathinformer'))) . ' #' . $model->idbddeathinformer;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idbddeathinformer',
		'informername',
		'informeraddress',
		'personname',
		'dod',
		'timeofdeath',
		'idccsex',
		'fhname',
		'crematorymethod',
		'reasondeath',
		'idccreligion',
		'other',
	),
)); ?>
