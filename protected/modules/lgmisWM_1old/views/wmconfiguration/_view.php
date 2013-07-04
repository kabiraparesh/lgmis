<?php
/* @var $this WmconfigurationController */
/* @var $data Wmconfiguration */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idwmconfiguration')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idwmconfiguration), array('view', 'id'=>$data->idwmconfiguration)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idccfyear')); ?>:</b>
	<?php echo CHtml::encode($data->idccfyear); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idwmtype')); ?>:</b>
	<?php echo CHtml::encode($data->idwmtype); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idwmsize')); ?>:</b>
	<?php echo CHtml::encode($data->idwmsize); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wmtape')); ?>:</b>
	<?php echo CHtml::encode($data->wmtape); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('newconncharge')); ?>:</b>
	<?php echo CHtml::encode($data->newconncharge); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tempconncharge')); ?>:</b>
	<?php echo CHtml::encode($data->tempconncharge); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('reconncharge')); ?>:</b>
	<?php echo CHtml::encode($data->reconncharge); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tempdisconncharge')); ?>:</b>
	<?php echo CHtml::encode($data->tempdisconncharge); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('surcharge')); ?>:</b>
	<?php echo CHtml::encode($data->surcharge); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('monthlycharges')); ?>:</b>
	<?php echo CHtml::encode($data->monthlycharges); ?>
	<br />

	*/ ?>

</div>