<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idhremplmember')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idhremplmember), array('view', 'id'=>$data->idhremplmember)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('membername')); ?>:</b>
	<?php echo CHtml::encode($data->membername); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('memberage')); ?>:</b>
	<?php echo CHtml::encode($data->memberage); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idccsex')); ?>:</b>
	<?php echo CHtml::encode($data->idccsex); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idccrelation')); ?>:</b>
	<?php echo CHtml::encode($data->idccrelation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('issuccessor')); ?>:</b>
	<?php echo CHtml::encode($data->issuccessor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idhremployee')); ?>:</b>
	<?php echo CHtml::encode($data->idhremployee); ?>
	<br />


</div>