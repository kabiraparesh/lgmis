<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idccward')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idccward), array('view', 'id'=>$data->idccward)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wardname')); ?>:</b>
	<?php echo CHtml::encode($data->wardname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idcczone')); ?>:</b>
	<?php echo CHtml::encode($data->idcczone); ?>
	<br />


</div>