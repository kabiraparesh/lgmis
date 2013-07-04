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
<?php

    function encodePkey($idcczone = '', $idccward = '', $idptmaster = ''){
        return sprintf("%02s%02s%05s", $idcczone, $idccward, $idptmaster);
    }   

?>

<h1><?php echo Yii::t('application', 'Bill Report Title') ?></h1>
<h2 style="text-align: center"><?php echo Yii::t('application', 'Bill Report Subtitle1') ?></h2>
<h2 style="text-align: center"><?php echo Yii::t('application', 'Propertytax Recovery Receipt'); ?></h2>
<h3 style="text-align: center"><?php echo Yii::t('application', 'Received Amount from {startdate} to {enddate}', array("startdate"=>Yii::app()->dateFormatter->format('dd/MMM/yyyy',$startdate), "enddate"=>Yii::app()->dateFormatter->format('dd/MMM/yyyy',$enddate))); ?></h3>
<br/>
<table border="1" cellspacing="0" cellpading="0" width="100%">
    <tr  style="background-color: lightgrey;">     
        <th colspan="4" style="width: 5%;text-align: center;">
        	&nbsp;
        </th>
        <th colspan="6" style="width: 5%;text-align: center;">
            <?php echo Yii::t('application', 'Previous Recovery'); ?>
        </th>
        <th colspan="6" style="width: 5%;text-align: center;">
            <?php echo Yii::t('application', 'Current Recovery'); ?>
        </th>
       
	</tr>
    <tr  style="background-color: lightgrey;">     
        <th style="width: 5%;text-align: center;">
            <?php //echo Yii::t('application', 'S.No.'); ?>
            <?php echo Yii::t('application', 'R.No') ."/". Yii::t('application', 'idptmaster'); ?>
        </th>
        <th style="width: 5%;">
            <?php echo Yii::t('application', 'Demanddate'); ?>
        </th>
		<th style="width: 5%;">
            <?php echo Yii::t('application', 'Receiptbookno')."/".Yii::t('application', 'Receiptno'); ?>            
        </th>
        <th style="width: 14%;">
            <?php echo Yii::t('application', 'Ownername') . " / " . Yii::t('application', 'Fathername'); ?>            
        </th>
        
        <th style="width: 6%;">
            <?php echo Yii::t('application', 'Property Tax'); ?>            
        </th>
        <th style="width: 6%;">
            <?php echo Yii::t('application', 'Minsamekittax'); ?>                        
        </th>
        <th style="width: 6%;">
            <?php echo Yii::t('application', 'Educess'); ?>            
        </th>        
        <th style="width: 6%;">
            <?php echo Yii::t('application', 'Subcess'); ?>            
        </th>
           <th style="width: 6%;">
            <?php echo Yii::t('application', 'Surcharge'); ?>            
        </th>
        <th style="width: 6%;">
            <?php echo Yii::t('application', 'Total Amount'); ?>            
        </th>
        
 
        <th style="width: 6%;">
            <?php echo Yii::t('application', 'Property Tax'); ?>            
        </th>
        <th style="width: 6%;">
            <?php echo Yii::t('application', 'Minsamekittax'); ?>                        
        </th>
        <th style="width: 6%;">
            <?php echo Yii::t('application', 'Educess'); ?>            
        </th>        
        <th style="width: 6%;">
            <?php echo Yii::t('application', 'Subcess'); ?>            
        </th>
         <th style="width: 6%;">
            <?php echo Yii::t('application', 'Surcharge'); ?>            
        </th>
        <th style="width: 6%;">
            <?php echo Yii::t('application', 'Total Amount'); ?>            
        </th>
           
    </tr>    
 
    
    
    <?php
    	$flag = false;
    	$grandtotal1_previous = 0;
    	$grandtotal2_previous = 0;
    	$grandtotal3_previous = 0;
    	$grandtotal4_previous = 0;
    	$grandtotal5_previous = 0;

    	$grandtotal1_current = 0;
    	$grandtotal2_current = 0;
    	$grandtotal3_current = 0;
    	$grandtotal4_current = 0;
    	$grandtotal5_current = 0;
    	 $adhiubhartotal_current = 0;
    	 $adhiubhartotal_previous = 0;
    	
    	$i = 1; 
    ?>
    <?php foreach ($rows as $row): ?>
    <?php 
    	$grandtotal1_previous += $row[10];
    	$grandtotal2_previous += $row[11] + $row[12] ;
    	$grandtotal3_previous += $row[13]; 
    	$grandtotal4_previous += $row[14] + $row[15] ;
    	$grandtotal5_previous += $row[16];
    	$adhiubhartotal_previous += $row[25];
    	
    	$grandtotal1_current += $row[17];
    	$grandtotal2_current += $row[18] + $row[19] ;
    	$grandtotal3_current += $row[20];
    	$grandtotal4_current += $row[21] + $row[22] ;
    	$grandtotal5_current += $row[23];
    	$adhiubhartotal_current += $row[26];
    ?>
        <tr>
            <td style="">
                <?php
                	$i++;
                	//echo $row[0];
                	  $idcczone = $row[5];
                	$idccward = $row[6];
                	$idptmaster = $row[27];
                	echo  $row[28]." / ".encodePkey($idcczone, $idccward, $idptmaster);
                ?> &nbsp;
            </td>
            
            <td>
                <?php echo Yii::app()->dateFormatter->format('dd/MMM/yyyy',$row[1]); ?>&nbsp;
            </td>
            <td>
                <?php echo $row[2] . " / " . $row[3]; ?>&nbsp;
            </td>
            <td>
                <?php echo $row[4]; ?>&nbsp;
            </td>
            <td style="text-align: right;">
                <?php echo $row[10]; ?>&nbsp;
            </td>
            <td style="text-align: right;">            
            	<?php echo ($row[11] + $row[12]); ?>&nbsp;
            </td>
            <td style="text-align: right;">            
            	<?php echo $row[13]; ?>&nbsp;
            </td>
            
            <td style="text-align: right;">            
            	<?php echo ($row[14] + $row[15]); ?>&nbsp;
            </td>
             <td style="text-align: right;">            
            	<?php echo ($row[25]); ?>&nbsp;
            </td>
            <td style="text-align: right;font-weight: bold;">
            	<?php echo $row[16]; ?>&nbsp;
            </td>
            <td style="text-align: right;">
                <?php echo $row[17]; ?>&nbsp;
            </td>
            <td style="text-align: right;">            
            	<?php echo ($row[18] + $row[19]); ?>&nbsp;
            </td>
            <td style="text-align: right;">            
            	<?php echo $row[20]; ?>&nbsp;
            </td>
          
            <td style="text-align: right;">            
            	<?php echo ($row[21] + $row[22]); ?>&nbsp;
            </td>
              <td style="text-align: right;">            
            	<?php echo ($row[26]); ?>&nbsp;
            </td>
            <td style="text-align: right;font-weight: bold;">
            	<?php echo $row[23]; ?>&nbsp;
            </td>          
           
        </tr>
