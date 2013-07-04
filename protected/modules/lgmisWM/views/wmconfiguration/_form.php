<?php
/* @var $this WmconfigurationController */
/* @var $model Wmconfiguration */
/* @var $form CActiveForm */
?>

<script>
    $(document).ready(function () {
        $( "input:submit").button();
    });
</script>

<div id="StatusBar" style="margin-bottom: 5px; "></div>
<div id="Notification" style="margin-bottom: 5px;"></div>

<?php
 // Initialize the extension
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
	'id'=>'wmconfiguration-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php echo LgmisWMModule::t('Fields with <span class="required">*</span> are required.');?></p>

	<?php echo $form->errorSummary($model); ?>

        <!-- <Remove following fields & convert it to hidden fields> -->
        <?php if(false): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'idccfyear'); ?>
		<?php $this->widget('ext.FKField.FKField', array(
                    'model' => $model,
                    'relatedmodel' => new Ccfyear('search'),
                    'attribute' => 'idccfyear',
                    'title' => LgmisWMModule::t('Ccfyear'),
                    'columns' => array(
                        'idccfyear', 'fyear',
                    ),
                )); ?>
 		<?php echo $form->error($model,'idccfyear'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idwmtype'); ?>
		<?php $this->widget('ext.FKField.FKField', array(
                    'model' => $model,
                    'relatedmodel' => new Wmtype('search'),
                    'attribute' => 'idwmtype',
                    'title' => LgmisWMModule::t('Wmtype'),
                    'columns' => array(
                        'idwmtype', 'wmtype',
                    ),
                )); ?>
 		<?php echo $form->error($model,'idwmtype'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idwmsize'); ?>
		<?php $this->widget('ext.FKField.FKField', array(
                    'model' => $model,
                    'relatedmodel' => new Wmsize('search'),
                    'attribute' => 'idwmsize',
                    'title' => LgmisWMModule::t('Wmsize'),
                    'columns' => array(
                        'idwmsize', 'wmsize',
                    ),
                )); ?>
 		<?php echo $form->error($model,'idwmsize'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'wmtape'); ?>
		<?php echo $form->textField($model,'wmtape',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'wmtape'); ?>
	</div>
        <?php endif; ?>
        <!-- </Remove Above fields & convert it to hidden fields> -->
        
        <!-- <Removed fields converted to hidden fields> -->
        <?php 
            echo $form->hiddenField($model,'idccfyear'); 
            echo $form->hiddenField($model,'idwmtype'); 
            echo $form->hiddenField($model,'idwmsize'); 
            echo $form->hiddenField($model,'wmtape'); 
        ?>
        <!-- </Removed fields converted to hidden fields> -->
        

	<div class="row">
		<?php echo $form->labelEx($model,'newconncharge'); ?>
		<?php echo $form->textField($model,'newconncharge',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'newconncharge'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tempconncharge'); ?>
		<?php echo $form->textField($model,'tempconncharge',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'tempconncharge'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reconncharge'); ?>
		<?php echo $form->textField($model,'reconncharge',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'reconncharge'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tempdisconncharge'); ?>
		<?php echo $form->textField($model,'tempdisconncharge',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'tempdisconncharge'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'surcharge'); ?>
		<?php echo $form->textField($model,'surcharge',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'surcharge'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'monthlycharges'); ?>
		<?php echo $form->textField($model,'monthlycharges',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'monthlycharges'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? LgmisWMModule::t('Create') : LgmisWMModule::t('Save'), array('id'=>'wmconfiguration-form-submit')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
if ($model->isNewRecord) {
    $this->widget('ext.ajaxform.JAjaxForm', array(
        'formId' => 'wmconfiguration-form',
        'options' => array(
            'dataType' => 'json',
            'success' => 'js:function(data,statusText) { 
                    if(data.status == 1){
                        $.fn.yiiGridView.update("wmconfiguration-grid", {
                              data: $(this).serialize()
                        });

                        $("#StatusBar").jnotifyAddMessage({
                                text: data.message,
                                permanent: false,
                                type: "message"
                        });                        

                        $("#wmconfiguration-form").resetForm();
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
}
else{
    $this->widget('ext.ajaxform.JAjaxForm', array(
        'formId' => 'wmconfiguration-form',
        'options' => array(
            'dataType' => 'json',
            'success' => 'js:function(data,statusText) { 
                    if(data.status == 1){
                        $.fn.yiiGridView.update("wmconfiguration-grid", {
                              data: $(this).serialize()
                        });
                        $("#wmconfiguration-form-dialog").dialog("close").destroy();
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
}
?>