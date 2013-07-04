<?php
/* @var $this WmconfigurationController */
/* @var $model Wmconfiguration */

$this->setPageTitle(LgmisWMModule::t('Wmconfiguration'));

Yii::app()->clientScript->registerScript('search', "
$('.wmconfiguration-search-button').click(function(){
	$('.wmconfiguration-search-form').toggle();
	return false;
});
$('.wmconfiguration-search-form form').submit(function(){
	$.fn.yiiGridView.update('wmconfiguration-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php echo CHtml::link(LgmisWMModule::t('Advanced Search'), '#', array('class' => 'wmconfiguration-search-button')); ?>
<div class="wmconfiguration-search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('ext.IDAdminSkinGrid.IDAdminSkinGrid', array(
    'id' => 'wmconfiguration',
    'title'=>LgmisWMModule::t('Wmconfiguration'),
	'dataProvider' => $model->search(),
    'filter' => $model,
    'toolbar' => array('delete'=>array('visible'=>'hidden')),
    'columns' => array(
        array(
            'class' => 'CCheckBoxColumn',
        ),
        'idwmconfiguration',
        array(
            'name' => 'idccfyear',
            'header' => LgmisWMModule::t('Ccfyear'),
            'value' => '$data->idccfyear0->fyear',
            'type' => 'raw',
            'filter' => CHtml::listData(Ccfyear::model()->findAll(), 'idccfyear', 'fyear'),
        ),
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
        'newconncharge',
    /*
      'tempconncharge',
      'reconncharge',
      'tempdisconncharge',
      'surcharge',
      'monthlycharges',
     */
    ),
));
?>


<script>
    function add(id, title, url){
        
        $.ajax({
            "dataType": "json",                        
            url: "<?php echo Yii::app()->createUrl('lgmisWM/wmconfiguration/generateWmconfiguration'); ?>",
            success: function(data){
                $("#dialog-Wmconfiguration").html("<p style=\'text-align:justify;\'>"+data.message+"</p>");
                $("#dialog-Wmconfiguration").dialog("option", "title", "<?php echo LgmisWMModule::t('Generate'); ?>");
                $("#dialog-Wmconfiguration").dialog("option", "height", "auto");
                $("#dialog-Wmconfiguration").dialog("option", "width", "350px");
                $("#dialog-Wmconfiguration").dialog("open"); 
                return false;
            }
        });
        
    }
</script>

<div style="display: none">
    <?php
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(// the dialog
        'id' => 'dialog-Wmconfiguration',
        'options' => array(
            'title' => LgmisWMModule::t('Generate Wmconfiguration'),
            'autoOpen' => false,
            'modal' => true,
            'buttons' => array(
                LgmisWMModule::t('Generate') => 'js:function(){
                        jQuery.ajax(
                        {
                            "type":"POST",
                            "dataType": "json",
                            "url": "' . Yii::app()->createUrl('lgmisWM/wmconfiguration/generateWmconfiguration') . '&generate=1",
                            "success":function(data){
//                                $("#dialog-warning-msg").html(data.message); 
//                                $("#dialog-warning").dialog("open"); 

                                $.fn.yiiGridView.update("wmconfiguration-grid", {
                                        data: $(this).serialize()
                                });
                            },
                            "cache":false
                        }
                        );         
                        $(this).dialog("close");
                    }',
                LgmisWMModule::t('Cancel') => 'js:function(){ $(this).dialog("close");}',
            ),
        ),
    ));
    ?>
    <div id="dialog-Wmconfiguration" title="Generate Wmconfiguration?">
    </div>
    <?php $this->endWidget(); ?>
</div>
