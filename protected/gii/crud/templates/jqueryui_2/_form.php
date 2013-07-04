<?php 
function getForeignKeyTableName($tableSchema, $fkey){
    $tableName = '';
    
    foreach($tableSchema->foreignKeys as $foreignKey){
        if($foreignKey[1]==$fkey){
            $tableName = preg_replace('/'.Yii::app()->db->tablePrefix.'/','',$foreignKey[0]);
            break;
        }
    }
    if(!$tableName){
        $tableName = preg_replace('/'.Yii::app()->db->tablePrefix.'/','',$tableSchema->name);
    }
    return $tableName;
}
function generateActiveField($modelClass,$column,$ajax=null)
{
        if($column->type==='boolean')
                return "\$form->checkBox(\$model,'{$column->name}')";
        else if(stripos($column->dbType,'text')!==false)
                return "\$form->textArea(\$model,'{$column->name}',array('rows'=>6, 'cols'=>50))";
        else
        {
                if(preg_match('/^(password|pass|passwd|passcode)$/i',$column->name))
                        $inputField='passwordField';
                else
                        $inputField='textField';

                if($column->type!=='string' || $column->size===null)
                        return "\$form->{$inputField}(\$model,'{$column->name}')";
                else
                {
                        if(($size=$maxLength=$column->size)>60)
                                $size=60;
                                if($ajax==null){
                                    return "\$form->{$inputField}(\$model,'{$column->name}',array('size'=>$size,'maxlength'=>$maxLength))";
                                }
                                else{
                                    return "\$form->{$inputField}(\$model,'{$column->name}',array('size'=>$size,'maxlength'=>$maxLength,'ajax'=>$ajax))";
                                }                        
                }
        }
}

?>
<script>
    $(document).ready(function () {
        $( "input:submit").button();
    });
</script>

<div class="form">
<?php echo "<?php \$form=\$this->beginWidget('CActiveForm', array(
	'id'=>'".$this->class2id($this->modelClass)."-form',
	'enableAjaxValidation'=>true,
)); ?>\n"; ?>

	<p class="note"><?php echo "<?php ";?> echo Yii::t('application', 'Fields with <span class="required">*</span> are required.');<?php echo "?>";?></p>

	<?php echo "<?php echo \$form->errorSummary(\$model); ?>\n"; ?>

<?php

