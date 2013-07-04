<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idlptype'); ?>
		<?php echo $form->textField($model,'idlptype',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lptype'); ?>
		<?php echo $form->textField($model,'lptype',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('application', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->