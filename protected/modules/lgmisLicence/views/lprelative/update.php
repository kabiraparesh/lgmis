<?php
$this->breadcrumbs=array(
	Yii::t('application','Lprelatives')=>array('index'),
	Yii::t('application',$model->idlprelative)=>array('view','id'=>$model->idlprelative),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Lprelative'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Lprelative'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Lprelative'))), 'url'=>array('view', 'id'=>$model->idlprelative)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Lprelative'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Lprelative'))) ;?> <?php echo $model->idlprelative; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>