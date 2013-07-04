<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idhremployee'); ?>
		<?php echo $form->textField($model,'idhremployee',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'empname'); ?>
		<?php echo $form->textField($model,'empname',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fathername'); ?>
		<?php echo $form->textField($model,'fathername',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'empdob'); ?>
		<?php /*echo $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'empdob',
                    'id' => 'empdob',
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
		<?php echo $form->label($model,'idccsex'); ?>
		<?php echo $form->dropDownList($model,'idccsex', CHtml::listData(Ccsex::model()->findAll(), 'idccsex', 'sexname')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idccreligion'); ?>
		<?php echo $form->dropDownList($model,'idccreligion', CHtml::listData(Ccreligion::model()->findAll(), 'idccreligion', 'religionname')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idcccategory'); ?>
		<?php echo $form->dropDownList($model,'idcccategory', CHtml::listData(Cccategory::model()->findAll(), 'idcccategory', 'categoryname')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'presentaddress1'); ?>
		<?php echo $form->textField($model,'presentaddress1',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'presentaddress2'); ?>
		<?php echo $form->textField($model,'presentaddress2',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'presentcity'); ?>
		<?php echo $form->textField($model,'presentcity',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'presentphone'); ?>
		<?php echo $form->textField($model,'presentphone',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'documenttype'); ?>
		<?php echo $form->textField($model,'documenttype',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'peraddress1'); ?>
		<?php echo $form->textField($model,'peraddress1',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'peraddress2'); ?>
		<?php echo $form->textField($model,'peraddress2',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'percity'); ?>
		<?php echo $form->textField($model,'percity',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'perphone'); ?>
		<?php echo $form->textField($model,'perphone',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mobileno'); ?>
		<?php echo $form->textField($model,'mobileno',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mothername'); ?>
		<?php echo $form->textField($model,'mothername',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'joiningdate'); ?>
		<?php /*echo $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'joiningdate',
                    'id' => 'joiningdate',
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
		<?php echo $form->label($model,'retiredate'); ?>
		<?php /*echo $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'retiredate',
                    'id' => 'retiredate',
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
		<?php echo $form->label($model,'identificationmark'); ?>
		<?php echo $form->textField($model,'identificationmark',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'maritalstatus'); ?>
		<?php echo $form->textField($model,'maritalstatus',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'height'); ?>
		<?php echo $form->textField($model,'height',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'weight'); ?>
		<?php echo $form->textField($model,'weight',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gpfno'); ?>
		<?php echo $form->textField($model,'gpfno',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'scstdetail'); ?>
		<?php echo $form->textField($model,'scstdetail',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'handicap'); ?>
		<?php echo $form->textField($model,'handicap',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fingerprints'); ?>
		<?php echo $form->textField($model,'fingerprints',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employeephoto'); ?>
		<?php echo $form->textField($model,'employeephoto',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employeesign'); ?>
		<?php echo $form->textField($model,'employeesign',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('application', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->