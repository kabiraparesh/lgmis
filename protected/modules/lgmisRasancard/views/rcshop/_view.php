<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idrcshop')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idrcshop), array('view', 'id'=>$data->idrcshop)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sname')); ?>:</b>
	<?php echo CHtml::encode($data->sname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idccward')); ?>:</b>
	<?php echo CHtml::encode($data->idccward); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('saddress')); ?>:</b>
	<?php echo CHtml::encode($data->saddress); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('owname')); ?>:</b>
	<?php echo CHtml::encode($data->owname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('owaddress')); ?>:</b>
	<?php echo CHtml::encode($data->owaddress); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sphone')); ?>:</b>
	<?php echo CHtml::encode($data->sphone); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('owphone')); ?>:</b>
	<?php echo CHtml::encode($data->owphone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sdate')); ?>:</b>
	<?php echo CHtml::encode($data->sdate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('edate')); ?>:</b>
	<?php echo CHtml::encode($data->edate); ?>
	<br />

	*/ ?>

</div>