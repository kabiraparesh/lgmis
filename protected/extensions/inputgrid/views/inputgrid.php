<style>
    .summary{
        font-weight: bolder;
        font-size: 100%;
    }
</style>

<?php
$this->widget('ext.eziiui.widgets.grid.CGridViewUI', array(
    'id' => $this->id . '-inputgrid',
    'dataProvider' => $dataProvider,
    'columns' => $columns,
    'template'=>'{items}',    
    'htmlOptions' => $this->htmlOptions,
    'hideHeader' => $this->hideHeader,
    
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


//echo "<br/>";
//echo "<br/>";
?>
<script>
    
    function refresh(){
        
        <?php        
            foreach ($this->columns as $column) {                
                if (isset($column['expression'])) {
                    $script = "";
                    $operands = preg_split('/ *([+\-\/*]) */',$column['expression'],-1);
                    $stack = preg_split('/ *([+\-\/*]) */',$column['expression'],-1,PREG_SPLIT_DELIM_CAPTURE);
                    $expScriptArray = json_encode($stack);
                    $script .= "var myarr = $expScriptArray;\n for(i=0; i<myarr.length; i++){\n";
                    $script .= "}\n";
                    
                    foreach ($stack as $ele){
                        
                    }
                    $script .= "var total = 0;\n";
                    $script .= "for(i=0; i<$totalrows; i++){\n";
                    $script .= "total += 0;\n";
                    $script .= "}\n";
                    
                    for($i=0; $i<$totalrows; $i++){
                        
                    }
                    echo $script . "\n";
                }
            }
                    
//                    for($i=0; $i<$totalrows; $i++){
//                        $operand = array();
//                        $stack = preg_split('/ *([+\-\/*]) */',$column['expression'],-1);
//                        foreach ($stack as $ele){
//                            $eletype = 'text';
//                            foreach ($this->columns as $column) {
//                                if($column['name'] == $ele){
//                                    $eletype = $column['type'];
//                                }
//                            }
//                            if($eletype == 'text'){
//                                $operand[$ele] = "parseFloat($('#$this->id\\\\[$i\\\\]\\\\[$ele\\\\]').html())\n";
//                            }
//                            else{
//                                $operand[$ele] = "parseFloat($('#[name^=\"$this->id\\\\[$i\\\\]\\\\[$ele\\\\]\"]').val())\n";
//                            }
//                        }
//                        $stack = preg_split('/ *([+\-\/*]) */',$column['expression'],-1,PREG_SPLIT_DELIM_CAPTURE);
//                        $exp = '';
//                        foreach ($stack as $ele){
//                            if(isset($operand[$ele])){
//                                $ele = $operand[$ele];
//                            }
//                            $exp .= $ele;
//                        }                
////                        syslog(LOG_WARNING, 'exp1... ' . $exp . ' ' . $column['expression']);
//                        $expField = "$('#[name^=\"$this->id\\[$i\\]\\[".$column['name']."\\]\"]').val($exp)";
//                        echo "$expField;";
//                        $expSpan = "$(\"#$this->id\\\\[$i\\\\]\\\\[".$column['name']."\\\\]\").html($exp)";
//                        echo "$expSpan;";
//                        syslog(LOG_WARNING, 'expfields... ' . $expSpan);
//                    }
//                }
//            }        
        ?>
        
        
        
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
                                $operand[$ele] = "parseFloat($('#$this->id\\\\[$i\\\\]\\\\[$ele\\\\]').html())\n";
                            }
                            else{
                                $operand[$ele] = "parseFloat($('#[name^=\"$this->id\\\\[$i\\\\]\\\\[$ele\\\\]\"]').val())\n";
                            }
                        }
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
                    }
                }
            }        
        ?>


    <?php
                foreach ($this->columns as $column) {
                    if (isset($column['summary'])) {
                          if($column['type'] == 'textField' || $column['type'] == 'hiddenField'){
                              $script = "
                                    var sum = 0;
                                    for(i=0; i< $totalrows; i++){
                                        sum += parseFloat($('#[name^=\"$this->id\\\\['+i+'\\\\]\\\\[".$column['name']."\\\\]\"]').val());
                                    }
                                    $('#$this->id\\\\[summary\\\\]\\\\[".$column['name']."\\\\]').html(sum);
                                  ";
                              echo $script . "\n"; 
                    }
                }
                }
    ?>

        var fields = $("#[name^=<?php echo $this->id; ?>]").serializeArray();
        $("#<?php echo $this->id; ?>").val(JSON.stringify(fields));
    }
</script>

<script>
    jQuery(document).ready(function($) { 
        refresh();
    });    
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