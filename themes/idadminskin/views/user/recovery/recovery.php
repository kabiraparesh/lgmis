<?php
$this->layout = '//layouts/loginrecover';
?>

<!--  start forgotbox ................................................................................... -->
<div id="forgotbox">
    <div id="forgotbox-text"><?php echo UserModule::t("Please enter your login or email addres."); ?></div>
    <!--  start forgot-inner -->
    <div id="forgot-inner">
        <?php if (Yii::app()->user->hasFlash('recoveryMessage')): ?>
            <div class="success">
                <?php echo Yii::app()->user->getFlash('recoveryMessage'); ?>
            </div>
        <?php else: ?>

            <div class="form">
                <?php echo CHtml::beginForm(); ?>

                <?php echo CHtml::errorSummary($form); ?>
                <table border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <th><?php echo CHtml::activeLabel($form, 'login_or_email'); ?></th>
                        <td><?php echo CHtml::activeTextField($form, 'login_or_email', $htmlOptions = array('class', 'login-inp')) ?></td>
                    </tr>
                    <tr>
                        <th> </th>
                        <td><?php echo CHtml::submitButton(UserModule::t("Restore"),  $htmlOptions=array('class'=>'submit-login')); ?></td>
                    </tr>
                </table>
                <?php echo CHtml::endForm(); ?>
            </div><!-- form -->
        <?php endif; ?>		
    </div>
    <!--  end forgot-inner -->
    <div class="clear"></div>
            <?php echo CHtml::link(UserModule::t("Back to login"),Yii::app()->getModule('user')->loginUrl, $htmlOptions=array('class'=>'back-login')); ?>
    
<!--    <a href="" class="back-login">Back to login</a>-->
</div>
<!--  end forgotbox -->

