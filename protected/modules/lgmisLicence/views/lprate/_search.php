<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idlprate'); ?>
		<?php echo $form->textField($model,'idlprate',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idccfyear'); ?>
		<?php echo $form->dropDownList($model,'idccfyear', CHtml::listData(Ccfyear::model()->findAll(), 'idccfyear', 'fyear')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idlpbnature'); ?>
		<?php echo $form->dropDownList($model,'idlpbnature', CHtml::listData(Lpbnature::model()->findAll(), 'idlpbnature', 'lpnature')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'naturerate'); ?>
		<?php echo $form->textField($model,'naturerate',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'renewalrate'); ?>
		<?php echo $form->textField($model,'renewalrate',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cancelationrate'); ?>
		<?php echo $form->textField($model,'cancelationrate',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'penaltyrate'); ?>
		<?php echo $form->textField($model,'penaltyrate',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('application', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->