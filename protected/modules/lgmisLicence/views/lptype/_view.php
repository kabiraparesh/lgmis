<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idlptype')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idlptype), array('view', 'id'=>$data->idlptype)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lptype')); ?>:</b>
	<?php echo CHtml::encode($data->lptype); ?>
	<br />


</div>