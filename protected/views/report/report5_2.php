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
        padding-right: 5px;
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
//     $propertytax_demand_summary = 0;
//     $propertytax_outstanding_summary = 0;
//     $minsamekittax_demand_summary = 0;
//     $minsamekittax_outstanding_summary = 0;
    $total_summary = 0;
?>

<h1 style="padding: 0; margin: 0; "><?php echo Yii::t('application', 'Bill Report Title') ?></h1>
<p style="padding: 0; margin: 0; font-weight: bold; text-align: center;"><?php echo Yii::t('application', 'Wardwise Total Demand') ?>&nbsp;<?php echo Yii::t('application', 'Idccfyear') ?>: <?php echo Yii::app()->session['ccfyear']->fyear; ?></p>
<br/>
<table border="1" cellspacing="0" cellpading="0" width="100%">
    <tr style="background-color: lightgrey;">
        <th class="amount" width="6%">
            <?php echo Yii::t('application', 'S.No.'); ?>
        </th>
        <th class="amount" width="6%">
            <?php echo Yii::t('application', 'Idccward'); ?>
        </th>
        
        <th class="amount" width="11%">
            <?php echo Yii::t('application', 'propertytax_accounts'); ?>
        </th>
        <th class="amount" width="11%">
            <?php echo Yii::t('application', 'Propertytax'); ?>
        </th>
        <th class="amount" width="11%">
            <?php echo Yii::t('application', 'minsamekittax_accounts'); ?>
        </th>
        <th class="amount" width="11%">
            <?php echo Yii::t('application', 'Samekittax'); ?>
        </th>
        <th class="amount" width="11%">
            <?php echo Yii::t('application', 'Educess'); ?>
        </th>
        <th class="amount" width="11%">
            <?php echo Yii::t('application', 'Subcess1'); ?>
        </th>
        <th class="amount" width="11%">
            <?php echo Yii::t('application', 'Subcess2'); ?>
        </th>
        <th class="amount" width="11%">
            <?php echo Yii::t('application', 'Total Balance'); ?>
        </th>
    </tr>
    <?php foreach($wards as $key=>$ward): ?>
    <?php
//         $propertytax_demand_summary += $ward['propertytax_demand'];
//         $propertytax_outstanding_summary += $ward['propertytax_outstanding'];
//         $minsamekittax_demand_summary += $ward['minsamekittax_demand'];
//         $minsamekittax_outstanding_summary += $ward['minsamekittax_outstanding'];
//         $total_summary += $ward['total'];
    ?>
    <tr>
        <td class="amount" style="text-align: center;">
            <?php
                echo ($key + 1) . '.';
            ?>
        </td>
        <td class="amount" style="text-align: center;">
            <?php
                echo $ward['idccward'];
            ?>
        </td>
        
        <td class="amount">
            <?php echo $ward['propertytax_accounts']; ?>
        </td>
        <td class="amount">
            <?php echo $ward['totalPropertytax']; ?>
        </td>
        <td class="amount">
            <?php echo $ward['minsamekittax_accounts']; ?>
        </td>
        <td class="amount">
            <?php echo ($ward['totalMinsamekittax'] + $ward['totalSamekittax']); ?>
        </td>
        <td class="amount">
            <?php echo $ward['totalEducess']; ?>
        </td>
        <td class="amount">
            <?php echo $ward['totalSubcess1']; ?>
        </td>
        <td class="amount">
            <?php echo $ward['totalSubcess2']; ?>
        </td>
        <td class="amount highlight">
            <?php echo $ward['total']; ?>
        </td>
    </tr>
    <?php endforeach; ?>
    <tr>
        <td class="amount highlight">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>        
        <td class="amount highlight">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>        
        <td class="amount highlight">
            <?php echo $grand_propertytax_accounts; ?>
        </td>
        <td class="amount highlight">
            <?php echo $grandPropertytax; ?>
        </td>
        <td class="amount highlight">
            <?php echo $grand_minsamekittax_accounts; ?>
        </td>
        <td class="amount highlight">
            <?php echo ($grandMinsamekittax + $grandSamekittax); ?>
        </td>
        <td class="amount highlight">
            <?php echo $grandEducess; ?>
        </td>
        <td class="amount highlight">
            <?php echo $grandSubcess1; ?>
        </td>
        <td class="amount highlight">
            <?php echo $grandSubcess2; ?>
        </td>
        <td class="amount highlight">
            <?php echo $grandTotal; ?>
        </td>
    </tr>
</table>
