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

<div id="StatusBar" style="margin-bottom: 5px; "></div>
<div id="Notification" style="margin-bottom: 5px;"></div>

<?php
 // Initialize the extension
$this->widget('ext.jnotify.JNotify', array(
	'statusBarId'=>'StatusBar',
	'notificationId'=>'Notification',
	'notificationHSpace'=>'30px',	
	'notificationWidth'=>'280px',
	'notificationShowAt'=>'topRight',
	//'notificationShowAt'=>'bottomLeft',
	//'notificationAppendType'=>'prepend',
)); ?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'wmmaster-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php echo LgmisWMModule::t('Fields with <span class="required">*</span> are required.');?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'saralno'); ?>
		<?php echo $form->textField($model,'saralno',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'saralno'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'connectionno'); ?>
		<?php echo $form->textField($model,'connectionno',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'connectionno'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ownername'); ?>
		<?php echo $form->textField($model,'ownername',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'ownername'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fathername'); ?>
		<?php echo $form->textField($model,'fathername',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'fathername'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::label(LgmisWMModule::t('Idccward'), 'idccward'); ?>
		<?php                
                    echo CHtml::dropDownList('idccward', (isset($model->idcccolony0) && isset($model->idcccolony0->idccward)) ?  $model->idcccolony0->idccward : '', CHtml::listData(Ccward::model()->findAll(), 'idccward','wardname'),
                        array(
                            'prompt'=>LgmisWMModule::t('Select Ward'),
                            'ajax' => array(
                                'type'=>'POST', 
                                'url'=>CController::createUrl('wmmaster/dynamiccccolony'), 
                                'update'=> "#idcccolony", 
                    )));                 
                ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idcccolony'); ?>
		<?php
                    if(isset($model->idcccolony0) && isset($model->idcccolony0->idccward)){
                        echo $form->dropDownList($model,'idcccolony', CHtml::listData(Cccolony::model()->findAll('idccward=:parent_id', array(':parent_id'=>$model->idcccolony0->idccward)), 'idcccolony','colonyname'), array('id'=>'idcccolony'));
                    }
                    else{
                        echo $form->dropDownList($model,'idcccolony', array(), array('id'=>'idcccolony', 'prompt'=>LgmisWMModule::t('Select Colony')));
                    }
                ?>
 		<?php echo $form->error($model,'idcccolony'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'wmappdate'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'wmappdate',
                    'id' => 'wmappdate',
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
 		<?php echo $form->error($model,'wmappdate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idptmaster'); ?>
		<?php echo $form->textField($model,'idptmaster',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'idptmaster'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idwmtype'); ?>
		<?php $this->widget('ext.FKField.FKField', array(
                    'model' => $model,
                    'relatedmodel' => new Wmtype('search'),
                    'attribute' => 'idwmtype',
                    'title' => LgmisWMModule::t('Wmtype'),
                    'columns' => array(
                        'idwmtype', 'wmtype',
                    ),
                )); ?>
 		<?php echo $form->error($model,'idwmtype'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idwmsize'); ?>
		<?php $this->widget('ext.FKField.FKField', array(
                    'model' => $model,
                    'relatedmodel' => new Wmsize('search'),
                    'attribute' => 'idwmsize',
                    'title' => LgmisWMModule::t('Wmsize'),
                    'columns' => array(
                        'idwmsize', 'wmsize',
                    ),
                )); ?>
 		<?php echo $form->error($model,'idwmsize'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'wmtape'); ?>
		<?php echo $form->textField($model,'wmtape',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'wmtape'); ?>
	</div>

		<?php echo $form->hiddenField($model,'params'); ?>
		<?php //echo $form->labelEx($model,'params'); ?>
		<?php //echo $form->textArea($model,'params',array('rows'=>6, 'cols'=>50)); ?>
                <?php
//                 $columns = array(
//                     array(
//                         'header' => false,
//                         'name' => 'label',
//                         'type' => 'text',
//                         'htmlOptions'=> array('width'=>10,'style'=>'width:10px;font-weight:bolder;'),
//                     ),
//                     array(
//                         'header' => false,
//                         'name' => 'key',
//                         'type' => 'hiddenField',
//                         'htmlOptions'=> array('width'=>10,'style'=>'width:10px;font-weight:bolder;display:none'),
//                     ),
//                     array(
//                         'header' => false,
//                         'name' => 'value',
//                         'type' => 'textField',
//                         'htmlOptions'=> array('width'=>10,'style'=>'width:100px;font-weight:bolder;'),
//                     ),
//                 );
//                 $rows = array(
//                     'data' => array(array(
//                         LgmisWMModule::t('Wmoldbalance'),
//                         'wmoldbalance',
//                         0,
//                     ),
//                     array(
//                         LgmisWMModule::t('Surcharge'),
//                         'surcharge',
//                         0,
//                     ))
//                 );                
                
//                 $this->widget('ext.inputgrid.InputGrid', array(
//                     'columns' => $columns,
//                     'rows' => $rows,
//                     'model' => $model, // Your model
//                     'attribute' => 'params', // Attribute for input
//                     'id' => 'details-inputgrid', // Attribute for input
//                     'htmlOptions' => array('style'=>'width:400px;'),
//                     'hideHeader' => true,                    
//                 )
//                 );
                ?>            
		<?php //echo $form->error($model,'params'); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'mainlindia'); ?>
		<?php echo $form->textField($model,'mainlindia',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'mainlindia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mainlindis'); ?>
		<?php echo $form->textField($model,'mainlindis',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'mainlindis'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'wmdetails'); ?>
		<?php echo $form->textField($model,'wmdetails',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'wmdetails'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'wmmasterflag'); ?>
		<?php //echo $form->textField($model,'wmmasterflag'); ?>
                <?php //echo $form->checkBox($model, 'wmmasterflag', array('onchange'=>"$(this).is(':checked') ? alert('ch') : alert('uch);"));?>
                <?php echo $form->checkBox($model, 'wmmasterflag', array('onchange'=>"$(this).is(':checked') == true ? $('#div-disconnectdate').hide() : $('#div-disconnectdate').show() ;"));?>
		<?php echo $form->error($model,'wmmasterflag'); ?>
	</div>
        
        <?php if($model->wmmasterflag == 1): ?>
        <script>
            $(document).ready(function() {
                $('#div-disconnectdate').hide();
            });
        </script>
        <?php endif; ?>

	<div class="row" id="div-disconnectdate">
		<?php echo $form->labelEx($model,'disconnectdate'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'disconnectdate',
                    'id' => 'disconnectdate',
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
 		<?php echo $form->error($model,'disconnectdate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idwmexsumptor'); ?>
		<?php $this->widget('ext.FKField.FKField', array(
                    'model' => $model,
                    'relatedmodel' => new Wmexsumptor('search'),
                    'attribute' => 'idwmexsumptor',
                    'title' => LgmisWMModule::t('Wmexsumptor'),
                    'columns' => array(
                        'idwmexsumptor', 'exsumptortype',
                    ),
                )); ?>
 		<?php echo $form->error($model,'idwmexsumptor'); ?>
	</div>

        <?php 
            echo $form->hiddenField($model,'idccfyear'); 
            echo $form->hiddenField($model,'idwmplumber'); 
            echo $form->hiddenField($model,'idccstatus'); 
        ?>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? LgmisWMModule::t('Create') : LgmisWMModule::t('Save'), array('id'=>'wmmaster-form-submit')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
if ($model->isNewRecord) {
    $this->widget('ext.ajaxform.JAjaxForm', array(
        'formId' => 'wmmaster-form',
        'options' => array(
            'dataType' => 'json',
            'success' => 'js:function(data,statusText) { 
                    if(data.status == 1){
                        $.fn.yiiGridView.update("wmmaster-grid", {
                              data: $(this).serialize()
                        });

                        $("#StatusBar").jnotifyAddMessage({
                                text: data.message,
                                permanent: false,
                                type: "message"
                        });                        

                        $("#wmmaster-form").resetForm();
                        return false;
                    }
                    else{
                        $("#StatusBar").jnotifyAddMessage({
                                text: data.message,
                                permanent: false,
                                type: "error"
                        });                        
                        return false;
                    }
        }',
        ),
    ));
}
else{
    $this->widget('ext.ajaxform.JAjaxForm', array(
        'formId' => 'wmmaster-form',
        'options' => array(
            'dataType' => 'json',
            'success' => 'js:function(data,statusText) { 
                    if(data.status == 1){
                        $.fn.yiiGridView.update("wmmaster-grid", {
                              data: $(this).serialize()
                        });
                        $("#wmmaster-form-dialog").dialog("close").destroy();
                        return false;
                    }
                    else{
                        $("#StatusBar").jnotifyAddMessage({
                                text: data.message,
                                permanent: false,
                                type: "error"
                        });                        
                        return false;
                    }
        }',
        ),
    ));    
}
?>