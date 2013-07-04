<?php
$this->breadcrumbs=array(
	Yii::t('application','Rcshops')=>array('index'),
	Yii::t('application',$model->idrcshop)=>array('view','id'=>$model->idrcshop),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Rcshop'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Rcshop'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Rcshop'))), 'url'=>array('view', 'id'=>$model->idrcshop)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Rcshop'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Rcshop'))) ;?> <?php echo $model->idrcshop; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>