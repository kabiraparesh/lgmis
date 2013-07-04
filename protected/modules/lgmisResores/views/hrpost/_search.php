<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idhrpost'); ?>
		<?php echo $form->textField($model,'idhrpost',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'postname'); ?>
		<?php echo $form->textField($model,'postname',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idccdepartment'); ?>
		<?php echo $form->dropDownList($model,'idccdepartment', CHtml::listData(Ccdepartment::model()->findAll(), 'idccdepartment', 'departmentname')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idhrcategory'); ?>
		<?php echo $form->dropDownList($model,'idhrcategory', CHtml::listData(Hrcategory::model()->findAll(), 'idhrcategory', 'category')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idhrclass'); ?>
		<?php echo $form->dropDownList($model,'idhrclass', CHtml::listData(Hrclass::model()->findAll(), 'idhrclass', 'hrclass')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idhrbasic'); ?>
		<?php echo $form->dropDownList($model,'idhrbasic', CHtml::listData(Hrbasic::model()->findAll(), 'idhrbasic', 'start')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('application', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->