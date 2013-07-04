<script>
    $(document).ready(function () {
        $( "input:submit").button();
    });
</script>

<style>
        label{
            width: 245px;
	}
        div.row{
            padding-top: 3px;
            padding-bottom: 3px;
        }    
</style>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pttaxrate-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php  echo Yii::t('application', 'Fields with <span class="required">*</span> are required.');?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'permanentdiscount'); ?>		
                <?php echo $form->textField($model,'permanentdiscount',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'permanentdiscount'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'otherdiscount'); ?>		
                <?php echo $form->textField($model,'otherdiscount',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'otherdiscount'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'discount12k'); ?>		
                <?php echo $form->textField($model,'discount12k',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'discount12k'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'pttaxrate'); ?>		
                <?php echo $form->textField($model,'pttaxrate',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'pttaxrate'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'selfusediscount'); ?>		
                <?php echo $form->textField($model,'selfusediscount',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'selfusediscount'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'panelty'); ?>		
                <?php echo $form->textField($model,'panelty',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'panelty'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'minsamekittax'); ?>		
                <?php echo $form->textField($model,'minsamekittax',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'minsamekittax'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'samekittax'); ?>		
                <?php echo $form->textField($model,'samekittax',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'samekittax'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'waterpttax'); ?>		
                <?php echo $form->textField($model,'waterpttax',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'waterpttax'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'educess'); ?>		
                <?php echo $form->textField($model,'educess',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'educess'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'subcess1'); ?>		
                <?php echo $form->textField($model,'subcess1',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'subcess1'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'subcess2'); ?>		
                <?php echo $form->textField($model,'subcess2',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'subcess2'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'pttaxdiscount'); ?>		
                <?php echo $form->textField($model,'pttaxdiscount',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'pttaxdiscount'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'pttaxsurcharge'); ?>		
                <?php echo $form->textField($model,'pttaxsurcharge',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'pttaxsurcharge'); ?>
	</div>
        
	<div class="row">
        <?php echo $form->hiddenField($model, 'idccfyear'); ?>
	    <?php echo $form->hiddenField($model, 'idptrange'); ?>
		<?php //echo $form->labelEx($model,'idccfyear'); ?>		
                <?php //echo $form->textField($model,'idccfyear',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#pttaxrate-form").find(\'#Pttaxrate_idccfyear\').val()',), 'url'=>CController::createUrl('ccfyear/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idccfyear')) . '_msg\').text(data.message);}'))); ?>
<!--                <span id="<?php echo ucfirst(CHtml::activeId($model,'idccfyear')); ?>_msg">
                    <?php echo !isset($model->idccfyear0->fyear) || $model->isNewRecord ? "-" : $model->idccfyear0->fyear; ?>
                </span>-->
                <?php
//                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
//                    echo CHtml::ajaxLink(
//                            $imghtml, 
//                            array('ccfyear/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
//                            array(
//                                "data" => array(
//                                    "isAjaxRequest" => 1,
//                                ),
//                                'success' => 'function(data){
//                                        window.cid = "pttaxrate";
//                                        window.eid = "Pttaxrate_idccfyear";
//                                        window.url = "'. CController::createUrl('ccfyear/jsonmessage').'";
//                                        $("#dialog-popup-select").html(data);
//                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Ccfyears') .'");
//                                        $("#dialog-popup-select").dialog("open"); 
//           
//                                        return false;
//                                    }'
//                    ) 
//                    );
                    ?>
		<?php //echo $form->error($model,'idccfyear'); ?>
	</div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('application', 'Create') : Yii::t('application', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$this->widget('ext.ajaxform.JAjaxForm', array(
    'formId' => 'pttaxrate-form',
    'options' => array(
        'dataType' => 'json',
        'success' => 'js:function(data,statusText) { 
                    if(data.status == "Success"){
                        $.fn.yiiGridView.update("pttaxrate-grid", {
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
