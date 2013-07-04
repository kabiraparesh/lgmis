<script>
    $(document).ready(function () {
        $( "input:submit").button();
    });
</script>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'hremployeebasic-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php  echo Yii::t('application', 'Fields with <span class="required">*</span> are required.');?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php //echo $form->labelEx($model,'idhremployee'); ?>		
                <?php //echo $form->textField($model,'idhremployee',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#hremployeebasic-form").find(\'#Hremployeebasic_idhremployee\').val()',), 'url'=>CController::createUrl('hremployee/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idhremployee')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php //echo ucfirst(CHtml::activeId($model,'idhremployee')); ?>_msg">
                    <?php //echo !isset($model->idhremployee0->empname) || $model->isNewRecord ? "-" : $model->idhremployee0->empname; ?>
                </span>
                <?php
                   /* $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                            array('hremployee/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "hremployeebasic";
                                        window.eid = "Hremployeebasic_idhremployee";
                                        window.url = "'. CController::createUrl('hremployee/jsonmessage').'";
                                        $("#dialog-popup-select").html(data);
                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Hremployees') .'");
                                        $("#dialog-popup-select").dialog("open"); 
           
                                        return false;
                                    }'
                    ) 
                    );*/
                    ?>
		<?php echo $form->error($model,'idhremployee'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'orderno'); ?>		
                <?php echo $form->textField($model,'orderno',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'orderno'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'orderdate'); ?>		
                <?php echo $form->textField($model,'orderdate'); ?>
		<?php echo $form->error($model,'orderdate'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idhrpost'); ?>		
                <?php echo $form->textField($model,'idhrpost',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#hremployeebasic-form").find(\'#Hremployeebasic_idhrpost\').val()',), 'url'=>CController::createUrl('hrpost/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idhrpost')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idhrpost')); ?>_msg">
                    <?php echo !isset($model->idhrpost0->postname) || $model->isNewRecord ? "-" : $model->idhrpost0->postname; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                            array('hrpost/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "hremployeebasic";
                                        window.eid = "Hremployeebasic_idhrpost";
                                        window.url = "'. CController::createUrl('hrpost/jsonmessage').'";
                                        $("#dialog-popup-select").html(data);
                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Hrposts') .'");
                                        $("#dialog-popup-select").dialog("open"); 
           
                                        return false;
                                    }'
                    ) 
                    );
                    ?>
		<?php echo $form->error($model,'idhrpost'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'salaryapplifrom'); ?>		
                <?php echo $form->textField($model,'salaryapplifrom'); ?>
		<?php echo $form->error($model,'salaryapplifrom'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'nextincrement'); ?>		
                <?php echo $form->textField($model,'nextincrement'); ?>
		<?php echo $form->error($model,'nextincrement'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idccward'); ?>		
                <?php echo $form->textField($model,'idccward',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#hremployeebasic-form").find(\'#Hremployeebasic_idccward\').val()',), 'url'=>CController::createUrl('ccward/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idccward')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idccward')); ?>_msg">
                    <?php echo !isset($model->idccward0->wardname) || $model->isNewRecord ? "-" : $model->idccward0->wardname; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                         //   array('ccward/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                            Yii::app()->createAbsoluteUrl("/ccward/popupview"),
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "hremployeebasic";
                                        window.eid = "Hremployeebasic_idccward";
                                        window.url = "'. CController::createUrl('ccward/jsonmessage').'";
                                        $("#dialog-popup-select").html(data);
                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Ccwards') .'");
                                        $("#dialog-popup-select").dialog("open"); 
           
                                        return false;
                                    }'
                    ) 
                    );
                    ?>
		<?php echo $form->error($model,'idccward'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'workingplace'); ?>		
                <?php echo $form->textField($model,'workingplace',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'workingplace'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'workingshift'); ?>		
                <?php echo $form->textField($model,'workingshift',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'workingshift'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'bankaccountno'); ?>		
                <?php echo $form->textField($model,'bankaccountno',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'bankaccountno'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'bankname'); ?>		
                <?php echo $form->textField($model,'bankname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'bankname'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'bankaddress'); ?>		
                <?php echo $form->textField($model,'bankaddress',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'bankaddress'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'bankifsccode'); ?>		
                <?php echo $form->textField($model,'bankifsccode',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'bankifsccode'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'actualbasic'); ?>		
                <?php echo $form->textField($model,'actualbasic',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'actualbasic'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'basicless'); ?>		
                <?php echo $form->textField($model,'basicless',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'basicless'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'isworker'); ?>		
                <?php echo $form->textField($model,'isworker',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'isworker'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'issuspend'); ?>		
                <?php echo $form->textField($model,'issuspend',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'issuspend'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'isondeputation'); ?>		
                <?php echo $form->textField($model,'isondeputation',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'isondeputation'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'isnewpayscale'); ?>		
                <?php echo $form->textField($model,'isnewpayscale',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'isnewpayscale'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'newpayscaledate'); ?>		
                <?php echo $form->textField($model,'newpayscaledate'); ?>
		<?php echo $form->error($model,'newpayscaledate'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'pfopening'); ?>		
                <?php echo $form->textField($model,'pfopening',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'pfopening'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'pfloanopening'); ?>		
                <?php echo $form->textField($model,'pfloanopening',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'pfloanopening'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'filenumber'); ?>		
                <?php echo $form->textField($model,'filenumber',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'filenumber'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'ispensiongiven'); ?>		
                <?php echo $form->textField($model,'ispensiongiven',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'ispensiongiven'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'pensionstartdate'); ?>		
                <?php echo $form->textField($model,'pensionstartdate'); ?>
		<?php echo $form->error($model,'pensionstartdate'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'pensionstopdate'); ?>		
                <?php echo $form->textField($model,'pensionstopdate'); ?>
		<?php echo $form->error($model,'pensionstopdate'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'pensionstopreason'); ?>		
                <?php echo $form->textField($model,'pensionstopreason',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'pensionstopreason'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'narration'); ?>		
                <?php echo $form->textArea($model,'narration',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'narration'); ?>
	</div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('application', 'Create') : Yii::t('application', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$this->widget('ext.ajaxform.JAjaxForm', array(
    'formId' => 'hremployeebasic-form',
    'options' => array(
        'dataType' => 'json',
        'success' => 'js:function(data,statusText) { 
                    if(data.status == "Success"){
                        $.fn.yiiGridView.update("hremployeebasic-grid", {
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
