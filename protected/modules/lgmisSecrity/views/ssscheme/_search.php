<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idssscheme'); ?>
		<?php echo $form->textField($model,'idssscheme',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idcccategory'); ?>
		<?php echo $form->dropDownList($model,'idcccategory', CHtml::listData(Cccategory::model()->findAll(), 'idcccategory', 'categoryname')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idccoccupation'); ?>
		<?php echo $form->dropDownList($model,'idccoccupation', CHtml::listData(Ccoccupation::model()->findAll(), 'idccoccupation', 'occupationname')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sponseredby'); ?>
		<?php echo $form->textField($model,'sponseredby',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'department'); ?>
		<?php echo $form->textField($model,'department',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'benefictiories'); ?>
		<?php echo $form->textField($model,'benefictiories',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'eligcriteria'); ?>
		<?php echo $form->textField($model,'eligcriteria',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'validity'); ?>
		<?php /*echo $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'validity',
                    'id' => 'validity',
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
		<?php echo $form->label($model,'otherbenefit'); ?>
		<?php echo $form->textField($model,'otherbenefit',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idssgrant'); ?>
		<?php echo $form->dropDownList($model,'idssgrant', CHtml::listData(Ssgrant::model()->findAll(), 'idssgrant', 'type')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('application', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->