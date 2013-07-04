<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idbdbirthapplication'); ?>
		<?php echo $form->textField($model,'idbdbirthapplication',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idbdbirthinformer'); ?>
		<?php echo $form->textField($model,'idbdbirthinformer',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'applicationdate'); ?>
		<?php echo $form->textField($model,'applicationdate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idccstatus'); ?>
		<?php echo $form->textField($model,'idccstatus',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'applicantname'); ?>
		<?php echo $form->textField($model,'applicantname',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'applicantaddress'); ?>
		<?php echo $form->textField($model,'applicantaddress',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dob'); ?>
		<?php echo $form->textField($model,'dob'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('application', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->