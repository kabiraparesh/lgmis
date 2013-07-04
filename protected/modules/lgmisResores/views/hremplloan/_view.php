<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idhremplloan')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idhremplloan), array('view', 'id'=>$data->idhremplloan)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idhremployee')); ?>:</b>
	<?php echo CHtml::encode($data->idhremployee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('loannumber')); ?>:</b>
	<?php echo CHtml::encode($data->loannumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('loandate')); ?>:</b>
	<?php echo CHtml::encode($data->loandate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('loanamount')); ?>:</b>
	<?php echo CHtml::encode($data->loanamount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('installmentamt')); ?>:</b>
	<?php echo CHtml::encode($data->installmentamt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('installmentstartdate')); ?>:</b>
	<?php echo CHtml::encode($data->installmentstartdate); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('installmentenddate')); ?>:</b>
	<?php echo CHtml::encode($data->installmentenddate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('loantype')); ?>:</b>
	<?php echo CHtml::encode($data->loantype); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('loanaccountno')); ?>:</b>
	<?php echo CHtml::encode($data->loanaccountno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('loanbankname')); ?>:</b>
	<?php echo CHtml::encode($data->loanbankname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('loannarration')); ?>:</b>
	<?php echo CHtml::encode($data->loannarration); ?>
	<br />

	*/ ?>

</div>