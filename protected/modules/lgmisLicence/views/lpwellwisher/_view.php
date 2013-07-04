<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idwellwisher')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idwellwisher), array('view', 'id'=>$data->idwellwisher)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wishername')); ?>:</b>
	<?php echo CHtml::encode($data->wishername); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wisherage')); ?>:</b>
	<?php echo CHtml::encode($data->wisherage); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idccsex')); ?>:</b>
	<?php echo CHtml::encode($data->idccsex); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wisheraddress')); ?>:</b>
	<?php echo CHtml::encode($data->wisheraddress); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idlpapplicant')); ?>:</b>
	<?php echo CHtml::encode($data->idlpapplicant); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wishercontact')); ?>:</b>
	<?php echo CHtml::encode($data->wishercontact); ?>
	<br />


</div>