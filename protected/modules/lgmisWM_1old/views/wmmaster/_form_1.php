<?php
/* @var $this WmmasterController */
/* @var $model Wmmaster */
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
	'id'=>'wmmaster-form',
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
        <?php endif; ?>
        <!-- </Remove Above fields & convert it to hidden fields> -->
        
        <!-- <Removed fields converted to hidden fields> -->
        <?php 
            echo $form->hiddenField($model,'idccfyear'); 
        ?>
        <!-- </Removed fields converted to hidden fields> -->

	<div class="row">
		<?php echo $form->labelEx($model,'wmappdate'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'wmappdate',
                    'id' => 'wmappdate',
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
 		<?php echo $form->error($model,'wmappdate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ownername'); ?>
		<?php echo $form->textField($model,'ownername',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'ownername'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idptmaster'); ?>
		<?php echo $form->textField($model,'idptmaster',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'idptmaster'); ?>
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

	<div class="row">
		<?php echo $form->labelEx($model,'idwmplumber'); ?>
		<?php $this->widget('ext.FKField.FKField', array(
                    'model' => $model,
                    'relatedmodel' => new Wmplumber('search'),
                    'attribute' => 'idwmplumber',
                    'title' => LgmisWMModule::t('Wmplumber'),
                    'columns' => array(
                        'idwmplumber', 'plumbername',
                    ),
                )); ?>
 		<?php echo $form->error($model,'idwmplumber'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idccstatus'); ?>
		<?php $this->widget('ext.FKField.FKField', array(
                    'model' => $model,
                    'relatedmodel' => new Ccstatus('search'),
                    'attribute' => 'idccstatus',
                    'title' => LgmisWMModule::t('Ccstatus'),
                    'columns' => array(
                        'idccstatus', 'statusname',
                    ),
                )); ?>
 		<?php echo $form->error($model,'idccstatus'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mainlindia'); ?>
		<?php echo $form->textField($model,'mainlindia',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'mainlindia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mainlindis'); ?>
		<?php echo $form->textField($model,'mainlindis',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'mainlindis'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'wmdetails'); ?>
		<?php echo $form->textField($model,'wmdetails',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'wmdetails'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'wmmasterflag'); ?>
		<?php echo $form->textField($model,'wmmasterflag'); ?>
		<?php echo $form->error($model,'wmmasterflag'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idwmexsumptor'); ?>
		<?php $this->widget('ext.FKField.FKField', array(
                    'model' => $model,
                    'relatedmodel' => new Wmexsumptor('search'),
                    'attribute' => 'idwmexsumptor',
                    'title' => LgmisWMModule::t('Wmexsumptor'),
                    'columns' => array(
                        'idwmexsumptor', 'exsumptortype',
                    ),
                )); ?>
 		<?php echo $form->error($model,'idwmexsumptor'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? LgmisWMModule::t('Create') : LgmisWMModule::t('Save'), array('id'=>'wmmaster-form-submit')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
if ($model->isNewRecord) {
    $this->widget('ext.ajaxform.JAjaxForm', array(
        'formId' => 'wmmaster-form',
        'options' => array(
            'dataType' => 'json',
            'success' => 'js:function(data,statusText) { 
                    if(data.status == 1){
                        $.fn.yiiGridView.update("wmmaster-grid", {
                              data: $(this).serialize()
                        });

                        $("#StatusBar").jnotifyAddMessage({
                                text: data.message,
                                permanent: false,
                                type: "message"
                        });                        

                        $("#wmmaster-form").resetForm();
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
        'formId' => 'wmmaster-form',
        'options' => array(
            'dataType' => 'json',
            'success' => 'js:function(data,statusText) { 
                    if(data.status == 1){
                        $.fn.yiiGridView.update("wmmaster-grid", {
                              data: $(this).serialize()
                        });
                        $("#wmmaster-form-dialog").dialog("close").destroy();
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