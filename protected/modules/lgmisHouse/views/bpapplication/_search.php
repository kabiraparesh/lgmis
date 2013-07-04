<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idbpapplication'); ?>
		<?php echo $form->textField($model,'idbpapplication',array('size'=>10,'maxlength'=>10)); ?>
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
		<?php echo $form->label($model,'plotstatus'); ?>
		<?php echo $form->textField($model,'plotstatus',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idbpusagetype'); ?>
		<?php echo $form->dropDownList($model,'idbpusagetype', CHtml::listData(Bpusagetype::model()->findAll(), 'idbpusagetype', 'usagetype')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idnewbpusagetype'); ?>
		<?php echo $form->dropDownList($model,'idnewbpusagetype', CHtml::listData(Bpapplication::model()->findAll(), 'idnewbpusagetype', 'applicantname')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'newconstructionarea'); ?>
		<?php echo $form->textField($model,'newconstructionarea',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'groundfloorarea'); ?>
		<?php echo $form->textField($model,'groundfloorarea',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'firstfloorarea'); ?>
		<?php echo $form->textField($model,'firstfloorarea',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'secondfloorarea'); ?>
		<?php echo $form->textField($model,'secondfloorarea',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'abovethirdbasement'); ?>
		<?php echo $form->textField($model,'abovethirdbasement',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'earthqcertificate'); ?>
		<?php echo $form->textField($model,'earthqcertificate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'registrycopy'); ?>
		<?php echo $form->textField($model,'registrycopy'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'khasaramap'); ?>
		<?php echo $form->textField($model,'khasaramap'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'blueprint'); ?>
		<?php echo $form->textField($model,'blueprint'); ?>
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
		<?php echo $form->label($model,'caseno'); ?>
		<?php echo $form->textField($model,'caseno',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'otherdetails'); ?>
		<?php echo $form->textField($model,'otherdetails',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idccfyear'); ?>
		<?php echo $form->dropDownList($model,'idccfyear', CHtml::listData(Ccfyear::model()->findAll(), 'idccfyear', 'fyear')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idccstatus'); ?>
		<?php echo $form->dropDownList($model,'idccstatus', CHtml::listData(Ccstatus::model()->findAll(), 'idccstatus', 'statusname')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'permissiondate'); ?>
		<?php /*echo $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'permissiondate',
                    'id' => 'permissiondate',
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