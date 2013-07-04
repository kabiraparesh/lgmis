<script>
    $(document).ready(function () {
        $( "input:submit").button();
    });
</script>

<style>
fieldset {
	padding: 1em;
}

legend {
	padding: 0.2em 0.5em;
	font-size: 110%;
	text-align: right;
	font-weight: bold;
}
</style>

<fieldset>
	<legend><?php echo Yii::t('application', 'Current Owner Details'); ?></legend>
	<div>
		<?php
			$this->widget('ext.eziiui.widgets.CDetailViewUI', array('data'=>$model,	'attributes'=>array('ownername','fathername','owneraddress')));
		?>
	</div>
</fieldset>

<fieldset>
	<legend><?php echo Yii::t('application', 'New Owner Details'); ?></legend>

	<div class="form">
		<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'transfer-form',
				'enableAjaxValidation'=>true,
)); ?>

		<p class="note">
			<?php  echo Yii::t('application', 'Fields with <span class="required">*</span> are required.');?>
		</p>

		<?php echo $form->errorSummary($model); ?>

		<div class="row">
			<?php echo $form->labelEx($model,'ownername'); ?>
			<?php echo $form->textField($model,'ownername',array('size'=>45,'maxlength'=>45)); ?>
			<?php echo $form->error($model,'ownername'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'fathername'); ?>
			<?php echo $form->textField($model,'fathername',array('size'=>45,'maxlength'=>45)); ?>
			<?php echo $form->error($model,'fathername'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'owneraddress'); ?>
			<?php echo $form->textField($model,'owneraddress',array('size'=>45,'maxlength'=>45)); ?>
			<?php echo $form->error($model,'owneraddress'); ?>
		</div>

		<div class="row buttons">
			<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('application', 'Create') : Yii::t('application', 'Save')); ?>
		</div>

		<?php $this->endWidget(); ?>

	</div>
	<!-- form -->
</fieldset>

<?php
$this->widget('ext.ajaxform.JAjaxForm', array(
    'formId' => 'transfer-form',
    'options' => array(
        'dataType' => 'json',
        'success' => 'js:function(data,statusText) {
                    if(data.status == "Success"){
                        $.fn.yiiGridView.update("ptmaster-grid", {
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
