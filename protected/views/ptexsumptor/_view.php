<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idptexsumptor')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idptexsumptor), array('view', 'id'=>$data->idptexsumptor)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rebate')); ?>:</b>
	<?php echo CHtml::encode($data->rebate); ?>
	<br />


</div>