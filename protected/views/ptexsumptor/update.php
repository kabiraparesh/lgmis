<?php
$this->breadcrumbs=array(
	Yii::t('application','Ptexsumptors')=>array('index'),
	Yii::t('application',$model->idptexsumptor)=>array('view','id'=>$model->idptexsumptor),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Ptexsumptor'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Ptexsumptor'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Ptexsumptor'))), 'url'=>array('view', 'id'=>$model->idptexsumptor)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Ptexsumptor'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Ptexsumptor'))) ;?> <?php echo $model->idptexsumptor; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>