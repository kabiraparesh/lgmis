<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idcmapplication')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idcmapplication), array('view', 'id'=>$data->idcmapplication)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idcmsource')); ?>:</b>
	<?php echo CHtml::encode($data->idcmsource); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('applicantname')); ?>:</b>
	<?php echo CHtml::encode($data->applicantname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('applicantaddress')); ?>:</b>
	<?php echo CHtml::encode($data->applicantaddress); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idccstatus')); ?>:</b>
	<?php echo CHtml::encode($data->idccstatus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idcmprioritylevel')); ?>:</b>
	<?php echo CHtml::encode($data->idcmprioritylevel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idcmperiod')); ?>:</b>
	<?php echo CHtml::encode($data->idcmperiod); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('idcmcategories')); ?>:</b>
	<?php echo CHtml::encode($data->idcmcategories); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('complaintlocation')); ?>:</b>
	<?php echo CHtml::encode($data->complaintlocation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idcccolony')); ?>:</b>
	<?php echo CHtml::encode($data->idcccolony); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('applicantphone')); ?>:</b>
	<?php echo CHtml::encode($data->applicantphone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('applicantmobile')); ?>:</b>
	<?php echo CHtml::encode($data->applicantmobile); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('applicantemail')); ?>:</b>
	<?php echo CHtml::encode($data->applicantemail); ?>
	<br />

	*/ ?>

</div>