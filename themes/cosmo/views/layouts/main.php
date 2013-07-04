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
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" type="text/css" media="screen" title="default" />
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap-responsive.min.css" type="text/css" media="screen" title="default" />
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/font-awesome.min.css" type="text/css" media="screen" title="default" />
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootswatch.css" type="text/css" media="screen" title="default" />

	
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

  <body class="preview" id="top" data-spy="scroll" data-target=".subnav" data-offset="80">
    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/bsa.js');?>


  <!-- Navbar
    ================================================== -->
    
    <?php require_once 'menu.php'; ?>
<?php 
// $this->widget('bootstrap.widgets.TbNavbar', array(
// 		'fixed' => "top",
// 		'brand' => 'E-Paper',
// 		'brandUrl' => Yii::app()->createAbsoluteUrl('/admin'),
// 		'brandOptions' => array(
// 				'id' => 'brand'
// 		),
// 		'fluid' => false,
// 		'collapse' => true,
// 		'items' => array(
// 				array(
// 						'class' => 'bootstrap.widgets.TbMenu',
// 						'items' => array(
// 								array('label' => 'Edition',
// 										'url' => array('edition/admin'),
// 										'active' => Yii::app()->controller->id == 'edition' && Yii::app()->controller->action->id == 'admin'),
// 								array('label' => 'Paper',
// 										'url' => array('paper/admin'),
// 										'active' => Yii::app()->controller->id == 'paper' && Yii::app()->controller->action->id == 'admin'),
// 								array('label'=>'View Paper', 'url'=>array('/')),
// 								array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
// 								array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
// 						),
// 				),
// 		))
// );


?>



    <div class="container">



<!-- Miscellaneous
================================================== -->
<section id="">
  <div class="row page-header">
  	<div class="span8">
    	<h1><?php echo CHtml::encode($this->pageTitle); ?></h1>
    </div>
    <div class="span4 text-right text-info">
    	<strong>
    		<?php echo '<b>' . Yii::t('application', 'Site Title') . ' - ' . Yii::t('application', 'Financial Year: ') . '</b><u>' . Yii::app()->session['ccfyear']->fyear . '</u>'; ?>
		</strong>    		
    </div>
  </div>

  <div class="container-fluid row-fluid well">
  	<?php echo $content; ?>
  </div>
</section>


<br><br><br><br>

     <!-- Footer
      ================================================== -->
      <hr>

      <footer id="footer">
        <p class="pull-right"><a href="#top">Back to top</a></p>
        <?php 
        	echo CHTML::image(Yii::app()->theme->baseUrl . '/images/icon_idlogo.png');
        ?>
      </footer>

      
      
<div style="display: none">
    
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(// the dialog
    'id' => 'dialog-Bhadarate',
//     'theme' => 'dot-luv',
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
	'theme' => 'dot-luv',
    'themeUrl' => 'http://code.jquery.com/ui/1.9.1/themes/',
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
	'theme' => 'dot-luv',
	'themeUrl' => 'http://code.jquery.com/ui/1.9.1/themes/',
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


</div>
      
      
    </div><!-- /container -->


    

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<!--     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->

    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/jquery.smooth-scroll.min.js');?>
    <?php //Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/bootstrap.min.js');?>
    <?php //Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/bootswatch.js');?>
    
    
    
    
  </body>
</html>
