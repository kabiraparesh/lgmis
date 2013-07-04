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

    function encodePkey($idcczone_summary = '', $idccward_summary = '', $idptmaster_summary = ''){
        return sprintf("%02s%02s%05s", $idcczone, $idccward, $idptmaster);
    }   
    
    $propertytax_propertycount_summary = 0;
    $propertytax_propertyarea_summary = 0;
    $minsamekittax_propertycount_summary = 0;
    $minsamekittax_propertyarea_summary = 0;
    $total_propertycount_summary = 0;
    $total_plotcount_summary = 0;
    $exsumptor_propertycount_summary = 0;
    $totalresidential_propertycount_summary = 0;
    $totalcommercial_propertycount_summary = 0;
    $totalresidential_propertyarea_summary = 0;
    $totalcommercial_propertyarea_summary = 0;
    

?>

<h1 style="padding: 0; margin: 0; "><?php echo Yii::t('application', 'Bill Report Title') ?></h1>
<p style="padding: 0; margin: 0; font-weight: bold; text-align: center;"><?php echo Yii::t('application', 'Wardwise Property Count & Area') ?>&nbsp;<?php echo Yii::t('application', 'Idccfyear') ?>: <?php echo Yii::app()->session['ccfyear']->fyear; ?></p>
<br/>
<table border="1" cellspacing="0" cellpading="0" width="100%">
    <tr style="background-color: lightgrey;">
        <th class="amount" width="3%">
            <?php echo Yii::t('application', 'S.No.'); ?>
        </th>
        <th class="amount" width="3%">
            <?php echo Yii::t('application', 'Idccward'); ?>
        </th>
        
        <th class="amount" width="8%">
            <?php echo Yii::t('application', 'propertytax_propertycount'); ?>
        </th>
        <th class="amount" width="8%">
            <?php echo Yii::t('application', 'propertytax_propertyarea'); ?>
        </th>
        <th class="amount" width="9%">
            <?php echo Yii::t('application', 'minsamekittax_propertycount'); ?>
        </th>
        <th class="amount" width="9%">
            <?php echo Yii::t('application', 'minsamekittax_propertyarea'); ?>
        </th>
        <th class="amount" width="9%">
            <?php echo Yii::t('application', 'total_propertycount'); ?>
        </th>
        <th class="amount" width="9%">
            <?php echo Yii::t('application', 'total_plotcount'); ?>
        </th>
        <th class="amount" width="9%">
            <?php echo Yii::t('application', 'exsumptor_propertycount'); ?>
        </th>
        <th class="amount" width="9%">
            <?php echo Yii::t('application', 'totalresidential_propertycount'); ?>
        </th>
        <th class="amount" width="8%">
            <?php echo Yii::t('application', 'totalcommercial_propertycount'); ?>
        </th>
        <th class="amount" width="8%">
            <?php echo Yii::t('application', 'totalresidential_propertyarea'); ?>
        </th>
        <th class="amount" width="8%">
            <?php echo Yii::t('application', 'totalcommercial_propertyarea'); ?>
        </th>        
    </tr>
    <?php foreach($wards as $key=>$ward): ?>
    <?php 
        $propertytax_propertycount_summary += $ward['propertytax_propertycount'];
        $propertytax_propertyarea_summary += $ward['propertytax_propertyarea'];
        $minsamekittax_propertycount_summary += $ward['minsamekittax_propertycount'];
        $minsamekittax_propertyarea_summary += $ward['minsamekittax_propertyarea'];
        $total_propertycount_summary += $ward['total_propertycount'];
        $total_plotcount_summary += $ward['total_plotcount'];
        $exsumptor_propertycount_summary += $ward['exsumptor_propertycount'];
        $totalresidential_propertycount_summary += $ward['totalresidential_propertycount'];
        $totalcommercial_propertycount_summary += $ward['totalcommercial_propertycount'];
        $totalresidential_propertyarea_summary += $ward['totalresidential_propertyarea'];
        $totalcommercial_propertyarea_summary += $ward['totalcommercial_propertyarea'];    
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
            <?php echo $ward['propertytax_propertycount']; ?>
        </td>
        <td class="amount">
            <?php echo $ward['propertytax_propertyarea']; ?>
        </td>
        <td class="amount">
            <?php echo $ward['minsamekittax_propertycount']; ?>
        </td>
        <td class="amount">
            <?php echo $ward['minsamekittax_propertyarea']; ?>
        </td>
        <td class="amount">
            <?php echo $ward['total_propertycount']; ?>
        </td>
        <td class="amount">
            <?php echo $ward['total_plotcount']; ?>
        </td>
        <td class="amount">
            <?php echo $ward['exsumptor_propertycount']; ?>
        </td>
        <td class="amount">
            <?php echo $ward['totalresidential_propertycount']; ?>
        </td>
        <td class="amount">
            <?php echo $ward['totalcommercial_propertycount']; ?>
        </td>
        <td class="amount">
            <?php echo $ward['totalresidential_propertyarea']; ?>
        </td>
        <td class="amount">
            <?php echo $ward['totalcommercial_propertyarea']; ?>
        </td>        
    </tr>
    <?php endforeach; ?>
    <tr>
        <td class="amount highlight">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>        
        <td class="amount highlight">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>        
        <td class="amount highlight"><?php echo $propertytax_propertycount_summary ; ?></td>
        <td class="amount highlight"><?php echo $propertytax_propertyarea_summary ; ?></td>
        <td class="amount highlight"><?php echo $minsamekittax_propertycount_summary ; ?></td>
        <td class="amount highlight"><?php echo $minsamekittax_propertyarea_summary ; ?></td>
        <td class="amount highlight"><?php echo $total_propertycount_summary ; ?></td>
        <td class="amount highlight"><?php echo $total_plotcount_summary ; ?></td>
        <td class="amount highlight"><?php echo $exsumptor_propertycount_summary ; ?></td>
        <td class="amount highlight"><?php echo $totalresidential_propertycount_summary ; ?></td>
        <td class="amount highlight"><?php echo $totalcommercial_propertycount_summary ; ?></td>
        <td class="amount highlight"><?php echo $totalresidential_propertyarea_summary ; ?></td>
        <td class="amount highlight"><?php echo $totalcommercial_propertyarea_summary ; ?></td>        
    </tr>
</table>
