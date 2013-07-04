<script>
    $(document).ready(function () {
        $( "input:submit").button();
    });
</script>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'rpmarket-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php  echo Yii::t('application', 'Fields with <span class="required">*</span> are required.');?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'mktname'); ?>		
                <?php echo $form->textField($model,'mktname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'mktname'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idcccolony'); ?>		
                <?php echo $form->textField($model,'idcccolony',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#rpmarket-form").find(\'#Rpmarket_idcccolony\').val()',), 'url'=>CController::createUrl('cccolony/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idcccolony')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idcccolony')); ?>_msg">
                    <?php echo !isset($model->idcccolony0->colonyname) || $model->isNewRecord ? "-" : $model->idcccolony0->colonyname; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                          //  array('cccolony/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                             Yii::app()->createAbsoluteUrl("/cccolony/popupview"),
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "rpmarket";
                                        window.eid = "Rpmarket_idcccolony";
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
		<?php echo $form->labelEx($model,'idrplocation'); ?>		
                <?php echo $form->textField($model,'idrplocation',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#rpmarket-form").find(\'#Rpmarket_idrplocation\').val()',), 'url'=>CController::createUrl('rplocation/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idrplocation')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idrplocation')); ?>_msg">
                    <?php echo !isset($model->idrplocation0->location) || $model->isNewRecord ? "-" : $model->idrplocation0->location; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                            array('rplocation/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "rpmarket";
                                        window.eid = "Rpmarket_idrplocation";
                                        window.url = "'. CController::createUrl('rplocation/jsonmessage').'";
                                        $("#dialog-popup-select").html(data);
                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Rplocations') .'");
                                        $("#dialog-popup-select").dialog("open"); 
           
                                        return false;
                                    }'
                    ) 
                    );
                    ?>
		<?php echo $form->error($model,'idrplocation'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idccbillingperiod'); ?>		
                <?php echo $form->textField($model,'idccbillingperiod',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#rpmarket-form").find(\'#Rpmarket_idccbillingperiod\').val()',), 'url'=>CController::createUrl('ccbillingperiod/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idccbillingperiod')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idccbillingperiod')); ?>_msg">
                    <?php echo !isset($model->idccbillingperiod0->billingperiodname) || $model->isNewRecord ? "-" : $model->idccbillingperiod0->billingperiodname; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                          //  array('ccbillingperiod/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                            Yii::app()->createAbsoluteUrl("/ccbillingperiod/popupview"),
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "rpmarket";
                                        window.eid = "Rpmarket_idccbillingperiod";
                                        window.url = "'. CController::createUrl('ccbillingperiod/jsonmessage').'";
                                        $("#dialog-popup-select").html(data);
                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Ccbillingperiods') .'");
                                        $("#dialog-popup-select").dialog("open"); 
           
                                        return false;
                                    }'
                    ) 
                    );
                    ?>
		<?php echo $form->error($model,'idccbillingperiod'); ?>
	</div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('application', 'Create') : Yii::t('application', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$this->widget('ext.ajaxform.JAjaxForm', array(
    'formId' => 'rpmarket-form',
    'options' => array(
        'dataType' => 'json',
        'success' => 'js:function(data,statusText) { 
                    if(data.status == "Success"){
                        $.fn.yiiGridView.update("rpmarket-grid", {
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
