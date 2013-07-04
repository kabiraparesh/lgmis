
<?php
$this->breadcrumbs=array(
	Yii::t('application', 'Bpapplications')=>array('index'),
	Yii::t('application', 'Manage'),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Bpapplication'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Bpapplication'))), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('bpapplication-grid', {
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
	'id'=>'bpapplication-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idbpapplication',
		'applicantname',
		/*
		'applicantaddress',
		'plotstatus',
		'idbpusagetype',
		'idnewbpusagetype',
		'newconstructionarea',
		'groundfloorarea',
		'firstfloorarea',
		'secondfloorarea',
		'abovethirdbasement',
		'earthqcertificate',
		'registrycopy',
		'khasaramap',
		'blueprint',
		'applicationdate',
		'caseno',
		'otherdetails',
		'idccfyear',
		'idccstatus',
		'permissiondate',
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
