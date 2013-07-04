<script>
    $(document).ready(function () {
        $( "input:button").button();
    });
</script>

<script>
    $(function() {
        $( "#from" ).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 3,
            onClose: function( selectedDate ) {
                $( "#to" ).datepicker( "option", "minDate", selectedDate );
            }
        });
        $( "#to" ).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 3,
            onClose: function( selectedDate ) {
                $( "#from" ).datepicker( "option", "maxDate", selectedDate );
            }
        });
        $( "#from" ).datepicker( "option", "dateFormat", "yy-mm-dd");        
        $( "#to" ).datepicker( "option", "dateFormat", "yy-mm-dd");        
});  

    function generate(){
    	if($("#from").val().trim()=="") {
        	alert("Please Specify From Date...");
        	return false;
    	}        
    	if($("#to").val().trim()=="") {
        	alert("Please Specify To Date...");
        	return false;
		}        
    	window.open("<?php echo Yii::app()->createUrl('lgmisWM/report/transactionReport') ;?>&startdate=" + $("#from").val() + "&enddate=" + $("#to").val());
    	$("#from").val("");
    	$("#to").val("");    	
    }
    
</script>

<?php
	$this->setPageTitle(LgmisWMModule::t("Watertax Received Amount"));
?>

<div>
	<div class="row">
		<?php echo CHtml::label(LgmisWMModule::t("From"), 'from'); ?>
		<?php echo CHtml::textField("from", '', $htmlOptions=array("id"=>"from")); ?>
	</div>

	<div class="row">
		<?php echo CHtml::label(LgmisWMModule::t("To"), 'to'); ?>
		<?php echo CHtml::textField("to", '', $htmlOptions=array("id"=>"to")); ?>
	</div>

	<div class="row buttons">
		<?php 
		$this->widget('zii.widgets.jui.CJuiButton', array(
				'buttonType'=>'button',
				'name'=>'btnClick',
				'caption'=>LgmisWMModule::t('Generate'),
				'onclick'=>'js:function(){generate(); this.blur(); return false;}',
		));		
		?>
		
	</div>
	
</div>
