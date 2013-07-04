<script>
    $(document).ready(function () {
        $( "input:submit").button();
    });
</script>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bddeathinformer-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php  echo Yii::t('application', 'Fields with <span class="required">*</span> are required.');?></p>

	<?php echo $form->errorSummary($model); ?>

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
		<?php echo $form->labelEx($model,'personname'); ?>		
                <?php echo $form->textField($model,'personname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'personname'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'dod'); ?>		
                <?php echo $form->textField($model,'dod'); ?>
		<?php echo $form->error($model,'dod'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'timeofdeath'); ?>		
                <?php echo $form->textField($model,'timeofdeath'); ?>
		<?php echo $form->error($model,'timeofdeath'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idccsex'); ?>		
                <?php echo $form->textField($model,'idccsex',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#bddeathinformer-form").find(\'#Bddeathinformer_idccsex\').val()',), 'url'=>CController::createUrl('ccsex/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idccsex')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idccsex')); ?>_msg">
                    <?php echo !isset($model->idccsex0->sexname) || $model->isNewRecord ? "-" : $model->idccsex0->sexname; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                         //   array('ccsex/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                               Yii::app()->createAbsoluteUrl("/ccsex/popupview"),
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "bddeathinformer";
                                        window.eid = "Bddeathinformer_idccsex";
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
		<?php echo $form->labelEx($model,'fhname'); ?>		
                <?php echo $form->textField($model,'fhname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'fhname'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'crematorymethod'); ?>		
                <?php echo $form->textField($model,'crematorymethod',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'crematorymethod'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'reasondeath'); ?>		
                <?php echo $form->textField($model,'reasondeath',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'reasondeath'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idccreligion'); ?>		
                <?php echo $form->textField($model,'idccreligion',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#bddeathinformer-form").find(\'#Bddeathinformer_idccreligion\').val()',), 'url'=>CController::createUrl('ccreligion/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idccreligion')) . '_msg\').text(data.message);}'))); ?>
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
                                        window.cid = "bddeathinformer";
                                        window.eid = "Bddeathinformer_idccreligion";
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
		<?php echo $form->labelEx($model,'other'); ?>		
                <?php echo $form->textField($model,'other',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'other'); ?>
	</div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('application', 'Create') : Yii::t('application', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$this->widget('ext.ajaxform.JAjaxForm', array(
    'formId' => 'bddeathinformer-form',
    'options' => array(
        'dataType' => 'json',
        'success' => 'js:function(data,statusText) { 
                    if(data.status == "Success"){
                        $.fn.yiiGridView.update("bddeathinformer-grid", {
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
