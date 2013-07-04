<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idbdbirthrate')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idbdbirthrate), array('view', 'id'=>$data->idbdbirthrate)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bdbirthperiod')); ?>:</b>
	<?php echo CHtml::encode($data->bdbirthperiod); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bdbirthrate')); ?>:</b>
	<?php echo CHtml::encode($data->bdbirthrate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idccfyear')); ?>:</b>
	<?php echo CHtml::encode($data->idccfyear); ?>
	<br />


</div>