<?php
/* @var $this WmdemandreceiptController */
/* @var $model Wmdemandreceipt */

$this->setPageTitle(LgmisWMModule::t('Wmdemandreceipt'));

Yii::app()->clientScript->registerScript('search', "
$('.wmdemandreceipt-search-button').click(function(){
	$('.wmdemandreceipt-search-form').toggle();
	return false;
});
$('.wmdemandreceipt-search-form form').submit(function(){
	$.fn.yiiGridView.update('wmdemandreceipt-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php echo CHtml::link(LgmisWMModule::t('Advanced Search'),'#',array('class'=>'wmdemandreceipt-search-button')); ?>
<div class="wmdemandreceipt-search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('ext.IDAdminSkinGrid.IDAdminSkinGrid', array(
	'id'=>'wmdemandreceipt',
        'title'=>LgmisWMModule::t('Wmdemandreceipt'),
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'dlgWidth'=>740,
	'dlgHeight'=>560,
	'columns'=>array(
                array(
                    'class' => 'CCheckBoxColumn',
                ),
		'idwmdemandreceipt',
		'demanddate',
                array(
                    'name' => 'idccdepartment',
                    'header' => LgmisWMModule::t('Ccdepartment'),
                    'value' => '$data->idccdepartment0->departmentname',
                    'type' => 'raw',
                    'filter' => CHtml::listData(Ccdepartment::model()->findAll(), 'idccdepartment', 'departmentname'),
                ),
		'idwmdemand',
		'demandinname',
		'demandamount',
		/*
		'amountpaid',
		'paymenttype',
		'chequeddpayorderno',
		'chequeddpayorderdate',
		'bankname',
		'branchname',
		'windowno',
		'username',
		'receiptbookno',
		'receiptno',
		'details',
		*/
	),
)); ?>
