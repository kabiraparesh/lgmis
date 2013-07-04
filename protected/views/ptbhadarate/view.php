<?php
$this->breadcrumbs=array(
	Yii::t('application','Ptbhadarates')=>array('index'),
	Yii::t('application', $model->idptbhadarate),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Ptbhadarate'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Ptbhadarate'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Ptbhadarate'))), 'url'=>array('update', 'id'=>$model->idptbhadarate)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Ptbhadarate'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idptbhadarate),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Ptbhadarate'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Ptbhadarate'))) . ' #' . $model->idptbhadarate;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idptbhadarate',
		'aresidential',
		'acommercial',
		'bresidential',
		'bcommercial',
		'cresidential',
		'ccommercial',
		'dresidential',
		'dcommercial',
		'idccfyear',
		'idptrange',
		'idptpropertyon',
		'eresidential',
		'ecommercial',
	),
)); ?>
