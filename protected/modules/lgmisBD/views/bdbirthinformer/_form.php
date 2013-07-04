<script>
    $(document).ready(function () {
        $( "input:submit").button();
    });
</script>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bdbirthinformer-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php  echo Yii::t('application', 'Fields with <span class="required">*</span> are required.');?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idbdbirthinformer'); ?>		
                <?php echo $form->textField($model,'idbdbirthinformer',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'idbdbirthinformer'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'informername'); ?>		
                <?php echo $form->textField($model,'informername',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'informername'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'informeraddress'); ?>		
                <?php echo $form->textField($model,'informeraddress',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'informeraddress'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'childname'); ?>		
                <?php echo $form->textField($model,'childname',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'childname'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'dob'); ?>		
                <?php echo $form->textField($model,'dob'); ?>
		<?php echo $form->error($model,'dob'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'timeofbirth'); ?>		
                <?php echo $form->textField($model,'timeofbirth'); ?>
		<?php echo $form->error($model,'timeofbirth'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idccsex'); ?>		
                <?php echo $form->textField($model,'idccsex',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#bdbirthinformer-form").find(\'#Bdbirthinformer_idccsex\').val()',), 'url'=>CController::createUrl('ccsex/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idccsex')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idccsex')); ?>_msg">
                    <?php echo !isset($model->idccsex0->sexname) || $model->isNewRecord ? "-" : $model->idccsex0->sexname; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                          //  array('ccsex/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                             Yii::app()->createAbsoluteUrl("/ccsex/popupview"),
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "bdbirthinformer";
                                        window.eid = "Bdbirthinformer_idccsex";
                                        window.url = "'. CController::createUrl('ccsex/jsonmessage').'";
                                        $("#dialog-popup-select").html(data);
                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Ccsexes') .'");
                                        $("#dialog-popup-select").dialog("open"); 
           
                                        return false;
                                    }'
                    ) 
                    );
                    ?>
		<?php echo $form->error($model,'idccsex'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'fathername'); ?>		
                <?php echo $form->textField($model,'fathername',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'fathername'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'fathereducation'); ?>		
                <?php echo $form->textField($model,'fathereducation',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'fathereducation'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'mothername'); ?>		
                <?php echo $form->textField($model,'mothername',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'mothername'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idccreligion'); ?>		
                <?php echo $form->textField($model,'idccreligion',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#bdbirthinformer-form").find(\'#Bdbirthinformer_idccreligion\').val()',), 'url'=>CController::createUrl('ccreligion/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idccreligion')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idccreligion')); ?>_msg">
                    <?php echo !isset($model->idccreligion0->religionname) || $model->isNewRecord ? "-" : $model->idccreligion0->religionname; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                           // array('ccreligion/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                                  Yii::app()->createAbsoluteUrl("/ccreligion/popupview"),
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "bdbirthinformer";
                                        window.eid = "Bdbirthinformer_idccreligion";
                                        window.url = "'. CController::createUrl('ccreligion/jsonmessage').'";
                                        $("#dialog-popup-select").html(data);
                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Ccreligions') .'");
                                        $("#dialog-popup-select").dialog("open"); 
           
                                        return false;
                                    }'
                    ) 
                    );
                    ?>
		<?php echo $form->error($model,'idccreligion'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'motheroccupation'); ?>		
                <?php echo $form->textField($model,'motheroccupation',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'motheroccupation'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'fatheroccupation'); ?>		
                <?php echo $form->textField($model,'fatheroccupation',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'fatheroccupation'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'deliverymethod'); ?>		
                <?php echo $form->textField($model,'deliverymethod',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'deliverymethod'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'birthplace'); ?>		
                <?php echo $form->textField($model,'birthplace',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'birthplace'); ?>
	</div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('application', 'Create') : Yii::t('application', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$this->widget('ext.ajaxform.JAjaxForm', array(
    'formId' => 'bdbirthinformer-form',
    'options' => array(
        'dataType' => 'json',
        'success' => 'js:function(data,statusText) { 
                    if(data.status == "Success"){
                        $.fn.yiiGridView.update("bdbirthinformer-grid", {
                              data: $(this).serialize()
                        });
                        $("#dialog").dialog("close").destroy();
                        return false;
                    }
                    else{
                        $("#dialog-warning-msg").html("' . Yii::t('application', 'An error occurred while the form was being submitted.<br/>Please check your form data.') . '" + data.status); 
                        $("#dialog-warning").dialog("open"); 
                        return false;
                    }
        }',
    ),
));
?>
