<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idpttransaction'); ?>
		<?php echo $form->textField($model,'idpttransaction',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idptmaster'); ?>
		<?php echo $form->textField($model,'idptmaster',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idccfyear'); ?>
		<?php echo $form->textField($model,'idccfyear',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'oldpropertytax'); ?>
		<?php echo $form->textField($model,'oldpropertytax',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'oldservicetax'); ?>
		<?php echo $form->textField($model,'oldservicetax',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'oldminsamekittax'); ?>
		<?php echo $form->textField($model,'oldminsamekittax',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'oldsamekittax'); ?>
		<?php echo $form->textField($model,'oldsamekittax',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'oldwaterpttax'); ?>
		<?php echo $form->textField($model,'oldwaterpttax',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'oldeducess'); ?>
		<?php echo $form->textField($model,'oldeducess',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'oldsubcess1'); ?>
		<?php echo $form->textField($model,'oldsubcess1',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'oldsubcess2'); ?>
		<?php echo $form->textField($model,'oldsubcess2',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'oldpttaxdiscount'); ?>
		<?php echo $form->textField($model,'oldpttaxdiscount',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'oldpttaxsurcharge'); ?>
		<?php echo $form->textField($model,'oldpttaxsurcharge',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'propertytax'); ?>
		<?php echo $form->textField($model,'propertytax',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'servicetax'); ?>
		<?php echo $form->textField($model,'servicetax',array('size'=>15,'maxlength'=>15)); ?>
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
		<?php echo $form->label($model,'resbhada'); ?>
		<?php echo $form->textField($model,'resbhada',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'combhada'); ?>
		<?php echo $form->textField($model,'combhada',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rentbhada'); ?>
		<?php echo $form->textField($model,'rentbhada',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'resbhadadis'); ?>
		<?php echo $form->textField($model,'resbhadadis',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'combhadadis'); ?>
		<?php echo $form->textField($model,'combhadadis',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rentbhadadis'); ?>
		<?php echo $form->textField($model,'rentbhadadis',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'resbhadaothdis'); ?>
		<?php echo $form->textField($model,'resbhadaothdis',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'combhadaothdis'); ?>
		<?php echo $form->textField($model,'combhadaothdis',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rentbhadaothdis'); ?>
		<?php echo $form->textField($model,'rentbhadaothdis',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'resbhada12kdis'); ?>
		<?php echo $form->textField($model,'resbhada12kdis',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'combhada12kdis'); ?>
		<?php echo $form->textField($model,'combhada12kdis',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rentbhada12kdis'); ?>
		<?php echo $form->textField($model,'rentbhada12kdis',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'respttax'); ?>
		<?php echo $form->textField($model,'respttax',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'compttax'); ?>
		<?php echo $form->textField($model,'compttax',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rentpttax'); ?>
		<?php echo $form->textField($model,'rentpttax',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'resptselfdis'); ?>
		<?php echo $form->textField($model,'resptselfdis',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comptselfdis'); ?>
		<?php echo $form->textField($model,'comptselfdis',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rentptselfdis'); ?>
		<?php echo $form->textField($model,'rentptselfdis',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('application', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->