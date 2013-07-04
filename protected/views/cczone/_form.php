<script>
    $(document).ready(function () {
        $( "input:submit").button();
    });
</script>

<div id="StatusBar" style="margin-bottom: 5px;"></div>
<div id="Notification" style="margin-bottom: 5px;"></div>

<?php // Initialize the extension
$this->widget('ext.jnotify.JNotify', array(
	'statusBarId'=>'StatusBar',
	'notificationId'=>'Notification',
	'notificationHSpace'=>'30px',	
	'notificationWidth'=>'280px',
	'notificationShowAt'=>'topRight',
	//'notificationShowAt'=>'bottomLeft',
	//'notificationAppendType'=>'prepend',
)); ?>



<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cczone-form',
	'enableAjaxValidation'=>true,
)); ?>
        
	<p class="note"><?php  echo Yii::t('application', 'Fields with <span class="required">*</span> are required.');?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'zonename'); ?>		
                <?php echo $form->textField($model,'zonename',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'zonename'); ?>
	</div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('application', 'Create') : Yii::t('application', 'Save'), array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$this->widget('ext.ajaxform.JAjaxForm', array(
    'formId' => 'cczone-form',
    'options' => array(
        'dataType' => 'json',
        'success' => 'js:function(data,statusText) { 
                    if(data.status == "Success"){
                        $.fn.yiiGridView.update("cczone-grid", {
                              data: $(this).serialize()
                        });
                        '. ($model->isNewRecord ? "$(\"#StatusBar\").jnotifyAddMessage({ text: data.message, permanent: false }); $(\"#cczone-form\").clearForm();" : "$(\"#dialog\").dialog(\"close\").destroy();") .'
                        return false;
                    }
                    else{
                        $("#StatusBar").jnotifyAddMessage({
                                text: data.message,
                                permanent: false,
                                type: "error"
                        });                        
                        return false;
                    }
        }',
    ),
));
?>
