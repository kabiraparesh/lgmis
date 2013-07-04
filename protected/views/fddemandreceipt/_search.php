<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idfddemandreceipt'); ?>
		<?php echo $form->textField($model,'idfddemandreceipt',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'demanddate'); ?>
		<?php echo $form->textField($model,'demanddate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idccdepartment'); ?>
		<?php echo $form->textField($model,'idccdepartment',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'demandnumber'); ?>
		<?php echo $form->textField($model,'demandnumber',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'demandinname'); ?>
		<?php echo $form->textField($model,'demandinname',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'demandamount'); ?>
		<?php echo $form->textField($model,'demandamount',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'amountpaid'); ?>
		<?php echo $form->textField($model,'amountpaid',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'paymenttype'); ?>
		<?php echo $form->textField($model,'paymenttype'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'chequeddpayorderno'); ?>
		<?php echo $form->textField($model,'chequeddpayorderno',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'chequeddpayorderdate'); ?>
		<?php echo $form->textField($model,'chequeddpayorderdate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bankname'); ?>
		<?php echo $form->textField($model,'bankname',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'branchname'); ?>
		<?php echo $form->textField($model,'branchname',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'windowno'); ?>
		<?php echo $form->textField($model,'windowno',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('application', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->