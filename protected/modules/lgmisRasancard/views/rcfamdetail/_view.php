<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idrcfamdetail')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idrcfamdetail), array('view', 'id'=>$data->idrcfamdetail)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('age')); ?>:</b>
	<?php echo CHtml::encode($data->age); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idccrelation')); ?>:</b>
	<?php echo CHtml::encode($data->idccrelation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('voterno')); ?>:</b>
	<?php echo CHtml::encode($data->voterno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hfname')); ?>:</b>
	<?php echo CHtml::encode($data->hfname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('headoffamily')); ?>:</b>
	<?php echo CHtml::encode($data->headoffamily); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('idrcapplication')); ?>:</b>
	<?php echo CHtml::encode($data->idrcapplication); ?>
	<br />

	*/ ?>

</div>