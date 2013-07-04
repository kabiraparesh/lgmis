<script>
    $(document).ready(function () {
        $( "input:submit").button();
    });
</script>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'hremplearnleave-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php  echo Yii::t('application', 'Fields with <span class="required">*</span> are required.');?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php //echo $form->labelEx($model,'idhremployee'); ?>		
                <?php //echo $form->textField($model,'idhremployee',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#hremplearnleave-form").find(\'#Hremplearnleave_idhremployee\').val()',), 'url'=>CController::createUrl('hremployee/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idhremployee')) . '_msg\').text(data.message);}'))); ?>
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
                                        window.cid = "hremplearnleave";
                                        window.eid = "Hremplearnleave_idhremployee";
                                        window.url = "'. CController::createUrl('hremployee/jsonmessage').'";
                                        $("#dialog-popup-select").html(data);
                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Hremployees') .'");
                                        $("#dialog-popup-select").dialog("open"); 
           
                                        return false;
                                    }'
                    ) 
                    );
                    */?>
		<?php //echo $form->error($model,'idhremployee'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'earnedleaveno'); ?>		
                <?php echo $form->textField($model,'earnedleaveno',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'earnedleaveno'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'earnedleavedate'); ?>		
                <?php echo $form->textField($model,'earnedleavedate'); ?>
		<?php echo $form->error($model,'earnedleavedate'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'earnedleavestartmonth'); ?>		
                <?php echo $form->textField($model,'earnedleavestartmonth',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'earnedleavestartmonth'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'earnedleaveendmonth'); ?>		
                <?php echo $form->textField($model,'earnedleaveendmonth',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'earnedleaveendmonth'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'earnedleave'); ?>		
                <?php echo $form->textField($model,'earnedleave',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'earnedleave'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'earnedleavepayment'); ?>		
                <?php echo $form->textField($model,'earnedleavepayment',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'earnedleavepayment'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'givenamount'); ?>		
                <?php echo $form->textField($model,'givenamount',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'givenamount'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'earnedleavenarration'); ?>		
                <?php echo $form->textArea($model,'earnedleavenarration',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'earnedleavenarration'); ?>
	</div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('application', 'Create') : Yii::t('application', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$this->widget('ext.ajaxform.JAjaxForm', array(
    'formId' => 'hremplearnleave-form',
    'options' => array(
        'dataType' => 'json',
        'success' => 'js:function(data,statusText) { 
                    if(data.status == "Success"){
                        $.fn.yiiGridView.update("hremplearnleave-grid", {
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
