<?php
/* @var $this WmdemandController */
/* @var $model Wmdemand */

$this->setPageTitle(LgmisWMModule::t('Wmdemand'));

Yii::app()->clientScript->registerScript('search', "
$('.wmdemand-search-button').click(function(){
	$('.wmdemand-search-form').toggle();
	return false;
});
$('.wmdemand-search-form form').submit(function(){
	$.fn.yiiGridView.update('wmdemand-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php echo CHtml::link(LgmisWMModule::t('Advanced Search'),'#',array('class'=>'wmdemand-search-button')); ?>
<div class="wmdemand-search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('ext.IDAdminSkinGrid.IDAdminSkinGrid', array(
	'id'=>'wmdemand',
    'title'=>LgmisWMModule::t('Wmdemand'),
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
                array(
                    'class' => 'CCheckBoxColumn',
                ),
		'idwmdemand',
                array(
                    'name' => 'idwmmaster',
                    'header' => LgmisWMModule::t('Wmmaster'),
                    'value' => '$data->idwmmaster0->saralno',
                    'type' => 'raw',
                    'filter' => CHtml::listData(Wmmaster::model()->findAll(), 'idwmmaster', 'saralno'),
                ),
                array(
                    'name' => 'idccfyear',
                    'header' => LgmisWMModule::t('Ccfyear'),
                    'value' => '$data->idccfyear0->fyear',
                    'type' => 'raw',
                    'filter' => CHtml::listData(Ccfyear::model()->findAll(), 'idccfyear', 'fyear'),
                ),
		'period',
		'wmoldbalance',
		'wmsurcharge',
		/*
		'wmdemandamt',
		'wmdemanddate',
		*/
	),
)); ?>
