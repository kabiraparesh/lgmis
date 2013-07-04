<script>
    //    function add(){
    //        $("#colours-grid").addClass("grid-view-loading");
    //        $.ajax({
    //            url: "<?php echo urldecode(Yii::app()->createUrl('colours/create', array('isAjaxRequest' => 1))); ?>",
    //            beforeSend: function ( xhr ) {
    //            }
    //        }).done(function ( data ) {
    //            $("#dialog").html(data);
    //            $("#dialog").dialog("option", "title", "<?php echo Yii::t('IDAdminSkinGrid.skingrid', 'Create {title}', array('{title}' => Yii::t('IDAdminSkinGrid.skingrid', 'colours'))); ?>");
    //            $("#dialog").dialog("option", "height", "auto");
    //            $("#dialog").dialog("option", "width", "auto");
    //            $("#dialog").dialog("open"); 
    //            $("#colours-grid").removeClass("grid-view-loading");
    //            return false;
    //        });
    //    }
    //    function update(){
    //        if($.fn.yiiGridView.getSelection("colours-grid") != ""){
    //            $("#colours-grid").addClass("grid-view-loading");
    //            $.ajax({
    //                url: "<?php echo urldecode(Yii::app()->createUrl('colours/update', array('id' => '" + $.fn.yiiGridView.getSelection("colours-grid") + "', 'isAjaxRequest' => 1))); ?>",
    //                beforeSend: function ( xhr ) {
    //                }
    //            }).done(function ( data ) {
    //                $("#dialog").html(data);
    //                $("#dialog").dialog("option", "title", "<?php echo Yii::t('IDAdminSkinGrid.skingrid', 'Update {title}', array('{title}' => Yii::t('IDAdminSkinGrid.skingrid', 'colours'))); ?> - " + $.fn.yiiGridView.getSelection("colours-grid"));
    //                $("#dialog").dialog("option", "height", "auto");
    //                $("#dialog").dialog("option", "width", "auto");
    //                $("#dialog").dialog("open"); 
    //                $("#colours-grid").removeClass("grid-view-loading");
    //                return false;
    //            });
    //        }
    //        else{
    //            $("#dialog-warning-msg").html("<?php echo Yii::t('IDAdminSkinGrid.skingrid', 'Please, select row...'); ?>"); $("#dialog-warning").dialog("open"); return false;
    //        }
    //    }
    //    function trash(){
    //        if($.fn.yiiGridView.getSelection("colours-grid") != ""){
    //            window.cid = "colours";
    //            window.url = "<?php echo urldecode(Yii::app()->createUrl('colours/delete', array('id' => '" + $.fn.yiiGridView.getSelection("colours-grid") + "', 'isAjaxRequest' => 1))); ?>",
    //            $("#dialog-delete").dialog("open"); 
    //            return false;
    //        }
    //        else{
    //            $("#dialog-warning-msg").html("<?php echo Yii::t('IDAdminSkinGrid.skingrid', 'Please, select row...') ?>"); 
    //            $("#dialog-warning").dialog("open"); 
    //            return false;
    //        }
    //    }
    //    function view1(id){
    //        if($.fn.yiiGridView.getSelection(id + "-grid") != ""){
    //            url = "<?php echo urldecode(Yii::app()->createUrl('default/view', array('id' => '" + $.fn.yiiGridView.getSelection("subject-grid") + "'))); ?>";
    //            url = url.replace('default', id);
    //            $.ajax({
    //                url: url,
    //                success: function(data){
    //                    $("#dialog").html(data);
    //                    $("#dialog").dialog("option", "title", "<?php echo Yii::t('IDAdminSkinGrid.skingrid', 'View {title}', array('{title}' => Yii::t('IDAdminSkinGrid.skingrid', 'colours'))) ?> - " + $.fn.yiiGridView.getSelection(id + "-grid"));
    //                    $("#dialog").dialog("option", "height", "auto");
    //                    $("#dialog").dialog("option", "width", "auto");
    //                    $("#dialog").dialog("open"); 
    //                    return false;
    //                }
    //            });                        
    //        }
    //        else{
    //            $("#dialog-warning-msg").html("<?php echo Yii::t('IDAdminSkinGrid.skingrid', 'Please, select row...') ?>"); 
    //            $("#dialog-warning").dialog("open"); 
    //            return false;
    //        }    
    //    }
