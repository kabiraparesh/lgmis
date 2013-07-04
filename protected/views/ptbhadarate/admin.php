<?php
if (Yii::app()->request->isAjaxRequest) {
    Yii::app()->clientscript->scriptMap['jquery.js'] = false;
    Yii::app()->clientscript->scriptMap['jquery-ui.min.js'] = false;
}

$this->setPageTitle(Yii::t('application', 'Ptbhadarate'));
?>
<?php
$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'ptbhadarate'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'ptbhadarate'))), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.ptbhadarate-search-button').click(function(){
	$('.ptbhadarate-search-form').toggle();
	return false;
});
$('.ptbhadarate-search-form form').submit(function(){
	$.fn.yiiGridView.update('ptbhadarate-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php echo CHtml::link(Yii::t('application', 'Advanced Search'),'#',array('class'=>'ptbhadarate-search-button')); ?>
<div class="ptbhadarate-search-form" style="display:none">
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
            'onclick' => '$.fn.yiiGridView.update("ptbhadarate-grid", {
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
                         "dataType": "json",                        
                          url: "'.Yii::app()->createUrl('ptbhadarate/generateBhadarate').'",
                          success: function(data){
                             $("#dialog-Bhadarate").html("<p style=\'text-align:justify;\'>"+data.message+"</p>");
                             $("#dialog-Bhadarate").dialog("option", "title", "'. Yii::t('application', 'Generate Bhadarate') .'");
                             $("#dialog-Bhadarate").dialog("option", "height", "auto");
                             $("#dialog-Bhadarate").dialog("option", "width", "350px");
                             $("#dialog-Bhadarate").dialog("open"); 
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
                          if($.fn.yiiGridView.getSelection("ptbhadarate-grid") != ""){
                                $.ajax({
                                  url: "'.Yii::app()->createUrl('ptbhadarate/update').'&isAjaxRequest=1&id=" + $.fn.yiiGridView.getSelection("ptbhadarate-grid"),
                                  success: function(data){
                                     $("#dialog").html(data);
                                     $("#dialog").dialog("option", "title", "'. Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'ptbhadarate'))) .' - " + $.fn.yiiGridView.getSelection("ptbhadarate-grid"));
                                     $("#dialog").dialog("option", "height", "auto");
                                     $("#dialog").dialog("option", "width", "400");
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
//$pagertoolbox .= "<td>";
//$pagertoolbox .= CHtml::link("<div class='ui-pg-div'><span class='ui-icon ui-icon-trash'></span></div>", '#', array(
//            'title'=>Yii::t('application', 'Delete'),
//            'onclick'=>'
//                    if($.fn.yiiGridView.getSelection("ptbhadarate-grid") != ""){
//                        window.cid = "ptbhadarate";
//                        window.url = "'. CController::createUrl('ptbhadarate/delete').'";
//                        $("#dialog-delete").dialog("open"); 
//                        return false;
//                    }
//                   else{
//                        $("#dialog-warning-msg").html("'. Yii::t('application','Please, select row...') .'"); 
//                        $("#dialog-warning").dialog("open"); 
//                        return false;
//                   }                       
//                ',
//    ));
//$pagertoolbox .= "</td>";
$pagertoolbox .= "<td>";
$pagertoolbox .= CHtml::link(
                "<div class='ui-pg-div'><span class='ui-icon ui-icon-search'></span></div>", 
                "#", 
                $htmlOptions = array(
                    'onclick' => '
                        if($.fn.yiiGridView.getSelection("ptbhadarate-grid") != ""){
                            $.ajax({
                              url: "'.Yii::app()->createUrl('ptbhadarate/view').'&isAjaxRequest=1&id=" + $.fn.yiiGridView.getSelection("ptbhadarate-grid"),
                              success: function(data){
                                $("#dialog").html(data);
                                $("#dialog").dialog("option", "title", "'. Yii::t('application','View {title}', array('{title}'=>Yii::t('application', 'ptbhadarate'))) .' - " + $.fn.yiiGridView.getSelection("ptbhadarate-grid"));
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
$pagertoolbox .= "</tr>";
$pagertoolbox .= "</table>";
?> 

<?php $this->widget('ext.eziiui.widgets.grid.CGridViewUI', array(
	'id'=>'ptbhadarate-grid',
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
		'idptbhadarate',
                array(
                    'name'=>'idptrange',
                    'header'=>Yii::t('application', 'Ptrange'),
                    'value'=>'$data->idptrange0->rangename . " (" . $data->idptrange0->rangeno . ")"',
                ),            
                array(
                    'name'=>'idptpropertyon',
                    'header'=>Yii::t('application', 'Ptpropertyon'),
                    'value'=>'$data->idptpropertyon0->propertyon',
                ),            
            
//		'aresidential',
//		'acommercial',
//		'bresidential',
//		'bcommercial',
//		'cresidential',
		/*
		'ccommercial',
		'dresidential',
		'dcommercial',
		'idccfyear',
		'idptrange',
		'idptpropertyon',
		'eresidential',
		'ecommercial',
		*/
	),
)); ?>
