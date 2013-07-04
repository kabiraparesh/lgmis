<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idssnominee'); ?>
		<?php echo $form->textField($model,'idssnominee',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'age'); ?>
		<?php echo $form->textField($model,'age',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idccrelation'); ?>
		<?php echo $form->dropDownList($model,'idccrelation', CHtml::listData(Ccrelation::model()->findAll(), 'idccrelation', 'relationname')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idssapplication'); ?>
		<?php echo $form->dropDownList($model,'idssapplication', CHtml::listData(Ssapplication::model()->findAll(), 'idssapplication', 'type')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('application', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->