<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idptservicetax')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idptservicetax), array('view', 'id'=>$data->idptservicetax)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('servicetype')); ?>:</b>
	<?php echo CHtml::encode($data->servicetype); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('taxrate')); ?>:</b>
	<?php echo CHtml::encode($data->taxrate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idccfyear')); ?>:</b>
	<?php echo CHtml::encode($data->idccfyear); ?>
	<br />


</div>