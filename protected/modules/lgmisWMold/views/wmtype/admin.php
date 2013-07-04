<?php
/* @var $this WmtypeController */
/* @var $model Wmtype */

$this->setPageTitle(LgmisWMModule::t('Wmtype'));

Yii::app()->clientScript->registerScript('search', "
$('.wmtype-search-button').click(function(){
	$('.wmtype-search-form').toggle();
	return false;
});
$('.wmtype-search-form form').submit(function(){
	$.fn.yiiGridView.update('wmtype-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php echo CHtml::link(LgmisWMModule::t('Advanced Search'),'#',array('class'=>'wmtype-search-button')); ?>
<div class="wmtype-search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('ext.IDAdminSkinGrid.IDAdminSkinGrid', array(
	'id'=>'wmtype',
        'title'=>LgmisWMModule::t('Wmtype'),
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
                array(
                    'class' => 'CCheckBoxColumn',
                ),
		'idwmtype',
		'wmtype',
	),
)); ?>
