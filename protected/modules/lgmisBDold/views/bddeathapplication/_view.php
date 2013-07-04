<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idbddeathapplication')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idbddeathapplication), array('view', 'id'=>$data->idbddeathapplication)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idbddeathinformer')); ?>:</b>
	<?php echo CHtml::encode($data->idbddeathinformer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('applicationdate')); ?>:</b>
	<?php echo CHtml::encode($data->applicationdate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idccstatus')); ?>:</b>
	<?php echo CHtml::encode($data->idccstatus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('applicantname')); ?>:</b>
	<?php echo CHtml::encode($data->applicantname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('applicantaddress')); ?>:</b>
	<?php echo CHtml::encode($data->applicantaddress); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('age')); ?>:</b>
	<?php echo CHtml::encode($data->age); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('dateofdeath')); ?>:</b>
	<?php echo CHtml::encode($data->dateofdeath); ?>
	<br />

	*/ ?>

</div>