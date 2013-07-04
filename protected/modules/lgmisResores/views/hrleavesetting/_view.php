<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idhrleavesetting')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idhrleavesetting), array('view', 'id'=>$data->idhrleavesetting)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('casualleave')); ?>:</b>
	<?php echo CHtml::encode($data->casualleave); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('medicalleave')); ?>:</b>
	<?php echo CHtml::encode($data->medicalleave); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('paidleave')); ?>:</b>
	<?php echo CHtml::encode($data->paidleave); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('otherleave')); ?>:</b>
	<?php echo CHtml::encode($data->otherleave); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idccfyear')); ?>:</b>
	<?php echo CHtml::encode($data->idccfyear); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('earnedleave')); ?>:</b>
	<?php echo CHtml::encode($data->earnedleave); ?>
	<br />


</div>