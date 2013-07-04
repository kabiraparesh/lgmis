<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idhrleavesetting'); ?>
		<?php echo $form->textField($model,'idhrleavesetting',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'casualleave'); ?>
		<?php echo $form->textField($model,'casualleave'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'medicalleave'); ?>
		<?php echo $form->textField($model,'medicalleave'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'paidleave'); ?>
		<?php echo $form->textField($model,'paidleave'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'otherleave'); ?>
		<?php echo $form->textField($model,'otherleave'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idccfyear'); ?>
		<?php echo $form->dropDownList($model,'idccfyear', CHtml::listData(Ccfyear::model()->findAll(), 'idccfyear', 'fyear')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'earnedleave'); ?>
		<?php echo $form->textField($model,'earnedleave',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('application', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->