<script>
    $(document).ready(function () {
        $( "input:submit").button();
    });
</script>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'hremplloan-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php  echo Yii::t('application', 'Fields with <span class="required">*</span> are required.');?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php //echo $form->labelEx($model,'idhremployee'); ?>		
                <?php //echo $form->textField($model,'idhremployee',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#hremplloan-form").find(\'#Hremplloan_idhremployee\').val()',), 'url'=>CController::createUrl('hremployee/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idhremployee')) . '_msg\').text(data.message);}'))); ?>
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
                                        window.cid = "hremplloan";
                                        window.eid = "Hremplloan_idhremployee";
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
		<?php echo $form->labelEx($model,'loannumber'); ?>		
                <?php echo $form->textField($model,'loannumber',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'loannumber'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'loandate'); ?>		
                <?php echo $form->textField($model,'loandate'); ?>
		<?php echo $form->error($model,'loandate'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'loanamount'); ?>		
                <?php echo $form->textField($model,'loanamount',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'loanamount'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'installmentamt'); ?>		
                <?php echo $form->textField($model,'installmentamt',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'installmentamt'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'installmentstartdate'); ?>		
                <?php echo $form->textField($model,'installmentstartdate'); ?>
		<?php echo $form->error($model,'installmentstartdate'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'installmentenddate'); ?>		
                <?php echo $form->textField($model,'installmentenddate'); ?>
		<?php echo $form->error($model,'installmentenddate'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'loantype'); ?>		
                <?php echo $form->textField($model,'loantype',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'loantype'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'loanaccountno'); ?>		
                <?php echo $form->textField($model,'loanaccountno',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'loanaccountno'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'loanbankname'); ?>		
                <?php echo $form->textField($model,'loanbankname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'loanbankname'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'loannarration'); ?>		
                <?php echo $form->textArea($model,'loannarration',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'loannarration'); ?>
	</div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('application', 'Create') : Yii::t('application', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$this->widget('ext.ajaxform.JAjaxForm', array(
    'formId' => 'hremplloan-form',
    'options' => array(
        'dataType' => 'json',
        'success' => 'js:function(data,statusText) { 
                    if(data.status == "Success"){
                        $.fn.yiiGridView.update("hremplloan-grid", {
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
