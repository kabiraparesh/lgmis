<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idhrleavemaster'); ?>
		<?php echo $form->textField($model,'idhrleavemaster',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idhremployee'); ?>
		<?php echo $form->dropDownList($model,'idhremployee', CHtml::listData(Hremployee::model()->findAll(), 'idhremployee', 'empname')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'foryear'); ?>
		<?php echo $form->textField($model,'foryear',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'formonth'); ?>
		<?php echo $form->textField($model,'formonth',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'workingdays'); ?>
		<?php echo $form->textField($model,'workingdays',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'attendence'); ?>
		<?php echo $form->textField($model,'attendence',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'casualleave'); ?>
		<?php echo $form->textField($model,'casualleave',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'medicalleave'); ?>
		<?php echo $form->textField($model,'medicalleave',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'paidleave'); ?>
		<?php echo $form->textField($model,'paidleave',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'otherleave'); ?>
		<?php echo $form->textField($model,'otherleave',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idccfyear'); ?>
		<?php echo $form->dropDownList($model,'idccfyear', CHtml::listData(Ccfyear::model()->findAll(), 'idccfyear', 'fyear')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'earnedleave'); ?>
		<?php echo $form->textField($model,'earnedleave',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('application', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->