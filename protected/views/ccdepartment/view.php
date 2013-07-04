<?php
$this->breadcrumbs=array(
	Yii::t('application','Ccdepartments')=>array('index'),
	Yii::t('application', $model->idccdepartment),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Ccdepartment'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Ccdepartment'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Ccdepartment'))), 'url'=>array('update', 'id'=>$model->idccdepartment)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Ccdepartment'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idccdepartment),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Ccdepartment'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Ccdepartment'))) . ' #' . $model->idccdepartment;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idccdepartment',
		'departmentname',
		'departmentcode',
		'demandflag',
	),
)); ?>
