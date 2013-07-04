<?php
if (Yii::app()->request->isAjaxRequest) {
    Yii::app()->clientscript->scriptMap['jquery.js'] = false;
    Yii::app()->clientscript->scriptMap['jquery-ui.min.js'] = false;
}

$this->setPageTitle(Yii::t('application', 'Ccward'));
?>
<?php
$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'ccward'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'ccward'))), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.ccward-search-button').click(function(){
	$('.ccward-search-form').toggle();
	return false;
});
$('.ccward-search-form form').submit(function(){
	$.fn.yiiGridView.update('ccward-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<script>
    $(document).ready(function() {
        $('#reportlist').change(function() {
            var n = $(this).val();
            $("#reportlist").prop('selectedIndex', 0);            
            switch(n){
                case '1':
                    if($.fn.yiiGridView.getSelection("ccward-grid") != ""){
                        window.open("<?php echo Yii::app()->createUrl('report/wardwisedemand') ;?>&id=" + $.fn.yiiGridView.getSelection("ccward-grid"));
                    }
                    else{
                        $("#dialog-warning-msg").html("<?php echo Yii::t('application', 'Please, select row...'); ?>"); $("#dialog-warning").dialog("open"); return false;
                    }
                    break;
                case '2':
                    if($.fn.yiiGridView.getSelection("ccward-grid") != ""){
                        window.open("<?php echo Yii::app()->createUrl('report/wardwisedemanddetailed') ;?>&id=" + $.fn.yiiGridView.getSelection("ccward-grid"));
                    }
                    else{
                        $("#dialog-warning-msg").html("<?php echo Yii::t('application', 'Please, select row...'); ?>"); $("#dialog-warning").dialog("open"); return false;
                    }
                    break;
                case '3':
                    if($.fn.yiiGridView.getSelection("ccward-grid") != ""){
                        window.open("<?php echo Yii::app()->createUrl('report/viewBills');?>&isAjaxRequest=1&id=" + $.fn.yiiGridView.getSelection("ccward-grid"));
                    }
                    else{
                        $("#dialog-warning-msg").html("<?php echo Yii::t('application', 'Please, select row...'); ?>"); $("#dialog-warning").dialog("open"); return false;
                    }
                    break;
                case '4':
                    if($.fn.yiiGridView.getSelection("ccward-grid") != ""){
                        window.open("<?php echo Yii::app()->createUrl('report/report');?>&id=" + $.fn.yiiGridView.getSelection("ccward-grid") + '&report=1');
                    }
                    else{
                        $("#dialog-warning-msg").html("<?php echo Yii::t('application', 'Please, select row...'); ?>"); $("#dialog-warning").dialog("open"); return false;
                    }
                    break;
                case '5':
                    if($.fn.yiiGridView.getSelection("ccward-grid") != ""){
                        window.open("<?php echo Yii::app()->createUrl('report/report');?>&id=" + $.fn.yiiGridView.getSelection("ccward-grid") + '&report=2');
                    }
                    else{
                        $("#dialog-warning-msg").html("<?php echo Yii::t('application', 'Please, select row...'); ?>"); $("#dialog-warning").dialog("open"); return false;
                    }
                    break;
                case '6':
                    if($.fn.yiiGridView.getSelection("ccward-grid") != ""){
                        window.open("<?php echo Yii::app()->createUrl('report/report');?>&id=" + $.fn.yiiGridView.getSelection("ccward-grid") + '&report=3');
                    }
                    else{
                        $("#dialog-warning-msg").html("<?php echo Yii::t('application', 'Please, select row...'); ?>"); $("#dialog-warning").dialog("open"); return false;
                    }
                    break;
                case '7':
                    window.open("<?php echo Yii::app()->createUrl('report/report4');?>");
                    break;
                case '8':
                    window.open("<?php echo Yii::app()->createUrl('report/report5');?>");
                    break;
            }
        });

        $('#reportlistWater').change(function() {
            var n = $(this).val();
            $("#reportlistWater").prop('selectedIndex', 0);            
            switch(n){
                case '1':
                    if($.fn.yiiGridView.getSelection("ccward-grid") != ""){
                        window.open("<?php echo Yii::app()->createUrl('lgmisWM/report/wardwiseDemandReport') ;?>&id=" + $.fn.yiiGridView.getSelection("ccward-grid"));
					}
                    else{
                        $("#dialog-warning-msg").html("<?php echo Yii::t('application', 'Please, select row...'); ?>"); $("#dialog-warning").dialog("open"); return false;
                    }
                    break;
                case '2':
                    window.open("<?php echo Yii::app()->createUrl('lgmisWM/report/wardwiseDemand') ;?>&id=" + $.fn.yiiGridView.getSelection("ccward-grid"));
                		if($.fn.yiiGridView.getSelection("ccward-grid") != ""){
                    }
                    else{
                        $("#dialog-warning-msg").html("<?php echo Yii::t('application', 'Please, select row...'); ?>"); $("#dialog-warning").dialog("open"); return false;
                    }
                    break;
            }            
        });        
    });    
</script>


<?php echo CHtml::link(Yii::t('application', 'Advanced Search'),'#',array('class'=>'ccward-search-button')); ?>
<div class="ccward-search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php
$pagertoolbox = '';
$pagertoolbox .= "<table border='0'>";
$pagertoolbox .= "<tr>";
$pagertoolbox .= "<td>";
$pagertoolbox .= CHtml::link(
        "<div class='ui-pg-div'><span class='ui-icon ui-icon-refresh'></span></div>", 
        "#", 
        $htmlOptions = array(
            'title'=>Yii::t('application', 'Reload'),
            'onclick' => '$.fn.yiiGridView.update("ccward-grid", {
		data: $(this).serialize()
            });'
            ));
$pagertoolbox .= "</td>";

if(!isset($_REQUEST['report'])){
    $pagertoolbox .= "<td>";
    $pagertoolbox .= CHtml::link(
                    "<div class='ui-pg-div'><span class='ui-icon ui-icon-plus'></span></div>", 
                    "#", 
                    $htmlOptions = array(
                        'title'=>Yii::t('application', 'New'),
                        'onclick' => '
                            $.ajax({
                            url: "'.Yii::app()->createUrl('ccward/create').'&isAjaxRequest=1",
                            success: function(data){
                                $("#dialog").html(data);
                                $("#dialog").dialog("option", "title", "'. Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'ccward'))) .'");
                                $("#dialog").dialog("option", "height", "auto");
                                $("#dialog").dialog("option", "width", "auto");
                                $("#dialog").dialog("open"); 
                                return false;
                            }
                            });
                            ',
                    'sytle' => ''
                    )
    );$pagertoolbox .= "</td>";
    $pagertoolbox .= "<td>";
    $pagertoolbox .= CHtml::link(
                    "<div class='ui-pg-div'><span class='ui-icon ui-icon-pencil'></span></div>", 
                    "#", 
                    $htmlOptions = array(
                        'onclick' => '
                            if($.fn.yiiGridView.getSelection("ccward-grid") != ""){
                                    $.ajax({
                                    url: "'.Yii::app()->createUrl('ccward/update').'&isAjaxRequest=1&id=" + $.fn.yiiGridView.getSelection("ccward-grid"),
                                    success: function(data){
                                        $("#dialog").html(data);
                                        $("#dialog").dialog("option", "title", "'. Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'ccward'))) .' - " + $.fn.yiiGridView.getSelection("ccward-grid"));
                                        $("#dialog").dialog("option", "height", "auto");
                                        $("#dialog").dialog("option", "width", "auto");
                                        $("#dialog").dialog("open"); 
                                        return false;
                                    }
                                    });
                            }
                            else{
                                    $("#dialog-warning-msg").html("'. Yii::t('application','Please, select row...') .'"); $("#dialog-warning").dialog("open"); return false;
                            }                       
                            ',
                    )
    );
    $pagertoolbox .= "</td>";
    $pagertoolbox .= "<td>";
    $pagertoolbox .= CHtml::link("<div class='ui-pg-div'><span class='ui-icon ui-icon-trash'></span></div>", '#', array(
                'title'=>Yii::t('application', 'Delete'),
                'onclick'=>'
                        if($.fn.yiiGridView.getSelection("ccward-grid") != ""){
                            window.cid = "ccward";
                            window.url = "'. CController::createUrl('ccward/delete').'";
                            $("#dialog-delete").dialog("open"); 
                            return false;
                        }
                    else{
                            $("#dialog-warning-msg").html("'. Yii::t('application','Please, select row...') .'"); 
                            $("#dialog-warning").dialog("open"); 
                            return false;
                    }                       
                    ',
        ));
    $pagertoolbox .= "</td>";
}
$pagertoolbox .= "<td>";
$pagertoolbox .= CHtml::link(
                "<div class='ui-pg-div'><span class='ui-icon ui-icon-search'></span></div>", 
                "#", 
                $htmlOptions = array(
                    'onclick' => '
                        if($.fn.yiiGridView.getSelection("ccward-grid") != ""){
                            $.ajax({
                              url: "'.Yii::app()->createUrl('ccward/view').'&isAjaxRequest=1&id=" + $.fn.yiiGridView.getSelection("ccward-grid"),
                              success: function(data){
                                $("#dialog").html(data);
                                $("#dialog").dialog("option", "title", "'. Yii::t('application','View {title}', array('{title}'=>Yii::t('application', 'ccward'))) .' - " + $.fn.yiiGridView.getSelection("ccward-grid"));
                                $("#dialog").dialog("option", "height", "auto");
                                $("#dialog").dialog("option", "width", "auto");
                                $("#dialog").dialog("open"); 
                                return false;
                              }
                            });                        
                        }
                        else{
                            $("#dialog-warning-msg").html("'. Yii::t('application','Please, select row...') .'"); 
                            $("#dialog-warning").dialog("open"); 
                            return false;
                        }
                        ',
                'sytle' => ''
                )
);
$pagertoolbox .= "</td>";

if(isset($_REQUEST['report']) && $_REQUEST['report'] == 'wardwisedemand'){
//    $pagertoolbox .= "<td style='padding-right: 25px'>";
//    $pagertoolbox .= CHtml::link(
//                    "<span class='ui-icon ui-icon-search' style='float: left;'></span><span style='font-size: smaller'>".Yii::t('application', 'Wardwise Demand')."</span>", 
//                    "#", 
//                    $htmlOptions = array(
//                        'title'=>Yii::t('application', 'Report'),
//                        'onclick' => '
//                            window.open("'.Yii::app()->createUrl('report/wardwisedemand').'&id=" + $.fn.yiiGridView.getSelection("ccward-grid"));
//                            ',
//                    'sytle' => ''
//                    )
//    );$pagertoolbox .= "</td>";    
//    $pagertoolbox .= "<td style='padding-right: 25px'>";
//    $pagertoolbox .= CHtml::link(
//                    "<span class='ui-icon ui-icon-search' style='float: left;'></span><span style='font-size: smaller'>".Yii::t('application', 'Wardwise Demand Detailed')."</span>", 
//                    "#", 
//                    $htmlOptions = array(
//                        'title'=>Yii::t('application', 'Report'),
//                        'onclick' => '
//                            window.open("'.Yii::app()->createUrl('report/wardwisedemanddetailed').'&id=" + $.fn.yiiGridView.getSelection("ccward-grid"));
//                            ',
//                    'sytle' => ''
//                    )
//    );$pagertoolbox .= "</td>";    
//    $pagertoolbox .= "<td style='padding-right: 25px'>";
//    $pagertoolbox .= CHtml::link(
//                    "<span class='ui-icon ui-icon-search' style='float: left;'></span><span style='font-size: smaller'>".Yii::t('application', 'Bill Report')."</span>", 
//                    "#", 
//                    $htmlOptions = array(
//                        'title'=>Yii::t('application', 'Report'),
//                        'onclick' => '
//                            window.open("'.Yii::app()->createUrl('report/viewBills').'&isAjaxRequest=1&id=" + $.fn.yiiGridView.getSelection("ccward-grid"));
//                            ',
//                    'sytle' => ''
//                    )
//    );$pagertoolbox .= "</td>";    

    
//    $pagertoolbox .= "<td style='padding-right: 25px'>";
//    $pagertoolbox .= CHtml::dropDownList(
//        'reportlist', '', array('1' => Yii::t('application', 'Wardwise Demand'), '2' => Yii::t('application', 'Wardwise Demand'), '2' => Yii::t('application', 'Wardwise Demand Detailed'),  '3' => Yii::t('application', 'Bill Report'), '4' => Yii::t('application', 'Propertytax Register'), '5' => Yii::t('application', 'Only Minsamekittax'), '6' => Yii::t('application', 'Only Propertytax'), '7' => Yii::t('application', 'Wardwise Property Count & Area'), '8' => Yii::t('application', 'Wardwise Total Demand')), array('style' => 'font-size: 1em; margin: 2px; padding-right: 10px;padding-left: 10px;', 'empty' => Yii::t('application', '--Select a Report--'), 'id' => 'reportlist')
////        'reportlist', '', array('1' => Yii::t('application', 'Wardwise Demand'), '2' => Yii::t('application', 'Wardwise Demand'), '2' => Yii::t('application', 'Wardwise Demand Detailed'),  '3' => Yii::t('application', 'Bill Report'), '4' => Yii::t('application', 'Propertytax Register'), '5' => Yii::t('application', 'Only Minsamekittax'), '6' => Yii::t('application', 'Only Propertytax'), '7' => Yii::t('application', 'Wardwise Property Count & Area'), '8' => Yii::t('application', 'Wardwise Total Demand'), '9' => Yii::t('application', 'Wardwise Recovery Report')), array('style' => 'font-size: 1em; margin: 2px; padding-right: 10px;padding-left: 10px;', 'empty' => Yii::t('application', '--Select a Report--'), 'id' => 'reportlist')
//    );
//    $pagertoolbox .= "</td>";
    
}



$pagertoolbox .= "</tr>";
$pagertoolbox .= "</table>";
?> 

<?php $this->widget('ext.eziiui.widgets.grid.CGridViewUI', array(
	'id'=>'ccward-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
        'ajaxVar' => 'ajax',
        "template" => "{summary}{items}<div class='ui-widget-header ui-corner-bottom' style='width:100%; float:left;'><div style='float:left;'>" .
        $pagertoolbox .
        "</div>{pager}</div>",        
	'columns'=>array(
		array(
			'class'=>'CCheckBoxColumn',
		),
		'idccward',
		'wardname',
//		'idcczone',
                array(
                    'name'=>'idcczone',
                    'header'=>Yii::t('application', 'Zonename'),                    
                    'value'=>'$data->idcczone0->zonename',
                ),            
	),
)); ?>

<?php
if(isset($_REQUEST['report']) && $_REQUEST['report'] == 'wardwisedemand'){

	echo CHtml::dropDownList(
	        'reportlist', '', array('1' => Yii::t('application', 'Wardwise Demand'), '2' => Yii::t('application', 'Wardwise Demand'), '2' => Yii::t('application', 'Wardwise Demand Detailed'),  '3' => Yii::t('application', 'Bill Report'), '4' => Yii::t('application', 'Propertytax Register'), '5' => Yii::t('application', 'Only Minsamekittax'), '6' => Yii::t('application', 'Only Propertytax'), '7' => Yii::t('application', 'Wardwise Property Count & Area'), '8' => Yii::t('application', 'Wardwise Total Demand')), array('style' => 'font-size: 1em; margin: 2px; padding-right: 10px;padding-left: 10px;', 'empty' => Yii::t('application', '--Select a Report--'), 'id' => 'reportlist')
	//        'reportlist', '', array('1' => Yii::t('application', 'Wardwise Demand'), '2' => Yii::t('application', 'Wardwise Demand'), '2' => Yii::t('application', 'Wardwise Demand Detailed'),  '3' => Yii::t('application', 'Bill Report'), '4' => Yii::t('application', 'Propertytax Register'), '5' => Yii::t('application', 'Only Minsamekittax'), '6' => Yii::t('application', 'Only Propertytax'), '7' => Yii::t('application', 'Wardwise Property Count & Area'), '8' => Yii::t('application', 'Wardwise Total Demand'), '9' => Yii::t('application', 'Wardwise Recovery Report')), array('style' => 'font-size: 1em; margin: 2px; padding-right: 10px;padding-left: 10px;', 'empty' => Yii::t('application', '--Select a Report--'), 'id' => 'reportlist')
	    );
	
	echo CHtml::dropDownList(
	        'reportlistWater', '', array('1' => Yii::t('application', 'Wardwise Demand'), '2' => Yii::t('application', 'Wardwise Demand'), '2' => Yii::t('application', 'Water Tax Bill Report')), array('style' => 'font-size: 1em; margin: 2px; padding-right: 10px;padding-left: 10px;', 'empty' => Yii::t('application', '--Select a Water Report--'), 'id' => 'reportlistWater')
	//        'reportlist', '', array('1' => Yii::t('application', 'Wardwise Demand'), '2' => Yii::t('application', 'Wardwise Demand'), '2' => Yii::t('application', 'Wardwise Demand Detailed'),  '3' => Yii::t('application', 'Bill Report'), '4' => Yii::t('application', 'Propertytax Register'), '5' => Yii::t('application', 'Only Minsamekittax'), '6' => Yii::t('application', 'Only Propertytax'), '7' => Yii::t('application', 'Wardwise Property Count & Area'), '8' => Yii::t('application', 'Wardwise Total Demand'), '9' => Yii::t('application', 'Wardwise Recovery Report')), array('style' => 'font-size: 1em; margin: 2px; padding-right: 10px;padding-left: 10px;', 'empty' => Yii::t('application', '--Select a Report--'), 'id' => 'reportlist')
	    );
}
?>

