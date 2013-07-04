<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idhrempleducation')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idhrempleducation), array('view', 'id'=>$data->idhrempleducation)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idhremployee')); ?>:</b>
	<?php echo CHtml::encode($data->idhremployee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('examination')); ?>:</b>
	<?php echo CHtml::encode($data->examination); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('examyear')); ?>:</b>
	<?php echo CHtml::encode($data->examyear); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('examsubjects')); ?>:</b>
	<?php echo CHtml::encode($data->examsubjects); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('examdivision')); ?>:</b>
	<?php echo CHtml::encode($data->examdivision); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('boarduniversity')); ?>:</b>
	<?php echo CHtml::encode($data->boarduniversity); ?>
	<br />


</div>