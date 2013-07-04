<?php
$this->breadcrumbs=array(
	Yii::t('application','Ptexsumptors')=>array('index'),
	Yii::t('application', $model->idptexsumptor),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Ptexsumptor'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Ptexsumptor'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Ptexsumptor'))), 'url'=>array('update', 'id'=>$model->idptexsumptor)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Ptexsumptor'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idptexsumptor),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Ptexsumptor'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Ptexsumptor'))) . ' #' . $model->idptexsumptor;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idptexsumptor',
		'type',
		'rebate',
	),
)); ?>
