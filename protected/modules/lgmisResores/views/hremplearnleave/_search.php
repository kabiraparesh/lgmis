<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idhremplearnleave'); ?>
		<?php echo $form->textField($model,'idhremplearnleave',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idhremployee'); ?>
		<?php echo $form->dropDownList($model,'idhremployee', CHtml::listData(Hremployee::model()->findAll(), 'idhremployee', 'empname')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'earnedleaveno'); ?>
		<?php echo $form->textField($model,'earnedleaveno',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'earnedleavedate'); ?>
		<?php/* echo $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'earnedleavedate',
                    'id' => 'earnedleavedate',
                    'options' => array(
                        'showAnim' => 'fold',
                        'dateFormat' => 'yy-mm-dd',
                    ),
                    'htmlOptions' => array(
                        'class' => 'date'
                    ),
                    'cssFile' => false, 
                    'scriptFile' => false,
                )); */?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'earnedleavestartmonth'); ?>
		<?php echo $form->textField($model,'earnedleavestartmonth',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'earnedleaveendmonth'); ?>
		<?php echo $form->textField($model,'earnedleaveendmonth',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'earnedleave'); ?>
		<?php echo $form->textField($model,'earnedleave',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'earnedleavepayment'); ?>
		<?php echo $form->textField($model,'earnedleavepayment',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'givenamount'); ?>
		<?php echo $form->textField($model,'givenamount',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'earnedleavenarration'); ?>
		<?php echo $form->textArea($model,'earnedleavenarration',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('application', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->