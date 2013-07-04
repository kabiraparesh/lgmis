<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idcmcomplaint')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idcmcomplaint), array('view', 'id'=>$data->idcmcomplaint)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('complaintname')); ?>:</b>
	<?php echo CHtml::encode($data->complaintname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idcmprioritylevel')); ?>:</b>
	<?php echo CHtml::encode($data->idcmprioritylevel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idccdepartment')); ?>:</b>
	<?php echo CHtml::encode($data->idccdepartment); ?>
	<br />


</div>