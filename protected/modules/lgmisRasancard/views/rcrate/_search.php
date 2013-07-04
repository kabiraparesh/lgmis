<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idrcrate'); ?>
		<?php echo $form->textField($model,'idrcrate',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idccfyear'); ?>
		<?php echo $form->dropDownList($model,'idccfyear', CHtml::listData(Ccfyear::model()->findAll(), 'idccfyear', 'fyear')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'whitercard'); ?>
		<?php echo $form->textField($model,'whitercard',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bluercard'); ?>
		<?php echo $form->textField($model,'bluercard',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'yellowrcard'); ?>
		<?php echo $form->textField($model,'yellowrcard',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'newrcard'); ?>
		<?php echo $form->textField($model,'newrcard',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'renewrcard'); ?>
		<?php echo $form->textField($model,'renewrcard',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reviewrcard'); ?>
		<?php echo $form->textField($model,'reviewrcard',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('application', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->