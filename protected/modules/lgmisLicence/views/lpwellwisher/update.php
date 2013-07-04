<?php
$this->breadcrumbs=array(
	Yii::t('application','Lpwellwishers')=>array('index'),
	Yii::t('application',$model->idwellwisher)=>array('view','id'=>$model->idwellwisher),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Lpwellwisher'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Lpwellwisher'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Lpwellwisher'))), 'url'=>array('view', 'id'=>$model->idwellwisher)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Lpwellwisher'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Lpwellwisher'))) ;?> <?php echo $model->idwellwisher; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>