<script>
    $(document).ready(function () {
        $( "input:submit").button();
    });
</script>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cmapplication-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php  echo Yii::t('application', 'Fields with <span class="required">*</span> are required.');?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idcmsource'); ?>		
                <?php echo $form->textField($model,'idcmsource',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#cmapplication-form").find(\'#Cmapplication_idcmsource\').val()',), 'url'=>CController::createUrl('cmsource/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idcmsource')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idcmsource')); ?>_msg">
                    <?php echo !isset($model->idcmsource0->source) || $model->isNewRecord ? "-" : $model->idcmsource0->source; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                           // array('cmsource/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                             Yii::app()->createAbsoluteUrl("/cmsource/popupview"),
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "cmapplication";
                                        window.eid = "Cmapplication_idcmsource";
                                        window.url = "'. CController::createUrl('cmsource/jsonmessage').'";
                                        $("#dialog-popup-select").html(data);
                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Cmsources') .'");
                                        $("#dialog-popup-select").dialog("open"); 
           
                                        return false;
                                    }'
                    ) 
                    );
                    ?>
		<?php echo $form->error($model,'idcmsource'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'applicantname'); ?>		
                <?php echo $form->textField($model,'applicantname',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'applicantname'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'applicantaddress'); ?>		
                <?php echo $form->textField($model,'applicantaddress',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'applicantaddress'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idccstatus'); ?>		
                <?php echo $form->textField($model,'idccstatus',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'idccstatus'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idcmprioritylevel'); ?>		
                <?php echo $form->textField($model,'idcmprioritylevel',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#cmapplication-form").find(\'#Cmapplication_idcmprioritylevel\').val()',), 'url'=>CController::createUrl('cmprioritylevel/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idcmprioritylevel')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idcmprioritylevel')); ?>_msg">
                    <?php echo !isset($model->idcmprioritylevel0->priorityname) || $model->isNewRecord ? "-" : $model->idcmprioritylevel0->priorityname; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                            //array('cmprioritylevel/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                             Yii::app()->createAbsoluteUrl("/cmprioritylevel/popupview"),
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "cmapplication";
                                        window.eid = "Cmapplication_idcmprioritylevel";
                                        window.url = "'. CController::createUrl('cmprioritylevel/jsonmessage').'";
                                        $("#dialog-popup-select").html(data);
                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Cmprioritylevels') .'");
                                        $("#dialog-popup-select").dialog("open"); 
           
                                        return false;
                                    }'
                    ) 
                    );
                    ?>
		<?php echo $form->error($model,'idcmprioritylevel'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idcmperiod'); ?>		
                <?php echo $form->textField($model,'idcmperiod',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#cmapplication-form").find(\'#Cmapplication_idcmperiod\').val()',), 'url'=>CController::createUrl('cmperiod/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idcmperiod')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idcmperiod')); ?>_msg">
                    <?php echo !isset($model->idcmperiod0->periodtype) || $model->isNewRecord ? "-" : $model->idcmperiod0->periodtype; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                           // array('cmperiod/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                            Yii::app()->createAbsoluteUrl("/cmperiod/popupview"),
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "cmapplication";
                                        window.eid = "Cmapplication_idcmperiod";
                                        window.url = "'. CController::createUrl('cmperiod/jsonmessage').'";
                                        $("#dialog-popup-select").html(data);
                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Cmperiods') .'");
                                        $("#dialog-popup-select").dialog("open"); 
           
                                        return false;
                                    }'
                    ) 
                    );
                    ?>
		<?php echo $form->error($model,'idcmperiod'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idcmcategories'); ?>		
                <?php echo $form->textField($model,'idcmcategories',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#cmapplication-form").find(\'#Cmapplication_idcmcategories\').val()',), 'url'=>CController::createUrl('cmcategories/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idcmcategories')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idcmcategories')); ?>_msg">
                    <?php echo !isset($model->idcmcategories0->categoriesname) || $model->isNewRecord ? "-" : $model->idcmcategories0->categoriesname; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                            array('cmcategories/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "cmapplication";
                                        window.eid = "Cmapplication_idcmcategories";
                                        window.url = "'. CController::createUrl('cmcategories/jsonmessage').'";
                                        $("#dialog-popup-select").html(data);
                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Cmcategories') .'");
                                        $("#dialog-popup-select").dialog("open"); 
           
                                        return false;
                                    }'
                    ) 
                    );
                    ?>
		<?php echo $form->error($model,'idcmcategories'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>		
                <?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'complaintlocation'); ?>		
                <?php echo $form->textField($model,'complaintlocation',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'complaintlocation'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idcccolony'); ?>		
                <?php echo $form->textField($model,'idcccolony',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#cmapplication-form").find(\'#Cmapplication_idcccolony\').val()',), 'url'=>CController::createUrl('cccolony/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idcccolony')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idcccolony')); ?>_msg">
                    <?php echo !isset($model->idcccolony0->colonyname) || $model->isNewRecord ? "-" : $model->idcccolony0->colonyname; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                            //array('cccolony/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                             Yii::app()->createAbsoluteUrl("/cccolony/popupview"),
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "cmapplication";
                                        window.eid = "Cmapplication_idcccolony";
                                        window.url = "'. CController::createUrl('cccolony/jsonmessage').'";
                                        $("#dialog-popup-select").html(data);
                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Cccolonies') .'");
                                        $("#dialog-popup-select").dialog("open"); 
           
                                        return false;
                                    }'
                    ) 
                    );
                    ?>
		<?php echo $form->error($model,'idcccolony'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'applicantphone'); ?>		
                <?php echo $form->textField($model,'applicantphone',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'applicantphone'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'applicantmobile'); ?>		
                <?php echo $form->textField($model,'applicantmobile',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'applicantmobile'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'applicantemail'); ?>		
                <?php echo $form->textField($model,'applicantemail',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'applicantemail'); ?>
	</div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('application', 'Create') : Yii::t('application', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$this->widget('ext.ajaxform.JAjaxForm', array(
    'formId' => 'cmapplication-form',
    'options' => array(
        'dataType' => 'json',
        'success' => 'js:function(data,statusText) { 
                    if(data.status == "Success"){
                        $.fn.yiiGridView.update("cmapplication-grid", {
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
