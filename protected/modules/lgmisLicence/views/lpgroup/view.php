<?php
$this->breadcrumbs=array(
	Yii::t('application','Lpgroups')=>array('index'),
	Yii::t('application', $model->idlpgroup),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Lpgroup'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Lpgroup'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Lpgroup'))), 'url'=>array('update', 'id'=>$model->idlpgroup)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Lpgroup'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idlpgroup),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Lpgroup'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Lpgroup'))) . ' #' . $model->idlpgroup;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idlpgroup',
		'lpgroup',
	),
)); ?>
