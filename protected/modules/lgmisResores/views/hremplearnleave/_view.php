<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idhremplearnleave')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idhremplearnleave), array('view', 'id'=>$data->idhremplearnleave)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idhremployee')); ?>:</b>
	<?php echo CHtml::encode($data->idhremployee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('earnedleaveno')); ?>:</b>
	<?php echo CHtml::encode($data->earnedleaveno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('earnedleavedate')); ?>:</b>
	<?php echo CHtml::encode($data->earnedleavedate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('earnedleavestartmonth')); ?>:</b>
	<?php echo CHtml::encode($data->earnedleavestartmonth); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('earnedleaveendmonth')); ?>:</b>
	<?php echo CHtml::encode($data->earnedleaveendmonth); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('earnedleave')); ?>:</b>
	<?php echo CHtml::encode($data->earnedleave); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('earnedleavepayment')); ?>:</b>
	<?php echo CHtml::encode($data->earnedleavepayment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('givenamount')); ?>:</b>
	<?php echo CHtml::encode($data->givenamount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('earnedleavenarration')); ?>:</b>
	<?php echo CHtml::encode($data->earnedleavenarration); ?>
	<br />

	*/ ?>

</div>