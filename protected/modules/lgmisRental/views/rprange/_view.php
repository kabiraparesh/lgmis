<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idrprange')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idrprange), array('view', 'id'=>$data->idrprange)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rangetype')); ?>:</b>
	<?php echo CHtml::encode($data->rangetype); ?>
	<br />


</div>