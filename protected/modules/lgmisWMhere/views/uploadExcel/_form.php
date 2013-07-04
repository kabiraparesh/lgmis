<?php
/* @var $this BloodgroupController */
/* @var $model Bloodgroup */
/* @var $form CActiveForm */
?>

<script>
    $(document).ready(function () {
        $( "input:submit").button();
    });
</script>

<div id="StatusBar" style="margin-bottom: 5px; "></div>
<div id="Notification" style="margin-bottom: 5px;"></div>

<?php
 // Initialize the extension
$this->widget('ext.jnotify.JNotify', array(
	'statusBarId'=>'StatusBar',
	'notificationId'=>'Notification',
	'notificationHSpace'=>'30px',	
	'notificationWidth'=>'280px',
	'notificationShowAt'=>'topRight',
	//'notificationShowAt'=>'bottomLeft',
	//'notificationAppendType'=>'prepend',
)); ?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'uploadexcel-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php echo LgmisWMModule::t('Fields with <span class="required">*</span> are required.');?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'upload_file'); ?>
		<?php echo $form->fileField($model,'upload_file'); ?>
		<?php echo $form->error($model,'upload_file'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(LgmisWMModule::t('Create'), array('id'=>'uploadexcel-form-submit')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
    $this->widget('ext.ajaxform.JAjaxForm', array(
        'formId' => 'uploadexcel-form',
        'options' => array(
            'dataType' => 'json',
            'success' => 'js:function(data,statusText) { 
                    if(data.status == 1){
//                         $.fn.yiiGridView.update("uploadexcel-grid", {
//                               data: $(this).serialize()
//                         });

                        $("#StatusBar").jnotifyAddMessage({
                                text: data.message,
                                permanent: false,
                                type: "message"
                        });                        

                        $("#uploadexcel-form").resetForm();
                        return false;
                    }
                    else{
                        $("#StatusBar").jnotifyAddMessage({
                                text: data.message,
                                permanent: false,
                                type: "error"
                        });                        
                        return false;
                    }
        }',
        ),
    ));

?>