<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idlpbnature'); ?>
		<?php echo $form->textField($model,'idlpbnature',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lpnature'); ?>
		<?php echo $form->textField($model,'lpnature',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idlpmanadatory'); ?>
		<?php echo $form->dropDownList($model,'idlpmanadatory', CHtml::listData(Lpmanadatory::model()->findAll(), 'idlpmanadatory', 'lname')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idlpgroup'); ?>
		<?php echo $form->dropDownList($model,'idlpgroup', CHtml::listData(Lpgroup::model()->findAll(), 'idlpgroup', 'lpgroup')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('application', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->