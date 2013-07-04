<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idpttype')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idpttype), array('view', 'id'=>$data->idpttype)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />


</div>