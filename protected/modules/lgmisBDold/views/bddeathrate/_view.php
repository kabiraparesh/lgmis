<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idbddeathrate')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idbddeathrate), array('view', 'id'=>$data->idbddeathrate)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deathperiod')); ?>:</b>
	<?php echo CHtml::encode($data->deathperiod); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rate')); ?>:</b>
	<?php echo CHtml::encode($data->rate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idccfyear')); ?>:</b>
	<?php echo CHtml::encode($data->idccfyear); ?>
	<br />


</div>