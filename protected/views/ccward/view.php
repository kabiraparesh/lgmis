<?php
$this->breadcrumbs=array(
	Yii::t('application','Ccwards')=>array('index'),
	Yii::t('application', $model->idccward),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Ccward'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Ccward'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Ccward'))), 'url'=>array('update', 'id'=>$model->idccward)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Ccward'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idccward),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Ccward'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Ccward'))) . ' #' . $model->idccward;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idccward',
		'wardname',
		'idcczone',
	),
)); ?>
