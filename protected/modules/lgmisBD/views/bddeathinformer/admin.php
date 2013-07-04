<?php
if (Yii::app()->request->isAjaxRequest) {
    Yii::app()->clientscript->scriptMap['jquery.js'] = false;
    Yii::app()->clientscript->scriptMap['jquery-ui.min.js'] = false;
}

$this->setPageTitle(Yii::t('application', 'Bddeathinformer'));
?>
<?php
$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'bddeathinformer'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'bddeathinformer'))), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.bddeathinformer-search-button').click(function(){
	$('.bddeathinformer-search-form').toggle();
	return false;
});
$('.bddeathinformer-search-form form').submit(function(){
	$.fn.yiiGridView.update('bddeathinformer-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php echo CHtml::link(Yii::t('application', 'Advanced Search'),'#',array('class'=>'bddeathinformer-search-button')); ?>
<div class="bddeathinformer-search-form" style="display:none">
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
            'onclick' => '$.fn.yiiGridView.update("bddeathinformer-grid", {
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
                          url: "'.Yii::app()->createUrl('lgmisBD/bddeathinformer/create').'&isAjaxRequest=1",
                          success: function(data){
                             $("#dialog").html(data);
                             $("#dialog").dialog("option", "title", "'. Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'bddeathinformer'))) .'");
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
                          if($.fn.yiiGridView.getSelection("bddeathinformer-grid") != ""){
                                $.ajax({
                                  url: "'.Yii::app()->createUrl('lgmisBD/bddeathinformer/update').'&isAjaxRequest=1&id=" + $.fn.yiiGridView.getSelection("bddeathinformer-grid"),
                                  success: function(data){
                                     $("#dialog").html(data);
                                     $("#dialog").dialog("option", "title", "'. Yii::t('application','Update {title}', array('{title}'=>Yii::t('application', 'bddeathinformer'))) .' - " + $.fn.yiiGridView.getSelection("bddeathinformer-grid"));
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
                    if($.fn.yiiGridView.getSelection("bddeathinformer-grid") != ""){
                        window.cid = "bddeathinformer";
                        window.url = "'. CController::createUrl('lgmisBD/bddeathinformer/delete').'";
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
                        if($.fn.yiiGridView.getSelection("bddeathinformer-grid") != ""){
                            $.ajax({
                              url: "'.Yii::app()->createUrl('lgmisBD/bddeathinformer/view').'&isAjaxRequest=1&id=" + $.fn.yiiGridView.getSelection("bddeathinformer-grid"),
                              success: function(data){
                                $("#dialog").html(data);
                                $("#dialog").dialog("option", "title", "'. Yii::t('application','View {title}', array('{title}'=>Yii::t('application', 'bddeathinformer'))) .' - " + $.fn.yiiGridView.getSelection("bddeathinformer-grid"));
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
                Yii::t('application', "Application"), 
                "#", 
                $htmlOptions = array(
                    'title'=>Yii::t('application', 'New'),
                    'onclick' => '
                        if($.fn.yiiGridView.getSelection("bddeathinformer-grid") != ""){
                      // window.location.href="'.Yii::app()->createUrl('lgmisBD/bdbirthapplication/admin').'&idparent=" + $.fn.yiiGridView.getSelection("bddeathinformer-grid");
                            $.ajax({
                              url: "'.Yii::app()->createUrl('lgmisBD/bddeathapplication/create').'&isAjaxRequest=1&idparent=" + $.fn.yiiGridView.getSelection("bddeathinformer-grid"),
                                  success: function(data){
                                     $("#dialog").html(data);
                                     $("#dialog").dialog("option", "title", "'. Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Bddeathapplication'))) .'");
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
);$pagertoolbox .= "</td>";


$pagertoolbox .= "</tr>";
$pagertoolbox .= "</table>";
?> 

<?php $this->widget('ext.eziiui.widgets.grid.CGridViewUI', array(
	'id'=>'bddeathinformer-grid',
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
		'idbddeathinformer',
		'informername',
		'informeraddress',
		'personname',
		'dod',
		'timeofdeath',
		/*
		'idccsex',
		'fhname',
		'crematorymethod',
		'reasondeath',
		'idccreligion',
		'other',
		*/
	),
)); ?>
