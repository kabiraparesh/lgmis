<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idbddeathinformer'); ?>
		<?php echo $form->textField($model,'idbddeathinformer',array('size'=>10,'maxlength'=>10)); ?>
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
		<?php echo $form->label($model,'personname'); ?>
		<?php echo $form->textField($model,'personname',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dod'); ?>
		<?php echo $form->textField($model,'dod'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'timeofdeath'); ?>
		<?php echo $form->textField($model,'timeofdeath'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idccsex'); ?>
		<?php echo $form->textField($model,'idccsex',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fhname'); ?>
		<?php echo $form->textField($model,'fhname',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'crematorymethod'); ?>
		<?php echo $form->textField($model,'crematorymethod',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reasondeath'); ?>
		<?php echo $form->textField($model,'reasondeath',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idccreligion'); ?>
		<?php echo $form->textField($model,'idccreligion',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'other'); ?>
		<?php echo $form->textField($model,'other',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('application', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->