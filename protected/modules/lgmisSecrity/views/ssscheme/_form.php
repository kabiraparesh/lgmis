<script>
    $(document).ready(function () {
        $( "input:submit").button();
    });
</script>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ssscheme-form',
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
		<?php echo $form->labelEx($model,'idcccategory'); ?>		
                <?php echo $form->textField($model,'idcccategory',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#ssscheme-form").find(\'#Ssscheme_idcccategory\').val()',), 'url'=>CController::createUrl('cccategory/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idcccategory')) . '_msg\').text(data.message);}'))); ?>
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
                                        window.cid = "ssscheme";
                                        window.eid = "Ssscheme_idcccategory";
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
		<?php echo $form->labelEx($model,'idccoccupation'); ?>		
                <?php echo $form->textField($model,'idccoccupation',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#ssscheme-form").find(\'#Ssscheme_idccoccupation\').val()',), 'url'=>CController::createUrl('ccoccupation/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idccoccupation')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idccoccupation')); ?>_msg">
                    <?php echo !isset($model->idccoccupation0->occupationname) || $model->isNewRecord ? "-" : $model->idccoccupation0->occupationname; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                           // array('ccoccupation/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                             Yii::app()->createAbsoluteUrl("/ccoccupation/popupview"),
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "ssscheme";
                                        window.eid = "Ssscheme_idccoccupation";
                                        window.url = "'. CController::createUrl('ccoccupation/jsonmessage').'";
                                        $("#dialog-popup-select").html(data);
                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Ccoccupations') .'");
                                        $("#dialog-popup-select").dialog("open"); 
           
                                        return false;
                                    }'
                    ) 
                    );
                    ?>
		<?php echo $form->error($model,'idccoccupation'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'sponseredby'); ?>		
                <?php echo $form->textField($model,'sponseredby',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'sponseredby'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'department'); ?>		
                <?php echo $form->textField($model,'department',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'department'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'benefictiories'); ?>		
                <?php echo $form->textField($model,'benefictiories',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'benefictiories'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'eligcriteria'); ?>		
                <?php echo $form->textField($model,'eligcriteria',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'eligcriteria'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'validity'); ?>		
                <?php echo $form->textField($model,'validity'); ?>
		<?php echo $form->error($model,'validity'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'otherbenefit'); ?>		
                <?php echo $form->textField($model,'otherbenefit',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'otherbenefit'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idssgrant'); ?>		
                <?php echo $form->textField($model,'idssgrant',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#ssscheme-form").find(\'#Ssscheme_idssgrant\').val()',), 'url'=>CController::createUrl('ssgrant/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idssgrant')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idssgrant')); ?>_msg">
                    <?php echo !isset($model->idssgrant0->type) || $model->isNewRecord ? "-" : $model->idssgrant0->type; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                            array('ssgrant/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "ssscheme";
                                        window.eid = "Ssscheme_idssgrant";
                                        window.url = "'. CController::createUrl('ssgrant/jsonmessage').'";
                                        $("#dialog-popup-select").html(data);
                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Ssgrants') .'");
                                        $("#dialog-popup-select").dialog("open"); 
           
                                        return false;
                                    }'
                    ) 
                    );
                    ?>
		<?php echo $form->error($model,'idssgrant'); ?>
	</div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('application', 'Create') : Yii::t('application', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$this->widget('ext.ajaxform.JAjaxForm', array(
    'formId' => 'ssscheme-form',
    'options' => array(
        'dataType' => 'json',
        'success' => 'js:function(data,statusText) { 
                    if(data.status == "Success"){
                        $.fn.yiiGridView.update("ssscheme-grid", {
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
