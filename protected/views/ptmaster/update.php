<?php
$this->breadcrumbs=array(
	Yii::t('application','Ptmasters')=>array('index'),
	Yii::t('application',$model->idptmaster)=>array('view','id'=>$model->idptmaster),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Ptmaster'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Ptmaster'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Ptmaster'))), 'url'=>array('view', 'id'=>$model->idptmaster)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Ptmaster'))), 'url'=>array('admin')),
);
?>

<h1><?php //echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Ptmaster'))) ;?> <?php //echo $model->idptmaster; ?> </h1>
<?php
$this->setPageTitle(Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Ptmaster'))) . ' ' . $model->idptmaster);
?>
<?php //echo $this->renderPartial('_form', array('model'=>$model)); ?>
<?php //echo $this->renderPartial('_form', array('model'=>$model, 'dataProvider' => $dataProvider), true, true); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model, 'dataProvider' => $dataProvider)); ?>

