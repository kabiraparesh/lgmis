<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idhrpost')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idhrpost), array('view', 'id'=>$data->idhrpost)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('postname')); ?>:</b>
	<?php echo CHtml::encode($data->postname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idccdepartment')); ?>:</b>
	<?php echo CHtml::encode($data->idccdepartment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idhrcategory')); ?>:</b>
	<?php echo CHtml::encode($data->idhrcategory); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idhrclass')); ?>:</b>
	<?php echo CHtml::encode($data->idhrclass); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idhrbasic')); ?>:</b>
	<?php echo CHtml::encode($data->idhrbasic); ?>
	<br />


</div>