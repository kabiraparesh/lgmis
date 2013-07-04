<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idbddeathapplication'); ?>
		<?php echo $form->textField($model,'idbddeathapplication',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idbddeathinformer'); ?>
		<?php echo $form->dropDownList($model,'idbddeathinformer', CHtml::listData(Bddeathinformer::model()->findAll(), 'idbddeathinformer', 'informername')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'applicationdate'); ?>
		<?php /*echo $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'applicationdate',
                    'id' => 'applicationdate',
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
		<?php echo $form->label($model,'idccstatus'); ?>
		<?php echo $form->dropDownList($model,'idccstatus', CHtml::listData(Ccstatus::model()->findAll(), 'idccstatus', 'statusname')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'applicantname'); ?>
		<?php echo $form->textField($model,'applicantname',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'applicantaddress'); ?>
		<?php echo $form->textField($model,'applicantaddress',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'age'); ?>
		<?php echo $form->textField($model,'age',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dateofdeath'); ?>
		<?php /*echo $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'dateofdeath',
                    'id' => 'dateofdeath',
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

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('application', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->