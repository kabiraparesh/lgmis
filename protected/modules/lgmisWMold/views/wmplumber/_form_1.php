<?php
/* @var $this WmplumberController */
/* @var $model Wmplumber */
/* @var $form CActiveForm */
?>

<script>
    $(document).ready(function () {
        $( "input:submit").button();
    });
</script>

<div id="StatusBar" style="margin-bottom: 5px; "></div>
<div id="Notification" style="margin-bottom: 5px;"></div>

<?php // Initialize the extension
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

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'wmplumber-form',
        'enableAjaxValidation' => true,
            ));
    ?>

    <p class="note"><?php echo LgmisWMModule::t('Fields with <span class="required">*</span> are required.'); ?></p>

        <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'plumbername'); ?>
<?php echo $form->textField($model, 'plumbername', array('size' => 60, 'maxlength' => 100)); ?>
<?php echo $form->error($model, 'plumbername'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'address'); ?>
<?php echo $form->textField($model, 'address', array('size' => 60, 'maxlength' => 100)); ?>
<?php echo $form->error($model, 'address'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'details'); ?>
<?php echo $form->textField($model, 'details', array('size' => 60, 'maxlength' => 100)); ?>
<?php echo $form->error($model, 'details'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'phoneno'); ?>
<?php echo $form->textField($model, 'phoneno', array('size' => 20, 'maxlength' => 20)); ?>
<?php echo $form->error($model, 'phoneno'); ?>
    </div>

    <div class="row buttons">
    <?php echo CHtml::submitButton($model->isNewRecord ? LgmisWMModule::t('Create') : LgmisWMModule::t('Save'), array('id' => 'wmplumber-form-submit')); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
if ($model->isNewRecord) {
    $this->widget('ext.ajaxform.JAjaxForm', array(
        'formId' => 'wmplumber-form',
        'options' => array(
            'dataType' => 'json',
            'success' => 'js:function(data,statusText) { 
                    if(data.status == 1){
                        $.fn.yiiGridView.update("wmplumber-grid", {
                              data: $(this).serialize()
                        });

                        $("#StatusBar").jnotifyAddMessage({
                                text: data.message,
                                permanent: false,
                                type: "message"
                        });                        

                        $("#wmplumber-form").resetForm();
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
}
else{
    $this->widget('ext.ajaxform.JAjaxForm', array(
        'formId' => 'wmplumber-form',
        'options' => array(
            'dataType' => 'json',
            'success' => 'js:function(data,statusText) { 
                    if(data.status == 1){
                        $.fn.yiiGridView.update("wmplumber-grid", {
                              data: $(this).serialize()
                        });
                        $("#wmplumber-form-dialog").dialog("close").destroy();
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
}
?>
