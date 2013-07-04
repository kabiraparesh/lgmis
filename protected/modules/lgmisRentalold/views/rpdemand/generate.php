<script>
function generate(url){	
	$("#loading-icon-generate").show();
	$.ajax({
        url: url,
        dataType: 'json',
        beforeSend: function ( xhr ) {
        }
    }).done(function ( data ) {
        $("#generate-form-dialog").html(data.message);
        $("#generate-form-dialog").dialog("option", "title", "Message");
        $("#generate-form-dialog").dialog("open"); 
    	$("#loading-icon-generate").hide();    
        return false;
    });
}
function regenerate(url){
	$("#loading-icon-regenerate").show();
	$.ajax({
        url: url,
        dataType: 'json',
        beforeSend: function ( xhr ) {
        }
    }).done(function ( data ) {
        $("#generate-form-dialog").html(data.message);
        $("#generate-form-dialog").dialog("option", "title", "Message");
        $("#generate-form-dialog").dialog("open"); 
    	$("#loading-icon-regenerate").hide();
        return false;
    });
}
</script>
<?php echo Yii::app()->controller->module->registerCss('main.css');?>

<?php 
	$this->setPageTitle(LgmisRentalModule::t('Generate Rpdemand'));

//	$basePath=Yii::getPathOfAlias('lgmisWM.asset');
//	$baseUrl=Yii::app()->getAssetManager()->publish($basePath);
?>


<?php
$idccfyear = Yii::app()->session['ccfyear']->idccfyear;
$rpHelper = new RpHelper();
$period = $rpHelper->getPeriod();

$criteria = new CDbCriteria(array(
		'condition' => 'idccfyear = :idccfyear And period=:period',
		'params' => array(':idccfyear' => Yii::app()->session['ccfyear']->idccfyear, ':period'=>$period)
));
$count = Rpdemand::model()->count($criteria);

//generate
$periodCaption = $period >= 0 && $period <= 9 ? $period + 3 : $period - 9;  
if($period<12){
	$this->widget('zii.widgets.jui.CJuiButton', array(
			'buttonType'=>'button',
			'name'=>'btnClick',
			'caption'=>LgmisRentalModule::t('Generate Demand for Month: {month}', array('{month}' => Yii::app()->getLocale()->getMonthName($periodCaption+1))), 
			'options'=>array('icons'=>'js:{primary:"ui-icon-newwin"}'),
			'onclick'=>'js:function(){ generate("'. Yii::app()->createUrl("lgmisRental/rpdemand/generateAll", array('create'=>1)) .'");}',
	));
}

//re-generate
// if($count>0 && $period<=12){
// 	$this->widget('zii.widgets.jui.CJuiButton', array(
// 			'buttonType'=>'button',
// 			'name'=>'btnClick1',
// 			'caption'=>LgmisWMModule::t('Re-generate Demand for Month: {month}', array('{month}' => Yii::app()->getLocale()->getMonthName($periodCaption))),
// 			'options'=>array('icons'=>'js:{primary:"ui-icon-newwin"}'),
// 			'onclick'=>'js:function(){ regenerate("'. Yii::app()->createUrl("lgmisWM/wmdemand/generateAll", array('create'=>0)) .'");}',
// 	));
// }
echo '<div class="grid-view-loading" id="loading-icon-generate" style="height: 20px;display: none;"></div>';
echo '<div class="grid-view-loading" id="loading-icon-regenerate" style="height: 20px;display: none;"></div>';
?>


<div style="display: none">

    <?php
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(// the dialog
        'id' => 'generate-form-dialog',
        'options' => array(
//             'width' => $this->dlgWidth,
//             'height' => $this->dlgHeight,
            'autoOpen' => false,
            'modal' => true,
            'buttons' => array(
                LgmisRentalModule::t('Cancel') => 'js:function(){ location.reload(true); $(this).dialog("close").destroy();}',
            ),
        ),
        'cssFile' => false,
        'scriptFile' => false,
    ));
    ?>
    <?php $this->endWidget(); ?>
</div>