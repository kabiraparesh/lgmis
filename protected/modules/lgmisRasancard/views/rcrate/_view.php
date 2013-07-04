<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idrcrate')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idrcrate), array('view', 'id'=>$data->idrcrate)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idccfyear')); ?>:</b>
	<?php echo CHtml::encode($data->idccfyear); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('whitercard')); ?>:</b>
	<?php echo CHtml::encode($data->whitercard); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bluercard')); ?>:</b>
	<?php echo CHtml::encode($data->bluercard); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('yellowrcard')); ?>:</b>
	<?php echo CHtml::encode($data->yellowrcard); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('newrcard')); ?>:</b>
	<?php echo CHtml::encode($data->newrcard); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('renewrcard')); ?>:</b>
	<?php echo CHtml::encode($data->renewrcard); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('reviewrcard')); ?>:</b>
	<?php echo CHtml::encode($data->reviewrcard); ?>
	<br />

	*/ ?>

</div>