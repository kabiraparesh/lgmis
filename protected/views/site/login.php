<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);

$this->layout = 'login';

?>

<!--<h1>Login</h1>-->

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
    
    <table border="0" cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $form->labelEx($model, 'username'); ?></th>
            <td>		
                <?php echo $form->textField($model, 'username', $htmlOptions=array('class'=>'login-inp')); ?>
                <?php echo $form->error($model, 'username'); ?>
            </td>
        </tr>
        <tr>
            <th><?php echo $form->labelEx($model,'password'); ?></th>
            <td>
		<?php echo $form->passwordField($model,'password', $htmlOptions=array('class'=>'login-inp')); ?>
		<?php echo $form->error($model,'password'); ?>
            </td>
        </tr>
        <tr>
            <th><?php echo CHtml::label('Fin. Year', 'idccfyear'); ?></th>
            <td>
                <?php
                $models = Ccfyear::model()->findAll(
                                array('order' => 'idccfyear DESC')
                        );

                // format models as $key=>$value with listData
                $list = CHtml::listData($models, 'idccfyear', 'fyear');
                echo CHtml::dropDownList('idccfyear', '1', $list);
                ?>
            </td>
        </tr>
        <tr>
            <th></th>
            <td valign="top">
		<?php echo $form->checkBox($model,'rememberMe', $htmlOptions=array('class'=>'checkbox-size')); ?>
		<?php echo $form->label($model,'rememberMe', $htmlOptions=array('class'=>'checkbox-label')); ?>
		<?php //echo $form->error($model,'rememberMe'); ?>            
            </td>
        </tr>
        <tr>
            <th></th>
            <td><?php echo CHtml::submitButton('Login', $htmlOptions=array('class'=>'submit-login')); ?></td>
        </tr>
    </table>    

<?php $this->endWidget(); ?>
</div><!-- form -->
