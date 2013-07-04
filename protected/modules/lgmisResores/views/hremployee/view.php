<?php
$this->breadcrumbs=array(
	Yii::t('application','Hremployees')=>array('index'),
	Yii::t('application', $model->idhremployee),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Hremployee'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Hremployee'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Hremployee'))), 'url'=>array('update', 'id'=>$model->idhremployee)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Hremployee'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idhremployee),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Hremployee'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Hremployee'))) . ' #' . $model->idhremployee;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
	'data'=>$model,
	'attributes'=>array(
		//'idhremployee',
		'empname',
		'fathername',
		'empdob',
		'idccsex',
		'idccreligion',
		'idcccategory',
		'presentaddress1',
		'presentaddress2',
		'presentcity',
		'presentphone',
		'email',
		'documenttype',
		'peraddress1',
		'peraddress2',
		'percity',
		'perphone',
		'mobileno',
		'mothername',
		'joiningdate',
		'retiredate',
		'identificationmark',
		'maritalstatus',
		'height',
		'weight',
		'gpfno',
		'scstdetail',
		'handicap',
		'fingerprints',
		'employeephoto',
		'employeesign',
	),
)); ?>
