<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idhremplloan'); ?>
		<?php echo $form->textField($model,'idhremplloan',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idhremployee'); ?>
		<?php echo $form->dropDownList($model,'idhremployee', CHtml::listData(Hremployee::model()->findAll(), 'idhremployee', 'empname')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'loannumber'); ?>
		<?php echo $form->textField($model,'loannumber',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'loandate'); ?>
		<?php /*echo $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'loandate',
                    'id' => 'loandate',
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
		<?php echo $form->label($model,'loanamount'); ?>
		<?php echo $form->textField($model,'loanamount',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'installmentamt'); ?>
		<?php echo $form->textField($model,'installmentamt',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'installmentstartdate'); ?>
		<?php /*echo $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'installmentstartdate',
                    'id' => 'installmentstartdate',
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
		<?php echo $form->label($model,'installmentenddate'); ?>
		<?php/* echo $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'installmentenddate',
                    'id' => 'installmentenddate',
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
		<?php echo $form->label($model,'loantype'); ?>
		<?php echo $form->textField($model,'loantype',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'loanaccountno'); ?>
		<?php echo $form->textField($model,'loanaccountno',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'loanbankname'); ?>
		<?php echo $form->textField($model,'loanbankname',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'loannarration'); ?>
		<?php echo $form->textArea($model,'loannarration',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('application', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->