<?php //break; 
                endforeach; ?>
    <tr style="background-color: lightgrey; font-weight: bolder;">
	        <td colspan="4" style="text-align: right;font-weight: bolder;font-size: 120%;">
	            <?php echo Yii::t('application', 'Total Amount'); ?>
	        </td>
            <td style="text-align: right;">
                <?php echo $grandtotal1_previous; ?>
            </td>
            <td style="text-align: right;">
                <?php echo $grandtotal2_previous; ?>
            </td>
            <td style="text-align: right;">
                <?php echo $grandtotal3_previous; ?>
            </td>
              <td style="text-align: right;">
                <?php echo $grandtotal4_previous; ?>
            </td>
              <td style="text-align: right;">
                <?php echo $adhiubhartotal_previous; ?>
            </td>
              <td style="text-align: right;">
                <?php echo $grandtotal5_previous; ?>
            </td>
            
              <td style="text-align: right;">
                <?php echo $grandtotal1_current; ?>
            </td>
            <td style="text-align: right;">
                <?php echo $grandtotal2_current; ?>
            </td>
            <td style="text-align: right;">
                <?php echo $grandtotal3_current; ?>
            </td>
              <td style="text-align: right;">
                <?php echo $grandtotal4_current; ?>
            </td>
               <td style="text-align: right;">
                <?php echo $adhiubhartotal_current; ?>
            </td>
            <td style="text-align: right;">
                <?php echo $grandtotal5_current; ?>
            </td>
          
	</tr>
</table>