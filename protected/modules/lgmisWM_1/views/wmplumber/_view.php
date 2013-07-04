<?php
/* @var $this WmplumberController */
/* @var $data Wmplumber */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idwmplumber')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idwmplumber), array('view', 'id'=>$data->idwmplumber)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('plumbername')); ?>:</b>
	<?php echo CHtml::encode($data->plumbername); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('details')); ?>:</b>
	<?php echo CHtml::encode($data->details); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phoneno')); ?>:</b>
	<?php echo CHtml::encode($data->phoneno); ?>
	<br />


</div>