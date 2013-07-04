<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idlprelative'); ?>
		<?php echo $form->textField($model,'idlprelative',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'relativename'); ?>
		<?php echo $form->textField($model,'relativename',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'relativeage'); ?>
		<?php echo $form->textField($model,'relativeage',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idccsex'); ?>
		<?php echo $form->dropDownList($model,'idccsex', CHtml::listData(Ccsex::model()->findAll(), 'idccsex', 'sexname')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idccrelation'); ?>
		<?php echo $form->dropDownList($model,'idccrelation', CHtml::listData(Ccrelation::model()->findAll(), 'idccrelation', 'relationname')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idlpapplicant'); ?>
		<?php echo $form->dropDownList($model,'idlpapplicant', CHtml::listData(Lpapplicant::model()->findAll(), 'idlpapplicant', 'bussname')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('application', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->