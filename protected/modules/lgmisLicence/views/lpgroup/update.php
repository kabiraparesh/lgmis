<?php
$this->breadcrumbs=array(
	Yii::t('application','Lpgroups')=>array('index'),
	Yii::t('application',$model->idlpgroup)=>array('view','id'=>$model->idlpgroup),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Lpgroup'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Lpgroup'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Lpgroup'))), 'url'=>array('view', 'id'=>$model->idlpgroup)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Lpgroup'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Lpgroup'))) ;?> <?php echo $model->idlpgroup; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>