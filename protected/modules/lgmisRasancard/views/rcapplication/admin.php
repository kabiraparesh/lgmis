<?php
if (Yii::app()->request->isAjaxRequest) {
    Yii::app()->clientscript->scriptMap['jquery.js'] = false;
    Yii::app()->clientscript->scriptMap['jquery-ui.min.js'] = false;
}

$this->setPageTitle(Yii::t('application', 'Rcapplication'));
?>
<?php
$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'rcapplication'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'rcapplication'))), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.rcapplication-search-button').click(function(){
	$('.rcapplication-search-form').toggle();
	return false;
});
$('.rcapplication-search-form form').submit(function(){
	$.fn.yiiGridView.update('rcapplication-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php //echo CHtml::link(Yii::t('application', 'Advanced Search'),'#',array('class'=>'rcapplication-search-button')); ?>
<div class="rcapplication-search-form" style="display:none">
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
            'onclick' => '$.fn.yiiGridView.update("rcapplication-grid", {
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
                          url: "'.Yii::app()->createUrl('lgmisRasancard/rcapplication/create').'&isAjaxRequest=1",
                          success: function(data){
                             $("#dialog").html(data);
                             $("#dialog").dialog("option", "title", "'. Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'rcapplication'))) .'");
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
                          if($.fn.yiiGridView.getSelection("rcapplication-grid") != ""){
                                $.ajax({
                                  url: "'.Yii::app()->createUrl('lgmisRasancard/rcapplication/update').'&isAjaxRequest=1&id=" + $.fn.yiiGridView.getSelection("rcapplication-grid"),
                                  success: function(data){
                                     $("#dialog").html(data);
                                     $("#dialog").dialog("option", "title", "'. Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'rcapplication'))) .' - " + $.fn.yiiGridView.getSelection("rcapplication-grid"));
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
                    if($.fn.yiiGridView.getSelection("rcapplication-grid") != ""){
                        window.cid = "rcapplication";
                        window.url = "'. CController::createUrl('rcapplication/delete').'";
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
                        if($.fn.yiiGridView.getSelection("rcapplication-grid") != ""){
                            $.ajax({
                              url: "'.Yii::app()->createUrl('lgmisRasancard/rcapplication/view').'&isAjaxRequest=1&id=" + $.fn.yiiGridView.getSelection("rcapplication-grid"),
                              success: function(data){
                                $("#dialog").html(data);
                                $("#dialog").dialog("option", "title", "'. Yii::t('application','View {title}', array('{title}'=>Yii::t('application', 'rcapplication'))) .' - " + $.fn.yiiGridView.getSelection("rcapplication-grid"));
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
                "<div class='ui-pg-div'><span style='font-size: smaller'>" . Yii::t('application', 'Famdetail') . "</span>", 
                "#",
                $htmlOptions = array(
                    'title' => Yii::t('application', 'Famdetail'),
                    'onclick' => '
                          if($.fn.yiiGridView.getSelection("rcapplication-grid") != ""){
                            window.location.href="'.Yii::app()->createUrl('lgmisRasancard/rcfamdetail/admin').'&id=" + $.fn.yiiGridView.getSelection("rcapplication-grid");
                                 /*$.ajax({
                                  url: "'.Yii::app()->createUrl('lgmisBD/bdbirthapplication/update').'&isAjaxRequest=1&id=" + $.fn.yiiGridView.getSelection("rcapplication-grid"),
                                  success: function(data){
                                     $("#dialog").html(data);
                                     $("#dialog").dialog("option", "title", "'. Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'rcfamdetail'))) .' - " + $.fn.yiiGridView.getSelection("rcapplication-grid"));
                                     $("#dialog").dialog("option", "height", "auto");
                                     $("#dialog").dialog("option", "width", "auto");
                                     $("#dialog").dialog("open"); 
                                     return false;
                                  }
                                });*/
                                $.ajax({
                                  url: "'.Yii::app()->createUrl('lgmisRasancard/rcfamdetail/admin').'&id=" + $.fn.yiiGridView.getSelection("rcapplication-grid"),
                                  success: function(data){
                                     $("#dialog").html(data);
                                     $("#dialog").dialog("option", "title", "'. Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'rcfamdetail'))) .' - " + $.fn.yiiGridView.getSelection("rcapplication-grid"));
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
                "<div class='ui-pg-div'><span style='font-size: smaller'>&nbsp;&nbsp;&nbsp;&nbsp;" . Yii::t('application', 'Rashid') . "</span>", 
                "#",
                $htmlOptions = array(
                    'title' => Yii::t('application', 'Rashid'),
                    'onclick' => '
                          if($.fn.yiiGridView.getSelection("rcapplication-grid") != ""){
                           // window.location.href="'.Yii::app()->createUrl('#').'&id=" + $.fn.yiiGridView.getSelection("rcapplication-grid");
                                $.ajax({
                                  url: "'.Yii::app()->createUrl('#').'&id=" + $.fn.yiiGridView.getSelection("rcapplication-grid"),
                                  success: function(data){
                                     $("#dialog").html(data);
                                     $("#dialog").dialog("option", "title", "'. Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'rcfamdetail'))) .' - " + $.fn.yiiGridView.getSelection("rcapplication-grid"));
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
	'id'=>'rcapplication-grid',
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
		//'idrcapplication',
		'adate',
		'propertyno',
		'aname',
		'aaddress',
		'idccward',
		/*
		'livingfrom',
		'idccoccupation',
		'idccreligion',
		'idcccategory',
		'idccbpl',
		'idrccolor',
		'idccstatus',
		'reqdoc',
		'idfddemandreceipt',
		'idrcshop',
		'csdate',
		'idrcfamdetail',
		*/
	),
)); ?>
