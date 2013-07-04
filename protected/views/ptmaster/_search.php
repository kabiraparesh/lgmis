<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idptmaster'); ?>
		<?php echo $form->textField($model,'idptmaster',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'caseno'); ?>
		<?php echo $form->textField($model,'caseno',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idccward'); ?>
		<?php echo $form->textField($model,'idccward',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idpttype'); ?>
		<?php echo $form->textField($model,'idpttype',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ownername'); ?>
		<?php echo $form->textField($model,'ownername',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'owneraddress'); ?>
		<?php echo $form->textField($model,'owneraddress',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'propertyno'); ?>
		<?php echo $form->textField($model,'propertyno',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'propertyaddress'); ?>
		<?php echo $form->textField($model,'propertyaddress',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'constyear'); ?>
		<?php echo $form->textField($model,'constyear',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'transferbreakup'); ?>
		<?php echo $form->textField($model,'transferbreakup'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'trashed'); ?>
		<?php echo $form->textField($model,'trashed'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ledgerno'); ?>
		<?php echo $form->textField($model,'ledgerno',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idcccolony'); ?>
		<?php echo $form->textField($model,'idcccolony',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idptrange'); ?>
		<?php echo $form->textField($model,'idptrange',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idptpropertyon'); ?>
		<?php echo $form->textField($model,'idptpropertyon',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'propertytax'); ?>
		<?php echo $form->textField($model,'propertytax'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idptservicetax'); ?>
		<?php echo $form->textField($model,'idptservicetax'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idptexsumtors'); ?>
		<?php echo $form->textArea($model,'idptexsumtors',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'propertydetails'); ?>
		<?php echo $form->textArea($model,'propertydetails',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idccsex'); ?>
		<?php echo $form->textField($model,'idccsex',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('application', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->