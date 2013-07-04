<script>
    $(document).ready(function () {
        $( "input:submit").button();
    });
</script>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'hrempleducation-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php  echo Yii::t('application', 'Fields with <span class="required">*</span> are required.');?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php //echo $form->labelEx($model,'idhremployee'); ?>		
                <?php //echo $form->textField($model,'idhremployee',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#hrempleducation-form").find(\'#Hrempleducation_idhremployee\').val()',), 'url'=>CController::createUrl('hremployee/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idhremployee')) . '_msg\').text(data.message);}'))); ?>
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
                                        window.cid = "hrempleducation";
                                        window.eid = "Hrempleducation_idhremployee";
                                        window.url = "'. CController::createUrl('hremployee/jsonmessage').'";
                                        $("#dialog-popup-select").html(data);
                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Hremployees') .'");
                                        $("#dialog-popup-select").dialog("open"); 
           
                                        return false;
                                    }'
                    ) 
                    );
                    */?>
		<?php //echo $form->error($model,'idhremployee'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'examination'); ?>		
                <?php echo $form->textField($model,'examination',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'examination'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'examyear'); ?>		
                <?php echo $form->textField($model,'examyear',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'examyear'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'examsubjects'); ?>		
                <?php echo $form->textField($model,'examsubjects',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'examsubjects'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'examdivision'); ?>		
                <?php echo $form->textField($model,'examdivision',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'examdivision'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'boarduniversity'); ?>		
                <?php echo $form->textField($model,'boarduniversity',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'boarduniversity'); ?>
	</div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('application', 'Create') : Yii::t('application', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$this->widget('ext.ajaxform.JAjaxForm', array(
    'formId' => 'hrempleducation-form',
    'options' => array(
        'dataType' => 'json',
        'success' => 'js:function(data,statusText) { 
                    if(data.status == "Success"){
                        $.fn.yiiGridView.update("hrempleducation-grid", {
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
