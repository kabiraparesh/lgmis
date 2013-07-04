<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idcccolony')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idcccolony), array('view', 'id'=>$data->idcccolony)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('colonyname')); ?>:</b>
	<?php echo CHtml::encode($data->colonyname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idccward')); ?>:</b>
	<?php echo CHtml::encode($data->idccward); ?>
	<br />


</div>