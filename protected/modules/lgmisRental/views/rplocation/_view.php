<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idrplocation')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idrplocation), array('view', 'id'=>$data->idrplocation)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('location')); ?>:</b>
	<?php echo CHtml::encode($data->location); ?>
	<br />


</div>