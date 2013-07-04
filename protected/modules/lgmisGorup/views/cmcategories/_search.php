<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idcmcategories'); ?>
		<?php echo $form->textField($model,'idcmcategories',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'categoriesname'); ?>
		<?php echo $form->textField($model,'categoriesname',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idcmgroup'); ?>
		<?php echo $form->dropDownList($model,'idcmgroup', CHtml::listData(Cmgroup::model()->findAll(), 'idcmgroup', 'groupname')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('application', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->