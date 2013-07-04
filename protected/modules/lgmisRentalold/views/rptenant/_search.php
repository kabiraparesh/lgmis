<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idrptenant'); ?>
		<?php echo $form->textField($model,'idrptenant',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idrpshop'); ?>
		<?php echo $form->dropDownList($model,'idrpshop', CHtml::listData(Rpshop::model()->findAll(), 'idrpshop', 'shopno')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tenantname'); ?>
		<?php echo $form->textField($model,'tenantname',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tenantaddress'); ?>
		<?php echo $form->textField($model,'tenantaddress',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tenantcity'); ?>
		<?php echo $form->textField($model,'tenantcity',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tenantcontact'); ?>
		<?php echo $form->textField($model,'tenantcontact',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hirefrom'); ?>
		<?php /*echo $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'hirefrom',
                    'id' => 'hirefrom',
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
		<?php echo $form->label($model,'shopname'); ?>
		<?php echo $form->textField($model,'shopname',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'headoffice'); ?>
		<?php echo $form->textField($model,'headoffice',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'registrationno'); ?>
		<?php echo $form->textField($model,'registrationno',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('application', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->