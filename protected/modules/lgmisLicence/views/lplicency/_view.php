<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idlplicency')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idlplicency), array('view', 'id'=>$data->idlplicency)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('licencyname')); ?>:</b>
	<?php echo CHtml::encode($data->licencyname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('licencyage')); ?>:</b>
	<?php echo CHtml::encode($data->licencyage); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idccsex')); ?>:</b>
	<?php echo CHtml::encode($data->idccsex); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('licencyaddress')); ?>:</b>
	<?php echo CHtml::encode($data->licencyaddress); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idlpapplicant')); ?>:</b>
	<?php echo CHtml::encode($data->idlpapplicant); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('licencycontact')); ?>:</b>
	<?php echo CHtml::encode($data->licencycontact); ?>
	<br />


</div>