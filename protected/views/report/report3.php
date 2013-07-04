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
    $oldpropertytax_summary = 0;
    $oldservicetax_summary = 0;
    $oldminsamekittax_summary = 0;
    //$oldsamekittax_summary = 0;
    //$oldwaterpttax_summary = 0;
    $oldeducess_summary = 0;
    $oldsubcess1_summary = 0;
    $oldsubcess2_summary = 0;
    $oldpttaxdiscount_summary = 0;
    $oldpttaxsurcharge_summary = 0;
    $grandold_summary = 0;
    
    $propertytax_summary = 0;
    $servicetax_summary = 0;
    $minsamekittax_summary = 0;
    //$samekittax_summary = 0;
    //$waterpttax_summary = 0;
    $educess_summary = 0;
    $subcess1_summary = 0;
    $subcess2_summary = 0;
    $pttaxdiscount_summary = 0;
    $pttaxsurcharge_summary = 0;
    $grandcurrent_summary = 0;
    $grand_summary = 0;
?>

<h1 style="padding: 0; margin: 0; "><?php echo Yii::t('application', 'Bill Report Title') ?></h1>
<p style="padding: 0; margin: 0; font-weight: bold; text-align: center;"><?php echo Yii::t('application', 'Propertytax Register') ?>&nbsp;<?php echo Yii::t('application', 'Idccfyear') ?>: <?php echo Yii::app()->session['ccfyear']->fyear; ?> - <?php echo Yii::t("application", "Only Propertytax") ?></p>
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

       
        <th colspan="6" style="text-align: center;">
            <?php echo Yii::t('application', 'Old'); ?>
        </th>        
        <th colspan="6"style="text-align: center;">
            <?php echo Yii::t('application', 'New'); ?>
        </th>        
        
        <th rowspan="2" style="text-align: center;" width="5%">
            <?php echo Yii::t('application', 'Final Balance'); ?>                        
        </th>
    </tr>
    <tr style="background-color: lightgrey;">
        <th style="" width="4%">
            <?php echo Yii::t('application', 'Grand Propertytax'); ?>
        </th>
        <th style="" width="4%">
            <?php echo Yii::t('application', 'Minsamekittax'); ?>                        
        </th>
        <!-- <th style="" width="4%">
            <?php //echo Yii::t('application', 'Samekittax'); ?>                        
        </th> -->
        <!-- <th style="" width="4%">
            <?php //echo Yii::t('application', 'Waterpttax'); ?>                        
        </th> -->
        <th style="" width="4%">
            <?php echo Yii::t('application', 'Educess'); ?>                        
        </th>
        <th style="" width="4%">
            <?php echo Yii::t('application', 'Subcess1'); ?>                        
        </th>
        <th style="" width="4%">
            <?php echo Yii::t('application', 'Subcess2'); ?>                        
        </th>    
        <th style="" width="4%">
            <?php echo Yii::t('application', 'Total Balance'); ?>                        
        </th>    
        
        <th style="" width="4%">
            <?php echo Yii::t('application', 'Grand Propertytax'); ?>
        </th>
        <th style="" width="4%">
            <?php echo Yii::t('application', 'Minsamekittax'); ?>                        
        </th>
        <!-- <th style="" width="4%">
            <?php //echo Yii::t('application', 'Samekittax'); ?>                        
        </th> -->
        <!-- <th style="" width="4%">
            <?php //echo Yii::t('application', 'Waterpttax'); ?>                        
        </th> -->
        <th style="" width="4%">
            <?php echo Yii::t('application', 'Educess'); ?>                        
        </th>
        <th style="" width="4%">
            <?php echo Yii::t('application', 'Subcess1'); ?>                        
        </th>
        <th style="" width="4%">
            <?php echo Yii::t('application', 'Subcess2'); ?>                        
        </th>                
        <th style="" width="4%">
            <?php echo Yii::t('application', 'Total Balance'); ?>                        
        </th>            
    </tr>
    <?php foreach($demandsdetails as $demandsdetail) : ?>
    <?php
        if($demandsdetail['demand']['data'][0][1] <= 0 && $demandsdetail['demand']['data'][0][2] <= 0){
            continue;
        }
    
