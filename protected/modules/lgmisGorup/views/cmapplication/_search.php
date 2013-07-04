<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idcmapplication'); ?>
		<?php echo $form->textField($model,'idcmapplication',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idcmsource'); ?>
		<?php echo $form->dropDownList($model,'idcmsource', CHtml::listData(Cmsource::model()->findAll(), 'idcmsource', 'source')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'applicantname'); ?>
		<?php echo $form->textField($model,'applicantname',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'applicantaddress'); ?>
		<?php echo $form->textField($model,'applicantaddress',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idccstatus'); ?>
		<?php echo $form->textField($model,'idccstatus',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idcmprioritylevel'); ?>
		<?php echo $form->dropDownList($model,'idcmprioritylevel', CHtml::listData(Cmprioritylevel::model()->findAll(), 'idcmprioritylevel', 'priorityname')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idcmperiod'); ?>
		<?php echo $form->dropDownList($model,'idcmperiod', CHtml::listData(Cmperiod::model()->findAll(), 'idcmperiod', 'periodtype')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idcmcategories'); ?>
		<?php echo $form->dropDownList($model,'idcmcategories', CHtml::listData(Cmcategories::model()->findAll(), 'idcmcategories', 'categoriesname')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'complaintlocation'); ?>
		<?php echo $form->textField($model,'complaintlocation',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idcccolony'); ?>
		<?php echo $form->dropDownList($model,'idcccolony', CHtml::listData(Cccolony::model()->findAll(), 'idcccolony', 'colonyname')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'applicantphone'); ?>
		<?php echo $form->textField($model,'applicantphone',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'applicantmobile'); ?>
		<?php echo $form->textField($model,'applicantmobile',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'applicantemail'); ?>
		<?php echo $form->textField($model,'applicantemail',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('application', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->