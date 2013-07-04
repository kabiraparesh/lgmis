<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idcczone')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idcczone), array('view', 'id'=>$data->idcczone)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zonename')); ?>:</b>
	<?php echo CHtml::encode($data->zonename); ?>
	<br />


</div>