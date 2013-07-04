
<?php
$this->breadcrumbs=array(
	Yii::t('application', 'Pttransactions')=>array('index'),
	Yii::t('application', 'Manage'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Pttransaction'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Pttransaction'))), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('pttransaction-grid', {
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
	'id'=>'pttransaction-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idpttransaction',
		'idptmaster',
		/*
		'idccfyear',
		'oldpropertytax',
		'oldservicetax',
		'oldminsamekittax',
		'oldsamekittax',
		'oldwaterpttax',
		'oldeducess',
		'oldsubcess1',
		'oldsubcess2',
		'oldpttaxdiscount',
		'oldpttaxsurcharge',
		'propertytax',
		'servicetax',
		'minsamekittax',
		'samekittax',
		'waterpttax',
		'educess',
		'subcess1',
		'subcess2',
		'pttaxdiscount',
		'pttaxsurcharge',
		'resbhada',
		'combhada',
		'rentbhada',
		'resbhadadis',
		'combhadadis',
		'rentbhadadis',
		'resbhadaothdis',
		'combhadaothdis',
		'rentbhadaothdis',
		'resbhada12kdis',
		'combhada12kdis',
		'rentbhada12kdis',
		'respttax',
		'compttax',
		'rentpttax',
		'resptselfdis',
		'comptselfdis',
		'rentptselfdis',
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
