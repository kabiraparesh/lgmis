<script>
    $(document).ready(function () {
        $( "input:submit").button();
    });
</script>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'rcshop-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php  echo Yii::t('application', 'Fields with <span class="required">*</span> are required.');?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'sname'); ?>		
                <?php echo $form->textField($model,'sname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'sname'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idccward'); ?>		
                <?php echo $form->textField($model,'idccward',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#rcshop-form").find(\'#Rcshop_idccward\').val()',), 'url'=>CController::createUrl('ccward/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idccward')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idccward')); ?>_msg">
                    <?php echo !isset($model->idccward0->wardname) || $model->isNewRecord ? "-" : $model->idccward0->wardname; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                            //array('ccward/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                             Yii::app()->createAbsoluteUrl("/ccward/popupview"),
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "rcshop";
                                        window.eid = "Rcshop_idccward";
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
		<?php echo $form->labelEx($model,'saddress'); ?>		
                <?php echo $form->textField($model,'saddress',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'saddress'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'owname'); ?>		
                <?php echo $form->textField($model,'owname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'owname'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'owaddress'); ?>		
                <?php echo $form->textField($model,'owaddress',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'owaddress'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'sphone'); ?>		
                <?php echo $form->textField($model,'sphone',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'sphone'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'owphone'); ?>		
                <?php echo $form->textField($model,'owphone',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'owphone'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'sdate'); ?>		
                <?php echo $form->textField($model,'sdate'); ?>
		<?php echo $form->error($model,'sdate'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'edate'); ?>		
                <?php echo $form->textField($model,'edate'); ?>
		<?php echo $form->error($model,'edate'); ?>
	</div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('application', 'Create') : Yii::t('application', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$this->widget('ext.ajaxform.JAjaxForm', array(
    'formId' => 'rcshop-form',
    'options' => array(
        'dataType' => 'json',
        'success' => 'js:function(data,statusText) { 
                    if(data.status == "Success"){
                        $.fn.yiiGridView.update("rcshop-grid", {
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
