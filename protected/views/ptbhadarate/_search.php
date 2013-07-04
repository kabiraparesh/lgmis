<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idptbhadarate'); ?>
		<?php echo $form->textField($model,'idptbhadarate',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'aresidential'); ?>
		<?php echo $form->textField($model,'aresidential',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'acommercial'); ?>
		<?php echo $form->textField($model,'acommercial',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bresidential'); ?>
		<?php echo $form->textField($model,'bresidential',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bcommercial'); ?>
		<?php echo $form->textField($model,'bcommercial',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cresidential'); ?>
		<?php echo $form->textField($model,'cresidential',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ccommercial'); ?>
		<?php echo $form->textField($model,'ccommercial',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dresidential'); ?>
		<?php echo $form->textField($model,'dresidential',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dcommercial'); ?>
		<?php echo $form->textField($model,'dcommercial',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idccfyear'); ?>
		<?php echo $form->textField($model,'idccfyear',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idptrange'); ?>
		<?php echo $form->textField($model,'idptrange',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idptpropertyon'); ?>
		<?php echo $form->textField($model,'idptpropertyon',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'eresidential'); ?>
		<?php echo $form->textField($model,'eresidential',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ecommercial'); ?>
		<?php echo $form->textField($model,'ecommercial',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('application', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->