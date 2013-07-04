<meta charset="utf-8">

<style>
    h1, h2, h3{
        text-align: center;
        margin: 0px;
        padding: 0px;
    }
    h3 {
    	font-size: 13px;
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


<h1><?php echo LgmisWMModule::t('Bill Report Title') ?></h1>
<h2 style="text-align: center"><?php echo LgmisWMModule::t('Bill Report Subtitle1') ?></h2>
<h3 style="text-align: center"><?php echo LgmisWMModule::t('Received Amount from {startdate} to {enddate}', array("startdate"=>Yii::app()->dateFormatter->format('dd/MMM/yyyy',$startdate), "enddate"=>Yii::app()->dateFormatter->format('dd/MMM/yyyy',$enddate))); ?></h3>
<br/>
<table border="1" cellspacing="0" cellpading="0" width="100%">
    <tr style="background-color: lightgrey;">
        <th style="width: 10%;text-align: center;">
            <?php echo LgmisWMModule::t('S.No.'); ?>
        </th>
        <th style="width: 10%;">
            <?php echo LgmisWMModule::t('Demanddate'); ?>
        </th>
		<th style="width: 10%;">
            <?php echo LgmisWMModule::t('Receiptbookno'); ?>            
        </th>
        <th style="width: 10%;">
            <?php echo LgmisWMModule::t('Connectionno'); ?>            
        </th>
        <th style="width: 14%;">
            <?php echo LgmisWMModule::t('Ownername'); ?>            
        </th>
        <th style="width: 6%;">
            <?php echo LgmisWMModule::t('Ccward'); ?>            
        </th>
        <th style="width: 6%;">
            <?php echo LgmisWMModule::t('Period'); ?>                        
        </th>
        <th style="width: 6%;">
            <?php echo LgmisWMModule::t('Current Deposite'); ?>            
        </th>        
        <th style="width: 6%;">
            <?php echo LgmisWMModule::t('Previous Deposite'); ?>            
        </th>
        <th style="width: 6%;">
            <?php echo LgmisWMModule::t('Current Surcharge'); ?>            
        </th>
        <th style="width: 6%;">
            <?php echo LgmisWMModule::t('Previous Surcharge'); ?>            
        </th>
        <th style="width: 6%;">
            <?php echo LgmisWMModule::t('Total Amount'); ?>            
        </th>        
    </tr>
    
    
    
    <?php
    	$flag = false;
    	$grandtotal = 0;
    	$grandtotal1 = 0;
    	$grandtotal2 = 0;
    	$grandtotal3 = 0;
		$grandtotal4 = 0;
    	$grandtotal5 = 0;
    	$grandtotal6 = 0;
    	$i = 1; 
    ?>
    <?php foreach ($rows as $row): ?>
    <?php
      	$wmdemandreceipt = $row['wmdemandreceipt'];
      	$wmmaster = $wmdemandreceipt->idwmdemand0->idwmmaster0;
      	$grandtotal1 += $row['wmmaster_currentdemand'];
      	$grandtotal2 += $row['wmmaster_previousdemand'];
      	$grandtotal3 += $row['wmsurcharge_currentdemand'];
      	$grandtotal4 += $row['wmsurcharge_previousdemand'];
      	$grandtotal5 += $row['grand_total'];
     ?>
        <tr>
            <td style="text-align: center;">
                <?php
                	$i++;
                	echo WmdemandHelper::encodePkey($wmmaster);
                ?>
            </td>
            <td>
                <?php echo Yii::app()->dateFormatter->format('dd/MMM/yyyy',$wmdemandreceipt->demanddate); ?>&nbsp;
            </td>
            <td>
                <?php echo $wmdemandreceipt->receiptbookno; ?>&nbsp;
            </td>
            <td>
                <?php echo $wmmaster->connectionno; ?>&nbsp;
            </td>            
            <td>
                <?php echo $wmmaster->ownername; ?>&nbsp;
            </td>
            <td>
                <?php echo $wmmaster->idcccolony0->idccward0->wardname; ?>&nbsp;
            </td>
            <td>
                <?php echo  date("F", mktime(0, 0, 0, $wmdemandreceipt->idwmdemand0->period, 10)); ?>&nbsp;
            </td>
            <td style="text-align: right;">            
            	<?php echo $row['wmmaster_currentdemand']; ?>&nbsp;
            </td>
            <td style="text-align: right;">            
            	<?php echo $row['wmmaster_previousdemand']; ?>&nbsp;
            </td>
            <td style="text-align: right;">            
            	<?php echo $row['wmsurcharge_currentdemand']; ?>&nbsp;
            </td>
            <td style="text-align: right;">            
                <?php echo $row['wmsurcharge_previousdemand']; ?>&nbsp;
            </td>
            <td style="text-align: right;font-weight: bold;">
            	<?php echo $row['grand_total']; ?>&nbsp;
            </td>            
        </tr>
<?php endforeach; ?>
    <tr style="background-color: lightgrey; font-weight: bolder;">
	        <td colspan="7" style="text-align: right;font-weight: bolder;font-size: 120%;">
	            <?php echo LgmisWMModule::t('Total Amount'); ?>
	        </td>
            <td style="text-align: right;">
                <?php echo $grandtotal1; ?>
            </td>
            <td style="text-align: right;">
                <?php echo $grandtotal2; ?>
            </td>
            <td style="text-align: right;">
                <?php echo $grandtotal3; ?>
            </td>
            <td style="text-align: right;">
                <?php echo $grandtotal4; ?>
            </td>
            <td style="text-align: right; text-decoration: underline;">            
                <?php echo $grandtotal5; ?>
            </td>
	</tr>
</table>