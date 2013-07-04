<?php
$this->breadcrumbs=array(
	Yii::t('application','Lpmanadatories')=>array('index'),
	Yii::t('application', $model->idlpmanadatory),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Lpmanadatory'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Lpmanadatory'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Lpmanadatory'))), 'url'=>array('update', 'id'=>$model->idlpmanadatory)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Lpmanadatory'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idlpmanadatory),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Lpmanadatory'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Lpmanadatory'))) . ' #' . $model->idlpmanadatory;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		//'idlpmanadatory',
		'lname',
		'issuedby',
	),
)); ?>
