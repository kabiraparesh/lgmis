<script>
    $(document).ready(function () {
        $( "input:submit").button();
    });
</script>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pttransaction-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php  echo Yii::t('application', 'Fields with <span class="required">*</span> are required.');?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idptmaster'); ?>		
                <?php echo $form->textField($model,'idptmaster',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#pttransaction-form").find(\'#Pttransaction_idptmaster\').val()',), 'url'=>CController::createUrl('ptmaster/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idptmaster')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idptmaster')); ?>_msg">
                    <?php echo !isset($model->idptmaster0->caseno) || $model->isNewRecord ? "-" : $model->idptmaster0->caseno; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                            array('ptmaster/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "pttransaction";
                                        window.eid = "Pttransaction_idptmaster";
                                        window.url = "'. CController::createUrl('ptmaster/jsonmessage').'";
                                        $("#dialog-popup-select").html(data);
                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Ptmasters') .'");
                                        $("#dialog-popup-select").dialog("open"); 
           
                                        return false;
                                    }'
                    ) 
                    );
                    ?>
		<?php echo $form->error($model,'idptmaster'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idccfyear'); ?>		
                <?php echo $form->textField($model,'idccfyear',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#pttransaction-form").find(\'#Pttransaction_idccfyear\').val()',), 'url'=>CController::createUrl('ccfyear/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idccfyear')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idccfyear')); ?>_msg">
                    <?php echo !isset($model->idccfyear0->fyear) || $model->isNewRecord ? "-" : $model->idccfyear0->fyear; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                            array('ccfyear/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "pttransaction";
                                        window.eid = "Pttransaction_idccfyear";
                                        window.url = "'. CController::createUrl('ccfyear/jsonmessage').'";
                                        $("#dialog-popup-select").html(data);
                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Ccfyears') .'");
                                        $("#dialog-popup-select").dialog("open"); 
           
                                        return false;
                                    }'
                    ) 
                    );
                    ?>
		<?php echo $form->error($model,'idccfyear'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'oldpropertytax'); ?>		
                <?php echo $form->textField($model,'oldpropertytax',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'oldpropertytax'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'oldservicetax'); ?>		
                <?php echo $form->textField($model,'oldservicetax',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'oldservicetax'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'oldminsamekittax'); ?>		
                <?php echo $form->textField($model,'oldminsamekittax',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'oldminsamekittax'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'oldsamekittax'); ?>		
                <?php echo $form->textField($model,'oldsamekittax',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'oldsamekittax'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'oldwaterpttax'); ?>		
                <?php echo $form->textField($model,'oldwaterpttax',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'oldwaterpttax'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'oldeducess'); ?>		
                <?php echo $form->textField($model,'oldeducess',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'oldeducess'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'oldsubcess1'); ?>		
                <?php echo $form->textField($model,'oldsubcess1',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'oldsubcess1'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'oldsubcess2'); ?>		
                <?php echo $form->textField($model,'oldsubcess2',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'oldsubcess2'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'oldpttaxdiscount'); ?>		
                <?php echo $form->textField($model,'oldpttaxdiscount',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'oldpttaxdiscount'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'oldpttaxsurcharge'); ?>		
                <?php echo $form->textField($model,'oldpttaxsurcharge',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'oldpttaxsurcharge'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'propertytax'); ?>		
                <?php echo $form->textField($model,'propertytax',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'propertytax'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'servicetax'); ?>		
                <?php echo $form->textField($model,'servicetax',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'servicetax'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'minsamekittax'); ?>		
                <?php echo $form->textField($model,'minsamekittax',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'minsamekittax'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'samekittax'); ?>		
                <?php echo $form->textField($model,'samekittax',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'samekittax'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'waterpttax'); ?>		
                <?php echo $form->textField($model,'waterpttax',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'waterpttax'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'educess'); ?>		
                <?php echo $form->textField($model,'educess',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'educess'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'subcess1'); ?>		
                <?php echo $form->textField($model,'subcess1',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'subcess1'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'subcess2'); ?>		
                <?php echo $form->textField($model,'subcess2',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'subcess2'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'pttaxdiscount'); ?>		
                <?php echo $form->textField($model,'pttaxdiscount',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'pttaxdiscount'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'pttaxsurcharge'); ?>		
                <?php echo $form->textField($model,'pttaxsurcharge',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'pttaxsurcharge'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'resbhada'); ?>		
                <?php echo $form->textField($model,'resbhada',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'resbhada'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'combhada'); ?>		
                <?php echo $form->textField($model,'combhada',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'combhada'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'rentbhada'); ?>		
                <?php echo $form->textField($model,'rentbhada',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'rentbhada'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'resbhadadis'); ?>		
                <?php echo $form->textField($model,'resbhadadis',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'resbhadadis'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'combhadadis'); ?>		
                <?php echo $form->textField($model,'combhadadis',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'combhadadis'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'rentbhadadis'); ?>		
                <?php echo $form->textField($model,'rentbhadadis',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'rentbhadadis'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'resbhadaothdis'); ?>		
                <?php echo $form->textField($model,'resbhadaothdis',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'resbhadaothdis'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'combhadaothdis'); ?>		
                <?php echo $form->textField($model,'combhadaothdis',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'combhadaothdis'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'rentbhadaothdis'); ?>		
                <?php echo $form->textField($model,'rentbhadaothdis',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'rentbhadaothdis'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'resbhada12kdis'); ?>		
                <?php echo $form->textField($model,'resbhada12kdis',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'resbhada12kdis'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'combhada12kdis'); ?>		
                <?php echo $form->textField($model,'combhada12kdis',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'combhada12kdis'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'rentbhada12kdis'); ?>		
                <?php echo $form->textField($model,'rentbhada12kdis',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'rentbhada12kdis'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'respttax'); ?>		
                <?php echo $form->textField($model,'respttax',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'respttax'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'compttax'); ?>		
                <?php echo $form->textField($model,'compttax',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'compttax'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'rentpttax'); ?>		
                <?php echo $form->textField($model,'rentpttax',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'rentpttax'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'resptselfdis'); ?>		
                <?php echo $form->textField($model,'resptselfdis',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'resptselfdis'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'comptselfdis'); ?>		
                <?php echo $form->textField($model,'comptselfdis',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'comptselfdis'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'rentptselfdis'); ?>		
                <?php echo $form->textField($model,'rentptselfdis',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'rentptselfdis'); ?>
	</div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('application', 'Create') : Yii::t('application', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$this->widget('ext.ajaxform.JAjaxForm', array(
    'formId' => 'pttransaction-form',
    'options' => array(
        'dataType' => 'json',
        'success' => 'js:function(data,statusText) { 
                    if(data.status == "Success"){
                        $.fn.yiiGridView.update("pttransaction-grid", {
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
