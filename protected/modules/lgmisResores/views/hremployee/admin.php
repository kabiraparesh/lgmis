<?php
if (Yii::app()->request->isAjaxRequest) {
    Yii::app()->clientscript->scriptMap['jquery.js'] = false;
    Yii::app()->clientscript->scriptMap['jquery-ui.min.js'] = false;
}

$this->setPageTitle(Yii::t('application', 'Hremployee'));
?>
<?php
$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'hremployee'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'hremployee'))), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.hremployee-search-button').click(function(){
	$('.hremployee-search-form').toggle();
	return false;
});
$('.hremployee-search-form form').submit(function(){
	$.fn.yiiGridView.update('hremployee-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php //echo CHtml::link(Yii::t('application', 'Advanced Search'),'#',array('class'=>'hremployee-search-button')); ?>
<div class="hremployee-search-form" style="display:none">
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
            'onclick' => '$.fn.yiiGridView.update("hremployee-grid", {
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
                          url: "'.Yii::app()->createUrl('lgmisResores/hremployee/create').'&isAjaxRequest=1",
                          success: function(data){
                             $("#dialog").html(data);
                             $("#dialog").dialog("option", "title", "'. Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'hremployee'))) .'");
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
                          if($.fn.yiiGridView.getSelection("hremployee-grid") != ""){
                                $.ajax({
                                  url: "'.Yii::app()->createUrl('lgmisResores/hremployee/update').'&isAjaxRequest=1&id=" + $.fn.yiiGridView.getSelection("hremployee-grid"),
                                  success: function(data){
                                     $("#dialog").html(data);
                                     $("#dialog").dialog("option", "title", "'. Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'hremployee'))) .' - " + $.fn.yiiGridView.getSelection("hremployee-grid"));
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
                    if($.fn.yiiGridView.getSelection("hremployee-grid") != ""){
                        window.cid = "hremployee";
                        window.url = "'. CController::createUrl('hremployee/delete').'";
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
                        if($.fn.yiiGridView.getSelection("hremployee-grid") != ""){
                            $.ajax({
                              url: "'.Yii::app()->createUrl('lgmisResores/hremployee/view').'&isAjaxRequest=1&id=" + $.fn.yiiGridView.getSelection("hremployee-grid"),
                              success: function(data){
                                $("#dialog").html(data);
                                $("#dialog").dialog("option", "title", "'. Yii::t('application','View {title}', array('{title}'=>Yii::t('application', 'hremployee'))) .' - " + $.fn.yiiGridView.getSelection("hremployee-grid"));
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
                "<div class='ui-pg-div'><span style='font-size: smaller'>&nbsp;&nbsp;&nbsp;" . Yii::t('application', 'Employeebasic') . "&nbsp;&nbsp;&nbsp;</span>", 
                "#",
                $htmlOptions = array(
                    'title' => Yii::t('application', 'Employeebasic'),
                    'onclick' => '
                          if($.fn.yiiGridView.getSelection("hremployee-grid") != ""){
                          //alert($.fn.yiiGridView.getSelection("hremployee-grid"));
                         
                             //window.location.href="'.Yii::app()->createUrl('lgmisResores/hremployeebasic/admin').'&id=" + $.fn.yiiGridView.getSelection("hremployee-grid");
                              
                                $.ajax({
                                  url: "'.Yii::app()->createUrl('lgmisResores/hremployeebasic/update').'&isAjaxRequest=1&id=" + $.fn.yiiGridView.getSelection("hremployee-grid"),
                                  success: function(data){
                                     $("#dialog").html(data);
                                     $("#dialog").dialog("option", "title", "'. Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'hremployee'))) .' - " + $.fn.yiiGridView.getSelection("hremployee-grid"));
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
                "<div class='ui-pg-div'><span style='font-size: smaller'>&nbsp;&nbsp;&nbsp;" . Yii::t('application', 'EmployeeLevel') . "&nbsp;&nbsp;&nbsp;</span>", 
                "#",
                $htmlOptions = array(
                    'title' => Yii::t('application', 'EmployeeLevel'),
                    'onclick' => '
                          if($.fn.yiiGridView.getSelection("hremployee-grid") != ""){
                          //alert($.fn.yiiGridView.getSelection("hremployee-grid"));
                         
                             //window.location.href="'.Yii::app()->createUrl('lgmisResores/hremplearnleave/admin').'&id=" + $.fn.yiiGridView.getSelection("hremployee-grid");
                              
                                $.ajax({
                                  url: "'.Yii::app()->createUrl('lgmisResores/hremplearnleave/update').'&isAjaxRequest=1&id=" + $.fn.yiiGridView.getSelection("hremployee-grid"),
                                  success: function(data){
                                     $("#dialog").html(data);
                                     $("#dialog").dialog("option", "title", "'. Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'hremployee'))) .' - " + $.fn.yiiGridView.getSelection("hremployee-grid"));
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
                "<div class='ui-pg-div'><span style='font-size: smaller'>&nbsp;&nbsp;&nbsp;" . Yii::t('application', 'Education') . "&nbsp;&nbsp;&nbsp;</span>", 
                "#",
                $htmlOptions = array(
                    'title' => Yii::t('application', 'Education'),
                    'onclick' => '
                          if($.fn.yiiGridView.getSelection("hremployee-grid") != ""){
                          //alert($.fn.yiiGridView.getSelection("hremployee-grid"));
                         
                             //window.location.href="'.Yii::app()->createUrl('lgmisResores/hrempleducation/admin').'&id=" + $.fn.yiiGridView.getSelection("hremployee-grid");
                              
                                $.ajax({
                                  url: "'.Yii::app()->createUrl('lgmisResores/hrempleducation/update').'&isAjaxRequest=1&id=" + $.fn.yiiGridView.getSelection("hremployee-grid"),
                                  success: function(data){
                                     $("#dialog").html(data);
                                     $("#dialog").dialog("option", "title", "'. Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'hremployee'))) .' - " + $.fn.yiiGridView.getSelection("hremployee-grid"));
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
                "<div class='ui-pg-div'><span style='font-size: smaller'>&nbsp;&nbsp;&nbsp;" . Yii::t('application', 'Insurance') . "&nbsp;&nbsp;&nbsp;</span>", 
                "#",
                $htmlOptions = array(
                    'title' => Yii::t('application', 'Insurance'),
                    'onclick' => '
                          if($.fn.yiiGridView.getSelection("hremployee-grid") != ""){
                          //alert($.fn.yiiGridView.getSelection("hremployee-grid"));
                         
                             //window.location.href="'.Yii::app()->createUrl('lgmisResores/hremplinsurance/admin').'&id=" + $.fn.yiiGridView.getSelection("hremployee-grid");
                              
                                $.ajax({
                                  url: "'.Yii::app()->createUrl('lgmisResores/hremplinsurance/update').'&isAjaxRequest=1&id=" + $.fn.yiiGridView.getSelection("hremployee-grid"),
                                  success: function(data){
                                     $("#dialog").html(data);
                                     $("#dialog").dialog("option", "title", "'. Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'hremployee'))) .' - " + $.fn.yiiGridView.getSelection("hremployee-grid"));
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
                "<div class='ui-pg-div'><span style='font-size: smaller'>&nbsp;&nbsp;&nbsp;" . Yii::t('application', 'Loan') . "&nbsp;&nbsp;&nbsp;</span>", 
                "#",
                $htmlOptions = array(
                    'title' => Yii::t('application', 'Loan'),
                    'onclick' => '
                          if($.fn.yiiGridView.getSelection("hremployee-grid") != ""){
                          //alert($.fn.yiiGridView.getSelection("hremployee-grid"));
                         
                             //window.location.href="'.Yii::app()->createUrl('lgmisResores/hremplloan/admin').'&id=" + $.fn.yiiGridView.getSelection("hremployee-grid");
                              
                                $.ajax({
                                  url: "'.Yii::app()->createUrl('lgmisResores/hremplloan/update').'&isAjaxRequest=1&id=" + $.fn.yiiGridView.getSelection("hremployee-grid"),
                                  success: function(data){
                                     $("#dialog").html(data);
                                     $("#dialog").dialog("option", "title", "'. Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'hremployee'))) .' - " + $.fn.yiiGridView.getSelection("hremployee-grid"));
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
                "<div class='ui-pg-div'><span style='font-size: smaller'>&nbsp;&nbsp;&nbsp;" . Yii::t('application', 'Member') . "&nbsp;&nbsp;&nbsp;</span>", 
                "#",
                $htmlOptions = array(
                    'title' => Yii::t('application', 'Member'),
                    'onclick' => '
                          if($.fn.yiiGridView.getSelection("hremployee-grid") != ""){
                          //alert($.fn.yiiGridView.getSelection("hremployee-grid"));
                         
                             //window.location.href="'.Yii::app()->createUrl('lgmisResores/hremplmember/admin').'&id=" + $.fn.yiiGridView.getSelection("hremployee-grid");
                              
                                $.ajax({
                                  url: "'.Yii::app()->createUrl('lgmisResores/hremplmember/update').'&isAjaxRequest=1&id=" + $.fn.yiiGridView.getSelection("hremployee-grid"),
                                  success: function(data){
                                     $("#dialog").html(data);
                                     $("#dialog").dialog("option", "title", "'. Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'hremployee'))) .' - " + $.fn.yiiGridView.getSelection("hremployee-grid"));
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
	'id'=>'hremployee-grid',
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
		//'idhremployee',
		'empname',
		'fathername',
		'empdob',
		'idccsex',
		'idccreligion',
		/*
		'idcccategory',
		'presentaddress1',
		'presentaddress2',
		'presentcity',
		'presentphone',
		'email',
		'documenttype',
		'peraddress1',
		'peraddress2',
		'percity',
		'perphone',
		'mobileno',
		'mothername',
		'joiningdate',
		'retiredate',
		'identificationmark',
		'maritalstatus',
		'height',
		'weight',
		'gpfno',
		'scstdetail',
		'handicap',
		'fingerprints',
		'employeephoto',
		'employeesign',
		*/
	),
)); ?>
