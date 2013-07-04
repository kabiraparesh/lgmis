<?php
$this->breadcrumbs=array(
	Yii::t('application','Ptbhadarates')=>array('index'),
	Yii::t('application',$model->idptbhadarate)=>array('view','id'=>$model->idptbhadarate),
	Yii::t('application','Update'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Ptbhadarate'))), 'url'=>array('index')),
	array('label'=>Yii::t('application','Create {title}', array('{title}'=>Yii::t('application', 'Ptbhadarate'))), 'url'=>array('create')),
        array('label'=>Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Ptbhadarate'))), 'url'=>array('view', 'id'=>$model->idptbhadarate)),
	array('label'=>Yii::t('application','Manage {title}', array('{title}'=>Yii::t('application', 'Ptbhadarate'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'Ptbhadarate'))) ;?> <?php echo $model->idptbhadarate; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>