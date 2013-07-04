<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idbdbirthinformer'); ?>
		<?php echo $form->textField($model,'idbdbirthinformer',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'informername'); ?>
		<?php echo $form->textField($model,'informername',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'informeraddress'); ?>
		<?php echo $form->textField($model,'informeraddress',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'childname'); ?>
		<?php echo $form->textField($model,'childname',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dob'); ?>
		<?php echo $form->textField($model,'dob'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'timeofbirth'); ?>
		<?php echo $form->textField($model,'timeofbirth'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idccsex'); ?>
		<?php echo $form->textField($model,'idccsex',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fathername'); ?>
		<?php echo $form->textField($model,'fathername',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fathereducation'); ?>
		<?php echo $form->textField($model,'fathereducation',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mothername'); ?>
		<?php echo $form->textField($model,'mothername',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idccreligion'); ?>
		<?php echo $form->textField($model,'idccreligion',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'motheroccupation'); ?>
		<?php echo $form->textField($model,'motheroccupation',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fatheroccupation'); ?>
		<?php echo $form->textField($model,'fatheroccupation',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'deliverymethod'); ?>
		<?php echo $form->textField($model,'deliverymethod',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'birthplace'); ?>
		<?php echo $form->textField($model,'birthplace',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('application', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->