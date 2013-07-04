<?php
$this->breadcrumbs=array(
	Yii::t('application','Cccolonies')=>array('index'),
	Yii::t('application', $model->idcccolony),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Cccolony'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Cccolony'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Cccolony'))), 'url'=>array('update', 'id'=>$model->idcccolony)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Cccolony'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idcccolony),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Cccolony'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Cccolony'))) . ' #' . $model->idcccolony;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idcccolony',
		'colonyname',
		'idccward',
	),
)); ?>
