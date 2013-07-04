<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idrpshop')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idrpshop), array('view', 'id'=>$data->idrpshop)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shopno')); ?>:</b>
	<?php echo CHtml::encode($data->shopno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shopname')); ?>:</b>
	<?php echo CHtml::encode($data->shopname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idrpmarket')); ?>:</b>
	<?php echo CHtml::encode($data->idrpmarket); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idrprange')); ?>:</b>
	<?php echo CHtml::encode($data->idrprange); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('monthlyrent')); ?>:</b>
	<?php echo CHtml::encode($data->monthlyrent); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('monthlysurcharge')); ?>:</b>
	<?php echo CHtml::encode($data->monthlysurcharge); ?>
	<br />

	*/ ?>

</div>