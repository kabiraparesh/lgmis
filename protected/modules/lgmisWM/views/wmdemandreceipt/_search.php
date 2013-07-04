<?php
/* @var $this WmdemandreceiptController */
/* @var $model Wmdemandreceipt */
/* @var $form CActiveForm */
?>

<script>
    $(document).ready(function () {
        $( "input:submit").button();
    });
</script>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'id'=>'search-wmdemandreceipt-form',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idwmdemandreceipt'); ?>
		<?php echo $form->textField($model,'idwmdemandreceipt',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'demanddate'); ?>
		<?php echo $form->textField($model,'demanddate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idccdepartment'); ?>
		<?php echo $form->dropDownList($model,'idccdepartment', CHtml::listData(Ccdepartment::model()->findAll(), 'idccdepartment', 'departmentname')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idwmdemand'); ?>
		<?php echo $form->dropDownList($model,'idwmdemand', CHtml::listData(Wmdemand::model()->findAll(), 'idwmdemand', 'idwmmaster')); ?>
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
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'chequeddpayorderdate',
                    'id' => 'search-chequeddpayorderdate',
                    'options' => array(
                        'showAnim' => 'fold',
                        'dateFormat' => 'yy-mm-dd',
                    ),
                    'htmlOptions' => array(
                        'class' => 'date'
                    ),
                    'cssFile' => false, 
                    'scriptFile' => false,
                )); ?>
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

	<div class="row">
		<?php echo $form->label($model,'receiptbookno'); ?>
		<?php echo $form->textField($model,'receiptbookno',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'receiptno'); ?>
		<?php echo $form->textField($model,'receiptno',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'details'); ?>
		<?php echo $form->textArea($model,'details',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(LgmisWMModule::t('Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->