<?php
//echo print_r($this->data, true); echo "<br/>";
?>

<?php
//$model1 = new Subject('search');
//$this->widget('ext.eziiui.widgets.grid.CGridViewUI', array(
//    'id' => 'mysearch-grid',
//    'dataProvider' => $model1->search(),
//    'filter' => $model1,
//    'columns' => array(
//        'idsubject',
//    ),
//    'cssFile' => false,
//));

Yii::app()->clientscript->scriptMap['jquery.yiigridview.js'] = false;
?>

<script>
    function opendlg(id){
        //        alert("hii");
        //        $("#popup-dialog-" + id).dialog("option", "title", 'title');
        $("#popup-dialog-" + id).dialog("option", "height", "auto");
        $("#popup-dialog-" + id).dialog("option", "width", "auto");
        $("#popup-dialog-" + id).dialog("open");         
    }
    
    function check(id, idselected){
        $("#<?php echo strtolower(get_class($this->model)); ?>-form").find("#<?php echo get_class($this->model); ?>_" + id).val(idselected);
        $("#<?php echo strtolower(get_class($this->model)); ?>-form").find("#<?php echo get_class($this->model); ?>_" + id).trigger('change');
        $("#popup-dialog-" + id).dialog("close").destroy();
        //        alert(id + "<?php echo get_class($this->model); ?>");
        //        alert($("#<?php echo strtolower(get_class($this->model)); ?>-form").find("#Book_idsubject").val());
        //        alert($("#book-form").find("#Book_idsubject").val() + " <?php echo strtolower(get_class($this->model)); ?> ");
    } 
</script>

<img  onclick="opendlg('<?php echo $this->attribute; ?>'); return false;" src="<?php echo $this->baseUrl ?>/help.gif"/>

<div style="display: none">

    <?php
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(// the dialog
        'id' => 'popup-dialog-' . $this->attribute,
        'options' => array(
            'title' => Yii::t('FKField.fkfield', 'Select {title}', array('{title}' => $this->title)),
                      //Yii::t('FKField.fkfield', 'Select ' . get_class($this->relatedmodel)),            
            'autoOpen' => false,
            'modal' => true,
            'buttons' => array(
                Yii::t('FKField.fkfield', 'Close') => 'js:function(){ $(this).dialog("close").destroy();}',
            ),
        ),
        'cssFile' => false,
        'scriptFile' => false,
    ));
    ?>

    <div id="popup-dialog-<?php echo $this->attribute; ?>" title="Select">
        <?php
        $this->widget('ext.eziiui.widgets.grid.CGridViewUI', array(
            'id' => $this->attribute . '-popup-grid',
            'dataProvider' => $this->relatedmodel->search(),
            'filter' => $this->relatedmodel,
            'columns' => $this->columns,
            'cssFile' => false,
        ));
        ?>
    </div>
    <?php $this->endWidget(); ?>
</div>