<script>
    $(document).ready(function () {
        $( "input:submit").button();
    });
</script>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'rcfamdetail-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php  echo Yii::t('application', 'Fields with <span class="required">*</span> are required.');?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>		
                <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'age'); ?>		
                <?php echo $form->textField($model,'age',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'age'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idccrelation'); ?>		
                <?php echo $form->textField($model,'idccrelation',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#rcfamdetail-form").find(\'#Rcfamdetail_idccrelation\').val()',), 'url'=>CController::createUrl('ccrelation/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idccrelation')) . '_msg\').text(data.message);}'))); ?>
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
                                        window.cid = "rcfamdetail";
                                        window.eid = "Rcfamdetail_idccrelation";
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
		<?php echo $form->labelEx($model,'voterno'); ?>		
                <?php echo $form->textField($model,'voterno',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'voterno'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'hfname'); ?>		
                <?php echo $form->textField($model,'hfname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'hfname'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'headoffamily'); ?>		
                <?php echo $form->textField($model,'headoffamily',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'headoffamily'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idrcapplication'); ?>		
                <?php echo $form->textField($model,'idrcapplication',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#rcfamdetail-form").find(\'#Rcfamdetail_idrcapplication\').val()',), 'url'=>CController::createUrl('rcapplication/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idrcapplication')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idrcapplication')); ?>_msg">
                    <?php echo !isset($model->idrcapplication0->adate) || $model->isNewRecord ? "-" : $model->idrcapplication0->adate; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                            array('rcapplication/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "rcfamdetail";
                                        window.eid = "Rcfamdetail_idrcapplication";
                                        window.url = "'. CController::createUrl('rcapplication/jsonmessage').'";
                                        $("#dialog-popup-select").html(data);
                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Rcapplications') .'");
                                        $("#dialog-popup-select").dialog("open"); 
           
                                        return false;
                                    }'
                    ) 
                    );
                    ?>
		<?php echo $form->error($model,'idrcapplication'); ?>
	</div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('application', 'Create') : Yii::t('application', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$this->widget('ext.ajaxform.JAjaxForm', array(
    'formId' => 'rcfamdetail-form',
    'options' => array(
        'dataType' => 'json',
        'success' => 'js:function(data,statusText) { 
                    if(data.status == "Success"){
                        $.fn.yiiGridView.update("rcfamdetail-grid", {
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
