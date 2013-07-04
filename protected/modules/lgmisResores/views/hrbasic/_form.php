<script>
    $(document).ready(function () {
        $( "input:submit").button();
    });
</script>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'hrbasic-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php  echo Yii::t('application', 'Fields with <span class="required">*</span> are required.');?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'start'); ?>		
                <?php echo $form->textField($model,'start',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'start'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'increment'); ?>		
                <?php echo $form->textField($model,'increment',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'increment'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'endto'); ?>		
                <?php echo $form->textField($model,'endto',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'endto'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'display'); ?>		
                <?php echo $form->textField($model,'display',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'display'); ?>
	</div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('application', 'Create') : Yii::t('application', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$this->widget('ext.ajaxform.JAjaxForm', array(
    'formId' => 'hrbasic-form',
    'options' => array(
        'dataType' => 'json',
        'success' => 'js:function(data,statusText) { 
                    if(data.status == "Success"){
                        $.fn.yiiGridView.update("hrbasic-grid", {
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
