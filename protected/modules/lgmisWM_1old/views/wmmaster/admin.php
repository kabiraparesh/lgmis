<?php
/* @var $this WmmasterController */
/* @var $model Wmmaster */

$this->setPageTitle(LgmisWMModule::t('Wmmaster'));

Yii::app()->clientScript->registerScript('search', "
$('.wmmaster-search-button').click(function(){
	$('.wmmaster-search-form').toggle();
	return false;
});
$('.wmmaster-search-form form').submit(function(){
	$.fn.yiiGridView.update('wmmaster-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php echo CHtml::link(LgmisWMModule::t('Advanced Search'),'#',array('class'=>'wmmaster-search-button')); ?>
<div class="wmmaster-search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('ext.IDAdminSkinGrid.IDAdminSkinGrid', array(
	'id'=>'wmmaster',
        'title' => LgmisWMModule::t('Wmmaster'),
	'dataProvider'=>$model->search(),
	'filter'=>$model,
        'dlgWidth'=>740,
        'dlgHeight'=>560,
	'columns'=>array(
                array(
                    'class' => 'CCheckBoxColumn',
                ),
		'idwmmaster',
                array(
                    'name' => 'idccfyear',
                    'header' => LgmisWMModule::t('Ccfyear'),
                    'value' => '$data->idccfyear0->fyear',
                    'type' => 'raw',
                    'filter' => CHtml::listData(Ccfyear::model()->findAll(), 'idccfyear', 'fyear'),
                ),
		'wmappdate',
		'ownername',
		'idptmaster',
                array(
                    'name' => 'idwmtype',
                    'header' => LgmisWMModule::t('Wmtype'),
                    'value' => '$data->idwmtype0->wmtype',
                    'type' => 'raw',
                    'filter' => CHtml::listData(Wmtype::model()->findAll(), 'idwmtype', 'wmtype'),
                ),
		/*
                array(
                    'name' => 'idwmsize',
                    'header' => LgmisWMModule::t('Wmsize'),
                    'value' => '$data->idwmsize0->wmsize',
                    'type' => 'raw',
                    'filter' => CHtml::listData(Wmsize::model()->findAll(), 'idwmsize', 'wmsize'),
                ),
		'wmtape',
                array(
                    'name' => 'idwmplumber',
                    'header' => LgmisWMModule::t('Wmplumber'),
                    'value' => '$data->idwmplumber0->plumbername',
                    'type' => 'raw',
                    'filter' => CHtml::listData(Wmplumber::model()->findAll(), 'idwmplumber', 'plumbername'),
                ),
                array(
                    'name' => 'idccstatus',
                    'header' => LgmisWMModule::t('Ccstatus'),
                    'value' => '$data->idccstatus0->statusname',
                    'type' => 'raw',
                    'filter' => CHtml::listData(Ccstatus::model()->findAll(), 'idccstatus', 'statusname'),
                ),
		'mainlindia',
		'mainlindis',
		'wmdetails',
		'wmmasterflag',
                array(
                    'name' => 'idwmexsumptor',
                    'header' => LgmisWMModule::t('Wmexsumptor'),
                    'value' => '$data->idwmexsumptor0->exsumptortype',
                    'type' => 'raw',
                    'filter' => CHtml::listData(Wmexsumptor::model()->findAll(), 'idwmexsumptor', 'exsumptortype'),
                ),
		'params',
		*/
	),
)); ?>
