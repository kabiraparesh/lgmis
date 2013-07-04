<script>
    $(document).ready(function () {
        $( "input:submit").button();
    });
</script>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'lplicency-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php  echo Yii::t('application', 'Fields with <span class="required">*</span> are required.');?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'licencyname'); ?>		
                <?php echo $form->textField($model,'licencyname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'licencyname'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'licencyage'); ?>		
                <?php echo $form->textField($model,'licencyage',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'licencyage'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idccsex'); ?>		
                <?php echo $form->textField($model,'idccsex',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#lplicency-form").find(\'#Lplicency_idccsex\').val()',), 'url'=>CController::createUrl('ccsex/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idccsex')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idccsex')); ?>_msg">
                    <?php echo !isset($model->idccsex0->sexname) || $model->isNewRecord ? "-" : $model->idccsex0->sexname; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                            //array('ccsex/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                             Yii::app()->createAbsoluteUrl("/ccsex/popupview"),
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "lplicency";
                                        window.eid = "Lplicency_idccsex";
                                        window.url = "'. CController::createUrl('ccsex/jsonmessage').'";
                                        $("#dialog-popup-select").html(data);
                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Ccsexes') .'");
                                        $("#dialog-popup-select").dialog("open"); 
           
                                        return false;
                                    }'
                    ) 
                    );
                    ?>
		<?php echo $form->error($model,'idccsex'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'licencyaddress'); ?>		
                <?php echo $form->textField($model,'licencyaddress',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'licencyaddress'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idlpapplicant'); ?>		
                <?php echo $form->textField($model,'idlpapplicant',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#lplicency-form").find(\'#Lplicency_idlpapplicant\').val()',), 'url'=>CController::createUrl('lpapplicant/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idlpapplicant')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idlpapplicant')); ?>_msg">
                    <?php echo !isset($model->idlpapplicant0->bussname) || $model->isNewRecord ? "-" : $model->idlpapplicant0->bussname; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                            array('lpapplicant/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "lplicency";
                                        window.eid = "Lplicency_idlpapplicant";
                                        window.url = "'. CController::createUrl('lpapplicant/jsonmessage').'";
                                        $("#dialog-popup-select").html(data);
                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Lpapplicants') .'");
                                        $("#dialog-popup-select").dialog("open"); 
           
                                        return false;
                                    }'
                    ) 
                    );
                    ?>
		<?php echo $form->error($model,'idlpapplicant'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'licencycontact'); ?>		
                <?php echo $form->textField($model,'licencycontact',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'licencycontact'); ?>
	</div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('application', 'Create') : Yii::t('application', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$this->widget('ext.ajaxform.JAjaxForm', array(
    'formId' => 'lplicency-form',
    'options' => array(
        'dataType' => 'json',
        'success' => 'js:function(data,statusText) { 
                    if(data.status == "Success"){
                        $.fn.yiiGridView.update("lplicency-grid", {
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
