<?php
if (Yii::app()->request->isAjaxRequest) {
    Yii::app()->clientscript->scriptMap['jquery.js'] = false;
    Yii::app()->clientscript->scriptMap['jquery-ui.min.js'] = false;
}

$this->setPageTitle(Yii::t('application', 'Bpapplication'));
?>
<?php
$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'bpapplication'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'bpapplication'))), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.bpapplication-search-button').click(function(){
	$('.bpapplication-search-form').toggle();
	return false;
});
$('.bpapplication-search-form form').submit(function(){
	$.fn.yiiGridView.update('bpapplication-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php //echo CHtml::link(Yii::t('application', 'Advanced Search'),'#',array('class'=>'bpapplication-search-button')); ?>
<div class="bpapplication-search-form" style="display:none">
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
            'onclick' => '$.fn.yiiGridView.update("bpapplication-grid", {
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
                          url: "'.Yii::app()->createUrl('lgmisHouse/bpapplication/create').'&isAjaxRequest=1",
                          success: function(data){
                             $("#dialog").html(data);
                             $("#dialog").dialog("option", "title", "'. Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'bpapplication'))) .'");
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
                          if($.fn.yiiGridView.getSelection("bpapplication-grid") != ""){
                                $.ajax({
                                  url: "'.Yii::app()->createUrl('lgmisHouse/bpapplication/update').'&isAjaxRequest=1&id=" + $.fn.yiiGridView.getSelection("bpapplication-grid"),
                                  success: function(data){
                                     $("#dialog").html(data);
                                     $("#dialog").dialog("option", "title", "'. Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'bpapplication'))) .' - " + $.fn.yiiGridView.getSelection("bpapplication-grid"));
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
                    if($.fn.yiiGridView.getSelection("bpapplication-grid") != ""){
                        window.cid = "bpapplication";
                        window.url = "'. CController::createUrl('bpapplication/delete').'";
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
                        if($.fn.yiiGridView.getSelection("bpapplication-grid") != ""){
                            $.ajax({
                              url: "'.Yii::app()->createUrl('lgmisHouse/bpapplication/view').'&isAjaxRequest=1&id=" + $.fn.yiiGridView.getSelection("bpapplication-grid"),
                              success: function(data){
                                $("#dialog").html(data);
                                $("#dialog").dialog("option", "title", "'. Yii::t('application','View {title}', array('{title}'=>Yii::t('application', 'bpapplication'))) .' - " + $.fn.yiiGridView.getSelection("bpapplication-grid"));
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
                "<div class='ui-pg-div'><span style='font-size: smaller'>" . Yii::t('application', 'Rashid') . "</span>", 
                "#",
                $htmlOptions = array(
                    'title' => Yii::t('application', 'Rashid'),
                    'onclick' => '
                          if($.fn.yiiGridView.getSelection("bpapplication-grid") != ""){
                           // window.location.href="'.Yii::app()->createUrl('lgmisBD/bdbirthapplication/admin').'&id=" + $.fn.yiiGridView.getSelection("bpapplication-grid");
                                 $.ajax({
                                  url: "'.Yii::app()->createUrl('#').'&isAjaxRequest=1&id=" + $.fn.yiiGridView.getSelection("bpapplication-grid"),
                                  success: function(data){
                                     $("#dialog").html(data);
                                     $("#dialog").dialog("option", "title", "'. Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'bdbirthinformer'))) .' - " + $.fn.yiiGridView.getSelection("bpapplication-grid"));
                                     $("#dialog").dialog("option", "height", "auto");
                                     $("#dialog").dialog("option", "width", "auto");
                                     $("#dialog").dialog("open"); 
                                     return false;
                                  }
                                });
                              /*  $.ajax({
                                  url: "'.Yii::app()->createUrl('lgmisBD/bdbirthapplication/admin').'&id=" + $.fn.yiiGridView.getSelection("bdbirthinformer-grid"),
                                  success: function(data){
                                     $("#dialog").html(data);
                                     $("#dialog").dialog("option", "title", "'. Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'bdbirthapplication'))) .' - " + $.fn.yiiGridView.getSelection("bdbirthinformer-grid"));
                                     $("#dialog").dialog("option", "height", "auto");
                                     $("#dialog").dialog("option", "width", "auto");
                                     $("#dialog").dialog("open"); 
                                     return false;
                                  }
                                });*/
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
	'id'=>'bpapplication-grid',
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
		//'idbpapplication',
		'applicantname',
		'applicantaddress',
		'plotstatus',
		'idbpusagetype',
		'idnewbpusagetype',
		/*
		'newconstructionarea',
		'groundfloorarea',
		'firstfloorarea',
		'secondfloorarea',
		'abovethirdbasement',
		'earthqcertificate',
		'registrycopy',
		'khasaramap',
		'blueprint',
		'applicationdate',
		'caseno',
		'otherdetails',
		'idccfyear',
		'idccstatus',
		'permissiondate',
		*/
	),
)); ?>
