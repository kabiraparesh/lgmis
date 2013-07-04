<script>
    $(document).ready(function () {
        $( "input:submit").button();
    });
</script>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'hremplmember-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php  echo Yii::t('application', 'Fields with <span class="required">*</span> are required.');?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'membername'); ?>		
                <?php echo $form->textField($model,'membername',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'membername'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'memberage'); ?>		
                <?php echo $form->textField($model,'memberage',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'memberage'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idccsex'); ?>		
                <?php echo $form->textField($model,'idccsex',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#hremplmember-form").find(\'#Hremplmember_idccsex\').val()',), 'url'=>CController::createUrl('ccsex/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idccsex')) . '_msg\').text(data.message);}'))); ?>
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
                                        window.cid = "hremplmember";
                                        window.eid = "Hremplmember_idccsex";
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
		<?php echo $form->labelEx($model,'idccrelation'); ?>		
                <?php echo $form->textField($model,'idccrelation',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#hremplmember-form").find(\'#Hremplmember_idccrelation\').val()',), 'url'=>CController::createUrl('ccrelation/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idccrelation')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idccrelation')); ?>_msg">
                    <?php echo !isset($model->idccrelation0->relationname) || $model->isNewRecord ? "-" : $model->idccrelation0->relationname; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                            //array('ccrelation/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                            Yii::app()->createAbsoluteUrl("/ccrelation/popupview"),
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "hremplmember";
                                        window.eid = "Hremplmember_idccrelation";
                                        window.url = "'. CController::createUrl('ccrelation/jsonmessage').'";
                                        $("#dialog-popup-select").html(data);
                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Ccrelations') .'");
                                        $("#dialog-popup-select").dialog("open"); 
           
                                        return false;
                                    }'
                    ) 
                    );
                    ?>
		<?php echo $form->error($model,'idccrelation'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'issuccessor'); ?>		
                <?php echo $form->textField($model,'issuccessor',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'issuccessor'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idhremployee'); ?>		
                <?php echo $form->textField($model,'idhremployee',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#hremplmember-form").find(\'#Hremplmember_idhremployee\').val()',), 'url'=>CController::createUrl('hremployee/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idhremployee')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idhremployee')); ?>_msg">
                    <?php echo !isset($model->idhremployee0->empname) || $model->isNewRecord ? "-" : $model->idhremployee0->empname; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                            array('hremployee/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "hremplmember";
                                        window.eid = "Hremplmember_idhremployee";
                                        window.url = "'. CController::createUrl('hremployee/jsonmessage').'";
                                        $("#dialog-popup-select").html(data);
                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Hremployees') .'");
                                        $("#dialog-popup-select").dialog("open"); 
           
                                        return false;
                                    }'
                    ) 
                    );
                    ?>
		<?php echo $form->error($model,'idhremployee'); ?>
	</div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('application', 'Create') : Yii::t('application', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$this->widget('ext.ajaxform.JAjaxForm', array(
    'formId' => 'hremplmember-form',
    'options' => array(
        'dataType' => 'json',
        'success' => 'js:function(data,statusText) { 
                    if(data.status == "Success"){
                        $.fn.yiiGridView.update("hremplmember-grid", {
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
