<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idhremplmember'); ?>
		<?php echo $form->textField($model,'idhremplmember',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'membername'); ?>
		<?php echo $form->textField($model,'membername',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'memberage'); ?>
		<?php echo $form->textField($model,'memberage',array('size'=>10,'maxlength'=>10)); ?>
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
		<?php echo $form->label($model,'issuccessor'); ?>
		<?php echo $form->textField($model,'issuccessor',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idhremployee'); ?>
		<?php echo $form->dropDownList($model,'idhremployee', CHtml::listData(Hremployee::model()->findAll(), 'idhremployee', 'empname')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('application', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->