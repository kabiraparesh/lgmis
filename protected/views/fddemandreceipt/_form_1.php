<script>
    $(document).ready(function () {
        $( "input:submit").button();
        $("[id=chequeddpayorder]").hide();
    });
    
    function paymenttype_toggle(){
//        alert($("#fddemandreceipt-form").find('#Fddemandreceipt_paymenttype').val());
        if($('input[name=Fddemandreceipt[paymenttype]]:checked', '#fddemandreceipt-form').val()==1){
            $("[id=chequeddpayorder]").hide();
        }
        if($('input[name=Fddemandreceipt[paymenttype]]:checked', '#fddemandreceipt-form').val()==2){
            $("[id=chequeddpayorder]").show();
        }
    }
    
    function setDemandstatus(data){
        if(data.status=='Failure'){
            $("#fddemandreceipt-form").find('#Fddemandreceipt_demandnumber').val('');
            $("#StatusBar").jnotifyAddMessage({
                text: data.message,
                permanent: false,
                type: "error"
            });            
        }
        if(data.status=='Success'){
            $("#fddemandreceipt-form").find('#Fddemandreceipt_demandnumber').val(data.demandnumber);
            $("#fddemandreceipt-form").find('#Fddemandreceipt_demandinname').val(data.demandinname);
            $("#fddemandreceipt-form").find('#Fddemandreceipt_demandamount').val(data.demandamount);
            $("#StatusBar").jnotifyAddMessage({
                text: data.message,
                permanent: true
            });            
        }        
    }
</script>

<style>
    #fddemandreceipt-details tr{
        vertical-align: top;
    }
    #fddemandreceipt-details label{
        width: 100%;
        display: block;
        font-weight: bold;
    }
/*    #Fddemandreceipt_paymenttype label{
        width: auto; display: inline-block; float: none;
    }*/
</style>


<div id="StatusBar" style="margin-bottom: 5px;"></div>
<div id="Notification" style="margin-bottom: 5px;"></div>

<?php // Initialize the extension
$this->widget('ext.jnotify.JNotify', array(
	'statusBarId'=>'StatusBar',
	'notificationId'=>'Notification',
	'notificationHSpace'=>'30px',	
	'notificationWidth'=>'280px',
	'notificationShowAt'=>'topRight',
	//'notificationShowAt'=>'bottomLeft',
	//'notificationAppendType'=>'prepend',
)); ?>


