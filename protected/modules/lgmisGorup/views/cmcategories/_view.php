<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idcmcategories')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idcmcategories), array('view', 'id'=>$data->idcmcategories)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('categoriesname')); ?>:</b>
	<?php echo CHtml::encode($data->categoriesname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idcmgroup')); ?>:</b>
	<?php echo CHtml::encode($data->idcmgroup); ?>
	<br />


</div>