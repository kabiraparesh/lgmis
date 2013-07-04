<script>
    $(document).ready(function () {
        $( "input:submit").button();
    });
</script>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'hrsalaryset-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php  echo Yii::t('application', 'Fields with <span class="required">*</span> are required.');?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idccfyear'); ?>		
                <?php echo $form->textField($model,'idccfyear',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#hrsalaryset-form").find(\'#Hrsalaryset_idccfyear\').val()',), 'url'=>CController::createUrl('ccfyear/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idccfyear')) . '_msg\').text(data.message);}'))); ?>
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
                                        window.cid = "hrsalaryset";
                                        window.eid = "Hrsalaryset_idccfyear";
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
		<?php echo $form->labelEx($model,'dafix'); ?>		
                <?php echo $form->textField($model,'dafix',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'dafix'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'da'); ?>		
                <?php echo $form->textField($model,'da',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'da'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'hra'); ?>		
                <?php echo $form->textField($model,'hra',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'hra'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'ca'); ?>		
                <?php echo $form->textField($model,'ca',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'ca'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'cca'); ?>		
                <?php echo $form->textField($model,'cca',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'cca'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'specialpay'); ?>		
                <?php echo $form->textField($model,'specialpay',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'specialpay'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'wa'); ?>		
                <?php echo $form->textField($model,'wa',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'wa'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'pf'); ?>		
                <?php echo $form->textField($model,'pf',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'pf'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'ir'); ?>		
                <?php echo $form->textField($model,'ir',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'ir'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'dpf'); ?>		
                <?php echo $form->textField($model,'dpf',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'dpf'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'lpf'); ?>		
                <?php echo $form->textField($model,'lpf',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'lpf'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'fa'); ?>		
                <?php echo $form->textField($model,'fa',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'fa'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'ga'); ?>		
                <?php echo $form->textField($model,'ga',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'ga'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'gpf'); ?>		
                <?php echo $form->textField($model,'gpf',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'gpf'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'hrent'); ?>		
                <?php echo $form->textField($model,'hrent',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'hrent'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'wrent'); ?>		
                <?php echo $form->textField($model,'wrent',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'wrent'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'fbs'); ?>		
                <?php echo $form->textField($model,'fbs',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'fbs'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'scst'); ?>		
                <?php echo $form->textField($model,'scst',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'scst'); ?>
	</div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('application', 'Create') : Yii::t('application', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$this->widget('ext.ajaxform.JAjaxForm', array(
    'formId' => 'hrsalaryset-form',
    'options' => array(
        'dataType' => 'json',
        'success' => 'js:function(data,statusText) { 
                    if(data.status == "Success"){
                        $.fn.yiiGridView.update("hrsalaryset-grid", {
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