</script>


<?php
$pagertoolbox = '';
$pagertoolbox .= "<table border='0'>";
$pagertoolbox .= "<tr>";
if (!(isset($this->toolbar) && isset($this->toolbar['reload']) && isset($this->toolbar['reload']['visible']) && $this->toolbar['reload']['visible'] == 'hidden')) {
    $pagertoolbox .= "<td>";
    $pagertoolbox .= CHtml::link(
                    "<div class='ui-pg-div'><span class='ui-icon ui-icon-refresh'></span></div>", "#", $htmlOptions = array(
                'title' => Yii::t('IDAdminSkinGrid.skingrid', 'Reload'),
                'onclick' => '$.fn.yiiGridView.update("' . $this->id . '-grid", {
		data: $(this).serialize()
            });'
            ));
    $pagertoolbox .= "</td>";
}
if (!(isset($this->toolbar) && isset($this->toolbar['new']) && isset($this->toolbar['new']['visible']) && $this->toolbar['new']['visible'] == 'hidden')) {
    $pagertoolbox .= "<td>";
    $pagertoolbox .= CHtml::link(
                    "<div class='ui-pg-div'><span class='ui-icon ui-icon-plus'></span></div>", "#", $htmlOptions = array(
                'title' => Yii::t('IDAdminSkinGrid.skingrid', 'Create'),
                'onclick' => 'add("' . $this->id . '", 
                "' . Yii::t('IDAdminSkinGrid.skingrid', 'Create {title}', array('{title}' => $this->title)) . '", 
                    "' . urldecode(Yii::app()->createUrl($this->gridActionUrl . '/create')) . '" 
                    )',
                'sytle' => ''
                    )
    );
    $pagertoolbox .= "</td>";
}
if (!(isset($this->toolbar) && isset($this->toolbar['update']) && isset($this->toolbar['update']['visible']) && $this->toolbar['update']['visible'] == 'hidden')) {
    $pagertoolbox .= "<td>";
    $pagertoolbox .= CHtml::link(
                    "<div class='ui-pg-div'><span class='ui-icon ui-icon-pencil'></span></div>", "#", $htmlOptions = array(
                'onclick' => 'update("' . $this->id . '", 
                "' . Yii::t('IDAdminSkinGrid.skingrid', 'Update {title}', array('{title}' => $this->title)) . ' - " + $.fn.yiiGridView.getSelection("' . $this->id . '-grid"), 
                    "' . urldecode(Yii::app()->createUrl($this->gridActionUrl . '/update', array('id' => '" + $.fn.yiiGridView.getSelection("' . $this->id . '-grid") + "'))) . '" ,
                        "' . Yii::t('IDAdminSkinGrid.skingrid', 'Please, select row...') . '"
                    )',
                    )
    );
    $pagertoolbox .= "</td>";
}
if (!(isset($this->toolbar) && isset($this->toolbar['delete']) && isset($this->toolbar['delete']['visible']) && $this->toolbar['delete']['visible'] == 'hidden')) {
    $pagertoolbox .= "<td>";
    $pagertoolbox .= CHtml::link("<div class='ui-pg-div'><span class='ui-icon ui-icon-trash'></span></div>", '#', array(
                'title' => Yii::t('IDAdminSkinGrid.skingrid', 'Delete'),
                'onclick' => 'trash("' . $this->id . '", 
                "' . Yii::t('IDAdminSkinGrid.skingrid', 'Delete {title}', array('{title}' => $this->title)) . ' - " + $.fn.yiiGridView.getSelection("' . $this->id . '-grid"), 
                    "' . urldecode(Yii::app()->createUrl($this->gridActionUrl . '/delete', array('id' => '" + $.fn.yiiGridView.getSelection("' . $this->id . '-grid") + "'))) . '" ,
                        "' . Yii::t('IDAdminSkinGrid.skingrid', 'Please, select row...') . '"
                    )',
            ));
    $pagertoolbox .= "</td>";
}
if (!(isset($this->toolbar) && isset($this->toolbar['view']) && isset($this->toolbar['view']['visible']) && $this->toolbar['view']['visible'] == 'hidden')) {
    $pagertoolbox .= "<td>";
    $pagertoolbox .= CHtml::link(
                    "<div class='ui-pg-div'><span class='ui-icon ui-icon-search'></span></div>", "#", $htmlOptions = array(
                'onclick' => 'view("' . $this->id . '", 
                "' . Yii::t('IDAdminSkinGrid.skingrid', 'View {title}', array('{title}' => $this->title)) . ' - " + $.fn.yiiGridView.getSelection("' . $this->id . '-grid"), 
                    "' . urldecode(Yii::app()->createUrl($this->gridActionUrl . '/view', array('id' => '" + $.fn.yiiGridView.getSelection("' . $this->id . '-grid") + "'))) . '" ,
                        "' . Yii::t('IDAdminSkinGrid.skingrid', 'Please, select row...') . '"
                    )',
                'sytle' => ''
                    )
    );
    $pagertoolbox .= "</td>";
}
$toolbar_creates_hide = "";
if(isset($this->toolbar) && isset($this->toolbar['custom'])){
	foreach($this->toolbar['custom'] as $custom){
		$toolbar_creates_hide .= "$(\"#" . $custom['name'] . "-form-submit\").hide();";
		$pagertoolbox .= "<td>";
		//ui-icon ui-icon-search
		$pagertoolbox .= CHtml::link(
				"<span class='". (isset($custom['icon']) ? $custom['icon'] : "") ."' style='float: left;'></span><span style='font-size: smaller; margin-right: 5px;'>" . $custom['label'] . "</span>", "#", $htmlOptions = array(
// 						'onclick' => $custom['name'] . 'Callback("' . $this->id . '")',
						'onclick' => 'custom("' . $this->id . '",
								"' . $custom['name'] . '", 
                        		"' . Yii::t('IDAdminSkinGrid.skingrid', 'Please, select row...') . '",
								"'. ((isset($custom['select']) && $custom['select'] == 1) ? 1 : 0) .'"
                    	)',
						'sytle' => ''
				)
		);
		$pagertoolbox .= "</td>";
	}
}