//        $grandprevioustotal = $demandsdetail['demand']['data'][0][1] + $demandsdetail['demand']['data'][1][1] + $demandsdetail['demand']['data'][2][1] + $demandsdetail['demand']['data'][9][1] + $demandsdetail['demand']['data'][3][1] + $demandsdetail['demand']['data'][4][1] + $demandsdetail['demand']['data'][5][1];
//        $grandcurrenttotal = $demandsdetail['demand']['data'][0][2] + $demandsdetail['demand']['data'][1][2] + $demandsdetail['demand']['data'][2][2] + $demandsdetail['demand']['data'][9][2] + $demandsdetail['demand']['data'][3][2] + $demandsdetail['demand']['data'][4][2] + $demandsdetail['demand']['data'][5][2];
        $grandprevioustotal = $demandsdetail['demand']['data'][0][1] + $demandsdetail['demand']['data'][1][1] + $demandsdetail['demand']['data'][3][1] + $demandsdetail['demand']['data'][4][1] + $demandsdetail['demand']['data'][5][1];
        $grandcurrenttotal = $demandsdetail['demand']['data'][0][2] + $demandsdetail['demand']['data'][1][2] + $demandsdetail['demand']['data'][3][2] + $demandsdetail['demand']['data'][4][2] + $demandsdetail['demand']['data'][5][2];
        $grandtotal = $grandprevioustotal + $grandcurrenttotal;
        
        $oldpropertytax_summary += $demandsdetail['demand']['data'][0][1];
        $oldservicetax_summary += $demandsdetail['demand']['data'][8][1];
        $oldminsamekittax_summary += $demandsdetail['demand']['data'][1][1];
        //$oldsamekittax_summary += $demandsdetail['demand']['data'][2][1];
        //$oldwaterpttax_summary += $demandsdetail['demand']['data'][9][1];
        $oldeducess_summary += $demandsdetail['demand']['data'][3][1];
        $oldsubcess1_summary += $demandsdetail['demand']['data'][4][1];
        $oldsubcess2_summary += $demandsdetail['demand']['data'][5][1];
        $oldpttaxdiscount_summary += $demandsdetail['demand']['data'][6][1];
        $oldpttaxsurcharge_summary += $demandsdetail['demand']['data'][7][1];
        $grandold_summary += $grandprevioustotal;
        
        $propertytax_summary += $demandsdetail['demand']['data'][0][2];
        $servicetax_summary += $demandsdetail['demand']['data'][8][2];
        $minsamekittax_summary += $demandsdetail['demand']['data'][1][2];
        //$samekittax_summary += $demandsdetail['demand']['data'][2][2];
        //$waterpttax_summary += $demandsdetail['demand']['data'][9][2];
        $educess_summary += $demandsdetail['demand']['data'][3][2];
        $subcess1_summary += $demandsdetail['demand']['data'][4][2];
        $subcess2_summary += $demandsdetail['demand']['data'][5][2];
        $pttaxdiscount_summary += $demandsdetail['demand']['data'][6][2];
        $pttaxsurcharge_summary += $demandsdetail['demand']['data'][7][2];
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
                echo $demandsdetail['demand']['data'][0][1];
            ?>
        </td>
        <td class="amount">
            <?php
                echo $demandsdetail['demand']['data'][1][1];
            ?>
        </td>
        <!-- <td class="amount">
            <?php
                //echo $demandsdetail['demand']['data'][2][1];
            ?>
        </td> -->
        <!-- <td class="amount">
            <?php
                //echo $demandsdetail['demand']['data'][9][1];
            ?>
        </td> -->
        <td class="amount">
            <?php
                echo $demandsdetail['demand']['data'][3][1];
            ?>
        </td>
        <td class="amount">
            <?php
                echo $demandsdetail['demand']['data'][4][1];
            ?>
        </td>
        <td class="amount">
            <?php
                echo $demandsdetail['demand']['data'][5][1];
            ?>
        </td>
        <td class="amount highlight">
            <?php
                echo $grandprevioustotal;
            ?>
        </td>

        
        <td class="amount">
            <?php
                echo $demandsdetail['demand']['data'][0][2];
            ?>
        </td>
        <td class="amount">
            <?php
                echo $demandsdetail['demand']['data'][1][2];
            ?>
        </td>
        <!-- <td class="amount">
            <?php
                //echo $demandsdetail['demand']['data'][2][2];
            ?>
        </td> -->
        <!-- <td class="amount">
            <?php
                //echo $demandsdetail['demand']['data'][9][2];
            ?>
        </td> -->
        <td class="amount">
            <?php
                echo $demandsdetail['demand']['data'][3][2];
            ?>
        </td>
        <td class="amount">
            <?php
                echo $demandsdetail['demand']['data'][4][2];
            ?>
        </td>
        <td class="amount">
            <?php
                echo $demandsdetail['demand']['data'][5][2];
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
        <td class="amount highlight"><?php echo $oldpropertytax_summary; ?></td>    
        <td class="amount highlight"><?php echo $oldminsamekittax_summary; ?></td>
        <!-- <td class="amount highlight"><?php //echo $oldsamekittax_summary; ?></td> -->
        <!-- <td class="amount highlight"><?php //echo $oldwaterpttax_summary; ?></td> -->
        <td class="amount highlight"><?php echo $oldeducess_summary; ?></td>
        <td class="amount highlight"><?php echo $oldsubcess1_summary; ?></td>
        <td class="amount highlight"><?php echo $oldsubcess2_summary; ?></td>
        <td class="amount highlight"><?php echo $grandold_summary; ?></td>       
        
        <td class="amount highlight"><?php echo $propertytax_summary; ?></td>
        <td class="amount highlight"><?php echo $minsamekittax_summary; ?></td>
        <!-- <td class="amount highlight"><?php //echo $samekittax_summary; ?></td> -->
        <!-- <td class="amount highlight"><?php //echo $waterpttax_summary; ?></td> -->
        <td class="amount highlight"><?php echo $educess_summary; ?></td>
        <td class="amount highlight"><?php echo $subcess1_summary; ?></td>
        <td class="amount highlight"><?php echo $subcess2_summary; ?></td>
        <td class="amount highlight"><?php echo $grandcurrent_summary; ?></td>       
        <td class="amount highlight"><?php echo $grand_summary; ?></td>       
    </tr>
</table>
