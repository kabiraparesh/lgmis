<?php
/* @var $this WmdemandreceiptController */
/* @var $model Wmdemandreceipt */
/* @var $form CActiveForm */
?>

<script>
    $(document).ready(function () {
        $( "input:submit").button();
        $("[id=chequeddpayorder]").hide();
    });
    
    function paymenttype_toggle(){
        if($('input[name=Wmdemandreceipt[paymenttype]]:checked', '#wmdemandreceipt-form').val()==1){
            $("[id=chequeddpayorder]").hide();
        }
        if($('input[name=Wmdemandreceipt[paymenttype]]:checked', '#wmdemandreceipt-form').val()==2){
            $("[id=chequeddpayorder]").show();
        }
    }    
</script>

<style>
#wmdemandreceipt-details tr {
	vertical-align: top;
}

#wmdemandreceipt-details label {
	width: 100%;
	display: block;
	font-weight: bold;
}
/*    #Wmdemandreceipt_paymenttype label{
        width: auto; display: inline-block; float: none;
    }*/
</style>

<div id="StatusBar"
	style="margin-bottom: 5px;"></div>
<div
	id="Notification" style="margin-bottom: 5px;"></div>

<?php
// Initialize the extension
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
			'id'=>'wmdemandreceipt-form',
			'enableAjaxValidation'=>true,
)); ?>

	<p class="note">
		<?php echo LgmisWMModule::t('Fields with <span class="required">*</span> are required.');?>
	</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->hiddenField($model,'demanddate'); ?>
	<?php //echo $form->hiddenField($model,'idccdepartment'); ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'idwmdemand'); ?>
		<?php echo $form->textField($model,'idwmdemand',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'idwmdemand'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'idccdepartment'); ?>
		<?php 
