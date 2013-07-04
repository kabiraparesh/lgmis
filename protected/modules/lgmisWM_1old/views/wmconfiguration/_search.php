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

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'id'=>'search-wmconfiguration-form',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idwmconfiguration'); ?>
		<?php echo $form->textField($model,'idwmconfiguration',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idccfyear'); ?>
		<?php echo $form->dropDownList($model,'idccfyear', CHtml::listData(Ccfyear::model()->findAll(), 'idccfyear', 'fyear')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idwmtype'); ?>
		<?php echo $form->dropDownList($model,'idwmtype', CHtml::listData(Wmtype::model()->findAll(), 'idwmtype', 'wmtype')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idwmsize'); ?>
		<?php echo $form->dropDownList($model,'idwmsize', CHtml::listData(Wmsize::model()->findAll(), 'idwmsize', 'wmsize')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wmtape'); ?>
		<?php echo $form->textField($model,'wmtape',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'newconncharge'); ?>
		<?php echo $form->textField($model,'newconncharge',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tempconncharge'); ?>
		<?php echo $form->textField($model,'tempconncharge',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reconncharge'); ?>
		<?php echo $form->textField($model,'reconncharge',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tempdisconncharge'); ?>
		<?php echo $form->textField($model,'tempdisconncharge',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'surcharge'); ?>
		<?php echo $form->textField($model,'surcharge',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'monthlycharges'); ?>
		<?php echo $form->textField($model,'monthlycharges',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->