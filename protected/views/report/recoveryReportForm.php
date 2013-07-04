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
    	window.open("<?php echo Yii::app()->createUrl('report/recoveryReport') ;?>&startdate=" + $("#from").val() + "&enddate=" + $("#to").val());
    	$("#from").val("");
    	$("#to").val("");    	
    }
    
</script>

<?php
	$this->setPageTitle(Yii::t('application', "Propertytax Recovery Receipt"));
?>

<div>
	<div class="row">
		<?php echo CHtml::label(Yii::t('application', "From"), 'from'); ?>
		<?php echo CHtml::textField("from", '', $htmlOptions=array("id"=>"from")); ?>
	</div>

	<div class="row">
		<?php echo CHtml::label(Yii::t('application', "To"), 'to'); ?>
		<?php echo CHtml::textField("to", '', $htmlOptions=array("id"=>"to")); ?>
	</div>

	<div class="row buttons">
		<?php 
		$this->widget('zii.widgets.jui.CJuiButton', array(
				'buttonType'=>'button',
				'name'=>'btnClick',
				'caption'=>Yii::t('application', 'Generate'),
				'onclick'=>'js:function(){generate(); this.blur(); return false;}',
		));		
		?>
		
	</div>
	
</div>
