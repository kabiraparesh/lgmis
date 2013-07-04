<script>
    $(document).ready(function () {
        $( "input:submit").button();
    });
</script>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'lpapplicant-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php  echo Yii::t('application', 'Fields with <span class="required">*</span> are required.');?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'bussname'); ?>		
                <?php echo $form->textField($model,'bussname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'bussname'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'bussaddress'); ?>		
                <?php echo $form->textField($model,'bussaddress',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'bussaddress'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idcccolony'); ?>		
                <?php echo $form->textField($model,'idcccolony',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#lpapplicant-form").find(\'#Lpapplicant_idcccolony\').val()',), 'url'=>CController::createUrl('cccolony/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idcccolony')) . '_msg\').text(data.message);}'))); ?>
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
                                        window.cid = "lpapplicant";
                                        window.eid = "Lpapplicant_idcccolony";
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
		<?php echo $form->labelEx($model,'idlpbtype'); ?>		
                <?php echo $form->textField($model,'idlpbtype',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#lpapplicant-form").find(\'#Lpapplicant_idlpbtype\').val()',), 'url'=>CController::createUrl('lpbtype/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idlpbtype')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idlpbtype')); ?>_msg">
                    <?php echo !isset($model->idlpbtype0->btype) || $model->isNewRecord ? "-" : $model->idlpbtype0->btype; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                            array('lpbtype/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "lpapplicant";
                                        window.eid = "Lpapplicant_idlpbtype";
                                        window.url = "'. CController::createUrl('lpbtype/jsonmessage').'";
                                        $("#dialog-popup-select").html(data);
                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Lpbtypes') .'");
                                        $("#dialog-popup-select").dialog("open"); 
           
                                        return false;
                                    }'
                    ) 
                    );
                    ?>
		<?php echo $form->error($model,'idlpbtype'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idlpbnature'); ?>		
                <?php echo $form->textField($model,'idlpbnature',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#lpapplicant-form").find(\'#Lpapplicant_idlpbnature\').val()',), 'url'=>CController::createUrl('lpbnature/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idlpbnature')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idlpbnature')); ?>_msg">
                    <?php echo !isset($model->idlpbnature0->lpnature) || $model->isNewRecord ? "-" : $model->idlpbnature0->lpnature; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                            array('lpbnature/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "lpapplicant";
                                        window.eid = "Lpapplicant_idlpbnature";
                                        window.url = "'. CController::createUrl('lpbnature/jsonmessage').'";
                                        $("#dialog-popup-select").html(data);
                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Lpbnatures') .'");
                                        $("#dialog-popup-select").dialog("open"); 
           
                                        return false;
                                    }'
                    ) 
                    );
                    ?>
		<?php echo $form->error($model,'idlpbnature'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'oldregno'); ?>		
                <?php echo $form->textField($model,'oldregno',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'oldregno'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'oldlicno'); ?>		
                <?php echo $form->textField($model,'oldlicno',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'oldlicno'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'otheroffice'); ?>		
                <?php echo $form->textField($model,'otheroffice',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'otheroffice'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'othergodown'); ?>		
                <?php echo $form->textField($model,'othergodown',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'othergodown'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'otherworkingplace'); ?>		
                <?php echo $form->textField($model,'otherworkingplace',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'otherworkingplace'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idlptype'); ?>		
                <?php echo $form->textField($model,'idlptype',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#lpapplicant-form").find(\'#Lpapplicant_idlptype\').val()',), 'url'=>CController::createUrl('lptype/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idlptype')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idlptype')); ?>_msg">
                    <?php echo !isset($model->idlptype0->lptype) || $model->isNewRecord ? "-" : $model->idlptype0->lptype; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                            array('lptype/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "lpapplicant";
                                        window.eid = "Lpapplicant_idlptype";
                                        window.url = "'. CController::createUrl('lptype/jsonmessage').'";
                                        $("#dialog-popup-select").html(data);
                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Lptypes') .'");
                                        $("#dialog-popup-select").dialog("open"); 
           
                                        return false;
                                    }'
                    ) 
                    );
                    ?>
		<?php echo $form->error($model,'idlptype'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'workingyoungm'); ?>		
                <?php echo $form->textField($model,'workingyoungm',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'workingyoungm'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'workingyoungf'); ?>		
                <?php echo $form->textField($model,'workingyoungf',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'workingyoungf'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'workingadultm'); ?>		
                <?php echo $form->textField($model,'workingadultm',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'workingadultm'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'workingadultf'); ?>		
                <?php echo $form->textField($model,'workingadultf',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'workingadultf'); ?>
	</div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('application', 'Create') : Yii::t('application', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$this->widget('ext.ajaxform.JAjaxForm', array(
    'formId' => 'lpapplicant-form',
    'options' => array(
        'dataType' => 'json',
        'success' => 'js:function(data,statusText) { 
                    if(data.status == "Success"){
                        $.fn.yiiGridView.update("lpapplicant-grid", {
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
