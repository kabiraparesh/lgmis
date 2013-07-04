<script>
    $(document).ready(function () {
        $( "input:submit").button();
    });
</script>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'rprate-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php  echo Yii::t('application', 'Fields with <span class="required">*</span> are required.');?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idccfyear'); ?>		
                <?php echo $form->textField($model,'idccfyear',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#rprate-form").find(\'#Rprate_idccfyear\').val()',), 'url'=>CController::createUrl('ccfyear/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idccfyear')) . '_msg\').text(data.message);}'))); ?>
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
                                        window.cid = "rprate";
                                        window.eid = "Rprate_idccfyear";
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
		<?php echo $form->labelEx($model,'idrplocation'); ?>		
                <?php echo $form->textField($model,'idrplocation',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#rprate-form").find(\'#Rprate_idrplocation\').val()',), 'url'=>CController::createUrl('rplocation/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idrplocation')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idrplocation')); ?>_msg">
                    <?php echo !isset($model->idrplocation0->location) || $model->isNewRecord ? "-" : $model->idrplocation0->location; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                            array('rplocation/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "rprate";
                                        window.eid = "Rprate_idrplocation";
                                        window.url = "'. CController::createUrl('rplocation/jsonmessage').'";
                                        $("#dialog-popup-select").html(data);
                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Rplocations') .'");
                                        $("#dialog-popup-select").dialog("open"); 
           
                                        return false;
                                    }'
                    ) 
                    );
                    ?>
		<?php echo $form->error($model,'idrplocation'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idrprange'); ?>		
                <?php echo $form->textField($model,'idrprange',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#rprate-form").find(\'#Rprate_idrprange\').val()',), 'url'=>CController::createUrl('rprange/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idrprange')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idrprange')); ?>_msg">
                    <?php echo !isset($model->idrprange0->rangetype) || $model->isNewRecord ? "-" : $model->idrprange0->rangetype; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                            array('rprange/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "rprate";
                                        window.eid = "Rprate_idrprange";
                                        window.url = "'. CController::createUrl('rprange/jsonmessage').'";
                                        $("#dialog-popup-select").html(data);
                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Rpranges') .'");
                                        $("#dialog-popup-select").dialog("open"); 
           
                                        return false;
                                    }'
                    ) 
                    );
                    ?>
		<?php echo $form->error($model,'idrprange'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'monthlycharges'); ?>		
                <?php echo $form->textField($model,'monthlycharges',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'monthlycharges'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'surcharge'); ?>		
                <?php echo $form->textField($model,'surcharge',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'surcharge'); ?>
	</div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('application', 'Create') : Yii::t('application', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$this->widget('ext.ajaxform.JAjaxForm', array(
    'formId' => 'rprate-form',
    'options' => array(
        'dataType' => 'json',
        'success' => 'js:function(data,statusText) { 
                    if(data.status == "Success"){
                        $.fn.yiiGridView.update("rprate-grid", {
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
