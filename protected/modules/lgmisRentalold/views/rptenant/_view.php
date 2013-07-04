<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idrptenant')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idrptenant), array('view', 'id'=>$data->idrptenant)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idrpshop')); ?>:</b>
	<?php echo CHtml::encode($data->idrpshop); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tenantname')); ?>:</b>
	<?php echo CHtml::encode($data->tenantname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tenantaddress')); ?>:</b>
	<?php echo CHtml::encode($data->tenantaddress); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tenantcity')); ?>:</b>
	<?php echo CHtml::encode($data->tenantcity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tenantcontact')); ?>:</b>
	<?php echo CHtml::encode($data->tenantcontact); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hirefrom')); ?>:</b>
	<?php echo CHtml::encode($data->hirefrom); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('shopname')); ?>:</b>
	<?php echo CHtml::encode($data->shopname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('headoffice')); ?>:</b>
	<?php echo CHtml::encode($data->headoffice); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('registrationno')); ?>:</b>
	<?php echo CHtml::encode($data->registrationno); ?>
	<br />

	*/ ?>

</div>