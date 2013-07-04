<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idccdepartment')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idccdepartment), array('view', 'id'=>$data->idccdepartment)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('departmentname')); ?>:</b>
	<?php echo CHtml::encode($data->departmentname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('departmentcode')); ?>:</b>
	<?php echo CHtml::encode($data->departmentcode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('demandflag')); ?>:</b>
	<?php echo CHtml::encode($data->demandflag); ?>
	<br />


</div>