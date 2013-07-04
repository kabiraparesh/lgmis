<?php
/* @var $this WmmasterController */
/* @var $data Wmmaster */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idwmmaster')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idwmmaster), array('view', 'id'=>$data->idwmmaster)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idccfyear')); ?>:</b>
	<?php echo CHtml::encode($data->idccfyear); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wmappdate')); ?>:</b>
	<?php echo CHtml::encode($data->wmappdate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ownername')); ?>:</b>
	<?php echo CHtml::encode($data->ownername); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idptmaster')); ?>:</b>
	<?php echo CHtml::encode($data->idptmaster); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idwmtype')); ?>:</b>
	<?php echo CHtml::encode($data->idwmtype); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idwmsize')); ?>:</b>
	<?php echo CHtml::encode($data->idwmsize); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('wmtape')); ?>:</b>
	<?php echo CHtml::encode($data->wmtape); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idwmplumber')); ?>:</b>
	<?php echo CHtml::encode($data->idwmplumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idccstatus')); ?>:</b>
	<?php echo CHtml::encode($data->idccstatus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mainlindia')); ?>:</b>
	<?php echo CHtml::encode($data->mainlindia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mainlindis')); ?>:</b>
	<?php echo CHtml::encode($data->mainlindis); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wmdetails')); ?>:</b>
	<?php echo CHtml::encode($data->wmdetails); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wmmasterflag')); ?>:</b>
	<?php echo CHtml::encode($data->wmmasterflag); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idwmexsumptor')); ?>:</b>
	<?php echo CHtml::encode($data->idwmexsumptor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('params')); ?>:</b>
	<?php echo CHtml::encode($data->params); ?>
	<br />

	*/ ?>

</div>