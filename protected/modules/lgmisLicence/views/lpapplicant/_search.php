<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idlpapplicant'); ?>
		<?php echo $form->textField($model,'idlpapplicant',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bussname'); ?>
		<?php echo $form->textField($model,'bussname',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bussaddress'); ?>
		<?php echo $form->textField($model,'bussaddress',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idcccolony'); ?>
		<?php echo $form->dropDownList($model,'idcccolony', CHtml::listData(Cccolony::model()->findAll(), 'idcccolony', 'colonyname')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idlpbtype'); ?>
		<?php echo $form->dropDownList($model,'idlpbtype', CHtml::listData(Lpbtype::model()->findAll(), 'idlpbtype', 'btype')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idlpbnature'); ?>
		<?php echo $form->dropDownList($model,'idlpbnature', CHtml::listData(Lpbnature::model()->findAll(), 'idlpbnature', 'lpnature')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'oldregno'); ?>
		<?php echo $form->textField($model,'oldregno',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'oldlicno'); ?>
		<?php echo $form->textField($model,'oldlicno',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'otheroffice'); ?>
		<?php echo $form->textField($model,'otheroffice',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'othergodown'); ?>
		<?php echo $form->textField($model,'othergodown',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'otherworkingplace'); ?>
		<?php echo $form->textField($model,'otherworkingplace',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idlptype'); ?>
		<?php echo $form->dropDownList($model,'idlptype', CHtml::listData(Lptype::model()->findAll(), 'idlptype', 'lptype')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'workingyoungm'); ?>
		<?php echo $form->textField($model,'workingyoungm',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'workingyoungf'); ?>
		<?php echo $form->textField($model,'workingyoungf',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'workingadultm'); ?>
		<?php echo $form->textField($model,'workingadultm',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'workingadultf'); ?>
		<?php echo $form->textField($model,'workingadultf',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('application', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->