<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="en" />
<!--     <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->

<title><?php echo CHtml::encode($this->pageTitle); ?></title>

<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

<?php 
$cs = Yii::app()->getClientScript();
$cs->registerCssFile('http://code.jquery.com/ui/1.9.1/themes/dot-luv/jquery-ui.css');
?>
<link rel="stylesheet"
	href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css"
	type="text/css" media="screen" title="default" />
<link rel="stylesheet"
	href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap-responsive.min.css"
	type="text/css" media="screen" title="default" />
<link rel="stylesheet"
	href="<?php echo Yii::app()->theme->baseUrl; ?>/css/font-awesome.min.css"
	type="text/css" media="screen" title="default" />
<link rel="stylesheet"
	href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootswatch.css"
	type="text/css" media="screen" title="default" />


<script type="text/javascript">

     var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-23019901-1']);
      _gaq.push(['_setDomainName', "bootswatch.com"]);
        _gaq.push(['_setAllowLinker', true]);
      _gaq.push(['_trackPageview']);

     (function() {
       var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
       ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
       var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
     })();

   </script>

<?php Yii::app()->bootstrap->register(); ?>
<?php Yii::app()->clientScript->registerCoreScript('jquery') ?>
<?php Yii::app()->getClientScript()->registerCoreScript('jquery.ui'); ?>

</head>

<body class="preview" id="top" data-spy="scroll" data-target=".subnav"
	data-offset="80">
	<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/bsa.js');?>



	<div id="wrap">
	<div class="container">
		<div class="row">
			<div class="span3 hidden-phone"></div>
			<div class="span6" id="form-login">
				<div class="form-horizontal well">
						<?php echo $content; ?>
				</div>
			<div class="span3 hidden-phone"></div>
		</div>
	</div>
	<div id="push"></div>
	</div>
	
	



	<!-- Le javascript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<!--     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->

	<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/jquery.smooth-scroll.min.js');?>
	<?php //Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/bootstrap.min.js');?>
	<?php //Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/bootswatch.js');?>




</body>
</html>