// 			$this->widget('ext.FKField.FKField', array(
// 				'model' => $model,
// 				'relatedmodel' => new Ccdepartment('search'),
// 				'attribute' => 'idccdepartment',
// 				'title' => LgmisWMModule::t('Ccdepartment'),
// 				'columns' => array(
//                         'idccdepartment', 'departmentname',
//                     ),
//                 )); 
			?>
		<?php echo $form->error($model,'idccdepartment'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'demandinname'); ?>
		<?php echo $form->textField($model,'demandinname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'demandinname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'demandamount'); ?>
		<?php echo $form->textField($model,'demandamount',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'demandamount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'amountpaid'); ?>
		<?php echo $form->textField($model,'amountpaid',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'amountpaid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'paymenttype'); ?>
		<?php echo $form->textField($model,'paymenttype'); ?>
		<?php echo $form->error($model,'paymenttype'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'chequeddpayorderno'); ?>
		<?php echo $form->textField($model,'chequeddpayorderno',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'chequeddpayorderno'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'chequeddpayorderdate'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model' => $model,
				'attribute' => 'chequeddpayorderdate',
				'id' => 'chequeddpayorderdate',
				'options' => array(
                        'showAnim' => 'fold',
                        'dateFormat' => 'yy-mm-dd',
                    ),
                    'htmlOptions' => array(
                        'class' => 'date'
                    ),
				'cssFile' => false,
				'scriptFile' => false,
                )); ?>
		<?php echo $form->error($model,'chequeddpayorderdate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bankname'); ?>
		<?php echo $form->textField($model,'bankname',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'bankname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'branchname'); ?>
		<?php echo $form->textField($model,'branchname',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'branchname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'windowno'); ?>
		<?php echo $form->textField($model,'windowno',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'windowno'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'receiptbookno'); ?>
		<?php echo $form->textField($model,'receiptbookno',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'receiptbookno'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'receiptno'); ?>
		<?php echo $form->textField($model,'receiptno',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'receiptno'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'details'); ?>
		<?php echo $form->textArea($model,'details',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'details'); ?>
	</div>


	<?php
	$columns = array(
        array(
            'header' => LgmisWMModule::t('Particulars'),
            'name' => 'particulars',
            'type' => 'hiddenField',
            'htmlOptions'=> array('width'=>10,'style'=>'width:10px;font-weight:bolder;'),
        ),
        array(
            'header' => LgmisWMModule::t('Previous Demand'),
            'name' => 'previousdemand',
            'type' => 'text',
            'htmlOptions'=> array('width'=>20,'size'=>5,'maxlength'=>30,'style'=>'text-align:right'),
        ),
		array(
				'header' => LgmisWMModule::t('Previous Deposite'),
				'name' => 'previousdeposite',
				'type' => 'textField',
				'htmlOptions'=> array('width'=>20,'size'=>5,'maxlength'=>30,'style'=>'text-align:right'),
				'summary'=>'sum',
		),
		array(
				'header' => LgmisWMModule::t('Previous Discount'),
				'name' => 'previousdiscount',
				'type' => 'textField',
				'htmlOptions'=> array('width'=>20,'size'=>5,'maxlength'=>30,'style'=>'text-align:right'),
				'summary'=>'sum',
		),
		array(
				'header' => LgmisWMModule::t('Current Demand'),
				'name' => 'currentdemand',
				'type' => 'text',
				'htmlOptions'=> array('width'=>20,'size'=>5,'maxlength'=>30,'style'=>'text-align:right'),
		),
		array(
				'header' => LgmisWMModule::t('Current Deposite'),
				'name' => 'currentdeposite',
				'type' => 'textField',
				'htmlOptions'=> array('width'=>20,'size'=>5,'maxlength'=>30,'style'=>'text-align:right'),
				'summary'=>'sum',
		),
		array(
				'header' => LgmisWMModule::t('Current Discount'),
				'name' => 'currentdiscount',
				'type' => 'textField',
				'htmlOptions'=> array('width'=>20,'size'=>5,'maxlength'=>30,'style'=>'text-align:right'),
				'summary'=>'sum',
		),
    );
    $rows = array(
        'data' => $data,
    );
    ?>
	<div class="row">
		<?php echo $form->labelEx($model, 'details'); ?>
		<br /> <br />
		<?php
		$this->widget('ext.inputgrid.InputGrid', array(
            'columns' => $columns,
            'rows' => $rows,
            'model' => $model, // Your model
            'attribute' => 'details', // Attribute for input
            'id' => 'details-inputgrid', // Attribute for input
         )
        );
        ?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? LgmisWMModule::t('Create') : LgmisWMModule::t('Save'), array('id'=>'wmdemandreceipt-form-submit')); ?>
	</div>

	<?php $this->endWidget(); ?>

</div>
<!-- form -->

<?php
if ($model->isNewRecord) {
    $this->widget('ext.ajaxform.JAjaxForm', array(
        'formId' => 'wmdemandreceipt-form',
        'options' => array(
            'dataType' => 'json',
            'success' => 'js:function(data,statusText) {
                    if(data.status == 1){
                        $.fn.yiiGridView.update("wmdemandreceipt-grid", {
                              data: $(this).serialize()
                        });

                        $("#StatusBar").jnotifyAddMessage({
                                text: data.message,
                                permanent: false,
                                type: "message"
                        });

                        $("#wmdemandreceipt-form").resetForm();
                        return false;
                    }
                    else{
                        $("#StatusBar").jnotifyAddMessage({
                                text: data.message,
                                permanent: false,
                                type: "error"
                        });
                        return false;
                    }
        }',
        ),
    ));
}
else{
    $this->widget('ext.ajaxform.JAjaxForm', array(
        'formId' => 'wmdemandreceipt-form',
        'options' => array(
            'dataType' => 'json',
            'success' => 'js:function(data,statusText) {
                    if(data.status == 1){
                        $.fn.yiiGridView.update("wmdemandreceipt-grid", {
                              data: $(this).serialize()
                        });
                        $("#wmdemandreceipt-form-dialog").dialog("close").destroy();
                        return false;
                    }
                    else{
                        $("#StatusBar").jnotifyAddMessage({
                                text: data.message,
                                permanent: false,
                                type: "error"
                        });
                        return false;
                    }
        }',
        ),
    ));
}
?>