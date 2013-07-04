<script>
    $(document).ready(function () {
        $( "input:submit").button();
    });
</script>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'rptenant-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php  echo Yii::t('application', 'Fields with <span class="required">*</span> are required.');?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idrpshop'); ?>		
                <?php echo $form->textField($model,'idrpshop',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#rptenant-form").find(\'#Rptenant_idrpshop\').val()',), 'url'=>CController::createUrl('rpshop/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idrpshop')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idrpshop')); ?>_msg">
                    <?php echo !isset($model->idrpshop0->shopno) || $model->isNewRecord ? "-" : $model->idrpshop0->shopno; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                            array('rpshop/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "rptenant";
                                        window.eid = "Rptenant_idrpshop";
                                        window.url = "'. CController::createUrl('rpshop/jsonmessage').'";
                                        $("#dialog-popup-select").html(data);
                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Rpshops') .'");
                                        $("#dialog-popup-select").dialog("open"); 
           
                                        return false;
                                    }'
                    ) 
                    );
                    ?>
		<?php echo $form->error($model,'idrpshop'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'tenantname'); ?>		
                <?php echo $form->textField($model,'tenantname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'tenantname'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'tenantaddress'); ?>		
                <?php echo $form->textField($model,'tenantaddress',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'tenantaddress'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'tenantcity'); ?>		
                <?php echo $form->textField($model,'tenantcity',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'tenantcity'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'tenantcontact'); ?>		
                <?php echo $form->textField($model,'tenantcontact',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'tenantcontact'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'hirefrom'); ?>		
                <?php echo $form->textField($model,'hirefrom'); ?>
		<?php echo $form->error($model,'hirefrom'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'shopname'); ?>		
                <?php echo $form->textField($model,'shopname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'shopname'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'headoffice'); ?>		
                <?php echo $form->textField($model,'headoffice',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'headoffice'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'registrationno'); ?>		
                <?php echo $form->textField($model,'registrationno',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'registrationno'); ?>
	</div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('application', 'Create') : Yii::t('application', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$this->widget('ext.ajaxform.JAjaxForm', array(
    'formId' => 'rptenant-form',
    'options' => array(
        'dataType' => 'json',
        'success' => 'js:function(data,statusText) { 
                    if(data.status == "Success"){
                     /*  $.fn.yiiGridView.update("rptenant-grid", {*/
                          $.fn.yiiGridView.update("rpshop-grid", {
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
