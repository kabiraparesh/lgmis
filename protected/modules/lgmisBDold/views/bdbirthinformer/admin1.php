<?php
if (Yii::app()->request->isAjaxRequest) {
    Yii::app()->clientscript->scriptMap['jquery.js'] = false;
    Yii::app()->clientscript->scriptMap['jquery-ui.min.js'] = false;
}

$this->setPageTitle(Yii::t('application', 'Bdbirthinformer'));
?>
<?php
$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'bdbirthinformer'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'bdbirthinformer'))), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.bdbirthinformer-search-button').click(function(){
	$('.bdbirthinformer-search-form').toggle();
	return false;
});
$('.bdbirthinformer-search-form form').submit(function(){
	$.fn.yiiGridView.update('bdbirthinformer-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php //echo CHtml::link(Yii::t('application', 'Advanced Search'),'#',array('class'=>'bdbirthinformer-search-button')); ?>
<div class="bdbirthinformer-search-form" style="display:none">
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
            'onclick' => '$.fn.yiiGridView.update("bdbirthinformer-grid", {
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
                          url: "'.Yii::app()->createUrl('lgmisBD/bdbirthinformer/create').'&isAjaxRequest=1",
                          success: function(data){
                             $("#dialog").html(data);
                             $("#dialog").dialog("option", "title", "'. Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'bdbirthinformer'))) .'");
                             $("#dialog").dialog("option", "height", "auto");
                             $("#dialog").dialog("option", "width", "auto");
                             $("#dialog").dialog("open"); 
                             return false;
                          }
                        });
                        ',
                'sytle' => ''
                )
);
$pagertoolbox .= "</td>";
$pagertoolbox .= "<td>";
$pagertoolbox .= CHtml::link(
                "<div class='ui-pg-div'><span class='ui-icon ui-icon-pencil'></span></div>", 
                "#", 
                $htmlOptions = array(
                    'onclick' => '
                          if($.fn.yiiGridView.getSelection("bdbirthinformer-grid") != ""){
                                $.ajax({
                                  url: "'.Yii::app()->createUrl('lgmisBD/bdbirthinformer/update').'&isAjaxRequest=1&id=" + $.fn.yiiGridView.getSelection("bdbirthinformer-grid"),
                                  success: function(data){
                                     $("#dialog").html(data);
                                     $("#dialog").dialog("option", "title", "'. Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'bdbirthinformer'))) .' - " + $.fn.yiiGridView.getSelection("bdbirthinformer-grid"));
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
                    if($.fn.yiiGridView.getSelection("bdbirthinformer-grid") != ""){
                        window.cid = "bdbirthinformer";
                        window.url = "'. CController::createUrl('bdbirthinformer/delete').'";
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
                        if($.fn.yiiGridView.getSelection("bdbirthinformer-grid") != ""){
                            $.ajax({
                              url: "'.Yii::app()->createUrl('lgmisBD/bdbirthinformer/view').'&isAjaxRequest=1&id=" + $.fn.yiiGridView.getSelection("bdbirthinformer-grid"),
                              success: function(data){
                                $("#dialog").html(data);
                                $("#dialog").dialog("option", "title", "'. Yii::t('application','View {title}', array('{title}'=>Yii::t('application', 'bdbirthinformer'))) .' - " + $.fn.yiiGridView.getSelection("bdbirthinformer-grid"));
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
                "<div class='ui-pg-div'><span class='ui-icon ui-icon-pencil'></span><span style='font-size: smaller'>" . Yii::t('application', 'Birthapplication') . "</span>", 
                "#",
                $htmlOptions = array(
                    'title' => Yii::t('application', 'Birthapplication'),
                    'onclick' => '
                          if($.fn.yiiGridView.getSelection("bdbirthinformer-grid") != ""){
                           // window.location.href="'.Yii::app()->createUrl('lgmisBD/bdbirthapplication/admin').'&id=" + $.fn.yiiGridView.getSelection("bdbirthinformer-grid");
                                 $.ajax({
                                  url: "'.Yii::app()->createUrl('lgmisBD/bdbirthapplication/update').'&isAjaxRequest=1&id=" + $.fn.yiiGridView.getSelection("bdbirthinformer-grid"),
                                  success: function(data){
                                     $("#dialog").html(data);
                                     $("#dialog").dialog("option", "title", "'. Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'bdbirthinformer'))) .' - " + $.fn.yiiGridView.getSelection("bdbirthinformer-grid"));
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
/*$pagertoolbox .= "<td style='padding-right: 25px'><div class='ui-pg-div'>";
$pagertoolbox .= CHtml::link(
                "<span class='ui-icon ui-icon-search' style='float: left;'></span><span style='font-size: smaller'>" . Yii::t('application', 'bddeathapplication') . "</span>", "#", $htmlOptions = array(
            'title' => Yii::t('application', 'Deathapplication'),
            'onclick' => '
                        if($.fn.yiiGridView.getSelection("bddeathapplication-grid") != ""){
                            $.ajax({
                              url: "' . Yii::app()->createUrl('lgmisBD/bddeathapplication/admin') . '&isAjaxRequest=1&id=" + $.fn.yiiGridView.getSelection("bddeathapplication-grid"),
                              success: function(data){
                                $("#dialog").html(data);
                                $("#dialog").dialog("option", "title", "' . Yii::t('application', 'View {title}', array('{title}' => Yii::t('application', 'bddeathapplication'))) . '");
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
$pagertoolbox .= "<div></td>";*/
$pagertoolbox .= "</tr>";
$pagertoolbox .= "</table>";
?> 

<?php $this->widget('ext.eziiui.widgets.grid.CGridViewUI', array(
	'id'=>'bdbirthinformer-grid',
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
		//'idbdbirthinformer',
		'informername',
		'informeraddress',
		'childname',
		'dob',
		'timeofbirth',
		/*
		'idccsex',
		'fathername',
		'fathereducation',
		'mothername',
		'idccreligion',
		'motheroccupation',
		'fatheroccupation',
		'deliverymethod',
		'birthplace',
		*/
	),
)); ?>
