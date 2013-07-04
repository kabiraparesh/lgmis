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
<link rel="stylesheet" type="text/css" href="css/jquery.ui/start/jquery.ui.all.css" />
<link rel="stylesheet" type="text/css" href="css/jquery.ui/dark-hive/jquery.ui.all.css" />

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
    .checkbox-label{
/*        float: right;*/
/*        display: block;        */
    }
</style>
</head>
<body id="login-bg"> 

<!-- Start: login-holder -->
<div id="login-holder">

	<!-- start logo -->
	<div id="logo-login">
		<a href="index.html"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/shared/logo.png" width="156" height="40" alt="" /></a>
	</div>
	<!-- end logo -->
	
	<div class="clear"></div>	
                <?php echo $content; ?>
 

</div>
<!-- End: login-holder -->
</body>
</html>