<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'fddemandreceipt-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php  echo Yii::t('application', 'Fields with <span class="required">*</span> are required.');?></p>

	<?php echo $form->errorSummary($model); ?>

        <table id="fddemandreceipt-details" cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td style="width: 25%">
                    <div class="row">
                        <?php echo Chtml::label(Yii::t('application','idptmaster'), 'idptmaster'); ?>
                        <?php echo Chtml::textField('idptmaster', $idptmaster, array('id' => 'idptmaster', 'size' => 10, 'maxlength' => 10, 'ajax' => array('type' => 'POST', 'dataType' => 'json', 'data' => array('id' => 'js:$("#fddemandreceipt-form").find(\'#idptmaster\').val()',), 'url' => CController::createUrl('pttransaction/getDemand'), 'success' => 'function(data){setDemandstatus(data);}'))); ?>
                        <?php //echo $form->textField($model,'demandnumber',array('size'=>10,'maxlength'=>10)); ?>
                    </div>                                                    
                </td>
                <td style="width: 25%">
                    <div class="row">
                        <?php echo $form->labelEx($model, 'receiptbookno'); ?>		
                        <?php echo $form->textField($model, 'receiptbookno', array('size' => 10, 'maxlength' => 255)); ?>
                        <?php echo $form->error($model, 'receiptbookno'); ?>
                    </div>
                </td>
                <td style="width: 25%">
                    <div class="row">
                        <?php echo $form->labelEx($model, 'receiptno'); ?>		
                        <?php echo $form->textField($model, 'receiptno', array('size' => 10, 'maxlength' => 255)); ?>
                        <?php echo $form->error($model, 'receiptno'); ?>
                    </div>
                </td>                            
                <td style="width: 25%">
                    <div class="row">
                        <?php echo $form->labelEx($model, 'amountpaid'); ?>		
                        <?php echo $form->textField($model, 'amountpaid', array('size' => 10, 'maxlength' => 10)); ?>
                        <?php echo $form->error($model, 'amountpaid'); ?>
                    </div>                    
                </td>
            </tr>

            <tr>
                <td colspan="2" style="width: 25%">
                    <div class="row">
                        <?php echo $form->labelEx($model, 'paymenttype'); ?>		
                        <?php echo $form->radioButtonList($model, 'paymenttype', array('1'=> Yii::t('application',  'Cash'), '2'=>Yii::t('application',  'Cheque')), $htmlOptions=array('id'=>'paymenttype_selector', 'onChange'=>'paymenttype_toggle();', 'separator'=>'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', 'labelOptions'=>array('style'=>'width: auto; display: inline-block; float: none;'))); ?>
                        <?php //echo $form->textField($model, 'paymenttype'); ?>
                        <?php echo $form->error($model, 'paymenttype'); ?>
                    </div>                    
                </td>
                <td style="width:25%">
                    <div id="chequeddpayorder" class="row">
                        <?php echo $form->labelEx($model, 'chequeddpayorderno'); ?>		
                        <?php echo $form->textField($model, 'chequeddpayorderno', array('size' => 20, 'maxlength' => 20)); ?>
                        <?php echo $form->error($model, 'chequeddpayorderno'); ?>
                    </div>        
                </td>
                <td  id="chequeddpayorder" style="width:25%">
                    <div class="row">
                        <?php echo $form->labelEx($model, 'chequeddpayorderdate'); ?>		
                        <?php //echo $form->textField($model, 'chequeddpayorderdate'); ?>
                        <?php
                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model' => $model,
                            'attribute' => 'chequeddpayorderdate',
                            'id' => 'chequeddpayorderdate',
                            'theme' => 'dark-hive',
                            'options' => array(
                                'showAnim' => 'fold',
                                'dateFormat' => 'yy/mm/dd',
                            ),
                            'htmlOptions' => array(
                                'class' => 'date'
                            )
                        ));
                        ?>                        
                        <?php echo $form->error($model, 'chequeddpayorderdate'); ?>
                    </div>        
                </td>                        
           </tr>
            <tr id="chequeddpayorder" >
                <td colspan="2" style="width:50%">
                    <div class="row">
                        <?php echo $form->labelEx($model, 'bankname'); ?>		
                        <?php echo $form->textField($model, 'bankname', array('size' => 45, 'maxlength' => 45)); ?>
                        <?php echo $form->error($model, 'bankname'); ?>
                    </div>                                 
                </td>
                <td colspan="2" style="width:50%">
                    <div class="row">
                        <?php echo $form->labelEx($model, 'branchname'); ?>		
                        <?php echo $form->textField($model, 'branchname', array('size' => 45, 'maxlength' => 45)); ?>
                        <?php echo $form->error($model, 'branchname'); ?>
                    </div>
                </td>
            </tr>
        </table>
                    
        
        
	<div class="">
                <?php echo $form->hiddenField($model,'demanddate'); ?>
                <?php echo $form->hiddenField($model,'demandinname'); ?>
                <?php echo $form->hiddenField($model,'demandamount'); ?>
                <?php echo $form->hiddenField($model,'windowno'); ?>
                <?php echo $form->hiddenField($model,'username'); ?>
                <?php echo $form->hiddenField($model,'idccdepartment'); ?>
                <?php echo $form->hiddenField($model,'demandnumber'); ?>
	</div>
        
       
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('application', 'Create') : Yii::t('application', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$this->widget('ext.ajaxform.JAjaxForm', array(
    'formId' => 'fddemandreceipt-form',
    'options' => array(
        'dataType' => 'json',
        'success' => 'js:function(data,statusText) { 
                    if(data.status == "Success"){
                        $.fn.yiiGridView.update("fddemandreceipt-grid", {
                              data: $(this).serialize()
                        });
                        $("#dialog").dialog("close").destroy();
                        return false;
                    }
                    else{
                        $("#dialog-warning-msg").html("' . Yii::t('application', 'An error occurred while the form was being submitted.<br/>Please check your form data.') . '"); 
                        $("#dialog-warning").dialog("open"); 
                        return false;
                    }
        }',
    ),
));
?>


