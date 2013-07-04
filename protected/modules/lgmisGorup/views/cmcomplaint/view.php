<?php
$this->breadcrumbs=array(
	Yii::t('application','Cmcomplaints')=>array('index'),
	Yii::t('application', $model->idcmcomplaint),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Cmcomplaint'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Cmcomplaint'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Cmcomplaint'))), 'url'=>array('update', 'id'=>$model->idcmcomplaint)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Cmcomplaint'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idcmcomplaint),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Cmcomplaint'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Cmcomplaint'))) . ' #' . $model->idcmcomplaint;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		'idcmcomplaint',
		'complaintname',
		'idcmprioritylevel',
		'idccdepartment',
	),
)); ?>
