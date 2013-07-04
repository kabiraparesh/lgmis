<script>
    $(document).ready(function () {
        $( "input:submit").button();
    });
</script>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bpapplication-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php  echo Yii::t('application', 'Fields with <span class="required">*</span> are required.');?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'applicantname'); ?>		
                <?php echo $form->textField($model,'applicantname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'applicantname'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'applicantaddress'); ?>		
                <?php echo $form->textField($model,'applicantaddress',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'applicantaddress'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'plotstatus'); ?>		
                <?php echo $form->textField($model,'plotstatus',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'plotstatus'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idbpusagetype'); ?>		
                <?php echo $form->textField($model,'idbpusagetype',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#bpapplication-form").find(\'#Bpapplication_idbpusagetype\').val()',), 'url'=>CController::createUrl('bpusagetype/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idbpusagetype')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idbpusagetype')); ?>_msg">
                    <?php echo !isset($model->idbpusagetype0->usagetype) || $model->isNewRecord ? "-" : $model->idbpusagetype0->usagetype; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                            array('bpusagetype/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "bpapplication";
                                        window.eid = "Bpapplication_idbpusagetype";
                                        window.url = "'. CController::createUrl('bpusagetype/jsonmessage').'";
                                        $("#dialog-popup-select").html(data);
                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Bpusagetypes') .'");
                                        $("#dialog-popup-select").dialog("open"); 
           
                                        return false;
                                    }'
                    ) 
                    );
                    ?>
		<?php echo $form->error($model,'idbpusagetype'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idnewbpusagetype'); ?>		
                <?php echo $form->textField($model,'idnewbpusagetype',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#bpapplication-form").find(\'#Bpapplication_idnewbpusagetype\').val()',), 'url'=>CController::createUrl('bpapplication/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idnewbpusagetype')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idnewbpusagetype')); ?>_msg">
                    <?php echo !isset($model->idnewbpusagetype0->applicantname) || $model->isNewRecord ? "-" : $model->idnewbpusagetype0->applicantname; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                            array('bpapplication/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "bpapplication";
                                        window.eid = "Bpapplication_idnewbpusagetype";
                                        window.url = "'. CController::createUrl('bpapplication/jsonmessage').'";
                                        $("#dialog-popup-select").html(data);
                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Bpapplications') .'");
                                        $("#dialog-popup-select").dialog("open"); 
           
                                        return false;
                                    }'
                    ) 
                    );
                    ?>
		<?php echo $form->error($model,'idnewbpusagetype'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'newconstructionarea'); ?>		
                <?php echo $form->textField($model,'newconstructionarea',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'newconstructionarea'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'groundfloorarea'); ?>		
                <?php echo $form->textField($model,'groundfloorarea',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'groundfloorarea'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'firstfloorarea'); ?>		
                <?php echo $form->textField($model,'firstfloorarea',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'firstfloorarea'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'secondfloorarea'); ?>		
                <?php echo $form->textField($model,'secondfloorarea',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'secondfloorarea'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'abovethirdbasement'); ?>		
                <?php echo $form->textField($model,'abovethirdbasement',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'abovethirdbasement'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'earthqcertificate'); ?>		
                <?php echo $form->textField($model,'earthqcertificate'); ?>
		<?php echo $form->error($model,'earthqcertificate'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'registrycopy'); ?>		
                <?php echo $form->textField($model,'registrycopy'); ?>
		<?php echo $form->error($model,'registrycopy'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'khasaramap'); ?>		
                <?php echo $form->textField($model,'khasaramap'); ?>
		<?php echo $form->error($model,'khasaramap'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'blueprint'); ?>		
                <?php echo $form->textField($model,'blueprint'); ?>
		<?php echo $form->error($model,'blueprint'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'applicationdate'); ?>		
                <?php echo $form->textField($model,'applicationdate'); ?>
		<?php echo $form->error($model,'applicationdate'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'caseno'); ?>		
                <?php echo $form->textField($model,'caseno',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'caseno'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'otherdetails'); ?>		
                <?php echo $form->textField($model,'otherdetails',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'otherdetails'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idccfyear'); ?>		
                <?php echo $form->textField($model,'idccfyear',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#bpapplication-form").find(\'#Bpapplication_idccfyear\').val()',), 'url'=>CController::createUrl('ccfyear/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idccfyear')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idccfyear')); ?>_msg">
                    <?php echo !isset($model->idccfyear0->fyear) || $model->isNewRecord ? "-" : $model->idccfyear0->fyear; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                            //array('ccfyear/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                             Yii::app()->createAbsoluteUrl("/ccfyear/popupview"),
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "bpapplication";
                                        window.eid = "Bpapplication_idccfyear";
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
		<?php echo $form->labelEx($model,'idccstatus'); ?>		
                <?php echo $form->textField($model,'idccstatus',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#bpapplication-form").find(\'#Bpapplication_idccstatus\').val()',), 'url'=>CController::createUrl('ccstatus/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idccstatus')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idccstatus')); ?>_msg">
                    <?php echo !isset($model->idccstatus0->statusname) || $model->isNewRecord ? "-" : $model->idccstatus0->statusname; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                           // array('ccstatus/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                             Yii::app()->createAbsoluteUrl("/ccstatus/popupview"),
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "bpapplication";
                                        window.eid = "Bpapplication_idccstatus";
                                        window.url = "'. CController::createUrl('ccstatus/jsonmessage').'";
                                        $("#dialog-popup-select").html(data);
                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Ccstatuses') .'");
                                        $("#dialog-popup-select").dialog("open"); 
           
                                        return false;
                                    }'
                    ) 
                    );
                    ?>
		<?php echo $form->error($model,'idccstatus'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'permissiondate'); ?>		
                <?php echo $form->textField($model,'permissiondate'); ?>
		<?php echo $form->error($model,'permissiondate'); ?>
	</div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('application', 'Create') : Yii::t('application', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$this->widget('ext.ajaxform.JAjaxForm', array(
    'formId' => 'bpapplication-form',
    'options' => array(
        'dataType' => 'json',
        'success' => 'js:function(data,statusText) { 
                    if(data.status == "Success"){
                        $.fn.yiiGridView.update("bpapplication-grid", {
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
