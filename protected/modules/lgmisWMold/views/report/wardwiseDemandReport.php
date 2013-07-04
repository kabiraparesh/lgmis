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
<h3 style="text-align: center"><?php echo LgmisWMModule::t('Wardwise Demand Report Subtitle1 Detailed'); ?></h3>
<h3 style="text-align: center"><?php echo LgmisWMModule::t('Wardwise Demand Report Subtitle2') . $idccward; ?></h3>
<br/>
<table border="1" cellspacing="0" cellpading="0" width="100%">
    <tr>
        <td style="width: 50%;">
            &nbsp;
        </td>
        <td style="width: 50%;text-align: right;" class="title">
            <?php echo LgmisWMModule::t('Idccfyear') ?>: <?php echo Yii::app()->session['ccfyear']->fyear; ?><br/>
            <?php echo LgmisWMModule::t('Period') ?>: <?php echo date("F", mktime(0, 0, 0, $period+3, 10)); ?>                    
        </td>
    </tr>
</table>
<br/><br/>
<table border="1" cellspacing="0" cellpading="0" width="100%">
    <tr style="background-color: lightgrey;">
        <th style="width: 10%;text-align: center;">
            <?php echo LgmisWMModule::t('Idwmmaster'); ?>
        </th>
        <th style="width: 12%;">
            <?php echo LgmisWMModule::t('Ownername'); ?>
        </th>
<!--
		<th style="width: 12%;">
            <?php echo LgmisWMModule::t('Fathername'); ?>            
        </th>
        <th style="width: 12%;">
            <?php echo LgmisWMModule::t('Address'); ?>            
        </th>
-->
        <th style="width: 6%;">
            <?php echo LgmisWMModule::t('Previous Balance'); ?>            
        </th>
        <th style="width: 6%;">
            <?php echo LgmisWMModule::t('Previous Deposite'); ?>            
        </th>
        <th style="width: 6%;">
            <?php echo LgmisWMModule::t('Previous Discount'); ?>                        
        </th>
        <th style="width: 6%;">
            <?php echo LgmisWMModule::t('Previous Total'); ?>            
        </th>
        <th style="width: 6%;">
            <?php echo LgmisWMModule::t('Current Balance'); ?>            
        </th>        
        <th style="width: 6%;">
            <?php echo LgmisWMModule::t('Current Deposite'); ?>            
        </th>
        <th style="width: 6%;">
            <?php echo LgmisWMModule::t('Current Discount'); ?>            
        </th>
        <th style="width: 6%;">
            <?php echo LgmisWMModule::t('Current Total'); ?>            
        </th>
        <th style="width: 6%;">
            <?php echo LgmisWMModule::t('Balance'); ?>            
        </th>        
    </tr>
    
    
    
    <?php 
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
      	$data = $row['data'];
      	$wmmaster = $row['wmmaster'];
      	$grandtotal1 += $data[0][1] + $data[1][1];
      	$grandtotal2 += $data[0][2] + $data[1][2];
      	$grandtotal3 += $data[0][3] + $data[1][3];
      	$grandtotal4 += $data[0][4] + $data[1][4];
      	$grandtotal5 += $data[0][5] + $data[1][5];
      	$grandtotal6 += $data[0][6] + $data[1][6];
     ?>
        <tr>
            <td style="text-align: center;">
                <?php
                	$i++;
                	echo Wmhelper::encodePkey($wmmaster);
                ?>
            </td>
            <td>
                <?php echo $wmmaster->ownername; ?>&nbsp;
            </td>
<!--   
            <td>
                <?php echo $wmmaster->fathername; ?>&nbsp;
            </td>
            <td>
                <?php echo $wmmaster->address; ?>&nbsp;
            </td>
-->                       
            <td style="text-align: right;">
                <?php echo $data[0][1] + $data[1][1]; ?>
            </td>
            <td style="text-align: right;">
                <?php echo $data[0][2] + $data[1][2]; ?>
            </td>
            <td style="text-align: right;">
                <?php echo $data[0][3] + $data[1][3]; ?>
            </td>
            <td style="text-align: right;">
                <?php echo (($data[0][1] - $data[0][2] - $data[0][3]) + ($data[1][1] - $data[1][2] - $data[1][3]))  ?>
            </td>
            <td style="text-align: right;">
                <?php echo $data[0][4] + $data[1][4] ?>
            </td>
            <td style="text-align: right;">
                <?php echo $data[0][5] + $data[1][5] ?>
            </td>            
            <td style="text-align: right;">
                <?php echo $data[0][6] + $data[1][6] ?>
            </td>            
            <td style="text-align: right;">
                <?php echo (($data[0][4] - $data[0][5] - $data[0][6]) + ($data[1][4] - $data[1][5] - $data[1][6])) ?>
            </td>
            <td style="text-align: right;">
                <?php echo (($data[0][1] - $data[0][2] - $data[0][3]) + ($data[0][4] - $data[0][5] - $data[0][6]) + ($data[1][1] - $data[1][2] - $data[1][3]) + ($data[1][4] - $data[1][5] - $data[1][6])) ;
                $grandtotal += (($data[0][1] - $data[0][2] - $data[0][3]) + ($data[0][4] - $data[0][5] - $data[0][6]) + ($data[1][1] - $data[1][2] - $data[1][3]) + ($data[1][4] - $data[1][5] - $data[1][6])); ?>
            </td>
        </tr>
<?php endforeach; ?>
    <tr style="background-color: lightgrey; font-weight: bolder;">
	        <td colspan="2" style="text-align: right;font-weight: bolder;font-size: 120%;">
	            <?php echo LgmisWMModule::t('Wardwise Balance'); ?>
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
                <?php echo $grandtotal1 - $grandtotal2 - $grandtotal3; ?>
            </td>
            <td style="text-align: right;">
                <?php echo $grandtotal4; ?>
            </td>
            <td style="text-align: right;">
                <?php echo $grandtotal5; ?>
            </td>
            <td style="text-align: right;">
                <?php echo $grandtotal6; ?>
            </td>
            <td style="text-align: right;">
                <?php echo $grandtotal4 - $grandtotal5 - $grandtotal6; ?>
            </td>
            <td style="text-align: right; text-decoration: underline;">
                <?php echo ($grandtotal1 - $grandtotal2 - $grandtotal3) + ($grandtotal4 - $grandtotal5 - $grandtotal6); ?>
            </td>            
	</tr>
</table>