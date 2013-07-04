<meta charset="utf-8">

<style>

    table{
        font-size: 0.85em;
    }
    tr{
    }
    h1, h2{
        text-align: center;
        margin: 0px;
        padding: 0px;
    }
    td{
        padding: 5px;
        padding-top: 0px;
        padding-bottom: 0px;
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
    ul{
        padding-left: 5xp;
        margin-left: 5xp;
    }
    hr {
        page-break-after: always;
    }    
</style>

<h1><?php echo LgmisWMModule::t('Bill Report Title') ?></h1>
<h2 style="text-align: center"><?php echo LgmisWMModule::t('Bill Report Subtitle1') ?></h2>
<p style="text-align: center; margin: 0;"><?php echo LgmisWMModule::t('Bill Report Subtitle2') ?></p>
<p style="text-align: center; margin: 0;"><?php echo LgmisWMModule::t('Bill Report Subtitle3') ?></p>
<table border="1" cellspacing="0" cellpading="0" width="100%">
    <tr>
        <td style="width: 17%;" class="title">
            <?php echo LgmisWMModule::t('Saralno') ?>
        </td>
        <td style="width: 16%;">            
            <?php echo $wmmaster->saralno; ?>
        </td>
        <td style="width: 17%;" class="title">            
            <?php echo LgmisWMModule::t('Account No. (Computer)') ?>
        </td>
        <td style="width: 16%;">            
            <?php echo Wmhelper::encodePkey($wmmaster); ?>
        </td>
        <td style="width: 17%;" class="title">            
            <?php echo LgmisWMModule::t('Ward No.') ?>
        </td>
        <td style="width: 16%;">            
            <?php echo $wmmaster->idcccolony0->idccward; ?>
        </td>
    </tr>
    <tr>
        <td style="width: 17%;" class="title">            
            <?php echo LgmisWMModule::t('Ownername') ?>
        </td>
        <td style="width: 16%;">
            <?php echo $wmmaster->ownername; ?>
        </td>
        <td style="width: 17%;" class="title">            
            <?php echo LgmisWMModule::t('Fathername') ?>
        </td>
        <td style="width: 16%;">
            <?php echo $wmmaster->fathername; ?>&nbsp;
        </td>
        <td style="width: 17%;" class="title">            
            <?php echo LgmisWMModule::t('Address') ?>
        </td>
        <td style="width: 16%;" class="">            
            <?php echo $wmmaster->address; ?>&nbsp;
        </td>
        </tr>
    <tr>
        <td style="width: 17%;" class="title">            
            <?php echo LgmisWMModule::t('Tax Type') ?>
        </td>
        <td style="width: 16%;" class="">            
            <?php echo LgmisWMModule::t('Water Tax'); ?>
        </td>
        <td style="width: 17%;" class="title">            
            <?php echo LgmisWMModule::t('Demand Date') ?>
        </td>
        <td style="width: 16%;" class="">            
            <?php echo Yii::app()->dateFormatter->format('dd/MMM/yyyy',$wmdemand->wmdemanddate); ?>
        </td>
        <td style="width: 17%;" class="title">            
            <?php echo LgmisWMModule::t('Period') ?>
        </td>
        <td style="width: 16%;" class="">            
            <?php //echo date("F", mktime(0, 0, 0, $period, 10)); ?>&nbsp;
             <?php echo date("F", mktime(0, 0, 0, $period+3, 10)); ?>&nbsp;
        </td>
        </tr>
</table>
<br/>

<table border="1" cellspacing="0" cellpading="0" width="100%">
    <tr style="background-color: lightgrey;">
        <th style="width: 3%;text-align: center;">
            <?php echo LgmisWMModule::t('S.No.'); ?>
        </th>
        <th style="width: 25%;">
            <?php echo LgmisWMModule::t('Particulars'); ?>
        </th>
        <th style="width: 8%;">
            <?php echo LgmisWMModule::t('Previous Balance'); ?>            
        </th>
        <th style="width: 8%;">
            <?php echo LgmisWMModule::t('Previous Deposite'); ?>            
        </th>
        <th style="width: 8%;">
            <?php echo LgmisWMModule::t('Previous Discount'); ?>                        
        </th>
        <th style="width: 8%;">
            <?php echo LgmisWMModule::t('Previous Total'); ?>            
        </th>
        <th style="width: 8%;">
            <?php echo LgmisWMModule::t('Current Balance'); ?>            
        </th>        
        <th style="width: 8%;">
            <?php echo LgmisWMModule::t('Current Deposite'); ?>            
        </th>
        <th style="width: 8%;">
            <?php echo LgmisWMModule::t('Current Discount'); ?>            
        </th>
        <th style="width: 8%;">
            <?php echo LgmisWMModule::t('Current Total'); ?>            
        </th>
        <th style="width: 8%;">
            <?php echo LgmisWMModule::t('Balance'); ?>            
        </th>
    </tr>
    <?php $grandtotal = 0;
    $i = 1; ?>
    <?php foreach ($data as $row): ?>
        <tr>
            <td style="text-align: center;">
                <?php echo $i++ . '.'; ?>
            </td>
            <td>
                <?php echo $row[0]; ?>
            </td>
            <td style="text-align: right;">
                <?php echo $row[1]; ?>
            </td>
            <td style="text-align: right;">
                <?php echo $row[2]; ?>
            </td>
            <td style="text-align: right;">
                <?php echo $row[3]; ?>
            </td>
            <td style="text-align: right;">
                <?php echo $row[1] - $row[2] - $row[3] ?>
            </td>
            <td style="text-align: right;">
                <?php echo $row[4] ?>
            </td>
            <td style="text-align: right;">
                <?php echo $row[5] ?>
            </td>            
            <td style="text-align: right;">
                <?php echo $row[6] ?>
            </td>            
            <td style="text-align: right;">
                <?php echo $row[4] - $row[5] - $row[6] ?>
            </td>
            <td style="text-align: right;">
                <?php echo ($row[1] - $row[2] - $row[3]) + ($row[4] - $row[5] - $row[6]);
                $grandtotal += (($row[1] - $row[2] - $row[3]) + ($row[4] - $row[5] - $row[6])); ?>
            </td>
        </tr>
<?php endforeach; ?>
    <tr style="background-color: lightgrey;">
        <td colspan="10" style="text-align: right;font-weight: bolder;font-size: 120%;">
<?php echo LgmisWMModule::t('Total Balance for Deposite'); ?>
        </td>
        <td style="text-align: right;font-weight: bolder;font-size: 120%;">
<?php echo $grandtotal; ?>
        </td>
    </tr>
</table>
<br/>
<span style="float:right"><?php echo LgmisWMModule::t("Bill Report Bottom1"); ?></span>
<br/>
<?php echo LgmisWMModule::t("Bill Report Bottom2"); ?>
<hr/>