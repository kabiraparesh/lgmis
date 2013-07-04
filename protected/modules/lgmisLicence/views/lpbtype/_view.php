<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idlpbtype')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idlpbtype), array('view', 'id'=>$data->idlpbtype)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('btype')); ?>:</b>
	<?php echo CHtml::encode($data->btype); ?>
	<br />


</div>