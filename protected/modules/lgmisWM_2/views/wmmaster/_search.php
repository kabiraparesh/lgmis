<?php
/* @var $this WmmasterController */
/* @var $model Wmmaster */
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
	'id'=>'search-wmmaster-form',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idwmmaster'); ?>
		<?php echo $form->textField($model,'idwmmaster',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'saralno'); ?>
		<?php echo $form->textField($model,'saralno',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'connectionno'); ?>
		<?php echo $form->textField($model,'connectionno',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ownername'); ?>
		<?php echo $form->textField($model,'ownername',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fathername'); ?>
		<?php echo $form->textField($model,'fathername',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idcccolony'); ?>
		<?php echo $form->dropDownList($model,'idcccolony', CHtml::listData(Cccolony::model()->findAll(), 'idcccolony', 'colonyname')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idccfyear'); ?>
		<?php echo $form->dropDownList($model,'idccfyear', CHtml::listData(Ccfyear::model()->findAll(), 'idccfyear', 'fyear')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wmappdate'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'wmappdate',
                    'id' => 'search-wmappdate',
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

	<div class="row">
		<?php echo $form->label($model,'idptmaster'); ?>
		<?php echo $form->textField($model,'idptmaster',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idwmtype'); ?>
		<?php echo $form->dropDownList($model,'idwmtype', CHtml::listData(Wmtype::model()->findAll(), 'idwmtype', 'wmtype')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idwmsize'); ?>
		<?php echo $form->dropDownList($model,'idwmsize', CHtml::listData(Wmsize::model()->findAll(), 'idwmsize', 'wmsize')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wmtape'); ?>
		<?php echo $form->textField($model,'wmtape',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idwmplumber'); ?>
		<?php echo $form->dropDownList($model,'idwmplumber', CHtml::listData(Wmplumber::model()->findAll(), 'idwmplumber', 'plumbername')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idccstatus'); ?>
		<?php echo $form->dropDownList($model,'idccstatus', CHtml::listData(Ccstatus::model()->findAll(), 'idccstatus', 'statusname')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mainlindia'); ?>
		<?php echo $form->textField($model,'mainlindia',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mainlindis'); ?>
		<?php echo $form->textField($model,'mainlindis',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wmdetails'); ?>
		<?php echo $form->textField($model,'wmdetails',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wmmasterflag'); ?>
		<?php echo $form->textField($model,'wmmasterflag'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'disconnectdate'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'disconnectdate',
                    'id' => 'search-disconnectdate',
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

	<div class="row">
		<?php echo $form->label($model,'idwmexsumptor'); ?>
		<?php echo $form->dropDownList($model,'idwmexsumptor', CHtml::listData(Wmexsumptor::model()->findAll(), 'idwmexsumptor', 'exsumptortype')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'params'); ?>
		<?php echo $form->textArea($model,'params',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(LgmisWMModule::t('Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->