<script>
    $(document).ready(function () {
        $( "input:submit").button();
    });
</script>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'hremplinsurance-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php  echo Yii::t('application', 'Fields with <span class="required">*</span> are required.');?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php //echo $form->labelEx($model,'idhremployee'); ?>		
                <?php //echo $form->textField($model,'idhremployee',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#hremplinsurance-form").find(\'#Hremplinsurance_idhremployee\').val()',), 'url'=>CController::createUrl('hremployee/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idhremployee')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php //echo ucfirst(CHtml::activeId($model,'idhremployee')); ?>_msg">
                    <?php //echo !isset($model->idhremployee0->empname) || $model->isNewRecord ? "-" : $model->idhremployee0->empname; ?>
                </span>
                <?php
                   /* $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                            array('hremployee/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "hremplinsurance";
                                        window.eid = "Hremplinsurance_idhremployee";
                                        window.url = "'. CController::createUrl('hremployee/jsonmessage').'";
                                        $("#dialog-popup-select").html(data);
                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Hremployees') .'");
                                        $("#dialog-popup-select").dialog("open"); 
           
                                        return false;
                                    }'
                    ) 
                    );
                   */ ?>
		<?php //echo $form->error($model,'idhremployee'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'policynumber'); ?>		
                <?php echo $form->textField($model,'policynumber',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'policynumber'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'policydate'); ?>		
                <?php echo $form->textField($model,'policydate'); ?>
		<?php echo $form->error($model,'policydate'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'policyamount'); ?>		
                <?php echo $form->textField($model,'policyamount',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'policyamount'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'policyinstallment'); ?>		
                <?php echo $form->textField($model,'policyinstallment',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'policyinstallment'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'totalpremium'); ?>		
                <?php echo $form->textField($model,'totalpremium',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'totalpremium'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'premiumstartdate'); ?>		
                <?php echo $form->textField($model,'premiumstartdate'); ?>
		<?php echo $form->error($model,'premiumstartdate'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'premiumenddate'); ?>		
                <?php echo $form->textField($model,'premiumenddate'); ?>
		<?php echo $form->error($model,'premiumenddate'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'insurancenarration'); ?>		
                <?php echo $form->textArea($model,'insurancenarration',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'insurancenarration'); ?>
	</div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('application', 'Create') : Yii::t('application', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$this->widget('ext.ajaxform.JAjaxForm', array(
    'formId' => 'hremplinsurance-form',
    'options' => array(
        'dataType' => 'json',
        'success' => 'js:function(data,statusText) { 
                    if(data.status == "Success"){
                        $.fn.yiiGridView.update("hremplinsurance-grid", {
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
