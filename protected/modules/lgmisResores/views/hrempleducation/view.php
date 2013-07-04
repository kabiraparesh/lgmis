<?php
$this->breadcrumbs=array(
	Yii::t('application','Hrempleducations')=>array('index'),
	Yii::t('application', $model->idhrempleducation),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Hrempleducation'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Hrempleducation'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Hrempleducation'))), 'url'=>array('update', 'id'=>$model->idhrempleducation)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Hrempleducation'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idhrempleducation),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Hrempleducation'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Hrempleducation'))) . ' #' . $model->idhrempleducation;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idhrempleducation',
		'idhremployee',
		'examination',
		'examyear',
		'examsubjects',
		'examdivision',
		'boarduniversity',
	),
)); ?>
