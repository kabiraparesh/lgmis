
function add(id, title, url){
    $("#"+ id +"-grid").addClass("grid-view-loading");
    $.ajax({
        url: url,
        beforeSend: function ( xhr ) {
        }
    }).done(function ( data ) {
        $("#" + id + "-form-dialog").html(data);
        $("#" + id + "-form-dialog").dialog("option", "title", title);
        //            $("#" + id + "-form-dialog").dialog("option", "height", "450");
        //            $("#" + id + "-form-dialog").dialog("option", "width", "auto");
        $("#" + id + "-form-dialog").dialog("open"); 
        $("#"+ id +"-grid").removeClass("grid-view-loading");
        return false;
    });
}
function update(id, title, url, msg){
    if($.fn.yiiGridView.getSelection(id + "-grid") != ""){
        $("#"+ id +"-grid").addClass("grid-view-loading");
        $.ajax({
            url: url,
            beforeSend: function ( xhr ) {
            }
        }).done(function ( data ) {
            $("#" + id + "-form-dialog").html(data);
            $("#" + id + "-form-dialog").dialog("option", "title", title);
            //            $("#" + id + "-form-dialog").dialog("option", "height", "450");
            //            $("#" + id + "-form-dialog").dialog("option", "width", "auto");
            $("#" + id + "-form-dialog").dialog("open"); 
            $("#"+ id +"-grid").removeClass("grid-view-loading");
            return false;
        });
    }
    else{
        $("#dialog-warning-msg").html(msg);
        $("#dialog-warning").dialog("open");
        return false;
    }
}
function trash(id, title, url, msg){
    if($.fn.yiiGridView.getSelection(id + "-grid") != ""){
        window.cid = id;
        window.url = url,
        $("#dialog-delete").dialog("open", "title", title); 
        return false;
    }
    else{
        $("#dialog-warning-msg").html(msg); 
        $("#dialog-warning").dialog("open", "title", title); 
        return false;
    }
}

function view(id, title, url, msg){
    if($.fn.yiiGridView.getSelection(id + "-grid") != ""){
        //        url = "<?php echo urldecode(Yii::app()->createUrl('default/view', array('id' => '" + $.fn.yiiGridView.getSelection("subject-grid") + "'))); ?>";
        //        url = url.replace('default', id);
        $.ajax({
            url: url,
            success: function(data){
                $("#dialog").html(data);
                $("#dialog").dialog("option", "title", title);
                $("#dialog").dialog("option", "height", "auto");
                $("#dialog").dialog("option", "width", "auto");
                $("#dialog").dialog("open"); 
                return false;
            }
        });                        
    }
    else{
        $("#dialog-warning-msg").html(msg); 
        $("#dialog-warning").dialog("open"); 
        return false;
    }    
}

function custom(id, name, msg, select){
	if(select == 1){
	    if($.fn.yiiGridView.getSelection(id + "-grid") != ""){
	    	window[name + "Callback"]($.fn.yiiGridView.getSelection(id + "-grid"));
	    }
	    else{
	    	$("#dialog-warning-msg").html(msg);
	        $("#dialog-warning").dialog("open");
	        return false;
	    }
	}
	else{
    	window[name + "Callback"](-1);
	}
}
