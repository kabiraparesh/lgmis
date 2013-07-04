<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idcmgroup')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idcmgroup), array('view', 'id'=>$data->idcmgroup)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('groupname')); ?>:</b>
	<?php echo CHtml::encode($data->groupname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idccdepartment')); ?>:</b>
	<?php echo CHtml::encode($data->idccdepartment); ?>
	<br />


</div>