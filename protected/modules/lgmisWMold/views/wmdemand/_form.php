<?php
/* @var $this WmdemandController */
/* @var $model Wmdemand */
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
	'id'=>'wmdemand-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php echo LgmisWMModule::t('Fields with <span class="required">*</span> are required.');?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idwmmaster'); ?>
		<?php $this->widget('ext.FKField.FKField', array(
                    'model' => $model,
                    'relatedmodel' => new Wmmaster('search'),
                    'attribute' => 'idwmmaster',
                    'title' => LgmisWMModule::t('Wmmaster'),
                    'columns' => array(
                        'idwmmaster', 'saralno',
                    ),
                )); ?>
 		<?php echo $form->error($model,'idwmmaster'); ?>
	</div>

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
		<?php echo $form->labelEx($model,'period'); ?>
		<?php echo $form->textField($model,'period',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'period'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'wmoldbalance'); ?>
		<?php echo $form->textField($model,'wmoldbalance',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'wmoldbalance'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'wmsurcharge'); ?>
		<?php echo $form->textField($model,'wmsurcharge',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'wmsurcharge'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'wmdemandamt'); ?>
		<?php echo $form->textField($model,'wmdemandamt',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'wmdemandamt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'wmdemanddate'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'wmdemanddate',
                    'id' => 'wmdemanddate',
                    'options' => array(
                        'showAnim' => 'fold',
                        'dateFormat' => 'yy-mm-dd',
                    ),
                    'htmlOptions' => array(
                        'class' => 'date'
                    ),
                    'cssFile' => false, 
                    'scriptFile' => false,
                )); ?>
 		<?php echo $form->error($model,'wmdemanddate'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? LgmisWMModule::t('Create') : LgmisWMModule::t('Save'), array('id'=>'wmdemand-form-submit')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
if ($model->isNewRecord) {
    $this->widget('ext.ajaxform.JAjaxForm', array(
        'formId' => 'wmdemand-form',
        'options' => array(
            'dataType' => 'json',
            'success' => 'js:function(data,statusText) { 
                    if(data.status == 1){
                        $.fn.yiiGridView.update("wmdemand-grid", {
                              data: $(this).serialize()
                        });

                        $("#StatusBar").jnotifyAddMessage({
                                text: data.message,
                                permanent: false,
                                type: "message"
                        });                        

                        $("#wmdemand-form").resetForm();
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
        'formId' => 'wmdemand-form',
        'options' => array(
            'dataType' => 'json',
            'success' => 'js:function(data,statusText) { 
                    if(data.status == 1){
                        $.fn.yiiGridView.update("wmdemand-grid", {
                              data: $(this).serialize()
                        });
                        $("#wmdemand-form-dialog").dialog("close").destroy();
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