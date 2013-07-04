<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idrpdemand')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idrpdemand), array('view', 'id'=>$data->idrpdemand)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idrpshop')); ?>:</b>
	<?php echo CHtml::encode($data->idrpshop); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idccfyear')); ?>:</b>
	<?php echo CHtml::encode($data->idccfyear); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('period')); ?>:</b>
	<?php echo CHtml::encode($data->period); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rpoldbalance')); ?>:</b>
	<?php echo CHtml::encode($data->rpoldbalance); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rpsurcharge')); ?>:</b>
	<?php echo CHtml::encode($data->rpsurcharge); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rpdemandamt')); ?>:</b>
	<?php echo CHtml::encode($data->rpdemandamt); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('rpdemanddate')); ?>:</b>
	<?php echo CHtml::encode($data->rpdemanddate); ?>
	<br />

	*/ ?>

</div>