<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idssapplication'); ?>
		<?php echo $form->textField($model,'idssapplication',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fhname'); ?>
		<?php echo $form->textField($model,'fhname',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'markident'); ?>
		<?php echo $form->textField($model,'markident',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dob'); ?>
		<?php /*echo $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'dob',
                    'id' => 'dob',
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
		<?php echo $form->label($model,'idcccategory'); ?>
		<?php echo $form->dropDownList($model,'idcccategory', CHtml::listData(Cccategory::model()->findAll(), 'idcccategory', 'categoryname')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'remmitaddress'); ?>
		<?php echo $form->textField($model,'remmitaddress',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'permanentadd'); ?>
		<?php echo $form->textField($model,'permanentadd',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'domicileadd'); ?>
		<?php echo $form->textField($model,'domicileadd',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'yearreskling'); ?>
		<?php echo $form->textField($model,'yearreskling',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'monincome'); ?>
		<?php echo $form->textField($model,'monincome',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'immproperty'); ?>
		<?php echo $form->textField($model,'immproperty',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'presentresiding'); ?>
		<?php echo $form->textField($model,'presentresiding',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bornresiding'); ?>
		<?php echo $form->textField($model,'bornresiding',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'incometax'); ?>
		<?php echo $form->textField($model,'incometax',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'servicedetail'); ?>
		<?php echo $form->textField($model,'servicedetail',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pansionreceipt'); ?>
		<?php echo $form->textField($model,'pansionreceipt',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nationnality'); ?>
		<?php echo $form->textField($model,'nationnality',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idccsex'); ?>
		<?php echo $form->dropDownList($model,'idccsex', CHtml::listData(Ccsex::model()->findAll(), 'idccsex', 'sexname')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dodhusband'); ?>
		<?php /*echo $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'dodhusband',
                    'id' => 'dodhusband',
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
		<?php echo $form->label($model,'freedomfighter'); ?>
		<?php echo $form->textField($model,'freedomfighter',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'addfreedfighter'); ?>
		<?php echo $form->textField($model,'addfreedfighter',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idccstatus'); ?>
		<?php echo $form->dropDownList($model,'idccstatus', CHtml::listData(Ccstatus::model()->findAll(), 'idccstatus', 'statusname')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bankbranch'); ?>
		<?php echo $form->textField($model,'bankbranch',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bankaccountno'); ?>
		<?php echo $form->textField($model,'bankaccountno',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ifsccode'); ?>
		<?php echo $form->textField($model,'ifsccode',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'documentssubmit'); ?>
		<?php echo $form->textField($model,'documentssubmit',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('application', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->