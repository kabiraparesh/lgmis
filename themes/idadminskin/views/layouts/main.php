<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/screen.css" type="text/css" media="screen" title="default" />
<script>
   var StyleFile = "theme" + document.cookie.charAt(6) + ".css";
   document.writeln('<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/' + StyleFile + '">');
</script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/css/jquery.ui/start/jquery.ui.all.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/css/jquery.ui/dark-hive/jquery.ui.all.css" />

<!--[if IE]>
<link rel="stylesheet" media="all" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/pro_dropline_ie.css" />
<![endif]-->

<!--  jquery core -->
<!--<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>-->

<!--  checkbox styling script -->
<!--<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery/ui.core.js" type="text/javascript"></script>

-->
        <?php Yii::app()->clientScript->registerCoreScript('jquery') ?>                
        <?php Yii::app()->getClientScript()->registerCoreScript('jquery.ui'); ?>


<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
//$(document).pngFix( );
});
</script>

<style>
        label{
            width: 85px;
            display: block;
            float: left;
        }    
</style>
</head>
<body> 
<!-- Start: page-top-outer -->
<div id="page-top-outer" style="display:none;">    

<!-- Start: page-top -->
<div id="page-top">

	<!-- start logo -->
	<div id="logo">
	<a href=""><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/shared/logo.png" width="156" height="40" alt="" /></a>
	</div>
	<!-- end logo -->
	
	<!--  start top-search -->
	<div id="top-search">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
		<td><input type="text" value="Search" onblur="if (this.value=='') { this.value='Search'; }" onfocus="if (this.value=='Search') { this.value=''; }" class="top-search-inp" /></td>
		<td>
		<select  class="styledselect">
			<option value=""> All</option>
			<option value=""> Products</option>
			<option value=""> Categories</option>
			<option value="">Clients</option>
			<option value="">News</option>
		</select> 
		</td>
		<td>
		<input type="image" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/shared/top_search_btn.gif"  />
		</td>
		</tr>
		</table>
	</div>
 	<!--  end top-search -->
 	<div class="clear"></div>

</div>
<!-- End: page-top -->

</div>
<!-- End: page-top-outer -->
	
<div class="clear">&nbsp;</div>
 
<!--  start nav-outer-repeat................................................................................................. START -->
<div class="nav-outer-repeat"> 
<!--  start nav-outer -->
<div class="nav-outer"> 

		<!-- start nav-right -->
		<div id="nav-right">
			<div class="nav-divider">&nbsp;</div>
			<div style="display: block; color: whitesmoke;vertical-align: central; padding: 10px; font-size: 14px;"><span><?php echo '<b>' . Yii::t('application', 'Site Title') . ' - ' . Yii::t('application', 'Financial Year: ') . '</b><u>' . Yii::app()->session['ccfyear']->fyear . '</u>';?></span></div>
			<div class="clear">&nbsp;</div>
		
<!--			<div class="nav-divider">&nbsp;</div>
			<div class="showhide-account"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/shared/nav/nav_myaccount.gif" width="93" height="14" alt="" /></div>
			<div class="nav-divider">&nbsp;</div>
			<a href="" id="logout"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/shared/nav/nav_logout.gif" width="64" height="14" alt="" /></a>
			<div class="clear">&nbsp;</div>
		
			  start account-content 	
			<div class="account-content">
			<div class="account-drop-inner">
				<a href="" id="acc-settings">Settings</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-details">Personal details </a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-project">Project details</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-inbox">Inbox</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-stats">Statistics</a> 
			</div>
			</div>-->
			<!--  end account-content -->
		
		</div>
		<!-- end nav-right -->


		<!--  start nav -->
		<div class="nav">
		<div class="table">
                <?php require_once 'menu.php'; ?>
		
		<div class="clear"></div>
		</div>
		<div class="clear"></div>
		</div>
		<!--  start nav -->

</div>
<div class="clear"></div>
<!--  start nav-outer -->
</div>
<!--  start nav-outer-repeat................................................... END -->

  <div class="clear"></div>
 
