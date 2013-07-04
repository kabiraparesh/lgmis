<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idlprate')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idlprate), array('view', 'id'=>$data->idlprate)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idccfyear')); ?>:</b>
	<?php echo CHtml::encode($data->idccfyear); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idlpbnature')); ?>:</b>
	<?php echo CHtml::encode($data->idlpbnature); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('naturerate')); ?>:</b>
	<?php echo CHtml::encode($data->naturerate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('renewalrate')); ?>:</b>
	<?php echo CHtml::encode($data->renewalrate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cancelationrate')); ?>:</b>
	<?php echo CHtml::encode($data->cancelationrate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('penaltyrate')); ?>:</b>
	<?php echo CHtml::encode($data->penaltyrate); ?>
	<br />


</div>