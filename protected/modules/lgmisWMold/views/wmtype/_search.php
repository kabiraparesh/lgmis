<?php
/* @var $this WmtypeController */
/* @var $model Wmtype */
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
	'id'=>'search-wmtype-form',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idwmtype'); ?>
		<?php echo $form->textField($model,'idwmtype',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wmtype'); ?>
		<?php echo $form->textField($model,'wmtype',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(LgmisWMModule::t('Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->