<meta charset="utf-8">

<style>
    h1{
        text-align: center;
    }
    td, th{
/*        padding: 5px;*/
        font-size: 0.8em;
        vertical-align: top;
        margin: 5px;
    }
    td.title{
        font-weight: bold;
    }
    td.amount{
        text-align: right;
/*        padding-right: 5px;*/
        margin-right: 5px;
    }
    td.finalamount{
        font-weight: bold;
        text-decoration: underline;
    }
    .highlight{
        font-weight: bold;
        background: lightgray;
    }
</style>

<?php

    function encodePkey($idcczone = '', $idccward = '', $idptmaster = ''){
        return sprintf("%02s%02s%05s", $idcczone, $idccward, $idptmaster);
    }   
    
    $oldminsamekittax_summary = 0;
    $grandold_summary = 0;
    
    $minsamekittax_summary = 0;
    $grandcurrent_summary = 0;
    $grand_summary = 0;        

?>

<h1 style="padding: 0; margin: 0; "><?php echo Yii::t('application', 'Bill Report Title') ?></h1>
<p style="padding: 0; margin: 0; font-weight: bold; text-align: center;"><?php echo Yii::t('application', 'Propertytax Register') ?>&nbsp;<?php echo Yii::t('application', 'Idccfyear') ?>: <?php echo Yii::app()->session['ccfyear']->fyear; ?> - <?php echo Yii::t("application", "Only Minsamekittax") ?></p>
<br/>
<table border="1" cellspacing="0" cellpading="0" width="100%">
    <tr style="background-color: lightgrey;">
        <th rowspan="2" style="text-align: center;" width="5%">
            <?php echo Yii::t('application', 'Idptmaster'); ?>
        </th>
        <th rowspan="2" style="text-align: center;" width="5%">
            <?php echo Yii::t('application', 'Caseno'); ?>
        </th>
        <th rowspan="2" style="" width="5%">
            <?php echo Yii::t('application', 'Ownername'); ?>
        </th>
        <th rowspan="2" style="" width="5%">
            <?php echo Yii::t('application', 'Fathername'); ?>            
        </th>
        <th rowspan="2" style="" width="5%">
            <?php echo Yii::t('application', 'Cccolony'); ?>            
        </th>        

       
        <th colspan="2" style="text-align: center;">
            <?php echo Yii::t('application', 'Old'); ?>
        </th>        
        <th colspan="2"style="text-align: center;">
            <?php echo Yii::t('application', 'New'); ?>
        </th>        
        
        <th rowspan="2" style="text-align: center;" width="5%">
            <?php echo Yii::t('application', 'Final Balance'); ?>                        
        </th>
    </tr>
    <tr style="background-color: lightgrey;">
        <th style="" width="4%">
            <?php echo Yii::t('application', 'Minsamekittax'); ?>                        
        </th>
        <th style="" width="4%">
            <?php echo Yii::t('application', 'Total Balance'); ?>                        
        </th>            
        
        <th style="" width="4%">
            <?php echo Yii::t('application', 'Minsamekittax'); ?>                        
        </th>
        <th style="" width="4%">
            <?php echo Yii::t('application', 'Total Balance'); ?>                        
        </th>            
    </tr>
    <?php foreach($demandsdetails as $demandsdetail) : ?>
    <?php

    if($demandsdetail['demand']['data'][1][1] <= 0 && $demandsdetail['demand']['data'][1][2] <= 0){
        continue;
    }
    if($demandsdetail['demand']['data'][0][3] > 0 ){
        continue;
    }     
        $grandprevioustotal =  $demandsdetail['demand']['data'][1][1];
        $grandcurrenttotal = $demandsdetail['demand']['data'][1][2] ;
        $grandtotal = $grandprevioustotal + $grandcurrenttotal;
        
        $oldminsamekittax_summary += $grandprevioustotal;
        $grandold_summary += $grandprevioustotal;

        $minsamekittax_summary += $grandcurrenttotal;
        $grandcurrent_summary += $grandcurrenttotal;
        $grand_summary += $grandtotal;
    ?>
    <tr>
        <td width="4%">
            <?php echo encodePkey($demandsdetail['ptmaster']->idccward0->idcczone, $demandsdetail['ptmaster']->idccward, $demandsdetail['ptmaster']->idptmaster); ?>&nbsp;
        </td>
        <td width="4%">
            <?php echo $demandsdetail['ptmaster']->caseno; ?>&nbsp;
            <?php echo '/'; ?>&nbsp;
            <?php echo $demandsdetail['ptmaster']->ledgerno; ?>&nbsp;
        </td>
        <td width="4%">
            <?php echo $demandsdetail['ptmaster']->ownername; ?>&nbsp;
        </td>
        <td width="4%">
            <?php echo $demandsdetail['ptmaster']->fathername; ?>&nbsp;
        </td>
        <td width="4%">
            <?php echo $demandsdetail['ptmaster']->idcccolony0->colonyname; ?>&nbsp;
        </td>
        <td class="amount">
            <?php
                echo $demandsdetail['demand']['data'][1][1];
            ?>
        </td>
        <td class="amount highlight">
            <?php
                echo $grandprevioustotal;
            ?>
        </td>
        
        <td class="amount">
            <?php
                echo $demandsdetail['demand']['data'][1][2];
            ?>
        </td>
        <td class="amount highlight">
            <?php
                echo $grandcurrenttotal;
            ?>
        </td>
        <td class="amount highlight">
            <?php
                echo $grandtotal;
            ?>
        </td>
    </tr>
    <?php endforeach; ?>
    <tr>
        <td class="amount highlight">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>        
        <td class="amount highlight">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>        
        <td class="amount highlight">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>        
        <td class="amount highlight">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>        
        <td class="amount highlight">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>        
        <td class="amount highlight"><?php echo $oldminsamekittax_summary; ?></td>
        <td class="amount highlight"><?php echo $grandold_summary; ?></td>       
        
        <td class="amount highlight"><?php echo $minsamekittax_summary; ?></td>
        <td class="amount highlight"><?php echo $grandcurrent_summary; ?></td>       
        <td class="amount highlight"><?php echo $grand_summary; ?></td>       
    </tr>    
    
</table>