<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idhrleavemaster')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idhrleavemaster), array('view', 'id'=>$data->idhrleavemaster)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idhremployee')); ?>:</b>
	<?php echo CHtml::encode($data->idhremployee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('foryear')); ?>:</b>
	<?php echo CHtml::encode($data->foryear); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('formonth')); ?>:</b>
	<?php echo CHtml::encode($data->formonth); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('workingdays')); ?>:</b>
	<?php echo CHtml::encode($data->workingdays); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('attendence')); ?>:</b>
	<?php echo CHtml::encode($data->attendence); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('casualleave')); ?>:</b>
	<?php echo CHtml::encode($data->casualleave); ?>
	<br />

	<?php /*
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

	*/ ?>

</div>