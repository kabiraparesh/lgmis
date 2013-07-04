<?php
$this->breadcrumbs=array(
	Yii::t('application','Ssschemes')=>array('index'),
	Yii::t('application', $model->name),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Ssscheme'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Ssscheme'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Ssscheme'))), 'url'=>array('update', 'id'=>$model->idssscheme)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Ssscheme'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idssscheme),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Ssscheme'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Ssscheme'))) . ' #' . $model->idssscheme;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idssscheme',
		'name',
		'idcccategory',
		'idccoccupation',
		'sponseredby',
		'department',
		'benefictiories',
		'eligcriteria',
		'validity',
		'otherbenefit',
		'idssgrant',
	),
)); ?>
