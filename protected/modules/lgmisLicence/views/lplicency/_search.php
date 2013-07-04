<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idlplicency'); ?>
		<?php echo $form->textField($model,'idlplicency',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'licencyname'); ?>
		<?php echo $form->textField($model,'licencyname',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'licencyage'); ?>
		<?php echo $form->textField($model,'licencyage',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idccsex'); ?>
		<?php echo $form->dropDownList($model,'idccsex', CHtml::listData(Ccsex::model()->findAll(), 'idccsex', 'sexname')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'licencyaddress'); ?>
		<?php echo $form->textField($model,'licencyaddress',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idlpapplicant'); ?>
		<?php echo $form->dropDownList($model,'idlpapplicant', CHtml::listData(Lpapplicant::model()->findAll(), 'idlpapplicant', 'bussname')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'licencycontact'); ?>
		<?php echo $form->textField($model,'licencycontact',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('application', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->