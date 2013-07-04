<meta charset="utf-8">

<style>
    h1{
        text-align: center;
    }
    td{
        padding: 5px;
    }
    td.title{
        font-weight: bold;
    }
    td.amount{
        text-align: right;
        padding-right: 15px;
    }
    td.finalamount{
        font-weight: bold;
        text-decoration: underline;
    }
</style>

<?php

    function encodePkey($idcczone = '', $idccward = '', $idptmaster = ''){
        return sprintf("%02s%02s%05s", $idcczone, $idccward, $idptmaster);
    }   

?>

<h1><?php echo Yii::t('application', 'Bill Report Title') ?></h1>
<h2 style="text-align: center"><?php echo Yii::t('application', 'Wardwise Demand Report Subtitle1 Detailed'); ?></h2>
<h2 style="text-align: center"><?php echo Yii::t('application', 'Wardwise Demand Report Subtitle2') . $wardno; ?></h2>
<br/>
<table border="1" cellspacing="0" cellpading="0" width="100%">
    <tr>
        <td style="width: 50%;">
            &nbsp;
        </td>
        <td style="width: 50%;text-align: right;" class="title">
            <?php echo Yii::t('application', 'Idccfyear') ?>: <?php echo Yii::app()->session['ccfyear']->fyear; ?>
        </td>
    </tr>
</table>
<br/><br/>
<table border="1" cellspacing="0" cellpading="0" width="100%">
    <tr style="background-color: lightgrey;">
        <th style="width: 10%;text-align: center;">
            <?php echo Yii::t('application', 'Idptmaster'); ?>
        </th>
        <th style="width: 8%;">
            <?php echo Yii::t('application', 'Caseno'); ?>
        </th>
        <th style="width: 10%;">
            <?php echo Yii::t('application', 'Ownername'); ?>
        </th>
        <th style="width: 15%;">
            <?php echo Yii::t('application', 'Fathername'); ?>            
        </th>
        <th style="width: 15%;">
            <?php echo Yii::t('application', 'Propertyaddress'); ?>            
        </th>
        
        <th style="width: 6%;">
            <?php echo Yii::t('application', 'Grand Propertytax'); ?>
        </th>
        <th style="width: 6%;">
            <?php echo Yii::t('application', 'Minsamekittax'); ?>                        
        </th>
        <!-- <th style="width: 6%;">
            <?php //echo Yii::t('application', 'Samekittax'); ?>                        
        </th> -->
        <!-- <th style="width: 6%;">
            <?php //echo Yii::t('application', 'Waterpttax'); ?>                        
        </th> -->
        <th style="width: 6%;">
            <?php echo Yii::t('application', 'Educess'); ?>                        
        </th>
        <th style="width: 6%;">
            <?php echo Yii::t('application', 'Subcess1'); ?>                        
        </th>
        <th style="width: 6%;">
            <?php echo Yii::t('application', 'Subcess2'); ?>                        
        </th>        
        
        <th style="width: 6%;">
            <?php echo Yii::t('application', 'Total Demand'); ?>                        
        </th>
<!--        <th style="width: 6%;">
            <?php echo Yii::t('application', 'Previous Balance'); ?>            
        </th>
        <th style="width: 6%;">
            <?php echo Yii::t('application', 'Balance'); ?>            
        </th>-->
    </tr>
    <?php 
        $grandpreviousdemand = 0;
        $grandtotaldemand = 0;
        $grandpreviousbalance = 0;    
        $grandtotal = 0;
    ?>
    <?php foreach($demandsdetails as $demandsdetail) : ?>
    <?php
        $finalpreviousdemand = 0;
        $finaltotaldemand = 0;
        $finalpreviousbalance = 0;
        foreach ($demandsdetail['demand']['data'] as $data) {
            $finalpreviousdemand += $data[1];
            $finaltotaldemand += $data[2];
            $finalpreviousbalance += $data[4];
            
        }
            $grandpreviousdemand += $finalpreviousdemand;
            $grandtotaldemand += $finaltotaldemand;
            $grandpreviousbalance += $finalpreviousbalance;
    ?>
    <tr>
        <td>
            <?php echo encodePkey($demandsdetail['ptmaster']->idccward0->idcczone, $demandsdetail['ptmaster']->idccward, $demandsdetail['ptmaster']->idptmaster); ?>&nbsp;
        </td>
        <td>
            <?php echo $demandsdetail['ptmaster']->caseno; ?>&nbsp;
            <?php echo '/'; ?>&nbsp;
            <?php echo $demandsdetail['ptmaster']->ledgerno; ?>&nbsp;
        </td>
        <td>
            <?php echo $demandsdetail['ptmaster']->ownername; ?>&nbsp;
        </td>
        <td>
            <?php echo $demandsdetail['ptmaster']->fathername; ?>&nbsp;
        </td>
        <td>
            <?php echo $demandsdetail['ptmaster']->propertyaddress; ?>&nbsp;
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
             //   echo $demandsdetail['demand']['data'][2][2];
            ?>
        </td> -->
        <!-- <td class="amount">
            <?php
               // echo $demandsdetail['demand']['data'][9][2];
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
        <td class="amount">
            <?php echo $finaltotaldemand; ?>
        </td>
<!--        <td class="amount">
            <?php echo $finalpreviousbalance; ?>            
        </td>
        <td class="amount">
            <?php echo $finalpreviousdemand + $finaltotaldemand - $finalpreviousbalance; ?>            
        </td>-->
    </tr>
    <?php endforeach; ?>
    <tr style="background-color: lightgrey;">
        <td colspan="10" style="text-align: right;font-weight: bolder;font-size: 120%;">
            <?php echo Yii::t('application', 'Wardwise Balance'); ?>
        </td>
<!--        <td class="amount" style="text-align: right;font-weight: bolder;font-size: 120%;">
            <?php echo $grandpreviousdemand; ?>
        </td>-->
        <td class="amount" style="text-align: right;font-weight: bolder;font-size: 120%;">
            <?php echo $grandtotaldemand; ?>
        </td>
<!--        <td class="amount" style="text-align: right;font-weight: bolder;font-size: 120%;">
            <?php echo $grandpreviousbalance; ?>
        </td>
        <td class="amount" style="text-align: right;font-weight: bolder;font-size: 120%;">
            <?php 
                $grandtotal += $grandpreviousdemand + $grandtotaldemand - $grandpreviousbalance;
                echo $grandtotal; 
            ?>
        </td>-->
    </tr>
</table>