<?php
if (Yii::app()->request->isAjaxRequest) {
    Yii::app()->clientscript->scriptMap['jquery.js'] = false;
    Yii::app()->clientscript->scriptMap['jquery-ui.min.js'] = false;
}

$this->setPageTitle(Yii::t('application', 'Ssapplication'));
?>
<?php
$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'ssapplication'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'ssapplication'))), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.ssapplication-search-button').click(function(){
	$('.ssapplication-search-form').toggle();
	return false;
});
$('.ssapplication-search-form form').submit(function(){
	$.fn.yiiGridView.update('ssapplication-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php //echo CHtml::link(Yii::t('application', 'Advanced Search'),'#',array('class'=>'ssapplication-search-button')); ?>
<div class="ssapplication-search-form" style="display:none">
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
            'onclick' => '$.fn.yiiGridView.update("ssapplication-grid", {
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
                          url: "'.Yii::app()->createUrl('lgmisSecrity/ssapplication/create').'&isAjaxRequest=1",
                          success: function(data){
                             $("#dialog").html(data);
                             $("#dialog").dialog("option", "title", "'. Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'ssapplication'))) .'");
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
                          if($.fn.yiiGridView.getSelection("ssapplication-grid") != ""){
                                $.ajax({
                                  url: "'.Yii::app()->createUrl('lgmisSecrity/ssapplication/update').'&isAjaxRequest=1&id=" + $.fn.yiiGridView.getSelection("ssapplication-grid"),
                                  success: function(data){
                                     $("#dialog").html(data);
                                     $("#dialog").dialog("option", "title", "'. Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'ssapplication'))) .' - " + $.fn.yiiGridView.getSelection("ssapplication-grid"));
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
                    if($.fn.yiiGridView.getSelection("ssapplication-grid") != ""){
                        window.cid = "ssapplication";
                        window.url = "'. CController::createUrl('ssapplication/delete').'";
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
                        if($.fn.yiiGridView.getSelection("ssapplication-grid") != ""){
                            $.ajax({
                              url: "'.Yii::app()->createUrl('lgmisSecrity/ssapplication/view').'&isAjaxRequest=1&id=" + $.fn.yiiGridView.getSelection("ssapplication-grid"),
                              success: function(data){
                                $("#dialog").html(data);
                                $("#dialog").dialog("option", "title", "'. Yii::t('application','View {title}', array('{title}'=>Yii::t('application', 'ssapplication'))) .' - " + $.fn.yiiGridView.getSelection("ssapplication-grid"));
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
                "<div class='ui-pg-div'><span style='font-size: smaller'>&nbsp;&nbsp;&nbsp;" . Yii::t('application', 'Nominee') . "&nbsp;&nbsp;&nbsp;</span>", 
                "#",
                $htmlOptions = array(
                    'title' => Yii::t('application', 'Nominee'),
                    'onclick' => '
                          if($.fn.yiiGridView.getSelection("ssapplication-grid") != ""){
                          //alert($.fn.yiiGridView.getSelection("ssapplication-grid"));
                         
                             //window.location.href="'.Yii::app()->createUrl('lgmisSecrity/ssnominee/admin').'&id=" + $.fn.yiiGridView.getSelection("ssapplication-grid");
                              
                                $.ajax({
                                  url: "'.Yii::app()->createUrl('lgmisSecrity/ssnominee/update').'&isAjaxRequest=1&id=" + $.fn.yiiGridView.getSelection("ssapplication-grid"),
                                  success: function(data){
                                     $("#dialog").html(data);
                                     $("#dialog").dialog("option", "title", "'. Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'ssapplication'))) .' - " + $.fn.yiiGridView.getSelection("ssapplication-grid"));
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
	'id'=>'ssapplication-grid',
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
		//'idssapplication',
		'type',
		'name',
		'fhname',
		'markident',
		'dob',
		/*
		'idcccategory',
		'remmitaddress',
		'permanentadd',
		'domicileadd',
		'yearreskling',
		'monincome',
		'immproperty',
		'presentresiding',
		'bornresiding',
		'incometax',
		'servicedetail',
		'pansionreceipt',
		'nationnality',
		'idccsex',
		'dodhusband',
		'freedomfighter',
		'addfreedfighter',
		'idccstatus',
		'bankbranch',
		'bankaccountno',
		'ifsccode',
		'documentssubmit',
		*/
	),
)); ?>