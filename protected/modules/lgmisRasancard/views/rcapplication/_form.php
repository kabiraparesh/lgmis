<script>
    $(document).ready(function () {
        $( "input:submit").button();
    });
</script>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'rcapplication-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php  echo Yii::t('application', 'Fields with <span class="required">*</span> are required.');?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'adate'); ?>		
                <?php echo $form->textField($model,'adate'); ?>
		<?php echo $form->error($model,'adate'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'propertyno'); ?>		
                <?php echo $form->textField($model,'propertyno',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'propertyno'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'aname'); ?>		
                <?php echo $form->textField($model,'aname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'aname'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'aaddress'); ?>		
                <?php echo $form->textField($model,'aaddress',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'aaddress'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idccward'); ?>		
                <?php echo $form->textField($model,'idccward',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#rcapplication-form").find(\'#Rcapplication_idccward\').val()',), 'url'=>CController::createUrl('ccward/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idccward')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idccward')); ?>_msg">
                    <?php echo !isset($model->idccward0->wardname) || $model->isNewRecord ? "-" : $model->idccward0->wardname; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                           // array('ccward/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                             Yii::app()->createAbsoluteUrl("/ccward/popupview"),
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "rcapplication";
                                        window.eid = "Rcapplication_idccward";
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
		<?php echo $form->labelEx($model,'livingfrom'); ?>		
                <?php echo $form->textField($model,'livingfrom',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'livingfrom'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idccoccupation'); ?>		
                <?php echo $form->textField($model,'idccoccupation',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#rcapplication-form").find(\'#Rcapplication_idccoccupation\').val()',), 'url'=>CController::createUrl('ccoccupation/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idccoccupation')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idccoccupation')); ?>_msg">
                    <?php echo !isset($model->idccoccupation0->occupationname) || $model->isNewRecord ? "-" : $model->idccoccupation0->occupationname; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                            //array('ccoccupation/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                             Yii::app()->createAbsoluteUrl("/ccoccupation/popupview"),
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "rcapplication";
                                        window.eid = "Rcapplication_idccoccupation";
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
		<?php echo $form->labelEx($model,'idccreligion'); ?>		
                <?php echo $form->textField($model,'idccreligion',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#rcapplication-form").find(\'#Rcapplication_idccreligion\').val()',), 'url'=>CController::createUrl('ccreligion/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idccreligion')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idccreligion')); ?>_msg">
                    <?php echo !isset($model->idccreligion0->religionname) || $model->isNewRecord ? "-" : $model->idccreligion0->religionname; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                            //array('ccreligion/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                             Yii::app()->createAbsoluteUrl("/ccreligion/popupview"),
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "rcapplication";
                                        window.eid = "Rcapplication_idccreligion";
                                        window.url = "'. CController::createUrl('ccreligion/jsonmessage').'";
                                        $("#dialog-popup-select").html(data);
                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Ccreligions') .'");
                                        $("#dialog-popup-select").dialog("open"); 
           
                                        return false;
                                    }'
                    ) 
                    );
                    ?>
		<?php echo $form->error($model,'idccreligion'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idcccategory'); ?>		
                <?php echo $form->textField($model,'idcccategory',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#rcapplication-form").find(\'#Rcapplication_idcccategory\').val()',), 'url'=>CController::createUrl('cccategory/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idcccategory')) . '_msg\').text(data.message);}'))); ?>
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
                                        window.cid = "rcapplication";
                                        window.eid = "Rcapplication_idcccategory";
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
		<?php echo $form->labelEx($model,'idccbpl'); ?>		
                <?php echo $form->textField($model,'idccbpl',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#rcapplication-form").find(\'#Rcapplication_idccbpl\').val()',), 'url'=>CController::createUrl('ccbpl/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idccbpl')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idccbpl')); ?>_msg">
                    <?php echo !isset($model->idccbpl0->survey) || $model->isNewRecord ? "-" : $model->idccbpl0->survey; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                            //array('ccbpl/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                             Yii::app()->createAbsoluteUrl("/ccbpl/popupview"),
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "rcapplication";
                                        window.eid = "Rcapplication_idccbpl";
                                        window.url = "'. CController::createUrl('ccbpl/jsonmessage').'";
                                        $("#dialog-popup-select").html(data);
                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Ccbpls') .'");
                                        $("#dialog-popup-select").dialog("open"); 
           
                                        return false;
                                    }'
                    ) 
                    );
                    ?>
		<?php echo $form->error($model,'idccbpl'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idrccolor'); ?>		
                <?php echo $form->textField($model,'idrccolor',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#rcapplication-form").find(\'#Rcapplication_idrccolor\').val()',), 'url'=>CController::createUrl('rccolor/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idrccolor')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idrccolor')); ?>_msg">
                    <?php echo !isset($model->idrccolor0->coloren) || $model->isNewRecord ? "-" : $model->idrccolor0->coloren; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                            //array('rccolor/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                            Yii::app()->createAbsoluteUrl("/rccolor/popupview"),
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "rcapplication";
                                        window.eid = "Rcapplication_idrccolor";
                                        window.url = "'. CController::createUrl('rccolor/jsonmessage').'";
                                        $("#dialog-popup-select").html(data);
                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Rccolors') .'");
                                        $("#dialog-popup-select").dialog("open"); 
           
                                        return false;
                                    }'
                    ) 
                    );
                    ?>
		<?php echo $form->error($model,'idrccolor'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idccstatus'); ?>		
                <?php echo $form->textField($model,'idccstatus',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#rcapplication-form").find(\'#Rcapplication_idccstatus\').val()',), 'url'=>CController::createUrl('ccstatus/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idccstatus')) . '_msg\').text(data.message);}'))); ?>
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
                                        window.cid = "rcapplication";
                                        window.eid = "Rcapplication_idccstatus";
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
		<?php echo $form->labelEx($model,'reqdoc'); ?>		
                <?php echo $form->textField($model,'reqdoc',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'reqdoc'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idfddemandreceipt'); ?>		
                <?php echo $form->textField($model,'idfddemandreceipt'); ?>
		<?php echo $form->error($model,'idfddemandreceipt'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idrcshop'); ?>		
                <?php echo $form->textField($model,'idrcshop',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#rcapplication-form").find(\'#Rcapplication_idrcshop\').val()',), 'url'=>CController::createUrl('rcshop/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idrcshop')) . '_msg\').text(data.message);}'))); ?>
                <span id="<?php echo ucfirst(CHtml::activeId($model,'idrcshop')); ?>_msg">
                    <?php echo !isset($model->idrcshop0->sname) || $model->isNewRecord ? "-" : $model->idrcshop0->sname; ?>
                </span>
                <?php
                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                    echo CHtml::ajaxLink(
                            $imghtml, 
                            array('rcshop/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                            array(
                                "data" => array(
                                    "isAjaxRequest" => 1,
                                ),
                                'success' => 'function(data){
                                        window.cid = "rcapplication";
                                        window.eid = "Rcapplication_idrcshop";
                                        window.url = "'. CController::createUrl('rcshop/jsonmessage').'";
                                        $("#dialog-popup-select").html(data);
                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Rcshops') .'");
                                        $("#dialog-popup-select").dialog("open"); 
           
                                        return false;
                                    }'
                    ) 
                    );
                    ?>
		<?php echo $form->error($model,'idrcshop'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'csdate'); ?>		
                <?php echo $form->textField($model,'csdate'); ?>
		<?php echo $form->error($model,'csdate'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'idrcfamdetail'); ?>		
                <?php echo $form->textField($model,'idrcfamdetail'); ?>
		<?php echo $form->error($model,'idrcfamdetail'); ?>
	</div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('application', 'Create') : Yii::t('application', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$this->widget('ext.ajaxform.JAjaxForm', array(
    'formId' => 'rcapplication-form',
    'options' => array(
        'dataType' => 'json',
        'success' => 'js:function(data,statusText) { 
                    if(data.status == "Success"){
                        $.fn.yiiGridView.update("rcapplication-grid", {
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
