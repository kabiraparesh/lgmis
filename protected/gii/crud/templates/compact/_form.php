<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>

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
	<div class="row">
		<?php echo "<?php echo ".$this->generateActiveLabel($this->modelClass,$column)."; ?>"; ?>		
                <?php if($column->isForeignKey): ?><?php echo "<?php echo ".generateActiveField($this->modelClass,$column, "array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$(\'#".$this->modelClass."_" . $column->name ."\').val()',), 'url'=>CController::createUrl('".getForeignKeyTableName($this->tableSchema, $column->name)."/jsonmessage'), 'success'=>'function(data){\$(\'#' . CHtml::activeId(\$model,'" . $column->name ."') . '_msg\').text(data.message);}')" )."; ?>\n"; ?>
                <?php echo "<span id=\"<?php echo CHtml::activeId(\$model,'".$column->name."'); ?>_msg\">\n"; ?>
                <?php echo "    <?php echo !isset(\$model->". $column->name."0->".$columns[1]->name .") || \$model->isNewRecord ? \"-\" : \$model->". $column->name."0->".$columns[1]->name."; ?>\n"; ?>
                <?php echo "</span>\n"; ?>
                <?php echo "<?php\n"; ?>
                    <?php echo "\$imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');\n"; ?>
                    <?php echo "echo CHtml::link(\$imghtml, \"\", array(\n"; ?>
                    <?php echo "    'style' => 'cursor: pointer; text-decoration: underline;',\n"; ?>
                    <?php echo "    'onclick' => \"{popupview('$column->name', 'index.php?r=".getForeignKeyTableName($this->tableSchema, $column->name)."/popupview'); }\"));\n"; ?>
                    <?php echo "?>\n"; ?><?php else: ?><?php echo "<?php echo ".generateActiveField($this->modelClass,$column)."; ?>\n"; ?><?php endif; ?>
		<?php echo "<?php echo \$form->error(\$model,'{$column->name}'); ?>\n"; ?>
	</div>

<?php
}
?>
	<div class="row buttons">
		<?php echo "<?php echo CHtml::submitButton(\$model->isNewRecord ? Yii::t('application', 'Create') : Yii::t('application', 'Save')); ?>\n"; ?>
	</div>

<?php echo "<?php \$this->endWidget(); ?>\n"; ?>

</div><!-- form -->

<?php foreach($this->tableSchema->foreignKeys as $foreignKey): ?><?php echo "<?php\n"; ?>
<?php echo "\$this->beginWidget('zii.widgets.jui.CJuiDialog', array(// the dialog\n"; ?>
    <?php echo "'id' => 'dialog' . get_class(\$model) . '_" . $foreignKey[1] . "',\n"; ?>
    <?php echo "'options' => array(\n"; ?>
        <?php echo "'title' => Yii::t('application', '". $this->pluralize(ucfirst(preg_replace('/'.Yii::app()->db->tablePrefix.'/','',$foreignKey[0]))) ."'),\n"; ?>
        <?php echo "'autoOpen' => false,\n"; ?>
        <?php echo "'modal' => true,\n"; ?>
        <?php echo "'width' => 550,\n"; ?>
        <?php echo "'height' => 470,\n"; ?>
    <?php echo "),\n"; ?>
<?php echo "));\n"; ?>
<?php echo "?>\n"; ?>
<?php echo "<div class=\"divfor".$foreignKey[1]."\"></div>\n";?>
<?php echo "<?php \$this->endWidget(); ?>\n";?><?php endforeach;?>

<?php echo "<script type=\"text/javascript\">\n";?>
<?php echo "    function popupview(id, url)\n";?>
<?php echo "    {\n";?>
<?php echo "        jQuery.ajax({'url':url,'data':'isAjaxRequest=1&id=<?php echo get_class(\$model);?>_' + id,'type':'post','dataType':'json','success':function(data)\n";?>
<?php echo "            {\n";?>
<?php echo "                $('#dialog<?php echo get_class(\$model);?>_' + id +' div.divfor' + id).html(data.div);\n";?>
<?php echo "            } ,'cache':false});\n";?>
<?php echo "        $('#dialog<?php echo get_class(\$model);?>_' + id).dialog('open');\n";?>
<?php echo "        return false;\n";?>
<?php echo "    }\n";?>
<?php echo "</script>\n";?>
