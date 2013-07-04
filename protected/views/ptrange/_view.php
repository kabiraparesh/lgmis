<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idptrange')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idptrange), array('view', 'id'=>$data->idptrange)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rangeno')); ?>:</b>
	<?php echo CHtml::encode($data->rangeno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rangename')); ?>:</b>
	<?php echo CHtml::encode($data->rangename); ?>
	<br />


</div>