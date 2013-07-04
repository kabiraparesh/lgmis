<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idhrbasic')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idhrbasic), array('view', 'id'=>$data->idhrbasic)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start')); ?>:</b>
	<?php echo CHtml::encode($data->start); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('increment')); ?>:</b>
	<?php echo CHtml::encode($data->increment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('endto')); ?>:</b>
	<?php echo CHtml::encode($data->endto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('display')); ?>:</b>
	<?php echo CHtml::encode($data->display); ?>
	<br />


</div>