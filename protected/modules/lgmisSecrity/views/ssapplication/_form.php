<script>
    $(document).ready(function () {
        $( "input:submit").button();
    });
</script>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ssapplication-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php  echo Yii::t('application', 'Fields with <span class="required">*</span> are required.');?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>		
                <?php echo $form->textField($model,'type',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>		
                <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'fhname'); ?>		
                <?php echo $form->textField($model,'fhname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'fhname'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'markident'); ?>		
                <?php echo $form->textField($model,'markident',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'markident'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'dob'); ?>		
                <?php echo $form->textField($model,'dob'); ?>
		<?php echo $form->error($model,'dob'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idcccategory'); ?>		
                <?php echo $form->textField($model,'idcccategory',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#ssapplication-form").find(\'#Ssapplication_idcccategory\').val()',), 'url'=>CController::createUrl('cccategory/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idcccategory')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idcccategory')); ?>_msg">
                    <?php echo !isset($model->idcccategory0->categoryname) || $model->isNewRecord ? "-" : $model->idcccategory0->categoryname; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                            //array('cccategory/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                             Yii::app()->createAbsoluteUrl("/cccategory/popupview"),
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "ssapplication";
                                        window.eid = "Ssapplication_idcccategory";
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
		<?php echo $form->labelEx($model,'remmitaddress'); ?>		
                <?php echo $form->textField($model,'remmitaddress',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'remmitaddress'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'permanentadd'); ?>		
                <?php echo $form->textField($model,'permanentadd',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'permanentadd'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'domicileadd'); ?>		
                <?php echo $form->textField($model,'domicileadd',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'domicileadd'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'yearreskling'); ?>		
                <?php echo $form->textField($model,'yearreskling',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'yearreskling'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'monincome'); ?>		
                <?php echo $form->textField($model,'monincome',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'monincome'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'immproperty'); ?>		
                <?php echo $form->textField($model,'immproperty',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'immproperty'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'presentresiding'); ?>		
                <?php echo $form->textField($model,'presentresiding',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'presentresiding'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'bornresiding'); ?>		
                <?php echo $form->textField($model,'bornresiding',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'bornresiding'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'incometax'); ?>		
                <?php echo $form->textField($model,'incometax',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'incometax'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'servicedetail'); ?>		
                <?php echo $form->textField($model,'servicedetail',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'servicedetail'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'pansionreceipt'); ?>		
                <?php echo $form->textField($model,'pansionreceipt',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'pansionreceipt'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'nationnality'); ?>		
                <?php echo $form->textField($model,'nationnality',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nationnality'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idccsex'); ?>		
                <?php echo $form->textField($model,'idccsex',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#ssapplication-form").find(\'#Ssapplication_idccsex\').val()',), 'url'=>CController::createUrl('ccsex/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idccsex')) . '_msg\').text(data.message);}'))); ?>
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
                                        window.cid = "ssapplication";
                                        window.eid = "Ssapplication_idccsex";
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
		<?php echo $form->labelEx($model,'dodhusband'); ?>		
                <?php echo $form->textField($model,'dodhusband'); ?>
		<?php echo $form->error($model,'dodhusband'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'freedomfighter'); ?>		
                <?php echo $form->textField($model,'freedomfighter',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'freedomfighter'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'addfreedfighter'); ?>		
                <?php echo $form->textField($model,'addfreedfighter',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'addfreedfighter'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idccstatus'); ?>		
                <?php echo $form->textField($model,'idccstatus',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#ssapplication-form").find(\'#Ssapplication_idccstatus\').val()',), 'url'=>CController::createUrl('ccstatus/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idccstatus')) . '_msg\').text(data.message);}'))); ?>
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
                                        window.cid = "ssapplication";
                                        window.eid = "Ssapplication_idccstatus";
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
		<?php echo $form->labelEx($model,'bankbranch'); ?>		
                <?php echo $form->textField($model,'bankbranch',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'bankbranch'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'bankaccountno'); ?>		
                <?php echo $form->textField($model,'bankaccountno',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'bankaccountno'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'ifsccode'); ?>		
                <?php echo $form->textField($model,'ifsccode',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'ifsccode'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'documentssubmit'); ?>		
                <?php echo $form->textField($model,'documentssubmit',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'documentssubmit'); ?>
	</div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('application', 'Create') : Yii::t('application', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$this->widget('ext.ajaxform.JAjaxForm', array(
    'formId' => 'ssapplication-form',
    'options' => array(
        'dataType' => 'json',
        'success' => 'js:function(data,statusText) { 
                    if(data.status == "Success"){
                        $.fn.yiiGridView.update("ssapplication-grid", {
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
