<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
if (Yii::app()->request->isAjaxRequest) {
    Yii::app()->clientscript->scriptMap['jquery.js'] = false;
    Yii::app()->clientscript->scriptMap['jquery-ui.min.js'] = false;
}

$this->setPageTitle(Yii::t('application', '<?php echo ucfirst($this->modelClass); ?>'));
<?php echo "?>\n"; ?>
<?php
echo "<?php\n";
?>
$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', '<?php echo ucfirst($this->modelClass); ?>'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', '<?php echo ucfirst($this->modelClass); ?>'))), 'url'=>'#', 'linkOptions' => array('onclick' => '$("#toolbox-add-button").click();')),
);

Yii::app()->clientScript->registerScript('search', "
$('.<?php echo strtolower($this->modelClass); ?>-search-button').click(function(){
	$('.<?php echo strtolower($this->modelClass); ?>-search-form').toggle();
	return false;
});
$('.<?php echo strtolower($this->modelClass); ?>-search-form form').submit(function(){
	$.fn.yiiGridView.update('<?php echo $this->class2id(strtolower($this->modelClass)); ?>-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php echo "<?php echo CHtml::link(Yii::t('application', 'Advanced Search'),'#',array('class'=>'".strtolower($this->class2name(strtolower($this->modelClass)))."-search-button')); ?>"; ?>

<div class="<?php echo strtolower($this->modelClass); ?>-search-form" style="display:none">
<?php echo "<?php \$this->renderPartial('_search',array(
	'model'=>\$model,
)); ?>\n"; ?>
</div><!-- search-form -->

<?php echo "<?php\n"; ?>
<?php echo "\$pagertoolbox = '';\n"; ?>
<?php echo "\$pagertoolbox .= \"<table border='0'>\";\n"; ?>
<?php echo "\$pagertoolbox .= \"<tr>\";\n"; ?>
<?php echo "\$pagertoolbox .= \"<td>\";\n"; ?>
<?php echo "\$pagertoolbox .= CHtml::link(\n"; ?>
<?php echo "        \"<div class='ui-pg-div'><span class='ui-icon ui-icon-refresh'></span></div>\", \n"; ?>
<?php echo "        \"#\", \n"; ?>
<?php echo "        \$htmlOptions = array(\n"; ?>
<?php echo "            'title'=>Yii::t('application', 'Reload'),\n"; ?>
<?php echo "            'onclick' => '\$.fn.yiiGridView.update(\"".strtolower($this->modelClass)."-grid\", {\n"; ?>
<?php echo "		data: \$(this).serialize()\n"; ?>
<?php echo "            });'\n"; ?>
<?php echo "            ));\n"; ?>
<?php echo "\$pagertoolbox .= \"</td>\";\n"; ?>
<?php echo "\$pagertoolbox .= \"<td>\";\n"; ?>
<?php echo "\$pagertoolbox .= CHtml::link(\n"; ?>
<?php echo "                \"<div class='ui-pg-div'><span class='ui-icon ui-icon-plus'></span></div>\", \n"; ?>
<?php echo "                \"#\", \n"; ?>
<?php echo "                \$htmlOptions = array(\n"; ?>                    
<?php echo "                    'id'=>'toolbox-add-button',\n"; ?>
<?php echo "                    'title'=>Yii::t('application', 'New'),\n"; ?>
<?php echo "                    'onclick' => '\n"; ?>
<?php echo "                        \$.ajax({\n"; ?>
<?php echo "                          url: \"'.Yii::app()->createUrl('".strtolower($this->modelClass)."/create').'&isAjaxRequest=1\",\n"; ?>
<?php echo "                          success: function(data){\n"; ?>
<?php echo "                             \$(\"#dialog\").html(data);\n"; ?>
<?php echo "                             \$(\"#dialog\").dialog(\"option\", \"title\", \"'. Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', '".ucfirst($this->modelClass)."'))) .'\");\n"; ?>
<?php echo "                             \$(\"#dialog\").dialog(\"option\", \"height\", \"auto\");\n"; ?>
<?php echo "                             \$(\"#dialog\").dialog(\"option\", \"width\", \"auto\");\n"; ?>
<?php echo "                             \$(\"#dialog\").dialog(\"open\"); \n"; ?>
<?php echo "                             return false;\n"; ?>
<?php echo "                          }\n"; ?>
<?php echo "                        });\n"; ?>
<?php echo "                        ',\n"; ?>
<?php echo "                'sytle' => ''\n"; ?>
<?php echo "                )\n"; ?>
<?php echo ");\$pagertoolbox .= \"</td>\";\n"; ?>
<?php echo "\$pagertoolbox .= \"<td>\";\n"; ?>
<?php echo "\$pagertoolbox .= CHtml::link(\n"; ?>
<?php echo "                \"<div class='ui-pg-div'><span class='ui-icon ui-icon-pencil'></span></div>\", \n"; ?>
<?php echo "                \"#\", \n"; ?>
<?php echo "                \$htmlOptions = array(\n"; ?>
<?php echo "                    'onclick' => '\n"; ?>
<?php echo "                          if(\$.fn.yiiGridView.getSelection(\"".strtolower($this->modelClass)."-grid\") != \"\"){\n"; ?>
<?php echo "                                \$.ajax({\n"; ?>
<?php echo "                                  url: \"'.Yii::app()->createUrl('".strtolower($this->modelClass)."/update').'&isAjaxRequest=1&id=\" + \$.fn.yiiGridView.getSelection(\"".strtolower($this->modelClass)."-grid\"),\n"; ?>
<?php echo "                                  success: function(data){\n"; ?>
<?php echo "                                     \$(\"#dialog\").html(data);\n"; ?>
<?php echo "                                     \$(\"#dialog\").dialog(\"option\", \"title\", \"'. Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', '".ucfirst($this->modelClass)."'))) .' - \" + \$.fn.yiiGridView.getSelection(\"".strtolower($this->modelClass)."-grid\"));\n"; ?>
<?php echo "                                     \$(\"#dialog\").dialog(\"option\", \"height\", \"auto\");\n"; ?>
<?php echo "                                     \$(\"#dialog\").dialog(\"option\", \"width\", \"auto\");\n"; ?>
<?php echo "                                     \$(\"#dialog\").dialog(\"open\"); \n"; ?>
<?php echo "                                     return false;\n"; ?>
<?php echo "                                  }\n"; ?>
<?php echo "                                });\n"; ?>
<?php echo "                           }\n"; ?>
<?php echo "                           else{\n"; ?>
<?php echo "                                \$(\"#dialog-warning-msg\").html(\"'. Yii::t('application','Please, select row...') .'\"); \$(\"#dialog-warning\").dialog(\"open\"); return false;\n"; ?>
<?php echo "                           }                       \n"; ?>
<?php echo "                        ',\n"; ?>
<?php echo "                )\n"; ?>
<?php echo ");\n"; ?>
<?php echo "\$pagertoolbox .= \"</td>\";\n"; ?>
<?php echo "\$pagertoolbox .= \"<td>\";\n"; ?>
<?php echo "\$pagertoolbox .= CHtml::link(\"<div class='ui-pg-div'><span class='ui-icon ui-icon-trash'></span></div>\", '#', array(\n"; ?>
<?php echo "            'title'=>Yii::t('application', 'Delete'),\n"; ?>
<?php echo "            'onclick'=>'\n"; ?>
<?php echo "                    if(\$.fn.yiiGridView.getSelection(\"".strtolower($this->modelClass)."-grid\") != \"\"){\n"; ?>
<?php echo "                        window.cid = \"".strtolower($this->modelClass)."\";\n"; ?>
<?php echo "                        window.url = \"'. CController::createUrl('".strtolower($this->modelClass)."/delete').'\";\n"; ?>
<?php echo "                        \$(\"#dialog-delete\").dialog(\"open\"); \n"; ?>
<?php echo "                        return false;\n"; ?>
<?php echo "                    }\n"; ?>
<?php echo "                   else{\n"; ?>
<?php echo "                        \$(\"#dialog-warning-msg\").html(\"'. Yii::t('application','Please, select row...') .'\"); \n"; ?>
<?php echo "                        \$(\"#dialog-warning\").dialog(\"open\"); \n"; ?>
<?php echo "                        return false;\n"; ?>
<?php echo "                   }                       \n"; ?>
<?php echo "                ',\n"; ?>
<?php echo "    ));\n"; ?>
<?php echo "\$pagertoolbox .= \"</td>\";\n"; ?>
<?php echo "\$pagertoolbox .= \"<td>\";\n"; ?>
<?php echo "\$pagertoolbox .= CHtml::link(\n"; ?>
<?php echo "                \"<div class='ui-pg-div'><span class='ui-icon ui-icon-search'></span></div>\", \n"; ?>
<?php echo "                \"#\", \n"; ?>
<?php echo "                \$htmlOptions = array(\n"; ?>
<?php echo "                    'onclick' => '\n"; ?>
<?php echo "                        if(\$.fn.yiiGridView.getSelection(\"".strtolower($this->modelClass)."-grid\") != \"\"){\n"; ?>
<?php echo "                            \$.ajax({\n"; ?>
<?php echo "                              url: \"'.Yii::app()->createUrl('".strtolower($this->modelClass)."/view').'&isAjaxRequest=1&id=\" + \$.fn.yiiGridView.getSelection(\"".strtolower($this->modelClass)."-grid\"),\n"; ?>
<?php echo "                              success: function(data){\n"; ?>
<?php echo "                                \$(\"#dialog\").html(data);\n"; ?>
<?php echo "                                \$(\"#dialog\").dialog(\"option\", \"title\", \"'. Yii::t('application','View {title}', array('{title}'=>Yii::t('application', '".ucfirst($this->modelClass)."'))) .' - \" + \$.fn.yiiGridView.getSelection(\"".strtolower($this->modelClass)."-grid\"));\n"; ?>
<?php echo "                                \$(\"#dialog\").dialog(\"option\", \"height\", \"auto\");\n"; ?>
<?php echo "                                \$(\"#dialog\").dialog(\"option\", \"width\", \"auto\");\n"; ?>
<?php echo "                                \$(\"#dialog\").dialog(\"open\"); \n"; ?>
<?php echo "                                return false;\n"; ?>
<?php echo "                              }\n"; ?>
<?php echo "                            });                        \n"; ?>
<?php echo "                        }\n"; ?>
<?php echo "                        else{\n"; ?>
<?php echo "                            \$(\"#dialog-warning-msg\").html(\"'. Yii::t('application','Please, select row...') .'\"); \n"; ?>
<?php echo "                            \$(\"#dialog-warning\").dialog(\"open\"); \n"; ?>
<?php echo "                            return false;\n"; ?>
<?php echo "                        }\n"; ?>
<?php echo "                        ',\n"; ?>
<?php echo "                'sytle' => ''\n"; ?>
<?php echo "                )\n"; ?>
<?php echo ");\n"; ?>
<?php echo "\$pagertoolbox .= \"</td>\";\n"; ?>
<?php echo "\$pagertoolbox .= \"</tr>\";\n"; ?>
<?php echo "\$pagertoolbox .= \"</table>\";\n"; ?>
<?php echo "?>"; ?> 

<?php echo "<?php"; ?> $this->widget('ext.eziiui.widgets.grid.CGridViewUI', array(
	'id'=>'<?php echo $this->class2id(strtolower($this->modelClass)); ?>-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
        <?php echo "'ajaxVar' => 'ajax',\n"; ?>
        <?php echo "\"template\" => \"{summary}{items}<div class='ui-widget-header ui-corner-bottom grid-footer' style='width:100%; float:left;'><div style='float:left;'>\" .\n"; ?>
        <?php echo "\$pagertoolbox .\n"; ?>
        <?php echo "\"</div>{pager}</div>\","; ?>        
	'columns'=>array(
		array(
			'class'=>'CCheckBoxColumn',
		),
<?php
$count=0;
foreach($this->tableSchema->columns as $column)
{
	if(++$count==7)
		echo "\t\t/*\n";
	echo "\t\t'".$column->name."',\n";
}
if($count>=7)
	echo "\t\t*/\n";
?>
	),
)); ?>
