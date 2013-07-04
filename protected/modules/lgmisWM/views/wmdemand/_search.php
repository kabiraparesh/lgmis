<?php
/* @var $this WmdemandController */
/* @var $model Wmdemand */
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
	'id'=>'search-wmdemand-form',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idwmdemand'); ?>
		<?php echo $form->textField($model,'idwmdemand',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idwmmaster'); ?>
		<?php echo $form->dropDownList($model,'idwmmaster', CHtml::listData(Wmmaster::model()->findAll(), 'idwmmaster', 'saralno')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idccfyear'); ?>
		<?php echo $form->dropDownList($model,'idccfyear', CHtml::listData(Ccfyear::model()->findAll(), 'idccfyear', 'fyear')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'period'); ?>
		<?php echo $form->textField($model,'period',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wmoldbalance'); ?>
		<?php echo $form->textField($model,'wmoldbalance',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wmsurcharge'); ?>
		<?php echo $form->textField($model,'wmsurcharge',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wmdemandamt'); ?>
		<?php echo $form->textField($model,'wmdemandamt',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wmdemanddate'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'wmdemanddate',
                    'id' => 'search-wmdemanddate',
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

	<div class="row buttons">
		<?php echo CHtml::submitButton(LgmisWMModule::t('Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->