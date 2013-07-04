<?php
/* @var $this WmdemandreceiptController */
/* @var $data Wmdemandreceipt */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idwmdemandreceipt')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idwmdemandreceipt), array('view', 'id'=>$data->idwmdemandreceipt)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('demanddate')); ?>:</b>
	<?php echo CHtml::encode($data->demanddate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idccdepartment')); ?>:</b>
	<?php echo CHtml::encode($data->idccdepartment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idwmdemand')); ?>:</b>
	<?php echo CHtml::encode($data->idwmdemand); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('demandinname')); ?>:</b>
	<?php echo CHtml::encode($data->demandinname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('demandamount')); ?>:</b>
	<?php echo CHtml::encode($data->demandamount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amountpaid')); ?>:</b>
	<?php echo CHtml::encode($data->amountpaid); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('paymenttype')); ?>:</b>
	<?php echo CHtml::encode($data->paymenttype); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('chequeddpayorderno')); ?>:</b>
	<?php echo CHtml::encode($data->chequeddpayorderno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('chequeddpayorderdate')); ?>:</b>
	<?php echo CHtml::encode($data->chequeddpayorderdate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bankname')); ?>:</b>
	<?php echo CHtml::encode($data->bankname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('branchname')); ?>:</b>
	<?php echo CHtml::encode($data->branchname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('windowno')); ?>:</b>
	<?php echo CHtml::encode($data->windowno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('receiptbookno')); ?>:</b>
	<?php echo CHtml::encode($data->receiptbookno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('receiptno')); ?>:</b>
	<?php echo CHtml::encode($data->receiptno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('details')); ?>:</b>
	<?php echo CHtml::encode($data->details); ?>
	<br />

	*/ ?>

</div>