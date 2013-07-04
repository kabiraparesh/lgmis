<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idhremplinsurance'); ?>
		<?php echo $form->textField($model,'idhremplinsurance',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idhremployee'); ?>
		<?php echo $form->dropDownList($model,'idhremployee', CHtml::listData(Hremployee::model()->findAll(), 'idhremployee', 'empname')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'policynumber'); ?>
		<?php echo $form->textField($model,'policynumber',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'policydate'); ?>
		<?php/* echo $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'policydate',
                    'id' => 'policydate',
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
		<?php echo $form->label($model,'policyamount'); ?>
		<?php echo $form->textField($model,'policyamount',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'policyinstallment'); ?>
		<?php echo $form->textField($model,'policyinstallment',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'totalpremium'); ?>
		<?php echo $form->textField($model,'totalpremium',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'premiumstartdate'); ?>
		<?php/* echo $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'premiumstartdate',
                    'id' => 'premiumstartdate',
                    'options' => array(
                        'showAnim' => 'fold',
                        'dateFormat' => 'yy-mm-dd',
                    ),
                    'htmlOptions' => array(
                        'class' => 'date'
                    ),
                    'cssFile' => false, 
                    'scriptFile' => false,
                ));*/ ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'premiumenddate'); ?>
		<?php /*echo $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'premiumenddate',
                    'id' => 'premiumenddate',
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
		<?php echo $form->label($model,'insurancenarration'); ?>
		<?php echo $form->textArea($model,'insurancenarration',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('application', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->