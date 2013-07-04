<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idwellwisher'); ?>
		<?php echo $form->textField($model,'idwellwisher',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wishername'); ?>
		<?php echo $form->textField($model,'wishername',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wisherage'); ?>
		<?php echo $form->textField($model,'wisherage',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idccsex'); ?>
		<?php echo $form->dropDownList($model,'idccsex', CHtml::listData(Ccsex::model()->findAll(), 'idccsex', 'sexname')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wisheraddress'); ?>
		<?php echo $form->textField($model,'wisheraddress',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idlpapplicant'); ?>
		<?php echo $form->dropDownList($model,'idlpapplicant', CHtml::listData(Lpapplicant::model()->findAll(), 'idlpapplicant', 'bussname')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wishercontact'); ?>
		<?php echo $form->textField($model,'wishercontact',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('application', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->