
<?php
$this->breadcrumbs=array(
	Yii::t('application', 'Hremployees')=>array('index'),
	Yii::t('application', 'Manage'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Hremployee'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Hremployee'))), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('hremployee-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php echo CHtml::link(Yii::t('application', 'Advanced Search'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('ext.eziiui.widgets.grid.CGridViewUI', array(
	'id'=>'hremployee-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idhremployee',
		'empname',
		/*
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
		*/
//		array(
//			'class'=>'CButtonColumn',
//		),
            array(
                'class' => 'CButtonColumn',
                'template' => '{ok}',
                'buttons' => array
                    (
                    'ok' => array
                        (
                        'label' => 'Select',
                        'imageUrl' => Yii::app()->request->baseUrl . '/images/dialog-ok.png',
                        'click' => 'js: function(){
                                            window.idselected = $(this).parent().parent().children(\':first-child\').text();
                                            $("#dialog-popup-select").dialog("close").destroy();
                                            return false;
                                         }',
                    ),
                ),
            ),
	),
)); ?>
