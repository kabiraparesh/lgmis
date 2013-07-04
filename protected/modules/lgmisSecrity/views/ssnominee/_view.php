<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idssnominee')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idssnominee), array('view', 'id'=>$data->idssnominee)); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('idssapplication')); ?>:</b>
	<?php echo CHtml::encode($data->idssapplication); ?>
	<br />


</div>