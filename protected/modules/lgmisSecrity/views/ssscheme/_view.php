<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idssscheme')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idssscheme), array('view', 'id'=>$data->idssscheme)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idcccategory')); ?>:</b>
	<?php echo CHtml::encode($data->idcccategory); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idccoccupation')); ?>:</b>
	<?php echo CHtml::encode($data->idccoccupation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sponseredby')); ?>:</b>
	<?php echo CHtml::encode($data->sponseredby); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('department')); ?>:</b>
	<?php echo CHtml::encode($data->department); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('benefictiories')); ?>:</b>
	<?php echo CHtml::encode($data->benefictiories); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('eligcriteria')); ?>:</b>
	<?php echo CHtml::encode($data->eligcriteria); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('validity')); ?>:</b>
	<?php echo CHtml::encode($data->validity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('otherbenefit')); ?>:</b>
	<?php echo CHtml::encode($data->otherbenefit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idssgrant')); ?>:</b>
	<?php echo CHtml::encode($data->idssgrant); ?>
	<br />

	*/ ?>

</div>