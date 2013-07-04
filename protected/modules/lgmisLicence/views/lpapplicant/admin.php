<?php
if (Yii::app()->request->isAjaxRequest) {
    Yii::app()->clientscript->scriptMap['jquery.js'] = false;
    Yii::app()->clientscript->scriptMap['jquery-ui.min.js'] = false;
}

$this->setPageTitle(Yii::t('application', 'Lpapplicant'));
?>
<?php
$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'lpapplicant'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'lpapplicant'))), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.lpapplicant-search-button').click(function(){
	$('.lpapplicant-search-form').toggle();
	return false;
});
$('.lpapplicant-search-form form').submit(function(){
	$.fn.yiiGridView.update('lpapplicant-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php //echo CHtml::link(Yii::t('application', 'Advanced Search'),'#',array('class'=>'lpapplicant-search-button')); ?>
<div class="lpapplicant-search-form" style="display:none">
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
            'onclick' => '$.fn.yiiGridView.update("lpapplicant-grid", {
		data: $(this).serialize()
            });'
            ));
$pagertoolbox .= "</td>";
$pagertoolbox .= "<td>";
$pagertoolbox .= CHtml::link(
                "<div class='ui-pg-div'><span class='ui-icon ui-icon-plus'></span></div>", 
                "#", 
                $htmlOptions = array(
                    'title'=>Yii::t('application', 'New'),
                    'onclick' => '
                        $.ajax({
                          url: "'.Yii::app()->createUrl('lgmisLicence/lpapplicant/create').'&isAjaxRequest=1",
                          success: function(data){
                             $("#dialog").html(data);
                             $("#dialog").dialog("option", "title", "'. Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'lpapplicant'))) .'");
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
                          if($.fn.yiiGridView.getSelection("lpapplicant-grid") != ""){
                                $.ajax({
                                  url: "'.Yii::app()->createUrl('lgmisLicence/lpapplicant/update').'&isAjaxRequest=1&id=" + $.fn.yiiGridView.getSelection("lpapplicant-grid"),
                                  success: function(data){
                                     $("#dialog").html(data);
                                     $("#dialog").dialog("option", "title", "'. Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'lpapplicant'))) .' - " + $.fn.yiiGridView.getSelection("lpapplicant-grid"));
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
                    if($.fn.yiiGridView.getSelection("lpapplicant-grid") != ""){
                        window.cid = "lpapplicant";
                        window.url = "'. CController::createUrl('lpapplicant/delete').'";
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
$pagertoolbox .= "<td>";
$pagertoolbox .= CHtml::link(
                "<div class='ui-pg-div'><span class='ui-icon ui-icon-search'></span></div>", 
                "#", 
                $htmlOptions = array(
                    'onclick' => '
                        if($.fn.yiiGridView.getSelection("lpapplicant-grid") != ""){
                            $.ajax({
                              url: "'.Yii::app()->createUrl('lgmisLicence/lpapplicant/view').'&isAjaxRequest=1&id=" + $.fn.yiiGridView.getSelection("lpapplicant-grid"),
                              success: function(data){
                                $("#dialog").html(data);
                                $("#dialog").dialog("option", "title", "'. Yii::t('application','View {title}', array('{title}'=>Yii::t('application', 'lpapplicant'))) .' - " + $.fn.yiiGridView.getSelection("lpapplicant-grid"));
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
$pagertoolbox .= "<td>";
$pagertoolbox .= CHtml::link(
                "<div class='ui-pg-div'><span style='font-size: smaller'>&nbsp;&nbsp;" . Yii::t('application', 'LPLicency') . "&nbsp;&nbsp;&nbsp;</span>", 
                "#",
                $htmlOptions = array(
                    'title' => Yii::t('application', 'LPLicency'),
                    'onclick' => '
                          if($.fn.yiiGridView.getSelection("lpapplicant-grid") != ""){
                          //alert($.fn.yiiGridView.getSelection("lpapplicant-grid"));
                         
                             //window.location.href="'.Yii::app()->createUrl('lgmisLicence/lplicency/admin').'&id=" + $.fn.yiiGridView.getSelection("lpapplicant-grid");
                              
                                $.ajax({
                                  url: "'.Yii::app()->createUrl('lgmisLicence/lplicency/update').'&isAjaxRequest=1&id=" + $.fn.yiiGridView.getSelection("lpapplicant-grid"),
                                  success: function(data){
                                     $("#dialog").html(data);
                                     $("#dialog").dialog("option", "title", "'. Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'lpapplicant'))) .' - " + $.fn.yiiGridView.getSelection("lpapplicant-grid"));
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
$pagertoolbox .= "</div></td>";
$pagertoolbox .= "<td>";
$pagertoolbox .= CHtml::link(
                "<div class='ui-pg-div'><span style='font-size: smaller'>&nbsp;&nbsp;&nbsp;" . Yii::t('application', 'Relative') . "&nbsp;&nbsp;&nbsp;</span>", 
                "#",
                $htmlOptions = array(
                    'title' => Yii::t('application', 'Relative'),
                    'onclick' => '
                          if($.fn.yiiGridView.getSelection("lpapplicant-grid") != ""){
                          //alert($.fn.yiiGridView.getSelection("lpapplicant-grid"));
                         
                             //window.location.href="'.Yii::app()->createUrl('lgmisLicence/lprelative/admin').'&id=" + $.fn.yiiGridView.getSelection("lpapplicant-grid");
                              
                                $.ajax({
                                  url: "'.Yii::app()->createUrl('lgmisLicence/lprelative/update').'&isAjaxRequest=1&id=" + $.fn.yiiGridView.getSelection("lpapplicant-grid"),
                                  success: function(data){
                                     $("#dialog").html(data);
                                     $("#dialog").dialog("option", "title", "'. Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'lpapplicant'))) .' - " + $.fn.yiiGridView.getSelection("lpapplicant-grid"));
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
$pagertoolbox .= "</div></td>";
$pagertoolbox .= "<td>";
$pagertoolbox .= CHtml::link(
                "<div class='ui-pg-div'><span style='font-size: smaller'>&nbsp;&nbsp;&nbsp;" . Yii::t('application', 'WellWisher') . "</span>", 
                "#",
                $htmlOptions = array(
                    'title' => Yii::t('application', 'WellWisher'),
                    'onclick' => '
                          if($.fn.yiiGridView.getSelection("lpapplicant-grid") != ""){
                          //alert($.fn.yiiGridView.getSelection("lpapplicant-grid"));
                         
                             //window.location.href="'.Yii::app()->createUrl('lgmisLicence/lpwellwisher/admin').'&id=" + $.fn.yiiGridView.getSelection("lpapplicant-grid");
                              
                                $.ajax({
                                  url: "'.Yii::app()->createUrl('lgmisLicence/lpwellwisher/update').'&isAjaxRequest=1&id=" + $.fn.yiiGridView.getSelection("lpapplicant-grid"),
                                  success: function(data){
                                     $("#dialog").html(data);
                                     $("#dialog").dialog("option", "title", "'. Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'lpapplicant'))) .' - " + $.fn.yiiGridView.getSelection("lpapplicant-grid"));
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
$pagertoolbox .= "</div></td>";
$pagertoolbox .= "<td>";
$pagertoolbox .= CHtml::link(
                "<div class='ui-pg-div'><span style='font-size: smaller'>&nbsp;&nbsp;" . Yii::t('application', 'Licency') . "&nbsp;&nbsp;&nbsp;</span>", 
                "#",
                $htmlOptions = array(
                    'title' => Yii::t('application', 'Licency'),
                    'onclick' => '
                          if($.fn.yiiGridView.getSelection("lpapplicant-grid") != ""){
                          //alert($.fn.yiiGridView.getSelection("lpapplicant-grid"));
                         
                             //window.location.href="'.Yii::app()->createUrl('lgmisLicence/lplicency/admin').'&id=" + $.fn.yiiGridView.getSelection("lpapplicant-grid");
                              
                                $.ajax({
                                  url: "'.Yii::app()->createUrl('#').'&isAjaxRequest=1&id=" + $.fn.yiiGridView.getSelection("lpapplicant-grid"),
                                  success: function(data){
                                     $("#dialog").html(data);
                                     $("#dialog").dialog("option", "title", "'. Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'lpapplicant'))) .' - " + $.fn.yiiGridView.getSelection("lpapplicant-grid"));
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
$pagertoolbox .= "</div></td>";
$pagertoolbox .= "<td>";
$pagertoolbox .= CHtml::link(
                "<div class='ui-pg-div'><span style='font-size: smaller'>&nbsp;&nbsp;&nbsp;" . Yii::t('application', 'Rashid') . "</span>", 
                "#",
                $htmlOptions = array(
                    'title' => Yii::t('application', 'Rashid'),
                    'onclick' => '
                          if($.fn.yiiGridView.getSelection("lpapplicant-grid") != ""){
                          //alert($.fn.yiiGridView.getSelection("lpapplicant-grid"));
                         
                             //window.location.href="'.Yii::app()->createUrl('lgmisLicence/lpwellwisher/admin').'&id=" + $.fn.yiiGridView.getSelection("lpapplicant-grid");
                              
                                $.ajax({
                                  url: "'.Yii::app()->createUrl('#').'&isAjaxRequest=1&id=" + $.fn.yiiGridView.getSelection("lpapplicant-grid"),
                                  success: function(data){
                                     $("#dialog").html(data);
                                     $("#dialog").dialog("option", "title", "'. Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'lpapplicant'))) .' - " + $.fn.yiiGridView.getSelection("lpapplicant-grid"));
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
$pagertoolbox .= "</div></td>";
$pagertoolbox .= "</tr>";
$pagertoolbox .= "</table>";
?> 

<?php $this->widget('ext.eziiui.widgets.grid.CGridViewUI', array(
	'id'=>'lpapplicant-grid',
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
		//'idlpapplicant',
		'bussname',
		//'bussaddress',
		//'idcccolony',
		'idlpbtype',
		'idlpbnature',
		/*
		'oldregno',
		'oldlicno',
		'otheroffice',
		'othergodown',
		'otherworkingplace',
		'idlptype',
		'workingyoungm',
		'workingyoungf',
		'workingadultm',
		'workingadultf',
		*/
	),
)); ?>
