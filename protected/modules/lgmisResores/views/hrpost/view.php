<?php
$this->breadcrumbs=array(
	Yii::t('application','Hrposts')=>array('index'),
	Yii::t('application', $model->idhrpost),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Hrpost'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Hrpost'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Hrpost'))), 'url'=>array('update', 'id'=>$model->idhrpost)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Hrpost'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idhrpost),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Hrpost'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Hrpost'))) . ' #' . $model->idhrpost;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		//'idhrpost',
		'postname',
		'idccdepartment',
		'idhrcategory',
		'idhrclass',
		'idhrbasic',
	),
)); ?>
