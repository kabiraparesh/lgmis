<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idrprate')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idrprate), array('view', 'id'=>$data->idrprate)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idccfyear')); ?>:</b>
	<?php echo CHtml::encode($data->idccfyear); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idrplocation')); ?>:</b>
	<?php echo CHtml::encode($data->idrplocation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idrprange')); ?>:</b>
	<?php echo CHtml::encode($data->idrprange); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('monthlycharges')); ?>:</b>
	<?php echo CHtml::encode($data->monthlycharges); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('surcharge')); ?>:</b>
	<?php echo CHtml::encode($data->surcharge); ?>
	<br />


</div>