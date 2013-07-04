<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idcmgroup'); ?>
		<?php echo $form->textField($model,'idcmgroup',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'groupname'); ?>
		<?php echo $form->textField($model,'groupname',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idccdepartment'); ?>
		<?php echo $form->dropDownList($model,'idccdepartment', CHtml::listData(Ccdepartment::model()->findAll(), 'idccdepartment', 'departmentname')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('application', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->