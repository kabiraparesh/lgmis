<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idrcapplication'); ?>
		<?php echo $form->textField($model,'idrcapplication',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'adate'); ?>
		<?php/* echo $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'adate',
                    'id' => 'adate',
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
		<?php echo $form->label($model,'propertyno'); ?>
		<?php echo $form->textField($model,'propertyno',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'aname'); ?>
		<?php echo $form->textField($model,'aname',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'aaddress'); ?>
		<?php echo $form->textField($model,'aaddress',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idccward'); ?>
		<?php echo $form->dropDownList($model,'idccward', CHtml::listData(Ccward::model()->findAll(), 'idccward', 'wardname')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'livingfrom'); ?>
		<?php echo $form->textField($model,'livingfrom',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idccoccupation'); ?>
		<?php echo $form->dropDownList($model,'idccoccupation', CHtml::listData(Ccoccupation::model()->findAll(), 'idccoccupation', 'occupationname')); ?>
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
		<?php echo $form->label($model,'idccbpl'); ?>
		<?php echo $form->dropDownList($model,'idccbpl', CHtml::listData(Ccbpl::model()->findAll(), 'idccbpl', 'survey')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idrccolor'); ?>
		<?php echo $form->dropDownList($model,'idrccolor', CHtml::listData(Rccolor::model()->findAll(), 'idrccolor', 'coloren')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idccstatus'); ?>
		<?php echo $form->dropDownList($model,'idccstatus', CHtml::listData(Ccstatus::model()->findAll(), 'idccstatus', 'statusname')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reqdoc'); ?>
		<?php echo $form->textField($model,'reqdoc',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idfddemandreceipt'); ?>
		<?php echo $form->textField($model,'idfddemandreceipt'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idrcshop'); ?>
		<?php echo $form->dropDownList($model,'idrcshop', CHtml::listData(Rcshop::model()->findAll(), 'idrcshop', 'sname')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'csdate'); ?>
		<?php /*echo $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'csdate',
                    'id' => 'csdate',
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
		<?php echo $form->label($model,'idrcfamdetail'); ?>
		<?php echo $form->textField($model,'idrcfamdetail'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('application', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->