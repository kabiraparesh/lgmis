<?php
$this->breadcrumbs=array(
	Yii::t('application','Lpapplicants')=>array('index'),
	Yii::t('application', $model->idlpapplicant),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Lpapplicant'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Lpapplicant'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Lpapplicant'))), 'url'=>array('update', 'id'=>$model->idlpapplicant)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Lpapplicant'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idlpapplicant),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Lpapplicant'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Lpapplicant'))) . ' #' . $model->idlpapplicant;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idlpapplicant',
		'bussname',
		'bussaddress',
		'idcccolony',
		'idlpbtype',
		'idlpbnature',
		'oldregno',
		'oldlicno',
		'otheroffice',
		'othergodown',
		'otherworkingplace',
		'idlptype',
		'workingyoungm',
		'workingyoungf',
		'workingadultm',
		'workingadultf',
	),
)); ?>
