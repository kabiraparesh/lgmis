<script>
    $(document).ready(function () {
        $( "input:submit").button();
    });
</script>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'rpdemandreceipt-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php  echo Yii::t('application', 'Fields with <span class="required">*</span> are required.');?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'demanddate'); ?>		
                <?php echo $form->textField($model,'demanddate'); ?>
		<?php echo $form->error($model,'demanddate'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idccdepartment'); ?>		
                <?php echo $form->textField($model,'idccdepartment',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#rpdemandreceipt-form").find(\'#Rpdemandreceipt_idccdepartment\').val()',), 'url'=>CController::createUrl('ccdepartment/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idccdepartment')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idccdepartment')); ?>_msg">
                    <?php echo !isset($model->idccdepartment0->departmentname) || $model->isNewRecord ? "-" : $model->idccdepartment0->departmentname; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                            //array('ccdepartment/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                             Yii::app()->createAbsoluteUrl("/ccdepartment/popupview"),
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "rpdemandreceipt";
                                        window.eid = "Rpdemandreceipt_idccdepartment";
                                        window.url = "'. CController::createUrl('ccdepartment/jsonmessage').'";
                                        $("#dialog-popup-select").html(data);
                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Ccdepartments') .'");
                                        $("#dialog-popup-select").dialog("open"); 
           
                                        return false;
                                    }'
                    ) 
                    );
                    ?>
		<?php echo $form->error($model,'idccdepartment'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idrpdemand'); ?>		
                <?php echo $form->textField($model,'idrpdemand',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'idrpdemand'); ?>
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
                <?php echo $form->textField($model,'chequeddpayorderdate'); ?>
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
        
	<div class="row">
		<?php echo $form->labelEx($model,'narration'); ?>		
                <?php echo $form->textArea($model,'narration',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'narration'); ?>
	</div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('application', 'Create') : Yii::t('application', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$this->widget('ext.ajaxform.JAjaxForm', array(
    'formId' => 'rpdemandreceipt-form',
    'options' => array(
        'dataType' => 'json',
        'success' => 'js:function(data,statusText) { 
                    if(data.status == "Success"){
                        $.fn.yiiGridView.update("rpdemandreceipt-grid", {
                              data: $(this).serialize()
                        });
                        $("#dialog").dialog("close").destroy();
                        return false;
                    }
                    else{
                        $("#dialog-warning-msg").html("' . Yii::t('application', 'An error occurred while the form was being submitted.<br/>Please check your form data.') . '" + data.status); 
                        $("#dialog-warning").dialog("open"); 
                        return false;
                    }
        }',
    ),
));
?>
