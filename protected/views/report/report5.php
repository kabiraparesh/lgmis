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
    $propertytax_accounts_summary = 0;
    $minsamekittax_accounts_summary = 0;
    $propertytax_demand_summary = 0;
    $propertytax_outstanding_summary = 0;
    $minsamekittax_demand_summary = 0;
    $minsamekittax_outstanding_summary = 0;
    $total_summary = 0;
?>

<h1 style="padding: 0; margin: 0; "><?php echo Yii::t('application', 'Bill Report Title') ?></h1>
<p style="padding: 0; margin: 0; font-weight: bold; text-align: center;"><?php echo Yii::t('application', 'Wardwise Total Demand') ?>&nbsp;<?php echo Yii::t('application', 'Idccfyear') ?>: <?php echo Yii::app()->session['ccfyear']->fyear; ?></p>
<br/>
<table border="1" cellspacing="0" cellpading="0" width="100%">
    <tr style="background-color: lightgrey;">
        <th class="amount" width="5%">
            <?php echo Yii::t('application', 'S.No.'); ?>
        </th>
        <th class="amount" width="5%">
            <?php echo Yii::t('application', 'Idccward'); ?>
        </th>
        
        <th class="amount" width="18%">
            <?php echo Yii::t('application', 'propertytax_accounts'); ?>
        </th>
        <th class="amount" width="18%">
            <?php echo Yii::t('application', 'propertytax_demand'); ?>
        </th>
        <th class="amount" width="18%">
            <?php echo Yii::t('application', 'minsamekittax_accounts'); ?>
        </th>
        <th class="amount" width="18%">
            <?php echo Yii::t('application', 'minsamekittax_demand'); ?>
        </th>
        <th class="amount" width="18%">
            <?php echo Yii::t('application', 'Total Demand'); ?>
        </th>
    </tr>
    <?php foreach($wards as $key=>$ward): ?>
    <?php
        $propertytax_demand_summary += $ward['propertytax_demand'];
        $propertytax_outstanding_summary += $ward['propertytax_outstanding'];
        $minsamekittax_demand_summary += $ward['minsamekittax_demand'];
        $minsamekittax_outstanding_summary += $ward['minsamekittax_outstanding'];
        
        $propertytax_accounts_summary += $ward['propertytax_accounts'];
        $minsamekittax_accounts_summary += $ward['minsamekittax_accounts'];
        
        $total_summary += $ward['total'];
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
            <?php echo $ward['propertytax_demand']; ?>
        </td>
        <td class="amount">
            <?php echo $ward['minsamekittax_accounts']; ?>
        </td>
        <td class="amount">
            <?php echo $ward['minsamekittax_demand']; ?>
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
            <?php echo $propertytax_accounts_summary; ?>
        </td>
        <td class="amount highlight">
            <?php echo $propertytax_demand_summary; ?>
        </td>
        <td class="amount highlight">
            <?php echo $minsamekittax_accounts_summary; ?>
        </td>
        <td class="amount highlight">
            <?php echo $minsamekittax_demand_summary; ?>
        </td>
        <td class="amount highlight">
            <?php echo $total_summary; ?>
        </td>
    </tr>
</table>
