<script>
    $(document).ready(function () {
        $( "input:submit").button();
    });
</script>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'rpshop-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php  echo Yii::t('application', 'Fields with <span class="required">*</span> are required.');?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'shopno'); ?>		
                <?php echo $form->textField($model,'shopno',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'shopno'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'shopname'); ?>		
                <?php echo $form->textField($model,'shopname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'shopname'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>		
                <?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idrpmarket'); ?>		
                <?php echo $form->textField($model,'idrpmarket',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#rpshop-form").find(\'#Rpshop_idrpmarket\').val()',), 'url'=>CController::createUrl('rpmarket/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idrpmarket')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idrpmarket')); ?>_msg">
                    <?php echo !isset($model->idrpmarket0->mktname) || $model->isNewRecord ? "-" : $model->idrpmarket0->mktname; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                            array('rpmarket/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "rpshop";
                                        window.eid = "Rpshop_idrpmarket";
                                        window.url = "'. CController::createUrl('rpmarket/jsonmessage').'";
                                        $("#dialog-popup-select").html(data);
                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Rpmarkets') .'");
                                        $("#dialog-popup-select").dialog("open"); 
           
                                        return false;
                                    }'
                    ) 
                    );
                    ?>
		<?php echo $form->error($model,'idrpmarket'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idrprange'); ?>		
                <?php echo $form->textField($model,'idrprange',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#rpshop-form").find(\'#Rpshop_idrprange\').val()',), 'url'=>CController::createUrl('rprange/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idrprange')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idrprange')); ?>_msg">
                    <?php echo !isset($model->idrprange0->rangetype) || $model->isNewRecord ? "-" : $model->idrprange0->rangetype; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                            array('rprange/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "rpshop";
                                        window.eid = "Rpshop_idrprange";
                                        window.url = "'. CController::createUrl('rprange/jsonmessage').'";
                                        $("#dialog-popup-select").html(data);
                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Rpranges') .'");
                                        $("#dialog-popup-select").dialog("open"); 
           
                                        return false;
                                    }'
                    ) 
                    );
                    ?>
		<?php echo $form->error($model,'idrprange'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'monthlyrent'); ?>		
                <?php echo $form->textField($model,'monthlyrent',array('size'=>7,'maxlength'=>7)); ?>
		<?php echo $form->error($model,'monthlyrent'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'monthlysurcharge'); ?>		
                <?php echo $form->textField($model,'monthlysurcharge',array('size'=>7,'maxlength'=>7)); ?>
		<?php echo $form->error($model,'monthlysurcharge'); ?>
	</div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('application', 'Create') : Yii::t('application', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$this->widget('ext.ajaxform.JAjaxForm', array(
    'formId' => 'rpshop-form',
    'options' => array(
        'dataType' => 'json',
        'success' => 'js:function(data,statusText) { 
                    if(data.status == "Success"){
                        $.fn.yiiGridView.update("rpshop-grid", {
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
