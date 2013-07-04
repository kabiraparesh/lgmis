<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idhremplinsurance')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idhremplinsurance), array('view', 'id'=>$data->idhremplinsurance)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idhremployee')); ?>:</b>
	<?php echo CHtml::encode($data->idhremployee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('policynumber')); ?>:</b>
	<?php echo CHtml::encode($data->policynumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('policydate')); ?>:</b>
	<?php echo CHtml::encode($data->policydate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('policyamount')); ?>:</b>
	<?php echo CHtml::encode($data->policyamount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('policyinstallment')); ?>:</b>
	<?php echo CHtml::encode($data->policyinstallment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('totalpremium')); ?>:</b>
	<?php echo CHtml::encode($data->totalpremium); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('premiumstartdate')); ?>:</b>
	<?php echo CHtml::encode($data->premiumstartdate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('premiumenddate')); ?>:</b>
	<?php echo CHtml::encode($data->premiumenddate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('insurancenarration')); ?>:</b>
	<?php echo CHtml::encode($data->insurancenarration); ?>
	<br />

	*/ ?>

</div>