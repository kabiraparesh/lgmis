<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idbparearate')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idbparearate), array('view', 'id'=>$data->idbparearate)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idccfyear')); ?>:</b>
	<?php echo CHtml::encode($data->idccfyear); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idbpusagetype')); ?>:</b>
	<?php echo CHtml::encode($data->idbpusagetype); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('raterange')); ?>:</b>
	<?php echo CHtml::encode($data->raterange); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('scheduleperiod')); ?>:</b>
	<?php echo CHtml::encode($data->scheduleperiod); ?>
	<br />


</div>