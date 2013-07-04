<script>
    $(document).ready(function () {
        $( "input:submit").button();
    });
</script>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'rpdemand-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php  echo Yii::t('application', 'Fields with <span class="required">*</span> are required.');?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idrpshop'); ?>		
                <?php echo $form->textField($model,'idrpshop',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#rpdemand-form").find(\'#Rpdemand_idrpshop\').val()',), 'url'=>CController::createUrl('rpshop/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idrpshop')) . '_msg\').text(data.message);}'))); ?>
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
                                        window.cid = "rpdemand";
                                        window.eid = "Rpdemand_idrpshop";
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
		<?php echo $form->labelEx($model,'idccfyear'); ?>		
                <?php echo $form->textField($model,'idccfyear',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#rpdemand-form").find(\'#Rpdemand_idccfyear\').val()',), 'url'=>CController::createUrl('ccfyear/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idccfyear')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idccfyear')); ?>_msg">
                    <?php echo !isset($model->idccfyear0->fyear) || $model->isNewRecord ? "-" : $model->idccfyear0->fyear; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                           // array('ccfyear/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                             Yii::app()->createAbsoluteUrl("/ccfyear/popupview"),
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "rpdemand";
                                        window.eid = "Rpdemand_idccfyear";
                                        window.url = "'. CController::createUrl('ccfyear/jsonmessage').'";
                                        $("#dialog-popup-select").html(data);
                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Ccfyears') .'");
                                        $("#dialog-popup-select").dialog("open"); 
           
                                        return false;
                                    }'
                    ) 
                    );
                    ?>
		<?php echo $form->error($model,'idccfyear'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'period'); ?>		
                <?php echo $form->textField($model,'period',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'period'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'rpoldbalance'); ?>		
                <?php echo $form->textField($model,'rpoldbalance',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'rpoldbalance'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'rpsurcharge'); ?>		
                <?php echo $form->textField($model,'rpsurcharge',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'rpsurcharge'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'rpdemandamt'); ?>		
                <?php echo $form->textField($model,'rpdemandamt',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'rpdemandamt'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'rpdemanddate'); ?>		
                <?php echo $form->textField($model,'rpdemanddate'); ?>
		<?php echo $form->error($model,'rpdemanddate'); ?>
	</div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('application', 'Create') : Yii::t('application', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$this->widget('ext.ajaxform.JAjaxForm', array(
    'formId' => 'rpdemand-form',
    'options' => array(
        'dataType' => 'json',
        'success' => 'js:function(data,statusText) { 
                    if(data.status == "Success"){
                        $.fn.yiiGridView.update("rpdemand-grid", {
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
