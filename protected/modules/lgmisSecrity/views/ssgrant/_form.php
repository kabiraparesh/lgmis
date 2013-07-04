<script>
    $(document).ready(function () {
        $( "input:submit").button();
    });
</script>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ssgrant-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php  echo Yii::t('application', 'Fields with <span class="required">*</span> are required.');?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>		
                <?php echo $form->textField($model,'type',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'amount'); ?>		
                <?php echo $form->textField($model,'amount',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'amount'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'reason'); ?>		
                <?php echo $form->textField($model,'reason',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'reason'); ?>
	</div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('application', 'Create') : Yii::t('application', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$this->widget('ext.ajaxform.JAjaxForm', array(
    'formId' => 'ssgrant-form',
    'options' => array(
        'dataType' => 'json',
        'success' => 'js:function(data,statusText) { 
                    if(data.status == "Success"){
                        $.fn.yiiGridView.update("ssgrant-grid", {
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
