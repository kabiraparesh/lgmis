<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idrcfamdetail'); ?>
		<?php echo $form->textField($model,'idrcfamdetail',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
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
		<?php echo $form->label($model,'voterno'); ?>
		<?php echo $form->textField($model,'voterno',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hfname'); ?>
		<?php echo $form->textField($model,'hfname',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'headoffamily'); ?>
		<?php echo $form->textField($model,'headoffamily',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idrcapplication'); ?>
		<?php echo $form->dropDownList($model,'idrcapplication', CHtml::listData(Rcapplication::model()->findAll(), 'idrcapplication', 'adate')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('application', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->