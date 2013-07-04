
<?php
if (Yii::app()->request->isAjaxRequest) {
    Yii::app()->clientscript->scriptMap['jquery.js'] = false;
    Yii::app()->clientscript->scriptMap['jquery-ui.min.js'] = false;
    Yii::app()->clientscript->scriptMap['jquery.yiigridview.js'] = false;
}
?>

<?php
$this->breadcrumbs=array(
	Yii::t('application', 'Ptmasters')=>array('index'),
	Yii::t('application', 'Manage'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Ptmaster'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Ptmaster'))), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('ptmaster-grid', {
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
	'id'=>'ptmaster-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idptmaster',
		'caseno',
		/*
		'idccward',
		'idpttype',
		'ownername',
		'owneraddress',
		'propertyno',
		'propertyaddress',
		'constyear',
		'transferbreakup',
		'trashed',
		'ledgerno',
		'idcccolony',
		'idptrange',
		'idptpropertyon',
		'propertytax',
		'idptservicetax',
		'idptexsumtors',
		'propertydetails',
		'idccsex',
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
