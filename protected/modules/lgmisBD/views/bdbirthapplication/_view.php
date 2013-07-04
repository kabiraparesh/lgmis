<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idbdbirthapplication')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idbdbirthapplication), array('view', 'id'=>$data->idbdbirthapplication)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idbdbirthinformer')); ?>:</b>
	<?php echo CHtml::encode($data->idbdbirthinformer); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('dob')); ?>:</b>
	<?php echo CHtml::encode($data->dob); ?>
	<br />


</div>