<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1><?php echo CHtml::encode($this->pageTitle); ?></h1>
	</div>
	<!-- end page-heading -->

	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
                        
			<div id="table-content">
			
                        <?php echo $content; ?>
                            
			</div>
			<!--  end table-content  -->
	
			<div class="clear"></div>
		 
		</div>
		<!--  end content-table-inner ............................................END  -->
		</td>
		<td id="tbl-border-right"></td>
	</tr>
	<tr>
		<th class="sized bottomleft"></th>
		<td id="tbl-border-bottom">&nbsp;</td>
		<th class="sized bottomright"></th>
	</tr>
	</table>
        
	<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer........................................................END -->

<div class="clear">&nbsp;</div>
    
<!-- start footer -->         
<div id="footer">
<!-- <div id="footer-pad">&nbsp;</div> -->
	<!--  start footer-left -->
	<div id="footer-left">
<!--	MCMIS &copy; Copyright ICTSOFT <a href="">www.ictsoft.in</a>. All rights reserved.</div>-->
	<!--  end footer-left -->
	<div class="clear">&nbsp;</div>
</div>
<!-- end footer -->


</body>
</html>



<div style="display: none">
    
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(// the dialog
    'id' => 'dialog-Bhadarate',
    'options' => array(
        'title' => Yii::t('application', 'Generate Bhadarate'),
        'autoOpen' => false,
        'modal' => true,
        'buttons' => array(
            'Generate' => 'js:function(){
                        jQuery.ajax(
                        {
                            "type":"POST",
                            "dataType": "json",
                            "url": "'.Yii::app()->createUrl('ptbhadarate/generateBhadarate').'&generate=1",
                            "success":function(data){
//                                $("#dialog-warning-msg").html(data.message); 
//                                $("#dialog-warning").dialog("open"); 

                                $.fn.yiiGridView.update("ptbhadarate-grid", {
                                        data: $(this).serialize()
                                });
                            },
                            "cache":false
                        }
                        );         
                        $(this).dialog("close");
                    }',
            'Cancel' => 'js:function(){ $(this).dialog("close");}',
        ),
    ),
));
?>
<div id="dialog-Bhadarate" title="Generate Bhadarate?">
</div>
<?php $this->endWidget(); ?>
    
    
    
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id' => 'dialog',
    'options' => array(
        'closeOnEscape' => true,
        'autoOpen' => false,
        'modal' => true,
        'width' => 'auto',
        'height' => 'auto',
        'minHeight' => 50,
        'close' => 'js:function(){}'
    ),
))
?>
<?php $this->endWidget() ?>

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(// the dialog
    'id' => 'dialog-popup-select',
    'options' => array(
//        'title' => Yii::t('application', 'Cczones'),
        'autoOpen' => false,
        'modal' => true,
//        'width' => 550,
//        'height' => 470,
        'width' => 'auto',
        'height' => 'auto',
        'minHeight' => 50,
        'close' => 'js:function(){ 
                if(window.idselected){
                    js:$("#"+window.cid+"-form").find("#"+window.eid).val(window.idselected); 
                    jQuery.ajax(
                    {
                        "type":"POST",
                        "dataType":"json",
                        "data":{"cid":window.idselected},"url":window.url,
                        "success":function(data){$("#"+window.eid+"_msg").text(data.message);},
                        "cache":false
                    }
                    );
                    window.idselected = null;
                }
            }',
    ),
));
?>
<?php $this->endWidget(); ?>

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(// the dialog
    'id' => 'dialog-delete',
    'options' => array(
        'title' => Yii::t('application', 'Delete'),
        'autoOpen' => false,
        'modal' => true,
        'buttons' => array(
            'Delete' => 'js:function(){
                        jQuery.ajax(
                        {
                            "type":"POST",
                            "dataType": "json",
//                            "url": window.url+"&isAjaxRequest=1&id="+$.fn.yiiGridView.getSelection(window.cid+"-grid"),
                            "url": window.url,
                            "success":function(data){
                                if(data.status == "Error"){
                                        $("#dialog-warning-msg").html(data.message); 
                                        $("#dialog-warning").dialog("open"); 
                                        return false;                                    
                                }
                                $.fn.yiiGridView.update(window.cid+"-grid", {
                                        data: $(this).serialize()
                                });
                            },
                            "cache":false
                        }
                        );         
                        $(this).dialog("close");
                    }',
            'Cancel' => 'js:function(){ window.cid=null; window.url=null; $(this).dialog("close");}',
        ),
    ),
));
?>
<div id="dialog-delete" title="Empty the recycle bin?">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>These items will be permanently deleted and cannot be recovered. Are you sure?</p>
</div>
<?php $this->endWidget(); ?>

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(// the dialog
    'id' => 'dialog-warning',
    'options' => array(
        'title' => Yii::t('application', 'Warning'),
        'autoOpen' => false,
        'modal' => true,
        'width' => 250,
        'height' => 120,
    ),
));
?>
<div id="dialog-warning">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span><div id="dialog-warning-msg"></div></p>
</div>
<?php $this->endWidget(); ?>

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(// the dialog
    'id' => 'dialog-popup-looksinstruction',
    'options' => array(
//        'title' => Yii::t('application', 'Cczones'),
        'autoOpen' => false,
        'modal' => true,
//        'width' => 550,
//        'height' => 470,
        'width' => 'auto',
        'height' => 'auto',
        'minHeight' => 50,
        'close' => 'js:function(){ 
                if(window.idselected){
                    js:$("#"+window.cid+"-form").find("#"+window.eid).val(window.idselected); 
                    jQuery.ajax(
                    {
                        "type":"POST",
                        "dataType":"json",
                        "data":{"cid":window.idselected},"url":window.url,
                        "success":function(data){$("#"+window.eid+"_msg").text(data.message);},
                        "cache":false
                    }
                    );
                    window.idselected = null;
                }
            }',
    ),
));
?>
<?php $this->endWidget(); ?>

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(// the dialog
    'id' => 'dialog-popup-picker',
    'options' => array(
//        'title' => Yii::t('application', 'Cczones'),
        'autoOpen' => false,
        'modal' => true,
//        'width' => 550,
//        'height' => 470,
        'width' => 'auto',
        'height' => '300',
        'minHeight' => 50,
        'resizable' => false,
        'buttons'=>array(
            Yii::t('application', 'Done')=>'js:function(){
                    var ids = $.fn.yiiGridView.getSelection("color-grid");
                    window.selectedvalue = ids;
                    $.ajax({
                        url: "'.Yii::app()->createUrl('color/colorthumb').'&ids=" + ids,
                        success: function(data){
                            $("#colors-thumb").html(data);
                            return false;
                        }
                    });
                    $("#dialog-popup-picker").dialog("close").destroy();
                    return false;
                }',
        ),            
        'close' => 'js:function(){ 
                if(window.selectedvalue){
//                    alert(window.selectedvalue);
                    $("#colors-thumb").html("hiii");
//                    alert($("#colors-thumb").html());
                    $("#"+window.cid+"-form").find("#" + window.textbox).val(window.selectedvalue);
                    window.selectedvalue = null;
                }
            }',
    ),
));
?>
<?php $this->endWidget(); ?>
   
    

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(// the dialog
    'id' => 'dialog-furldelete',
    'options' => array(
        'title' => Yii::t('application', 'Delete'),
        'autoOpen' => false,
        'modal' => true,
        'buttons' => array(
            'Delete' => 'js:function(){
                        jQuery.ajax(
                        {
                            "type":"POST",
                            "dataType":"json",
                            "url": window.furl,
                            "success":function(data){
                                if($("#" + window.cid).hasClass("last")){
                                    $("#" + window.cid).prev().addClass("last");
                                }
                                $("#" + window.cid).remove();
                            },
                            "cache":false
                        }
                        );         
                        $(this).dialog("close");
                    }',
            'Cancel' => 'js:function(){ window.furl=null; $(this).dialog("close");}',
        ),
    ),
));
?>
<div id="dialog-furldelete" title="Trash File?">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>These items will be permanently deleted and cannot be recovered. Are you sure?</p>
</div>
<?php $this->endWidget(); ?>
</div>