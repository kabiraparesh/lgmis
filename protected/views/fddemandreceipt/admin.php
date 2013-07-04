<?php
if (Yii::app()->request->isAjaxRequest) {
    Yii::app()->clientscript->scriptMap['jquery.js'] = false;
    Yii::app()->clientscript->scriptMap['jquery-ui.min.js'] = false;
}

$this->setPageTitle(Yii::t('application', 'Fddemandreceipt'));
?>
<?php
$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'fddemandreceipt'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'fddemandreceipt'))), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.fddemandreceipt-search-button').click(function(){
	$('.fddemandreceipt-search-form').toggle();
	return false;
});
$('.fddemandreceipt-search-form form').submit(function(){
	$.fn.yiiGridView.update('fddemandreceipt-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php echo CHtml::link(Yii::t('application', 'Advanced Search'),'#',array('class'=>'fddemandreceipt-search-button')); ?>
<div class="fddemandreceipt-search-form" style="display:none">
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
            'onclick' => '$.fn.yiiGridView.update("fddemandreceipt-grid", {
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
                          url: "'.Yii::app()->createUrl('fddemandreceipt/create').'&isAjaxRequest=1",
                          success: function(data){
                             $("#dialog").html(data);
                             $("#dialog").dialog("option", "title", "'. Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'fddemandreceipt'))) .'");
                             $("#dialog").dialog("option", "height", "auto");
                             $("#dialog").dialog("option", "width", "750px");
                             $("#dialog").dialog("open"); 
                             return false;
                          }
                        });
                        ',
                'sytle' => ''
                )
);$pagertoolbox .= "</td>";
//$pagertoolbox .= "<td>";
//$pagertoolbox .= CHtml::link(
//                "<div class='ui-pg-div'><span class='ui-icon ui-icon-pencil'></span></div>", 
//                "#", 
//                $htmlOptions = array(
//                    'onclick' => '
//                          if($.fn.yiiGridView.getSelection("fddemandreceipt-grid") != ""){
//                                $.ajax({
//                                  url: "'.Yii::app()->createUrl('fddemandreceipt/update').'&isAjaxRequest=1&id=" + $.fn.yiiGridView.getSelection("fddemandreceipt-grid"),
//                                  success: function(data){
//                                     $("#dialog").html(data);
//                                     $("#dialog").dialog("option", "title", "'. Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'fddemandreceipt'))) .' - " + $.fn.yiiGridView.getSelection("fddemandreceipt-grid"));
//                                     $("#dialog").dialog("option", "height", "auto");
//                                     $("#dialog").dialog("option", "width", "auto");
//                                     $("#dialog").dialog("open"); 
//                                     return false;
//                                  }
//                                });
//                           }
//                           else{
//                                $("#dialog-warning-msg").html("'. Yii::t('application','Please, select row...') .'"); $("#dialog-warning").dialog("open"); return false;
//                           }                       
//                        ',
//                )
//);
//$pagertoolbox .= "</td>";
$pagertoolbox .= "<td>";
$pagertoolbox .= CHtml::link("<div class='ui-pg-div'><span class='ui-icon ui-icon-trash'></span></div>", '#', array(
            'title'=>Yii::t('application', 'Delete'),
            'onclick'=>'
                    if($.fn.yiiGridView.getSelection("fddemandreceipt-grid") != ""){
                        window.cid = "fddemandreceipt";
                        window.url = "'. CController::createUrl('fddemandreceipt/delete').'";
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
                        if($.fn.yiiGridView.getSelection("fddemandreceipt-grid") != ""){
                            $.ajax({
                              url: "'.Yii::app()->createUrl('fddemandreceipt/view').'&isAjaxRequest=1&id=" + $.fn.yiiGridView.getSelection("fddemandreceipt-grid"),
                              success: function(data){
                                $("#dialog").html(data);
                                $("#dialog").dialog("option", "title", "'. Yii::t('application','View {title}', array('{title}'=>Yii::t('application', 'fddemandreceipt'))) .' - " + $.fn.yiiGridView.getSelection("fddemandreceipt-grid"));
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
	'id'=>'fddemandreceipt-grid',
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
		'idfddemandreceipt',
		'demanddate',
//		'idccdepartment',
		'demandnumber',
		'demandinname',
		'demandamount',
		'amountpaid',
		/*
		'paymenttype',
		'chequeddpayorderno',
		'chequeddpayorderdate',
		'bankname',
		'branchname',
		'windowno',
		'username',
		*/
	),
)); ?>
