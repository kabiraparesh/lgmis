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

<script>
function watertaxbillreportCallback(id){
    window.open("<?php echo Yii::app()->createUrl('lgmisWM/report/wmmasterwiseDemand') ;?>&id=" + id);
}


function wmdemandreceiptCallback(id){
//	alert(id);
//	alert('"<?php echo urldecode(Yii::app()->createUrl(Yii::app()->controller->module->id . '/wmdemandreceipt/create', array('id' => '" + id'))); ?>');
	
 	$("#wmmaster-grid").addClass("grid-view-loading");
    $.ajax({
//        url: "<?php echo urldecode(Yii::app()->createUrl(Yii::app()->controller->module->id . '/wmdemandreceipt/create', array('id' => '" + id'))); ?>,     
    	url: "<?php echo urldecode(Yii::app()->createUrl('lgmisWM/wmdemandreceipt/create', array('id' => '" + id'))); ?>,
        beforeSend: function ( xhr ) {
        }
    }).done(function ( data ) {
        $("#wmdemandreceipt-form-dialog").html(data);
        $("#wmdemandreceipt-form-dialog").dialog("option", "title", "<?php echo LgmisWMModule::t('Wmdemandreceipt'); ?>");
        $("#wmdemandreceipt-form-dialog").dialog("option", "width", "auto");
        $("#wmdemandreceipt-form-dialog").dialog("option", "height", "auto");
        $("#wmdemandreceipt-form-dialog").dialog("open"); 
        $("#wmmaster-grid").removeClass("grid-view-loading");
        return false;
    });
	
}

</script>

<?php echo CHtml::link(LgmisWMModule::t('Advanced Search'),'#',array('class'=>'wmmaster-search-button')); ?>
<div class="wmmaster-search-form" style="display: none">
	<?php $this->renderPartial('_search',array(
			'model'=>$model,
)); ?>
</div>
<!-- search-form -->

<?php $this->widget('ext.IDAdminSkinGrid.IDAdminSkinGrid', array(
		'id'=>'wmmaster',
		'title'=>LgmisWMModule::t('Wmmaster'),
		'dataProvider'=>$model->search(),
		'filter'=>$model,
		'dlgWidth'=>740,
		'dlgHeight'=>560,
		'toolbar' => array('custom'=>
							array(
									array (
											'name'=>'wmdemandreceipt',
											'label'=> LgmisWMModule::t('Wmdemandreceipt'),
											'icon'=>'ui-icon ui-icon-search',
											'select'=>1
									),
									array (
											'name'=>'watertaxbillreport',
											'label'=> LgmisWMModule::t('Water Tax Bill Report'),
											'icon'=>'ui-icon ui-icon-search',
											'select'=>1
									)
							)
		),
		'columns'=>array(
				array(
						'class' => 'CCheckBoxColumn',
				),
				array(
						'name' => 'idwmmaster',
						'value' => 'WmHelper::encodePkey($data)',
						'type' => 'raw',
						//                    'filter' => CHtml::listData(Cccolony::model()->findAll(), 'idcccolony', 'colonyname'),
				),
				//		'saralno',
				'connectionno',
				'ownername',
// 				'fathername',
				array(
						'name' => 'idccward',
						'header' => LgmisWMModule::t('Ccward'),
						'value' => '$data->idcccolony0->idccward',
						'type' => 'raw',
						'filter' => CHtml::listData(Ccward::model()->findAll(), 'idccward', 'idccward'),
				),
// 				array(
// 						'name' => 'idcccolony',
// 						'header' => LgmisWMModule::t('Cccolony'),
// 						'value' => '$data->idcccolony0->colonyname',
// 						'type' => 'raw',
// 						'filter' => CHtml::listData(Cccolony::model()->findAll(), 'idcccolony', 'colonyname'),
// 				),
				//		'address',
				/*
array(
		'name' => 'idcccolony',
		'header' => LgmisWMModule::t('Cccolony'),
		'value' => '$data->idcccolony0->colonyname',
		'type' => 'raw',
		'filter' => CHtml::listData(Cccolony::model()->findAll(), 'idcccolony', 'colonyname'),
),
array(
		'name' => 'idccfyear',
		'header' => LgmisWMModule::t('Ccfyear'),
		'value' => '$data->idccfyear0->fyear',
		'type' => 'raw',
		'filter' => CHtml::listData(Ccfyear::model()->findAll(), 'idccfyear', 'fyear'),
),
'wmappdate',
'idptmaster',
array(
		'name' => 'idwmtype',
		'header' => LgmisWMModule::t('Wmtype'),
		'value' => '$data->idwmtype0->wmtype',
		'type' => 'raw',
		'filter' => CHtml::listData(Wmtype::model()->findAll(), 'idwmtype', 'wmtype'),
                ),
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
'disconnectdate',
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
));
?>


<div style="display: none">
	<?php    
	$this->beginWidget('zii.widgets.jui.CJuiDialog', array(// the dialog
        'id' => 'wmdemandreceipt-form-dialog',
        'options' => array(
            'autoOpen' => false,
            'modal' => true,
//            'open' => 'js:function(){$("#wmdemandreceipt-form-submit").hide();"}',
            'open' => 'js:function(){$("#wmdemandreceipt-form-submit").hide();}',
            'buttons' => array(
                LgmisWMModule::t('Save') => 'js:function(){ $("#wmdemandreceipt-form").submit();  }',
                LgmisWMModule::t('Cancel') => 'js:function(){ $(this).dialog("close").destroy();}',
            ),
        ),
        'cssFile' => false,
        'scriptFile' => false,
    ));
    ?>
	<?php $this->endWidget(); ?>
</div>
