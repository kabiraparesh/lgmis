<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idpttaxrate'); ?>
		<?php echo $form->textField($model,'idpttaxrate',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'permanentdiscount'); ?>
		<?php echo $form->textField($model,'permanentdiscount',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'otherdiscount'); ?>
		<?php echo $form->textField($model,'otherdiscount',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'discount12k'); ?>
		<?php echo $form->textField($model,'discount12k',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pttaxrate'); ?>
		<?php echo $form->textField($model,'pttaxrate',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'selfusediscount'); ?>
		<?php echo $form->textField($model,'selfusediscount',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'panelty'); ?>
		<?php echo $form->textField($model,'panelty',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'minsamekittax'); ?>
		<?php echo $form->textField($model,'minsamekittax',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'samekittax'); ?>
		<?php echo $form->textField($model,'samekittax',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'waterpttax'); ?>
		<?php echo $form->textField($model,'waterpttax',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'educess'); ?>
		<?php echo $form->textField($model,'educess',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'subcess1'); ?>
		<?php echo $form->textField($model,'subcess1',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'subcess2'); ?>
		<?php echo $form->textField($model,'subcess2',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pttaxdiscount'); ?>
		<?php echo $form->textField($model,'pttaxdiscount',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pttaxsurcharge'); ?>
		<?php echo $form->textField($model,'pttaxsurcharge',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idccfyear'); ?>
		<?php echo $form->textField($model,'idccfyear',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('application', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->