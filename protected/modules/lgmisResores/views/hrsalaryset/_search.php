<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idhrsalaryset'); ?>
		<?php echo $form->textField($model,'idhrsalaryset',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idccfyear'); ?>
		<?php echo $form->dropDownList($model,'idccfyear', CHtml::listData(Ccfyear::model()->findAll(), 'idccfyear', 'fyear')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dafix'); ?>
		<?php echo $form->textField($model,'dafix',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'da'); ?>
		<?php echo $form->textField($model,'da',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hra'); ?>
		<?php echo $form->textField($model,'hra',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ca'); ?>
		<?php echo $form->textField($model,'ca',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cca'); ?>
		<?php echo $form->textField($model,'cca',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'specialpay'); ?>
		<?php echo $form->textField($model,'specialpay',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wa'); ?>
		<?php echo $form->textField($model,'wa',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pf'); ?>
		<?php echo $form->textField($model,'pf',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ir'); ?>
		<?php echo $form->textField($model,'ir',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dpf'); ?>
		<?php echo $form->textField($model,'dpf',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lpf'); ?>
		<?php echo $form->textField($model,'lpf',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fa'); ?>
		<?php echo $form->textField($model,'fa',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ga'); ?>
		<?php echo $form->textField($model,'ga',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gpf'); ?>
		<?php echo $form->textField($model,'gpf',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hrent'); ?>
		<?php echo $form->textField($model,'hrent',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wrent'); ?>
		<?php echo $form->textField($model,'wrent',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fbs'); ?>
		<?php echo $form->textField($model,'fbs',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'scst'); ?>
		<?php echo $form->textField($model,'scst',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('application', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->