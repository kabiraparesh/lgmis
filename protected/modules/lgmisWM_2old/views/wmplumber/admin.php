<?php
/* @var $this WmplumberController */
/* @var $model Wmplumber */

$this->setPageTitle(LgmisWMModule::t('Wmplumber'));

Yii::app()->clientScript->registerScript('search', "
$('.wmplumber-search-button').click(function(){
	$('.wmplumber-search-form').toggle();
	return false;
});
$('.wmplumber-search-form form').submit(function(){
	$.fn.yiiGridView.update('wmplumber-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php echo CHtml::link(LgmisWMModule::t('Advanced Search'),'#',array('class'=>'wmplumber-search-button')); ?>
<div class="wmplumber-search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('ext.IDAdminSkinGrid.IDAdminSkinGrid', array(
	'id'=>'wmplumber',
        'title'=>LgmisWMModule::t('Wmplumber'),
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
                array(
                    'class' => 'CCheckBoxColumn',
                ),
		'idwmplumber',
		'plumbername',
		'address',
		'details',
		'phoneno',
	),
)); ?>
