<script>
    $(document).ready(function () {
        $( "input:submit").button();
    });
</script>

<style>
        label{
            width: 250px;
	}
        div.row{
            padding-top: 3px;
            padding-bottom: 3px;
        }    
</style>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ptbhadarate-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php  echo Yii::t('application', 'Fields with <span class="required">*</span> are required.');?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'aresidential'); ?>		
                <?php echo $form->textField($model,'aresidential',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'aresidential'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'acommercial'); ?>		
                <?php echo $form->textField($model,'acommercial',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'acommercial'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'bresidential'); ?>		
                <?php echo $form->textField($model,'bresidential',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'bresidential'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'bcommercial'); ?>		
                <?php echo $form->textField($model,'bcommercial',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'bcommercial'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'cresidential'); ?>		
                <?php echo $form->textField($model,'cresidential',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'cresidential'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'ccommercial'); ?>		
                <?php echo $form->textField($model,'ccommercial',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'ccommercial'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'dresidential'); ?>		
                <?php echo $form->textField($model,'dresidential',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'dresidential'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'dcommercial'); ?>		
                <?php echo $form->textField($model,'dcommercial',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'dcommercial'); ?>
	</div>
        
        <?php echo $form->hiddenField($model,'idptrange'); ?>
        <?php echo $form->hiddenField($model,'idccfyear'); ?>
        <?php echo $form->hiddenField($model,'idptpropertyon'); ?>
        
       
	<div class="row">
		<?php echo $form->labelEx($model,'eresidential'); ?>		
                <?php echo $form->textField($model,'eresidential',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'eresidential'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'ecommercial'); ?>		
                <?php echo $form->textField($model,'ecommercial',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'ecommercial'); ?>
	</div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('application', 'Create') : Yii::t('application', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$this->widget('ext.ajaxform.JAjaxForm', array(
    'formId' => 'ptbhadarate-form',
    'options' => array(
        'dataType' => 'json',
        'success' => 'js:function(data,statusText) { 
                    if(data.status == "Success"){
                        $.fn.yiiGridView.update("ptbhadarate-grid", {
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
