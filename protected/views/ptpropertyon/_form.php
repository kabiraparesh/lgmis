<script>
    $(document).ready(function () {
        $( "input:submit").button();
    });
</script>

<style>
        label{
            width: 200px;
	}
        div.row{
            padding-top: 3px;
            padding-bottom: 3px;
        }    
</style>


<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ptpropertyon-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php  echo Yii::t('application', 'Fields with <span class="required">*</span> are required.');?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'propertyon'); ?>		
                <?php echo $form->textField($model,'propertyon',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'propertyon'); ?>
	</div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('application', 'Create') : Yii::t('application', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$this->widget('ext.ajaxform.JAjaxForm', array(
    'formId' => 'ptpropertyon-form',
    'options' => array(
        'dataType' => 'json',
        'success' => 'js:function(data,statusText) { 
                    if(data.status == "Success"){
                        $.fn.yiiGridView.update("ptpropertyon-grid", {
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
