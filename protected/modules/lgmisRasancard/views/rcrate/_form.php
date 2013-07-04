<script>
    $(document).ready(function () {
        $( "input:submit").button();
    });
</script>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'rcrate-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php  echo Yii::t('application', 'Fields with <span class="required">*</span> are required.');?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idccfyear'); ?>		
                <?php echo $form->textField($model,'idccfyear',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#rcrate-form").find(\'#Rcrate_idccfyear\').val()',), 'url'=>CController::createUrl('ccfyear/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idccfyear')) . '_msg\').text(data.message);}'))); ?>
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
                                        window.cid = "rcrate";
                                        window.eid = "Rcrate_idccfyear";
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
		<?php echo $form->labelEx($model,'whitercard'); ?>		
                <?php echo $form->textField($model,'whitercard',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'whitercard'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'bluercard'); ?>		
                <?php echo $form->textField($model,'bluercard',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'bluercard'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'yellowrcard'); ?>		
                <?php echo $form->textField($model,'yellowrcard',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'yellowrcard'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'newrcard'); ?>		
                <?php echo $form->textField($model,'newrcard',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'newrcard'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'renewrcard'); ?>		
                <?php echo $form->textField($model,'renewrcard',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'renewrcard'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'reviewrcard'); ?>		
                <?php echo $form->textField($model,'reviewrcard',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'reviewrcard'); ?>
	</div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('application', 'Create') : Yii::t('application', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$this->widget('ext.ajaxform.JAjaxForm', array(
    'formId' => 'rcrate-form',
    'options' => array(
        'dataType' => 'json',
        'success' => 'js:function(data,statusText) { 
                    if(data.status == "Success"){
                        $.fn.yiiGridView.update("rcrate-grid", {
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