foreach($this->tableSchema->columns as $column)
{
	if($column->autoIncrement)
		continue;
        
        $columns = array();
	if($column->isForeignKey){
            $table=CActiveRecord::model(ucfirst(getForeignKeyTableName($this->tableSchema, $column->name)))->tableSchema;
            foreach($table->columns as $key=>$column1){
                $columns[] = $column1;
            }
        }
?>
	<div class="row"> <!--<?php echo $column->name; ?> -->
                <?php if($column->isForeignKey): ?>
                <?php echo "<?php echo \$form->labelEx(\$model,'".$columns[1]->name."'); ?>\n"; ?>
                <?php echo "<?php\n"; ?>
                <?php echo "\$this->widget('zii.widgets.jui.CJuiAutoComplete', array(\n"; ?>
                <?php echo "    'model' => \$model, \n"; ?>
                <?php echo "    'id' => '".ucfirst($this->class2id($this->modelClass))."_".$columns[1]->name."',\n"; ?>
                <?php echo "    'name' => '".$columns[1]->name."',\n"; ?>
                <?php echo "    'value'=>\$model->isNewRecord ? '' : \$model->" . $column->name . "0->" . $columns[1]->name . ", \n"; ?>
                <?php echo "    'theme' => 'bgscstpc',\n"; ?>
                <?php echo "    'source' => \$this->createUrl('".getForeignKeyTableName($this->tableSchema, $column->name)."/autocomplete'),\n"; ?>
                <?php echo "    // additional javascript options for the autocomplete plugin\n"; ?>
                <?php echo "    'options' => array(\n"; ?>
                <?php echo "        'showAnim' => 'fold',\n"; ?>
                <?php echo "    ),\n"; ?>
                <?php echo "    'htmlOptions' => array(\n"; ?>
                <?php echo "    )\n"; ?>
                <?php echo "));\n"; ?>
                <?php echo "?>\n"; ?>
                <?php echo "<?php\n"; ?>
                    <?php echo "\$imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');\n"; ?>
                    <?php echo "echo CHtml::ajaxLink(\n"; ?>
                    <?php echo "        \$imghtml, \n"; ?>
                    <?php echo "        array('" . getForeignKeyTableName($this->tableSchema, $column->name)."/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.\n"; ?>
                    <?php echo "        array(\n"; ?>
                    <?php echo "            \"data\" => array(\n"; ?>
                    <?php echo "                \"isAjaxRequest\" => 1,\n"; ?>
                    <?php echo "            ),\n"; ?>
                    <?php echo "            'success' => 'function(data){\n"; ?>
                    <?php echo "                    window.cid = \"".strtolower($this->modelClass)."\";\n"; ?>
                    <?php echo "                    window.autocomplete = \"".ucfirst($this->class2id($this->modelClass)).'_'.$columns[1]->name ."\";\n"; ?>
                    <?php echo "                    $(\"#dialog-popup-select\").html(data);\n"; ?>
                    <?php echo "                    $(\"#dialog-popup-select\").dialog(\"option\", \"title\", \"'. Yii::t('application', '". ucfirst($this->pluralize(getForeignKeyTableName($this->tableSchema, $column->name)))."') .'\");\n"; ?>
                    <?php echo "                    $(\"#dialog-popup-select\").dialog(\"open\"); \n"; ?>           
                    <?php echo "                    return false;\n"; ?>
                    <?php echo "                }'\n"; ?>
                    <?php echo ") \n"; ?>
                    <?php echo ");\n"; ?>
                    <?php echo "?>\n"; ?>
		<?php echo "<?php echo \$form->error(\$model,'". $columns[1]->name ."'); ?>\n"; ?><?php else: ?>
		<?php echo "<?php echo ".$this->generateActiveLabel($this->modelClass,$column)."; ?>"; ?>            
		<?php echo "<?php echo ".generateActiveField($this->modelClass,$column)."; ?>\n"; ?>
		<?php echo "<?php echo \$form->error(\$model,'{$column->name}'); ?>\n"; ?><?php endif; ?>
	</div>
        
<?php
}
?>
	<div class="row buttons">
		<?php echo "<?php echo CHtml::submitButton(\$model->isNewRecord ? Yii::t('application', 'Create') : Yii::t('application', 'Save')); ?>\n"; ?>
	</div>

<?php echo "<?php \$this->endWidget(); ?>\n"; ?>

</div><!-- form -->

<?php echo "<?php\n"; ?>
<?php echo "\$this->widget('ext.ajaxform.JAjaxForm', array(\n"; ?>
<?php echo "    'formId' => '".$this->class2id($this->modelClass)."-form',\n"; ?>
<?php echo "    'options' => array(\n"; ?>
<?php echo "        'dataType' => 'json',\n"; ?>
<?php echo "        'success' => 'js:function(data,statusText) { \n"; ?>
<?php echo "                    if(data.status == \"Success\"){\n"; ?>
<?php echo "                        \$.fn.yiiGridView.update(\"".$this->class2id($this->modelClass)."-grid\", {\n"; ?>
<?php echo "                              data: $(this).serialize()\n"; ?>
<?php echo "                        });\n"; ?>
<?php echo "                        \$(\"#dialog\").dialog(\"close\").destroy();\n"; ?>
<?php echo "                        return false;\n"; ?>
<?php echo "                    }\n"; ?>
<?php echo "                    else{\n"; ?>
<?php echo "                        \$(\"#dialog-warning-msg\").html(\"' . Yii::t('application', 'An error occurred while the form was being submitted.<br/>Please check your form data.') . '\" + data.status); \n"; ?>
<?php echo "                        \$(\"#dialog-warning\").dialog(\"open\"); \n"; ?>
<?php echo "                        return false;\n"; ?>
<?php echo "                    }\n"; ?>
<?php echo "        }',\n"; ?>
<?php echo "    ),\n"; ?>
<?php echo "));\n"; ?>
<?php echo "?>\n"; ?>
