<script>
    $(document).ready(function () {
        $( "input:submit").button();
    });
</script>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'lprate-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php  echo Yii::t('application', 'Fields with <span class="required">*</span> are required.');?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idccfyear'); ?>		
                <?php echo $form->textField($model,'idccfyear',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#lprate-form").find(\'#Lprate_idccfyear\').val()',), 'url'=>CController::createUrl('ccfyear/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idccfyear')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idccfyear')); ?>_msg">
                    <?php echo !isset($model->idccfyear0->fyear) || $model->isNewRecord ? "-" : $model->idccfyear0->fyear; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                            //array('ccfyear/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                             Yii::app()->createAbsoluteUrl("/ccfyear/popupview"),
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "lprate";
                                        window.eid = "Lprate_idccfyear";
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
		<?php echo $form->labelEx($model,'idlpbnature'); ?>		
                <?php echo $form->textField($model,'idlpbnature',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#lprate-form").find(\'#Lprate_idlpbnature\').val()',), 'url'=>CController::createUrl('lpbnature/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idlpbnature')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idlpbnature')); ?>_msg">
                    <?php echo !isset($model->idlpbnature0->lpnature) || $model->isNewRecord ? "-" : $model->idlpbnature0->lpnature; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                            array('lpbnature/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "lprate";
                                        window.eid = "Lprate_idlpbnature";
                                        window.url = "'. CController::createUrl('lpbnature/jsonmessage').'";
                                        $("#dialog-popup-select").html(data);
                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Lpbnatures') .'");
                                        $("#dialog-popup-select").dialog("open"); 
           
                                        return false;
                                    }'
                    ) 
                    );
                    ?>
		<?php echo $form->error($model,'idlpbnature'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'naturerate'); ?>		
                <?php echo $form->textField($model,'naturerate',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'naturerate'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'renewalrate'); ?>		
                <?php echo $form->textField($model,'renewalrate',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'renewalrate'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'cancelationrate'); ?>		
                <?php echo $form->textField($model,'cancelationrate',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'cancelationrate'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'penaltyrate'); ?>		
                <?php echo $form->textField($model,'penaltyrate',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'penaltyrate'); ?>
	</div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('application', 'Create') : Yii::t('application', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$this->widget('ext.ajaxform.JAjaxForm', array(
    'formId' => 'lprate-form',
    'options' => array(
        'dataType' => 'json',
        'success' => 'js:function(data,statusText) { 
                    if(data.status == "Success"){
                        $.fn.yiiGridView.update("lprate-grid", {
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
