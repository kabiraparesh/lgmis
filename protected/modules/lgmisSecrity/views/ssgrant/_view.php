<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idssgrant')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idssgrant), array('view', 'id'=>$data->idssgrant)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amount')); ?>:</b>
	<?php echo CHtml::encode($data->amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reason')); ?>:</b>
	<?php echo CHtml::encode($data->reason); ?>
	<br />


</div>