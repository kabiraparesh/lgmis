<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idrpmarket')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idrpmarket), array('view', 'id'=>$data->idrpmarket)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mktname')); ?>:</b>
	<?php echo CHtml::encode($data->mktname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idcccolony')); ?>:</b>
	<?php echo CHtml::encode($data->idcccolony); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idrplocation')); ?>:</b>
	<?php echo CHtml::encode($data->idrplocation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idccbillingperiod')); ?>:</b>
	<?php echo CHtml::encode($data->idccbillingperiod); ?>
	<br />


</div>