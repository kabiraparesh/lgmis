<?php
    $this->layout = '//layouts/loginrecover';
?>

	<!--  start loginbox ................................................................................. -->
	<div id="loginbox">
	
	<!--  start login-inner -->
	<div id="login-inner">


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

<!--		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th>Username</th>
			<td><input type="text"  class="login-inp" /></td>
		</tr>
		<tr>
			<th>Password</th>
			<td><input type="password" value="************"  onfocus="this.value=''" class="login-inp" /></td>
		</tr>
		<tr>
			<th></th>
			<td valign="top"><input type="checkbox" class="checkbox-size" id="login-check" /><label for="login-check">Remember me</label></td>
		</tr>
		<tr>
			<th></th>
			<td><input type="button" class="submit-login"  /></td>
		</tr>
		</table>-->
	</div>
 	<!--  end login-inner -->
	<div class="clear"></div>
<!--            <?php echo CHtml::link(UserModule::t("Register"),Yii::app()->getModule('user')->registrationUrl); ?> | -->
            <?php echo CHtml::link(UserModule::t("Lost Password?"),Yii::app()->getModule('user')->recoveryUrl, $htmlOptions=array('class'=>'forgot-pwd')); ?>
        
        
<!--	<a href="" class="forgot-pwd">Forgot Password?</a>-->
        </div>
 <!--  end loginbox -->
