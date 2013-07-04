<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idlpmanadatory')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idlpmanadatory), array('view', 'id'=>$data->idlpmanadatory)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lname')); ?>:</b>
	<?php echo CHtml::encode($data->lname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('issuedby')); ?>:</b>
	<?php echo CHtml::encode($data->issuedby); ?>
	<br />


</div>