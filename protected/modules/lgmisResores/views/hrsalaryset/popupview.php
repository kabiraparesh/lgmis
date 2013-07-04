
<?php
$this->breadcrumbs=array(
	Yii::t('application', 'Hrsalarysets')=>array('index'),
	Yii::t('application', 'Manage'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Hrsalaryset'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Hrsalaryset'))), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('hrsalaryset-grid', {
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
	'id'=>'hrsalaryset-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idhrsalaryset',
		'idccfyear',
		/*
		'dafix',
		'da',
		'hra',
		'ca',
		'cca',
		'specialpay',
		'wa',
		'pf',
		'ir',
		'dpf',
		'lpf',
		'fa',
		'ga',
		'gpf',
		'hrent',
		'wrent',
		'fbs',
		'scst',
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
