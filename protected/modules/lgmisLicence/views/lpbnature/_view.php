<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idlpbnature')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idlpbnature), array('view', 'id'=>$data->idlpbnature)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lpnature')); ?>:</b>
	<?php echo CHtml::encode($data->lpnature); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idlpmanadatory')); ?>:</b>
	<?php echo CHtml::encode($data->idlpmanadatory); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idlpgroup')); ?>:</b>
	<?php echo CHtml::encode($data->idlpgroup); ?>
	<br />


</div>