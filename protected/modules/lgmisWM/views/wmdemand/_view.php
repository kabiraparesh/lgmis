<?php
/* @var $this WmdemandController */
/* @var $data Wmdemand */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idwmdemand')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idwmdemand), array('view', 'id'=>$data->idwmdemand)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idwmmaster')); ?>:</b>
	<?php echo CHtml::encode($data->idwmmaster); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idccfyear')); ?>:</b>
	<?php echo CHtml::encode($data->idccfyear); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('period')); ?>:</b>
	<?php echo CHtml::encode($data->period); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wmoldbalance')); ?>:</b>
	<?php echo CHtml::encode($data->wmoldbalance); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wmsurcharge')); ?>:</b>
	<?php echo CHtml::encode($data->wmsurcharge); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wmdemandamt')); ?>:</b>
	<?php echo CHtml::encode($data->wmdemandamt); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('wmdemanddate')); ?>:</b>
	<?php echo CHtml::encode($data->wmdemanddate); ?>
	<br />

	*/ ?>

</div>