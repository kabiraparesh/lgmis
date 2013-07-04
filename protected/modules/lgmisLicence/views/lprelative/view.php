<?php
$this->breadcrumbs=array(
	Yii::t('application','Lprelatives')=>array('index'),
	Yii::t('application', $model->idlprelative),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Lprelative'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Lprelative'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Lprelative'))), 'url'=>array('update', 'id'=>$model->idlprelative)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Lprelative'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idlprelative),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Lprelative'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Lprelative'))) . ' #' . $model->idlprelative;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idlprelative',
		'relativename',
		'relativeage',
		'idccsex',
		'idccrelation',
		'idlpapplicant',
	),
)); ?>
