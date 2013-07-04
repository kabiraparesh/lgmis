<?php
$this->breadcrumbs=array(
	Yii::t('application','Cccolonies')=>array('index'),
	Yii::t('application',$model->idcccolony)=>array('view','id'=>$model->idcccolony),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Cccolony'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Cccolony'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Cccolony'))), 'url'=>array('view', 'id'=>$model->idcccolony)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Cccolony'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Cccolony'))) ;?> <?php echo $model->idcccolony; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>