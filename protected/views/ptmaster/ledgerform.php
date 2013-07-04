<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/jquery-ui.min.js"></script>

<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/themes/redmond/jquery-ui.css" type="text/css" media="all" />

<style>
    .ui-button-text, .ui-dialog-title{
        font-size: 0.8em !important;
    }
</style>

<script>
    $(document).ready(function () {    
        //        alert("hi");
    });
    
    function viewLedger(){
        var url = "http://localhost/mcmis2012/index.php?r=ptmaster/viewLedger&id=" + $("#propertno").val()
        window.open(
        url,
        '_blank' // <- This is what makes it open in a new window.
        );
        
    }
    
</script>

<script>
    // increase the default animation speed to exaggerate the effect
    $.fx.speeds._default = 1000;
    $(function() {
        //		$( "#dialog" ).dialog({
        //			autoOpen: false,
        //			show: "blind",
        //			hide: "explode"
        //		});

        $( "#opener" ).click(function() {
        $( "#dialog-confirm" ).dialog( "open" );
        return false;
        });
    });
</script>



<!--
<div class="demo">

<div id="dialog" title="Basic dialog">
        <p>This is an animated dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the 'x' icon.</p>
</div>

<a id="opener" href="">
    <img width="175" height="99" border="0" src="<?php echo Yii::app()->baseUrl; ?>/images/proptax.png">    
</a>
       

</div> End demo -->




<meta charset="utf-8">












<script>
    $(function() {
        // a workaround for a flaw in the demo system (http://dev.jqueryui.com/ticket/4375), ignore!
        $( "#dialog:ui-dialog" ).dialog( "destroy" );
	
        $( "#dialog-confirm" ).dialog({
        autoOpen: false,
        //			show: "blind",
        //			hide: "explode"
            resizable: false,
//            height:240,
            modal: true,
            buttons: {
                "Search": function() {
                    viewLedger();
                    $( this ).dialog( "close" );
                },
                Cancel: function() {
                    $( this ).dialog( "close" );
                }
            }
        });
    });
</script>

<a id="opener" href="">
    <img width="175" height="99" border="0" src="<?php echo Yii::app()->baseUrl; ?>/images/proptax.png">    
</a>


<div class="demo">

    <div id="dialog-confirm" title="Empty the recycle bin?">
        Property No. <input type="text" id="propertno" />
<!--        <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;font-size: 0.8em"></span>These items will be permanently deleted and cannot be recovered. Are you sure?</p>-->
    </div>

</div>