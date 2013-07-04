<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idbparearate'); ?>
		<?php echo $form->textField($model,'idbparearate',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idccfyear'); ?>
		<?php echo $form->dropDownList($model,'idccfyear', CHtml::listData(Ccfyear::model()->findAll(), 'idccfyear', 'fyear')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idbpusagetype'); ?>
		<?php echo $form->dropDownList($model,'idbpusagetype', CHtml::listData(Bpusagetype::model()->findAll(), 'idbpusagetype', 'usagetype')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'raterange'); ?>
		<?php echo $form->textArea($model,'raterange',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'scheduleperiod'); ?>
		<?php echo $form->textField($model,'scheduleperiod',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('application', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->