<?php
/* @var $this WmtypeController */
/* @var $data Wmtype */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idwmtype')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idwmtype), array('view', 'id'=>$data->idwmtype)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wmtype')); ?>:</b>
	<?php echo CHtml::encode($data->wmtype); ?>
	<br />


</div>