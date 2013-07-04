<script>
    $(document).ready(function () {
        $( "input:submit").button();
    });
</script>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'hrleavemaster-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php  echo Yii::t('application', 'Fields with <span class="required">*</span> are required.');?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idhremployee'); ?>		
                <?php echo $form->textField($model,'idhremployee',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#hrleavemaster-form").find(\'#Hrleavemaster_idhremployee\').val()',), 'url'=>CController::createUrl('hremployee/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idhremployee')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idhremployee')); ?>_msg">
                    <?php echo !isset($model->idhremployee0->empname) || $model->isNewRecord ? "-" : $model->idhremployee0->empname; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                            array('hremployee/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "hrleavemaster";
                                        window.eid = "Hrleavemaster_idhremployee";
                                        window.url = "'. CController::createUrl('hremployee/jsonmessage').'";
                                        $("#dialog-popup-select").html(data);
                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Hremployees') .'");
                                        $("#dialog-popup-select").dialog("open"); 
           
                                        return false;
                                    }'
                    ) 
                    );
                    ?>
		<?php echo $form->error($model,'idhremployee'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'foryear'); ?>		
                <?php echo $form->textField($model,'foryear',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'foryear'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'formonth'); ?>		
                <?php echo $form->textField($model,'formonth',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'formonth'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'workingdays'); ?>		
                <?php echo $form->textField($model,'workingdays',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'workingdays'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'attendence'); ?>		
                <?php echo $form->textField($model,'attendence',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'attendence'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'casualleave'); ?>		
                <?php echo $form->textField($model,'casualleave',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'casualleave'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'medicalleave'); ?>		
                <?php echo $form->textField($model,'medicalleave',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'medicalleave'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'paidleave'); ?>		
                <?php echo $form->textField($model,'paidleave',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'paidleave'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'otherleave'); ?>		
                <?php echo $form->textField($model,'otherleave',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'otherleave'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idccfyear'); ?>		
                <?php echo $form->textField($model,'idccfyear',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#hrleavemaster-form").find(\'#Hrleavemaster_idccfyear\').val()',), 'url'=>CController::createUrl('ccfyear/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idccfyear')) . '_msg\').text(data.message);}'))); ?>
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
                                        window.cid = "hrleavemaster";
                                        window.eid = "Hrleavemaster_idccfyear";
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
		<?php echo $form->labelEx($model,'earnedleave'); ?>		
                <?php echo $form->textField($model,'earnedleave',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'earnedleave'); ?>
	</div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('application', 'Create') : Yii::t('application', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$this->widget('ext.ajaxform.JAjaxForm', array(
    'formId' => 'hrleavemaster-form',
    'options' => array(
        'dataType' => 'json',
        'success' => 'js:function(data,statusText) { 
                    if(data.status == "Success"){
                        $.fn.yiiGridView.update("hrleavemaster-grid", {
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
