<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idpttransaction')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idpttransaction), array('view', 'id'=>$data->idpttransaction)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idptmaster')); ?>:</b>
	<?php echo CHtml::encode($data->idptmaster); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idccfyear')); ?>:</b>
	<?php echo CHtml::encode($data->idccfyear); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('oldpropertytax')); ?>:</b>
	<?php echo CHtml::encode($data->oldpropertytax); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('oldservicetax')); ?>:</b>
	<?php echo CHtml::encode($data->oldservicetax); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('oldminsamekittax')); ?>:</b>
	<?php echo CHtml::encode($data->oldminsamekittax); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('oldsamekittax')); ?>:</b>
	<?php echo CHtml::encode($data->oldsamekittax); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('oldwaterpttax')); ?>:</b>
	<?php echo CHtml::encode($data->oldwaterpttax); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('oldeducess')); ?>:</b>
	<?php echo CHtml::encode($data->oldeducess); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('oldsubcess1')); ?>:</b>
	<?php echo CHtml::encode($data->oldsubcess1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('oldsubcess2')); ?>:</b>
	<?php echo CHtml::encode($data->oldsubcess2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('oldpttaxdiscount')); ?>:</b>
	<?php echo CHtml::encode($data->oldpttaxdiscount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('oldpttaxsurcharge')); ?>:</b>
	<?php echo CHtml::encode($data->oldpttaxsurcharge); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('propertytax')); ?>:</b>
	<?php echo CHtml::encode($data->propertytax); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('servicetax')); ?>:</b>
	<?php echo CHtml::encode($data->servicetax); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('minsamekittax')); ?>:</b>
	<?php echo CHtml::encode($data->minsamekittax); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('samekittax')); ?>:</b>
	<?php echo CHtml::encode($data->samekittax); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('waterpttax')); ?>:</b>
	<?php echo CHtml::encode($data->waterpttax); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('educess')); ?>:</b>
	<?php echo CHtml::encode($data->educess); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subcess1')); ?>:</b>
	<?php echo CHtml::encode($data->subcess1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subcess2')); ?>:</b>
	<?php echo CHtml::encode($data->subcess2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pttaxdiscount')); ?>:</b>
	<?php echo CHtml::encode($data->pttaxdiscount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pttaxsurcharge')); ?>:</b>
	<?php echo CHtml::encode($data->pttaxsurcharge); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('resbhada')); ?>:</b>
	<?php echo CHtml::encode($data->resbhada); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('combhada')); ?>:</b>
	<?php echo CHtml::encode($data->combhada); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rentbhada')); ?>:</b>
	<?php echo CHtml::encode($data->rentbhada); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('resbhadadis')); ?>:</b>
	<?php echo CHtml::encode($data->resbhadadis); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('combhadadis')); ?>:</b>
	<?php echo CHtml::encode($data->combhadadis); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rentbhadadis')); ?>:</b>
	<?php echo CHtml::encode($data->rentbhadadis); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('resbhadaothdis')); ?>:</b>
	<?php echo CHtml::encode($data->resbhadaothdis); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('combhadaothdis')); ?>:</b>
	<?php echo CHtml::encode($data->combhadaothdis); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rentbhadaothdis')); ?>:</b>
	<?php echo CHtml::encode($data->rentbhadaothdis); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('resbhada12kdis')); ?>:</b>
	<?php echo CHtml::encode($data->resbhada12kdis); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('combhada12kdis')); ?>:</b>
	<?php echo CHtml::encode($data->combhada12kdis); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rentbhada12kdis')); ?>:</b>
	<?php echo CHtml::encode($data->rentbhada12kdis); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('respttax')); ?>:</b>
	<?php echo CHtml::encode($data->respttax); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('compttax')); ?>:</b>
	<?php echo CHtml::encode($data->compttax); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rentpttax')); ?>:</b>
	<?php echo CHtml::encode($data->rentpttax); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('resptselfdis')); ?>:</b>
	<?php echo CHtml::encode($data->resptselfdis); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comptselfdis')); ?>:</b>
	<?php echo CHtml::encode($data->comptselfdis); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rentptselfdis')); ?>:</b>
	<?php echo CHtml::encode($data->rentptselfdis); ?>
	<br />

	*/ ?>

</div>