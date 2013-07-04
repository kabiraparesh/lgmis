<?php
$this->breadcrumbs=array(
	Yii::t('application','Cczones')=>array('index'),
	Yii::t('application', $model->idcczone),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Cczone'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Cczone'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Cczone'))), 'url'=>array('update', 'id'=>$model->idcczone)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Cczone'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idcczone),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Cczone'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Cczone'))) . ' #' . $model->idcczone;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idcczone',
		'zonename',
	),
)); ?>
