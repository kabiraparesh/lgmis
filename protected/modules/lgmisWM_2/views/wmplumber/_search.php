<?php
/* @var $this WmplumberController */
/* @var $model Wmplumber */
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
	'id'=>'search-wmplumber-form',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idwmplumber'); ?>
		<?php echo $form->textField($model,'idwmplumber',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'plumbername'); ?>
		<?php echo $form->textField($model,'plumbername',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'details'); ?>
		<?php echo $form->textField($model,'details',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'phoneno'); ?>
		<?php echo $form->textField($model,'phoneno',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(LgmisWMModule::t('Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->