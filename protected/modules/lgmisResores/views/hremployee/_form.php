<script>
    $(document).ready(function () {
        $( "input:submit").button();
    });
</script>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'hremployee-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php  echo Yii::t('application', 'Fields with <span class="required">*</span> are required.');?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'empname'); ?>		
                <?php echo $form->textField($model,'empname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'empname'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'fathername'); ?>		
                <?php echo $form->textField($model,'fathername',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'fathername'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'empdob'); ?>		
                <?php echo $form->textField($model,'empdob'); ?>
		<?php echo $form->error($model,'empdob'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idccsex'); ?>		
                <?php echo $form->textField($model,'idccsex',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#hremployee-form").find(\'#Hremployee_idccsex\').val()',), 'url'=>CController::createUrl('ccsex/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idccsex')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idccsex')); ?>_msg">
                    <?php echo !isset($model->idccsex0->sexname) || $model->isNewRecord ? "-" : $model->idccsex0->sexname; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                            //array('ccsex/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                             Yii::app()->createAbsoluteUrl("/ccsex/popupview"),
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "hremployee";
                                        window.eid = "Hremployee_idccsex";
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
		<?php echo $form->labelEx($model,'idccreligion'); ?>		
                <?php echo $form->textField($model,'idccreligion',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#hremployee-form").find(\'#Hremployee_idccreligion\').val()',), 'url'=>CController::createUrl('ccreligion/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idccreligion')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idccreligion')); ?>_msg">
                    <?php echo !isset($model->idccreligion0->religionname) || $model->isNewRecord ? "-" : $model->idccreligion0->religionname; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                            //array('ccreligion/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                             Yii::app()->createAbsoluteUrl("/ccreligion/popupview"),
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "hremployee";
                                        window.eid = "Hremployee_idccreligion";
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
		<?php echo $form->labelEx($model,'idcccategory'); ?>		
                <?php echo $form->textField($model,'idcccategory',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#hremployee-form").find(\'#Hremployee_idcccategory\').val()',), 'url'=>CController::createUrl('cccategory/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idcccategory')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idcccategory')); ?>_msg">
                    <?php echo !isset($model->idcccategory0->categoryname) || $model->isNewRecord ? "-" : $model->idcccategory0->categoryname; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                           // array('cccategory/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                            Yii::app()->createAbsoluteUrl("/cccategory/popupview"),
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "hremployee";
                                        window.eid = "Hremployee_idcccategory";
                                        window.url = "'. CController::createUrl('cccategory/jsonmessage').'";
                                        $("#dialog-popup-select").html(data);
                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Cccategories') .'");
                                        $("#dialog-popup-select").dialog("open"); 
           
                                        return false;
                                    }'
                    ) 
                    );
                    ?>
		<?php echo $form->error($model,'idcccategory'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'presentaddress1'); ?>		
                <?php echo $form->textField($model,'presentaddress1',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'presentaddress1'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'presentaddress2'); ?>		
                <?php echo $form->textField($model,'presentaddress2',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'presentaddress2'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'presentcity'); ?>		
                <?php echo $form->textField($model,'presentcity',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'presentcity'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'presentphone'); ?>		
                <?php echo $form->textField($model,'presentphone',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'presentphone'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>		
                <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'documenttype'); ?>		
                <?php echo $form->textField($model,'documenttype',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'documenttype'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'peraddress1'); ?>		
                <?php echo $form->textField($model,'peraddress1',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'peraddress1'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'peraddress2'); ?>		
                <?php echo $form->textField($model,'peraddress2',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'peraddress2'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'percity'); ?>		
                <?php echo $form->textField($model,'percity',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'percity'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'perphone'); ?>		
                <?php echo $form->textField($model,'perphone',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'perphone'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'mobileno'); ?>		
                <?php echo $form->textField($model,'mobileno',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'mobileno'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'mothername'); ?>		
                <?php echo $form->textField($model,'mothername',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'mothername'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'joiningdate'); ?>		
                <?php echo $form->textField($model,'joiningdate'); ?>
		<?php echo $form->error($model,'joiningdate'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'retiredate'); ?>		
                <?php echo $form->textField($model,'retiredate'); ?>
		<?php echo $form->error($model,'retiredate'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'identificationmark'); ?>		
                <?php echo $form->textField($model,'identificationmark',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'identificationmark'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'maritalstatus'); ?>		
                <?php echo $form->textField($model,'maritalstatus',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'maritalstatus'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'height'); ?>		
                <?php echo $form->textField($model,'height',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'height'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'weight'); ?>		
                <?php echo $form->textField($model,'weight',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'weight'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'gpfno'); ?>		
                <?php echo $form->textField($model,'gpfno',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'gpfno'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'scstdetail'); ?>		
                <?php echo $form->textField($model,'scstdetail',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'scstdetail'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'handicap'); ?>		
                <?php echo $form->textField($model,'handicap',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'handicap'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'fingerprints'); ?>		
                <?php echo $form->textField($model,'fingerprints',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'fingerprints'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'employeephoto'); ?>		
                <?php echo $form->textField($model,'employeephoto',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'employeephoto'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'employeesign'); ?>		
                <?php echo $form->textField($model,'employeesign',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'employeesign'); ?>
	</div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('application', 'Create') : Yii::t('application', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$this->widget('ext.ajaxform.JAjaxForm', array(
    'formId' => 'hremployee-form',
    'options' => array(
        'dataType' => 'json',
        'success' => 'js:function(data,statusText) { 
                    if(data.status == "Success"){
                        $.fn.yiiGridView.update("hremployee-grid", {
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
