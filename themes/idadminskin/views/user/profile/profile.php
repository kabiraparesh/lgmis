<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Profile");
$this->breadcrumbs=array(
	UserModule::t("Profile"),
);
//$this->menu=array(
//	((UserModule::isAdmin())
//		?array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin'))
//		:array()),
//    array('label'=>UserModule::t('List User'), 'url'=>array('/user')),
//    array('label'=>UserModule::t('Edit'), 'url'=>array('edit')),
//    array('label'=>UserModule::t('Change password'), 'url'=>array('changepassword')),
//    array('label'=>UserModule::t('Logout'), 'url'=>array('/user/logout')),
//);

$this->layout = '//layouts/main';
$this->setPageTitle(UserModule::t("Your profile"));

?>

<style>
    .label{
        color: white;
        font-size: 1.1em;
        padding-left: 5px;
    }
    
    #product-table{
        width: 100%;
    }
    
    #product-table tr th{
        width: 20%;
    }
    
    
</style>
<h1><?php //echo UserModule::t('Your profile'); ?></h1>

<?php if(Yii::app()->user->hasFlash('profileMessage')): ?>
    <div class="success">
        <?php //echo Yii::app()->user->getFlash('profileMessage'); ?>
        <div id="StatusBar" style="margin-bottom: 5px;"></div>
        <div id="Notification" style="margin-bottom: 5px;"></div>
    </div>

    <script>

        $(document).ready(function() {
            $("#StatusBar").jnotifyAddMessage({
                    text: "<?php echo Yii::app()->user->getFlash('profileMessage'); ?>",
                    permanent: true
            });
        });    

    </script>
    <?php // Initialize the extension
    $this->widget('ext.jnotify.JNotify', array(
            'statusBarId'=>'StatusBar',
            'notificationId'=>'Notification',
            'notificationHSpace'=>'30px',	
            'notificationWidth'=>'280px',
            'notificationShowAt'=>'topRight',
            //'notificationShowAt'=>'bottomLeft',
            //'notificationAppendType'=>'prepend',
    ));
    ?>
<?php endif; ?>

<table id="product-table" class="dataGrid">
	<tr>
            <th class="label table-header-repeat line-left minwidth-1"><?php echo CHtml::encode($model->getAttributeLabel('username')); ?></th>
	    <td><?php echo CHtml::encode($model->username); ?></td>
	</tr>
	<?php 
		$profileFields=ProfileField::model()->forOwner()->sort()->findAll();
		if ($profileFields) {
			foreach($profileFields as $field) {
				//echo "<pre>"; print_r($profile); die();
			?>
	<tr>
		<th class="label table-header-repeat line-left minwidth-1"><?php echo CHtml::encode(UserModule::t($field->title)); ?></th>
    	<td><?php echo (($field->widgetView($profile))?$field->widgetView($profile):CHtml::encode((($field->range)?Profile::range($field->range,$profile->getAttribute($field->varname)):$profile->getAttribute($field->varname)))); ?></td>
	</tr>
			<?php
			}//$profile->getAttribute($field->varname)
		}
	?>
	<tr>
		<th class="label table-header-repeat line-left minwidth-1"><?php echo CHtml::encode($model->getAttributeLabel('email')); ?></th>
    	<td><?php echo CHtml::encode($model->email); ?></td>
	</tr>
	<tr>
		<th class="label table-header-repeat line-left minwidth-1"><?php echo CHtml::encode($model->getAttributeLabel('create_at')); ?></th>
    	<td><?php echo $model->create_at; ?></td>
	</tr>
	<tr>
		<th class="label table-header-repeat line-left minwidth-1"><?php echo CHtml::encode($model->getAttributeLabel('lastvisit_at')); ?></th>
    	<td><?php echo $model->lastvisit_at; ?></td>
	</tr>
	<tr>
		<th class="label table-header-repeat line-left minwidth-1"><?php echo CHtml::encode($model->getAttributeLabel('status')); ?></th>
    	<td><?php echo CHtml::encode(User::itemAlias("UserStatus",$model->status)); ?></td>
	</tr>
</table>
