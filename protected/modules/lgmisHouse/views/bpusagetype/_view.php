<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idbpusagetype')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idbpusagetype), array('view', 'id'=>$data->idbpusagetype)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usagetype')); ?>:</b>
	<?php echo CHtml::encode($data->usagetype); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />


</div>