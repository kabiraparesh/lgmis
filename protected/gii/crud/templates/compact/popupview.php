<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php
echo "<?php\n";
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	Yii::t('application', '$label')=>array('index'),
	Yii::t('application', 'Manage'),
);\n";
?>

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', '<?php echo $this->modelClass; ?>'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', '<?php echo $this->modelClass; ?>'))), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('<?php echo $this->class2id($this->modelClass); ?>-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php echo "<?php echo CHtml::link(Yii::t('application', 'Advanced Search'),'#',array('class'=>'search-button')); ?>"; ?>

<div class="search-form" style="display:none">
<?php echo "<?php \$this->renderPartial('_search',array(
	'model'=>\$model,
)); ?>\n"; ?>
</div><!-- search-form -->

<?php echo "<?php"; ?> $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
<?php
$count=0;
foreach($this->tableSchema->columns as $column)
{
	if(++$count==3)
		echo "\t\t/*\n";
	echo "\t\t'".$column->name."',\n";
}
if($count>=3)
	echo "\t\t*/\n";
?>
//		array(
//			'class'=>'CButtonColumn',
//		),
            array(
                'class' => 'CButtonColumn',
                'template' => '{ok}',
                'buttons' => array
                    (
                    'ok' => array
                        (
                        'label' => 'Select',
                        'imageUrl' => Yii::app()->request->baseUrl . '/images/dialog-ok.png',
                        'click' => 'js: function(){
                                            jQuery.ajax(
                                                    {
                                                            "type":"POST",
                                                            "dataType":"json",
                                                            "data":{"cid":$(this).parent().parent().children(\':first-child\').text()},"url":"' . CController::createUrl('<?php echo $this->class2id($this->modelClass); ?>/jsonmessage') . '",
                                                            "success":function(data){$("#' . $id . '_msg").text(data.message);},
                                                            "cache":false
                                                    }
                                            );                        
                                            $("#' . $id . '").val($(this).parent().parent().children(\':first-child\').text());
                                            $("#dialog' . $id . '").dialog("close");
                                            $("#' . $id . '").focus();                                            
                                            return false;
                                         }',
                    ),
                ),
            ),
	),
)); ?>
