<script>
    $(document).ready(function () {
        $( "input:submit").button();
    });
</script>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ccdepartment-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php  echo Yii::t('application', 'Fields with <span class="required">*</span> are required.');?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'departmentname'); ?>		
                <?php echo $form->textField($model,'departmentname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'departmentname'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'departmentcode'); ?>		
                <?php echo $form->textField($model,'departmentcode',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'departmentcode'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'demandflag'); ?>		
                <?php echo $form->textField($model,'demandflag'); ?>
		<?php echo $form->error($model,'demandflag'); ?>
	</div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('application', 'Create') : Yii::t('application', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$this->widget('ext.ajaxform.JAjaxForm', array(
    'formId' => 'ccdepartment-form',
    'options' => array(
        'dataType' => 'json',
        'success' => 'js:function(data,statusText) { 
                    if(data.status == "Success"){
                        $.fn.yiiGridView.update("ccdepartment-grid", {
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
