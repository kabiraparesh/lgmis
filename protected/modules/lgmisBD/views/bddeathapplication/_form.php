<script>
    $(document).ready(function () {
        $( "input:submit").button();
    });
</script>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bddeathapplication-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php  echo Yii::t('application', 'Fields with <span class="required">*</span> are required.');?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idbddeathinformer'); ?>		
                <?php echo $form->textField($model,'idbddeathinformer',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#bddeathapplication-form").find(\'#Bddeathapplication_idbddeathinformer\').val()',), 'url'=>CController::createUrl('bddeathinformer/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idbddeathinformer')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idbddeathinformer')); ?>_msg">
                    <?php echo !isset($model->idbddeathinformer0->informername) || $model->isNewRecord ? "-" : $model->idbddeathinformer0->informername; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                            array('bddeathinformer/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "bddeathapplication";
                                        window.eid = "Bddeathapplication_idbddeathinformer";
                                        window.url = "'. CController::createUrl('bddeathinformer/jsonmessage').'";
                                        $("#dialog-popup-select").html(data);
                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Bddeathinformers') .'");
                                        $("#dialog-popup-select").dialog("open"); 
           
                                        return false;
                                    }'
                    ) 
                    );
                    ?>
		<?php echo $form->error($model,'idbddeathinformer'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'applicationdate'); ?>		
                <?php echo $form->textField($model,'applicationdate'); ?>
		<?php echo $form->error($model,'applicationdate'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idccstatus'); ?>		
                <?php echo $form->textField($model,'idccstatus',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#bddeathapplication-form").find(\'#Bddeathapplication_idccstatus\').val()',), 'url'=>CController::createUrl('ccstatus/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idccstatus')) . '_msg\').text(data.message);}'))); ?>
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
                                        window.cid = "bddeathapplication";
                                        window.eid = "Bddeathapplication_idccstatus";
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
		<?php echo $form->labelEx($model,'age'); ?>		
                <?php echo $form->textField($model,'age',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'age'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'dateofdeath'); ?>		
                <?php echo $form->textField($model,'dateofdeath'); ?>
		<?php echo $form->error($model,'dateofdeath'); ?>
	</div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('application', 'Create') : Yii::t('application', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$this->widget('ext.ajaxform.JAjaxForm', array(
    'formId' => 'bddeathapplication-form',
    'options' => array(
        'dataType' => 'json',
        'success' => 'js:function(data,statusText) { 
                    if(data.status == "Success"){
                      /*  $.fn.yiiGridView.update("bddeathapplication-grid", {*/
                          $.fn.yiiGridView.update("bddeathinformer-grid", {
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