$pagertoolbox .= "</tr>";
$pagertoolbox .= "</table>";
?> 

<?php
$this->widget('ext.eziiui.widgets.grid.CGridViewUI', array(
    'id' => $this->id . '-grid',
    'dataProvider' => $dataProvider,
    'filter' => $this->filter,
    'columns' => $columns,
    "template" => "{summary}{items}<div class='ui-widget-header ui-corner-bottom' style='width:100%; float:left;'><div style='float:left;'>" .
    $pagertoolbox .
    "</div>{pager}</div>",
));
?>


<div style="display: none">
    <?php
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(// the dialog
        'id' => $this->id . '-form-dialog',
        'options' => array(
            'width' => $this->dlgWidth,
            'height' => $this->dlgHeight,
            'autoOpen' => false,
            'modal' => true,
            'open' => 'js:function(){$("#' . $this->id . '-form-submit").hide(); '.$toolbar_creates_hide.'}',
            'buttons' => array(
                Yii::t('IDAdminSkinGrid.skingrid', 'Save') => 'js:function(){ $("#' . $this->id . '-form").submit();  }',
                Yii::t('IDAdminSkinGrid.skingrid', 'Cancel') => 'js:function(){ $(this).dialog("close").destroy();}',
            ),
        ),
        'cssFile' => false,
        'scriptFile' => false,
    ));
    ?>
    <?php $this->endWidget(); ?>
</div>