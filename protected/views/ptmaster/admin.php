<?php
if (Yii::app()->request->isAjaxRequest) {
    Yii::app()->clientscript->scriptMap['jquery.js'] = false;
    Yii::app()->clientscript->scriptMap['jquery-ui.min.js'] = false;
}

$this->setPageTitle(Yii::t('application', 'Ptmaster'));
?>
<?php
$this->menu = array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'ptmaster'))), 'url'=>array('index')),
    array('label' => Yii::t('application', 'Create {title}', array('{title}' => Yii::t('application', 'ptmaster'))), 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.ptmaster-search-button').click(function(){
	$('.ptmaster-search-form').toggle();
	return false;
});
$('.ptmaster-search-form form').submit(function(){
	$.fn.yiiGridView.update('ptmaster-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php echo CHtml::link(Yii::t('application', 'Advanced Search'), '#', array('class' => 'ptmaster-search-button')); ?>
<div class="ptmaster-search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$pagertoolbox = '';
$pagertoolbox .= "<table border='0'>";
$pagertoolbox .= "<tr>";

$pagertoolbox .= "<td>";
$pagertoolbox .= CHtml::link(
                "<div class='ui-pg-div'><span class='ui-icon ui-icon-refresh'></span></div>", "#", $htmlOptions = array(
            'title' => Yii::t('application', 'Reload'),
            'onclick' => '$.fn.yiiGridView.update("ptmaster-grid", {
                data: $(this).serialize()
            });'
        ));
$pagertoolbox .= "</td>";
if (!isset($_REQUEST['report'])) {
    $pagertoolbox .= "<td>";
    $pagertoolbox .= CHtml::link(
                    "<div class='ui-pg-div'><span class='ui-icon ui-icon-plus'></span></div>", "#", $htmlOptions = array(
                'title' => Yii::t('application', 'New'),
                'onclick' => '
                            window.open("' . Yii::app()->createUrl('ptmaster/create') . '&isAjaxRequest=1", "_self");
    //                        $.ajax({
    //                          url: "' . Yii::app()->createUrl('ptmaster/create') . '&isAjaxRequest=1",
    //                          success: function(data){
    //                             $("#dialog").html(data);
    //                             $("#dialog").dialog("option", "title", "' . Yii::t('application', 'Create {title}', array('{title}' => Yii::t('application', 'ptmaster'))) . '");
    //                             $("#dialog").dialog("option", "height", "auto");
    //                             $("#dialog").dialog("option", "width", "auto");
    //                             $("#dialog").dialog("open"); 
    //                             return false;
    //                          }
    //                        });
                            ',
                'sytle' => ''
                    )
    );
    $pagertoolbox .= "</td>";
    $pagertoolbox .= "<td>";
    $pagertoolbox .= CHtml::link(
                    "<div class='ui-pg-div'><span class='ui-icon ui-icon-pencil'></span></div>", "#", $htmlOptions = array(
                'onclick' => '
                            if($.fn.yiiGridView.getSelection("ptmaster-grid") != ""){
                                window.open("' . Yii::app()->createUrl('ptmaster/update') . '&isAjaxRequest=1&id=" + $.fn.yiiGridView.getSelection("ptmaster-grid"), "_self");

    //                                $.ajax({
    //                                  url: "' . Yii::app()->createUrl('ptmaster/update') . '&isAjaxRequest=1&id=" + $.fn.yiiGridView.getSelection("ptmaster-grid"),
    //                                  success: function(data){
    //                                     $("#dialog").html(data);
    //                                     $("#dialog").dialog("option", "title", "' . Yii::t('application', 'Update {title}', array('{title}' => Yii::t('application', 'ptmaster'))) . ' - " + $.fn.yiiGridView.getSelection("ptmaster-grid"));
    //                                     $("#dialog").dialog("option", "height", "auto");
    //                                     $("#dialog").dialog("option", "width", "auto");
    //                                     $("#dialog").dialog("open"); 
    //                                     return false;
    //                                  }
    //                                });
                            }
                            else{
                                    $("#dialog-warning-msg").html("' . Yii::t('application', 'Please, select row...') . '"); $("#dialog-warning").dialog("open"); return false;
                            }                       
                            ',
                    )
    );
    $pagertoolbox .= "</td>";
    $pagertoolbox .= "<td>";
    $pagertoolbox .= CHtml::link("<div class='ui-pg-div'><span class='ui-icon ui-icon-trash'></span></div>", '#', array(
                'title' => Yii::t('application', 'Delete'),
                'onclick' => '
                        if($.fn.yiiGridView.getSelection("ptmaster-grid") != ""){
                            window.cid = "ptmaster";
                            window.url = "' . CController::createUrl('ptmaster/delete') . '";
                            $("#dialog-delete").dialog("open"); 
                            return false;
                        }
                    else{
                            $("#dialog-warning-msg").html("' . Yii::t('application', 'Please, select row...') . '"); 
                            $("#dialog-warning").dialog("open"); 
                            return false;
                    }                       
                    ',
            ));
    $pagertoolbox .= "</td>";
}
//$pagertoolbox .= "<td>";
//$pagertoolbox .= CHtml::link(
//                "<div class='ui-pg-div'><span class='ui-icon ui-icon-search'></span></div>", 
//                "#", 
//                $htmlOptions = array(
//                    'onclick' => '
//                        if($.fn.yiiGridView.getSelection("ptmaster-grid") != ""){
//                            $.ajax({
//                              url: "'.Yii::app()->createUrl('ptmaster/view').'&isAjaxRequest=1&id=" + $.fn.yiiGridView.getSelection("ptmaster-grid"),
//                              success: function(data){
//                                $("#dialog").html(data);
//                                $("#dialog").dialog("option", "title", "'. Yii::t('application','View {title}', array('{title}'=>Yii::t('application', 'ptmaster'))) .' - " + $.fn.yiiGridView.getSelection("ptmaster-grid"));
//                                $("#dialog").dialog("option", "height", "450");
//                                $("#dialog").dialog("option", "width", "600");
//                                $("#dialog").dialog("open"); 
//                                return false;
//                              }
//                            });                        
//                        }
//                        else{
//                            $("#dialog-warning-msg").html("'. Yii::t('application','Please, select row...') .'"); 
//                            $("#dialog-warning").dialog("open"); 
//                            return false;
//                        }
//                        ',
//                'sytle' => ''
//                )
//);
//$pagertoolbox .= "</td>";
//$pagertoolbox .= "<td>";
//$pagertoolbox .= CHtml::link(
//                "<div class='ui-pg-div'><span class='ui-icon ui-icon-search'></span></div>", 
//                "#", 
//                $htmlOptions = array(
//                    'onclick' => '
//                        if($.fn.yiiGridView.getSelection("ptmaster-grid") != ""){
//                            $.ajax({
//                              url: "'.Yii::app()->createUrl('ptmaster/viewPttransaction').'&isAjaxRequest=1&id=" + $.fn.yiiGridView.getSelection("ptmaster-grid"),
//                              success: function(data){
//                                $("#dialog").html(data);
//                                $("#dialog").dialog("option", "title", "'. Yii::t('application','View {title}', array('{title}'=>Yii::t('application', 'Pttransaction'))) .'");
//                                $("#dialog").dialog("option", "height", "450");
//                                $("#dialog").dialog("option", "width", "600");
//                                $("#dialog").dialog("open"); 
//                                return false;
//                              }
//                            });                        
//                        }
//                        else{
//                            $("#dialog-warning-msg").html("'. Yii::t('application','Please, select row...') .'"); 
//                            $("#dialog-warning").dialog("open"); 
//                            return false;
//                        }
//                        ',
//                'sytle' => ''
//                )
//);
//$pagertoolbox .= "</td>";

$pagertoolbox .= "<td style='padding-right: 25px;padding-left: 25px;'><div class='ui-pg-div'>";
$pagertoolbox .= CHtml::link(
                "<span class='ui-icon ui-icon-search' style='float: left;'></span><span style='font-size: smaller'>" . Yii::t('application', 'Ptmaster') . "</span>", "#", $htmlOptions = array(
            'title' => Yii::t('application', 'View'),
            'onclick' => '
                        if($.fn.yiiGridView.getSelection("ptmaster-grid") != ""){
                            $.ajax({
                              url: "' . Yii::app()->createUrl('ptmaster/view') . '&isAjaxRequest=1&id=" + $.fn.yiiGridView.getSelection("ptmaster-grid"),
                              success: function(data){
                                $("#dialog").html(data);
                                $("#dialog").dialog("option", "title", "' . Yii::t('application', 'View {title}', array('{title}' => Yii::t('application', 'Ptmaster'))) . '");
                                $("#dialog").dialog("option", "height", "450");
                                $("#dialog").dialog("option", "width", "600");
                                $("#dialog").dialog("open"); 
                                return false;
                              }
                            });                        
                        }
                        else{
                            $("#dialog-warning-msg").html("' . Yii::t('application', 'Please, select row...') . '"); 
                            $("#dialog-warning").dialog("open"); 
                            return false;
                        }
                        ',
            'sytle' => ''
                )
);
$pagertoolbox .= "</div></td>";
$pagertoolbox .= "<td style='padding-right: 25px'><div class='ui-pg-div'>";
$pagertoolbox .= CHtml::link(
                "<span class='ui-icon ui-icon-search' style='float: left;'></span><span style='font-size: smaller'>" . Yii::t('application', 'Pttransaction') . "</span>", "#", $htmlOptions = array(
            'title' => Yii::t('application', 'View'),
            'onclick' => '
                        if($.fn.yiiGridView.getSelection("ptmaster-grid") != ""){
                            $.ajax({
                              url: "' . Yii::app()->createUrl('ptmaster/viewPttransaction') . '&isAjaxRequest=1&id=" + $.fn.yiiGridView.getSelection("ptmaster-grid"),
                              success: function(data){
                                $("#dialog").html(data);
                                $("#dialog").dialog("option", "title", "' . Yii::t('application', 'View {title}', array('{title}' => Yii::t('application', 'Pttransaction'))) . '");
                                $("#dialog").dialog("option", "height", "450");
                                $("#dialog").dialog("option", "width", "600");
                                $("#dialog").dialog("open"); 
                                return false;
                              }
                            });                        
                        }
                        else{
                            $("#dialog-warning-msg").html("' . Yii::t('application', 'Please, select row...') . '"); 
                            $("#dialog-warning").dialog("open"); 
                            return false;
                        }
                        ',
            'sytle' => ''
                )
);
$pagertoolbox .= "</div></td>";


if (!isset($_REQUEST['report'])) {
    $pagertoolbox .= "<td style='padding-right: 25px'><div class='ui-pg-div'>";
    $pagertoolbox .= CHtml::link(
                    "<span class='ui-icon ui-icon-search' style='float: left;'></span><span style='font-size: smaller'>" . Yii::t('application', 'fddemandreceipt') . "</span>", "#", $htmlOptions = array(
                'title' => Yii::t('application', 'View'),
                'onclick' => '
                            if($.fn.yiiGridView.getSelection("ptmaster-grid") != ""){
                                $.ajax({
                                url: "' . Yii::app()->createUrl('fddemandreceipt/create') . '&isAjaxRequest=1&id=" + $.fn.yiiGridView.getSelection("ptmaster-grid"),
                                success: function(data){
                                    $("#dialog").html(data);
                                    $("#dialog").dialog("option", "title", "' . Yii::t('application', 'Create {title}', array('{title}' => Yii::t('application', 'fddemandreceipt'))) . '");
                                    $("#dialog").dialog("option", "height", "550");
                                    $("#dialog").dialog("option", "width", "750");
                                    $("#dialog").dialog("open"); 
                                    return false;
                                }
                                });
                            }
                            else{
                                $("#dialog-warning-msg").html("' . Yii::t('application', 'Please, select row...') . '"); 
                                $("#dialog-warning").dialog("open"); 
                                return false;
                            }
                            ',
                'sytle' => ''
                    )
    );
    $pagertoolbox .= "</div></td>";
}

if (isset($_REQUEST['report']) && $_REQUEST['report'] == 'viewBill') {
    $pagertoolbox .= "<td>";
    $pagertoolbox .= CHtml::link(
                    "<span class='ui-icon ui-icon-search' style='float: left;'></span><span style='font-size: smaller'>".Yii::t('application', 'Bill Report')."</span>", 
                    "#", 
                    $htmlOptions = array(
                        'title'=>Yii::t('application', 'Report'),
                        'onclick' => '
                            window.open("'.Yii::app()->createUrl('report/viewBill').'&isAjaxRequest=1&id=" + $.fn.yiiGridView.getSelection("ptmaster-grid"));
                            ',
                    'sytle' => ''
                    )
    );
    $pagertoolbox .= "</td>";    
}

//Added for Property Transfer
$pagertoolbox .= "<td style='padding-right: 25px;'><div class='ui-pg-div'>";
$pagertoolbox .= CHtml::link(
		"<span class='ui-icon ui-icon-search' style='float: left;'></span><span style='font-size: smaller'>" . Yii::t('application', 'Transfer') . "</span>", "#", $htmlOptions = array(
				'title' => Yii::t('application', 'Transfer'),
				'onclick' => '
                        if($.fn.yiiGridView.getSelection("ptmaster-grid") != ""){
                            $.ajax({
                              url: "' . Yii::app()->createUrl('ptmaster/transfer') . '&isAjaxRequest=1&id=" + $.fn.yiiGridView.getSelection("ptmaster-grid"),
                              success: function(data){
                                $("#dialog").html(data);
                                $("#dialog").dialog("option", "title", "' . Yii::t('application', 'Transfer') . '");
                                $("#dialog").dialog("option", "height", "450");
                                $("#dialog").dialog("option", "width", "600");
                                $("#dialog").dialog("open");
                                return false;
                              }
                            });
                        }
                        else{
                            $("#dialog-warning-msg").html("' . Yii::t('application', 'Please, select row...') . '");
                            $("#dialog-warning").dialog("open");
                            return false;
                        }
                        ',
				'sytle' => ''
		)
);
$pagertoolbox .= "</div></td>";
//PropertyTransfer Ends...

//Added for Property Breakup
$pagertoolbox .= "<td style='padding-right: 25px;'><div class='ui-pg-div'>";
$pagertoolbox .= CHtml::link(
		"<span class='ui-icon ui-icon-search' style='float: left;'></span><span style='font-size: smaller'>" . Yii::t('application', 'Breakup') . "</span>", "#", $htmlOptions = array(
				'title' => Yii::t('application', 'Breakup'),
				'onclick' => '
						return false;
                        if($.fn.yiiGridView.getSelection("ptmaster-grid") != ""){
                            $.ajax({
                              url: "' . Yii::app()->createUrl('ptmaster/transfer') . '&isAjaxRequest=1&id=" + $.fn.yiiGridView.getSelection("ptmaster-grid"),
                              success: function(data){
                                $("#dialog").html(data);
                                $("#dialog").dialog("option", "title", "' . Yii::t('application', 'Transfer') . '");
                                $("#dialog").dialog("option", "height", "450");
                                $("#dialog").dialog("option", "width", "600");
                                $("#dialog").dialog("open");
                                return false;
                              }
                            });
                        }
                        else{
                            $("#dialog-warning-msg").html("' . Yii::t('application', 'Please, select row...') . '");
                            $("#dialog-warning").dialog("open");
                            return false;
                        }
                        ',
				'sytle' => ''
		)
);
$pagertoolbox .= "</div></td>";
//Property Breakup Ends...


$pagertoolbox .= "</tr>";
$pagertoolbox .= "</table>";
?> 

<?php
//$this->widget('zii.widgets.grid.CGridView', array(
$this->widget('ext.eziiui.widgets.grid.CGridViewUI', array(
    'id' => 'ptmaster-grid',
//	'dataProvider'=>$model->search(),
    'dataProvider' => $model->search(),
    'filter' => $model,
    'ajaxVar' => 'ajax',
//        'enableHistory' => true,
    "template" => "{summary}{items}<div class='ui-widget-header ui-corner-bottom' style='width:100%; float:left;'><div style='float:left;'>" .
    $pagertoolbox .
    "</div>{pager}</div>",
    'columns' => array(
        array(
            'class' => 'CCheckBoxColumn',
        ),
        array(
            'name' => 'idptmaster',
            'header' => Yii::t('application', 'Idptmaster'),
            'value' => '$data->encodePKey()',
        ),
//		'idptmaster',
        'caseno',
        'ledgerno',
        'idccward',
//                array(
//                    'name'=>'idccward',
//                    'header'=>Yii::t('application', 'Wardname'),                    
//                    'value'=>'$data->idccward0->wardname',
//                ),            
//		'idpttype',
//                array(
//                    'name'=>'idpttype',
//                    'header'=>Yii::t('application', 'Pttype'),
//                    'value'=>'$data->idpttype0->type',
//                ),            
//		'idcccolony',
        array(
            'name' => 'idcccolony',
            'header' => Yii::t('application', 'Idcccolony'),
            'value' => '$data->idcccolony0->colonyname . " ($data->idcccolony)"',
        ),
        'ownername',
//		'owneraddress',
    /*
      'propertyno',
      'propertyaddress',
      'constyear',
      'transferbreakup',
      'trashed',
      'idcccolony',
      'idptrange',
      'idptpropertyon',
      'propertytax',
      'idptservicetax',
      'idptexsumtors',
      'propertydetails',
      'idccsex',
     */
    ),
));
?>
