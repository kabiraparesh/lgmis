<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idlprelative')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idlprelative), array('view', 'id'=>$data->idlprelative)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('relativename')); ?>:</b>
	<?php echo CHtml::encode($data->relativename); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('relativeage')); ?>:</b>
	<?php echo CHtml::encode($data->relativeage); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idccsex')); ?>:</b>
	<?php echo CHtml::encode($data->idccsex); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idccrelation')); ?>:</b>
	<?php echo CHtml::encode($data->idccrelation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idlpapplicant')); ?>:</b>
	<?php echo CHtml::encode($data->idlpapplicant); ?>
	<br />


</div>