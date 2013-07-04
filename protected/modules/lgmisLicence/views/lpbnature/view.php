<?php
$this->breadcrumbs=array(
	Yii::t('application','Lpbnatures')=>array('index'),
	Yii::t('application', $model->idlpbnature),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Lpbnature'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Lpbnature'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Lpbnature'))), 'url'=>array('update', 'id'=>$model->idlpbnature)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Lpbnature'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idlpbnature),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Lpbnature'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Lpbnature'))) . ' #' . $model->idlpbnature;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		//'idlpbnature',
		'lpnature',
		'idlpmanadatory',
		'idlpgroup',
	),
)); ?>
