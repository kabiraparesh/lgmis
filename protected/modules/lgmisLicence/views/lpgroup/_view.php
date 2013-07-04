<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idlpgroup')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idlpgroup), array('view', 'id'=>$data->idlpgroup)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lpgroup')); ?>:</b>
	<?php echo CHtml::encode($data->lpgroup); ?>
	<br />


</div>