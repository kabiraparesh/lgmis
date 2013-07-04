<script>
    $(document).ready(function () {
        $( "input:submit").button();
    });
</script>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'hrpost-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php  echo Yii::t('application', 'Fields with <span class="required">*</span> are required.');?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'postname'); ?>		
                <?php echo $form->textField($model,'postname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'postname'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idccdepartment'); ?>		
                <?php echo $form->textField($model,'idccdepartment',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#hrpost-form").find(\'#Hrpost_idccdepartment\').val()',), 'url'=>CController::createUrl('ccdepartment/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idccdepartment')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idccdepartment')); ?>_msg">
                    <?php echo !isset($model->idccdepartment0->departmentname) || $model->isNewRecord ? "-" : $model->idccdepartment0->departmentname; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                           // array('ccdepartment/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                             Yii::app()->createAbsoluteUrl("/ccdepartment/popupview"),
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "hrpost";
                                        window.eid = "Hrpost_idccdepartment";
                                        window.url = "'. CController::createUrl('ccdepartment/jsonmessage').'";
                                        $("#dialog-popup-select").html(data);
                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Ccdepartments') .'");
                                        $("#dialog-popup-select").dialog("open"); 
           
                                        return false;
                                    }'
                    ) 
                    );
                    ?>
		<?php echo $form->error($model,'idccdepartment'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idhrcategory'); ?>		
                <?php echo $form->textField($model,'idhrcategory',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#hrpost-form").find(\'#Hrpost_idhrcategory\').val()',), 'url'=>CController::createUrl('hrcategory/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idhrcategory')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idhrcategory')); ?>_msg">
                    <?php echo !isset($model->idhrcategory0->category) || $model->isNewRecord ? "-" : $model->idhrcategory0->category; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                            //array('hrcategory/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                             Yii::app()->createAbsoluteUrl("/hrcategory/popupview"),
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "hrpost";
                                        window.eid = "Hrpost_idhrcategory";
                                        window.url = "'. CController::createUrl('hrcategory/jsonmessage').'";
                                        $("#dialog-popup-select").html(data);
                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Hrcategories') .'");
                                        $("#dialog-popup-select").dialog("open"); 
           
                                        return false;
                                    }'
                    ) 
                    );
                    ?>
		<?php echo $form->error($model,'idhrcategory'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idhrclass'); ?>		
                <?php echo $form->textField($model,'idhrclass',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#hrpost-form").find(\'#Hrpost_idhrclass\').val()',), 'url'=>CController::createUrl('hrclass/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idhrclass')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idhrclass')); ?>_msg">
                    <?php echo !isset($model->idhrclass0->hrclass) || $model->isNewRecord ? "-" : $model->idhrclass0->hrclass; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                           // array('hrclass/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                             Yii::app()->createAbsoluteUrl("/hrclass/popupview"),
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "hrpost";
                                        window.eid = "Hrpost_idhrclass";
                                        window.url = "'. CController::createUrl('hrclass/jsonmessage').'";
                                        $("#dialog-popup-select").html(data);
                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Hrclasses') .'");
                                        $("#dialog-popup-select").dialog("open"); 
           
                                        return false;
                                    }'
                    ) 
                    );
                    ?>
		<?php echo $form->error($model,'idhrclass'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idhrbasic'); ?>		
                <?php echo $form->textField($model,'idhrbasic',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#hrpost-form").find(\'#Hrpost_idhrbasic\').val()',), 'url'=>CController::createUrl('hrbasic/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idhrbasic')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idhrbasic')); ?>_msg">
                    <?php echo !isset($model->idhrbasic0->start) || $model->isNewRecord ? "-" : $model->idhrbasic0->start; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                            array('hrbasic/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "hrpost";
                                        window.eid = "Hrpost_idhrbasic";
                                        window.url = "'. CController::createUrl('hrbasic/jsonmessage').'";
                                        $("#dialog-popup-select").html(data);
                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Hrbasics') .'");
                                        $("#dialog-popup-select").dialog("open"); 
           
                                        return false;
                                    }'
                    ) 
                    );
                    ?>
		<?php echo $form->error($model,'idhrbasic'); ?>
	</div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('application', 'Create') : Yii::t('application', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$this->widget('ext.ajaxform.JAjaxForm', array(
    'formId' => 'hrpost-form',
    'options' => array(
        'dataType' => 'json',
        'success' => 'js:function(data,statusText) { 
                    if(data.status == "Success"){
                        $.fn.yiiGridView.update("hrpost-grid", {
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
