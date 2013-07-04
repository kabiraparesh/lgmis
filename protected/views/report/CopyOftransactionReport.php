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


<h1><?php echo Yii::t('application', 'Bill Report Title') ?></h1>
<h2 style="text-align: center"><?php echo Yii::t('application', 'Bill Report Subtitle1') ?></h2>
<h3 style="text-align: center"><?php echo Yii::t('application', 'Received Amount from {startdate} to {enddate}', array("startdate"=>Yii::app()->dateFormatter->format('dd/MMM/yyyy',$startdate), "enddate"=>Yii::app()->dateFormatter->format('dd/MMM/yyyy',$enddate))); ?></h3>
<br/>
<table border="1" cellspacing="0" cellpading="0" width="100%">
    <tr style="background-color: lightgrey;">
        <th style="width: 10%;text-align: center;">
            <?php echo Yii::t('application', 'S.No.'); ?>
        </th>
        <th style="width: 10%;">
            <?php echo Yii::t('application', 'Demanddate'); ?>
        </th>
		<th style="width: 10%;">
            <?php echo Yii::t('application', 'Receiptbookno'); ?>            
        </th>
        <th style="width: 10%;">
            <?php echo Yii::t('application', 'Receiptno'); ?>            
        </th>
        <th style="width: 14%;">
            <?php echo Yii::t('application', 'Ownername'); ?>            
        </th>
   <!--     <th style="width: 6%;">
            <?php //echo Yii::t('application', 'Ccward'); ?>            
        </th>
        <th style="width: 6%;">
            <?php //echo Yii::t('application', 'Cczone'); ?>                        
        </th> -->
        <th style="width: 6%;">
            <?php echo Yii::t('application', 'Deposite'); ?>            
        </th>        
        <th style="width: 6%;">
            <?php echo Yii::t('application', 'Discount'); ?>            
        </th>
        <th style="width: 6%;">
            <?php echo Yii::t('application', 'Total Amount'); ?>            
        </th>        
    </tr>
    
    
    
    <?php
    	$flag = false;
    	$grandtotal1 = 0;
    	$grandtotal2 = 0;
    	$grandtotal3 = 0;
    	$i = 1; 
    ?>
    <?php foreach ($rows as $row): ?>
    <?php 
    	$grandtotal1 += $row[7];
    	$grandtotal2 += $row[8];
    	$grandtotal3 += $row[9];    	 
    ?>
        <tr>
            <td style="">
                <?php
                	$i++;
                	echo $row[0];
                ?>
            </td>
            <td>
                <?php echo Yii::app()->dateFormatter->format('dd/MMM/yyyy',$row[1]); ?>&nbsp;
            </td>
            <td>
                <?php echo $row[2]; ?>&nbsp;
            </td>
            <td>
                <?php echo $row[3]; ?>&nbsp;
            </td>            
            <td>
                <?php echo $row[4]; ?>&nbsp;
            </td>
           <!--  <td>
                <?php //echo $row[5]; ?>&nbsp;
            </td>
            <td style="text-align: right;">            
            	<?php //echo $row[6]; ?>&nbsp;
            </td>-->
            <td style="text-align: right;">            
            	<?php //echo $row[7]; ?>&nbsp;
            </td> 
            <td style="text-align: right;">            
            	<?php echo $row[8]; ?>&nbsp;
            </td>
            <td style="text-align: right;font-weight: bold;">
            	<?php echo $row[9]; ?>&nbsp;
            </td>            
        </tr>
<?php endforeach; ?>
    <tr style="background-color: lightgrey; font-weight: bolder;">
	        <td colspan="7" style="text-align: right;font-weight: bolder;font-size: 120%;">
	            <?php echo Yii::t('application', 'Total Amount'); ?>
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
	</tr>
</table>