<?php
$this->widget('ext.eziiui.widgets.grid.CGridViewUI', array(
    'id' => $this->id . '-inputgrid',
    'dataProvider' => $dataProvider,
    'columns' => $columns,
//     'template'=>'{items}',    
//    'enablePagination' => false,
//    'summaryText' => '',
//        'filter' => $filtersForm,
));
?>

<?php
$totalrows = 1;
if (isset($this->rows['data'])) {
    $totalrows = sizeof($this->rows['data']);
} else {
    if (isset($this->rows['rows'])) {
        $totalrows = $this->rows['rows'];
    }
}


echo "<br/>";
//echo $this->id;
echo "<br/>";
?>

<script>
    
    var sum = 0;
    for(i=0; i< 10; i++){
//        sum += parseFloat($('#details-inputgrid\\['+i+'\\]\\[amount\\]').val());
        sum += parseFloat($('#[name^="details-inputgrid\\[0\\]\\[amount\\]"]').val());
    }
//    alert(sum);    
    
    jQuery(document).ready(function($) { 
        refresh();
    });
    
    function refresh(){
    <?php
//            for ($i = 0; $i < $totalrows; $i++) {
                foreach ($this->columns as $column) {
                    if (isset($column['summary'])) {
                          if($column['type'] == 'textField' || $column['type'] == 'hiddenField'){
                              $script = "
                                    var sum = 0;
                                    for(i=0; i< $totalrows; i++){
                                        sum += parseFloat($('#[name^=\"$this->id\\\\['+i+'\\\\]\\\\[".$column['name']."\\\\]\"]').val());
                                    }
                                    $('#$this->id\\\\[summary\\\\]\\\\[".$column['name']."\\\\]').html(sum);
                                //alert(sum);
                                  ";
                              echo $script . "\n"; 
//                             "$('#$this->id\\\\[$i\\\\]\\\\[".$column['name']."\\\\]').html()";
//                        $summaryColumns[$column['name']] = $column;
                    }
                }
                }
//            }
//            if(sizeof($summaryColumns) > 0){
//                foreach($summaryColumns as $name=>$column){               
//                    for ($i = 0; $i < $totalrows; $i++) {
//                        if($column)
//                    "($('#$this->id\\\\[$i\\\\]\\\\[$name\\\\]').html()";
//
//                    }
//                }            
//            }  
    ?>
        
        
        
        for(i=0; i<<?php echo $totalrows; ?>; i++){
//            alert($('#[name^="<?php echo $this->id; ?>\\[' +i+'\\]\\[amount\\]"]').val());
        }
//        $("#details-inputgrid\\[1\\]\\[balance\\]").html($('#[name^="details-inputgrid\\[1\\]\\[amount\\]"]').val()-$('#[name^="details-inputgrid\\[1\\]\\[discount\\]"]').val());

        <?php        
            foreach ($this->columns as $column) {
                if (isset($column['expression'])) {
                    for($i=0; $i<$totalrows; $i++){
                        $operand = array();
                        $stack = preg_split('/ *([+\-\/*]) */',$column['expression'],-1);
                        foreach ($stack as $ele){
                            $eletype = 'text';
                            foreach ($this->columns as $column) {
                                if($column['name'] == $ele){
                                    $eletype = $column['type'];
                                }
                            }
                            if($eletype == 'text'){
                                $operand[$ele] = "parseFloat($('#$this->id\\\\[$i\\\\]\\\\[$ele\\\\]').html())";
                            }
                            else{
                                $operand[$ele] = "parseFloat($('#[name^=\"$this->id\\\\[$i\\\\]\\\\[$ele\\\\]\"]').val())";
                            }
//                            $operand[$ele] = "$('#[name^=\"$this->id\\[$i\\]\\[$ele\\]\"]').val()";
                        }
//                        foreach($operand as $id=>$op){
//                            syslog(LOG_WARNING, '$operand[$ele]... ' . $id . '  ' . $operand[$ele]);
//                            
//                        }
                        $stack = preg_split('/ *([+\-\/*]) */',$column['expression'],-1,PREG_SPLIT_DELIM_CAPTURE);
                        $exp = '';
                        foreach ($stack as $ele){
                            if(isset($operand[$ele])){
                                $ele = $operand[$ele];
                            }
                            $exp .= $ele;
                        }                
//                        syslog(LOG_WARNING, 'exp1... ' . $exp . ' ' . $column['expression']);
                        $expField = "$('#[name^=\"$this->id\\[$i\\]\\[".$column['name']."\\]\"]').val($exp)";
                        echo "$expField;";
                        $expSpan = "$(\"#$this->id\\\\[$i\\\\]\\\\[".$column['name']."\\\\]\").html($exp)";
                        echo "$expSpan;";
                        syslog(LOG_WARNING, 'expfields... ' . $expSpan);
        //                echo "alert('$this->expression');";
                    }
                }
            }        
        ?>
        <?php
//            if(isset($this->expression) && strlen($this->expression) > 0){
//                for($i=0; $totalrows; $i++){
//                    $operand = array();
//                    $stack = preg_split('/ *([+\-\/*]) */',$this->expression,-1);
//                    foreach ($stack as $ele){                    
//                        $operand[$ele] = "$('#[name^=\"$this->id\\[' +i+'\\]\\[$ele\\]\"]').val()";
//                    }
//
//                    $stack = preg_split('/ *([+\-\/*]) */',$math,-1,PREG_SPLIT_DELIM_CAPTURE);
//                    $exp = '';
//                    foreach ($stack as $ele){
//                        if(isset($operand[$ele])){
//                            $ele = $operand[$ele];
//                        }
//                        $exp += $ele;
//                    }                
//                    echo "$exp;";
//    //                echo "alert('$this->expression');";
//                }
//            }
        ?>
        
        
        var fields = $("#[name^=<?php echo $this->id; ?>]").serializeArray();
        

//        var balance = 0;
//        $('#[name^="<?php echo $this->id; ?>"]').each(function(i){
//            alert($(this).attr('name'));
//        });


//        $('#[name$="\\[amount\\]"]').each(function(i){
////            alert(i + " " + $(this).val() );
////            alert(field.name + ' ' + field.value + ' ' + i);
////            $("#results").append(field.value + " ");
//        });
        
        
        $("#<?php echo $this->id; ?>").val(JSON.stringify(fields));
    }
</script>
<div class="validity-summary-container">
    <ul></ul>
</div>


<script>
    //validation from jquery.validity
//    $(function() { 
//        $.validity.setup({ outputMode:"summary" });        
//        $("#" + $('#<?php echo $this->id; ?>').get(0).form.id).validity(function() {
//            $("input[name='details-inputgrid\\[0\\]\\[amount\\]']")
//            .require()
//            .match("number")
//            .greaterThanOrEqualTo(0);            
//        });
//    });
//    
</script>