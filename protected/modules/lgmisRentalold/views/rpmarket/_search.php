<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idrpmarket'); ?>
		<?php echo $form->textField($model,'idrpmarket',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mktname'); ?>
		<?php echo $form->textField($model,'mktname',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idcccolony'); ?>
		<?php echo $form->dropDownList($model,'idcccolony', CHtml::listData(Cccolony::model()->findAll(), 'idcccolony', 'colonyname')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idrplocation'); ?>
		<?php echo $form->dropDownList($model,'idrplocation', CHtml::listData(Rplocation::model()->findAll(), 'idrplocation', 'location')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idccbillingperiod'); ?>
		<?php echo $form->dropDownList($model,'idccbillingperiod', CHtml::listData(Ccbillingperiod::model()->findAll(), 'idccbillingperiod', 'billingperiodname')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('application', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->