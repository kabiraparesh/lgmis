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

<?php
if(!function_exists('encodePkey')){
    function encodePkey($idcczone = '', $idccward = '', $idptmaster = '') {
        if ($idcczone == '' && isset($this->idccward) && isset($this->idccward0->idcczone0) && isset($this->idccward0->idcczone)) {
            $idcczone = $this->idccward0->idcczone;
        }
        if ($idccward == '' && isset($this->idccward)) {
            $idccward = $this->idccward0->idccward;
        }
        if ($idptmaster == '' && isset($this->idptmaster)) {
            $idptmaster = $this->idptmaster;
        }
        return sprintf("%02s%02s%05s", $idcczone, $idccward, $idptmaster);
    }
}
?>

<h1><?php echo Yii::t('application', 'Bill Report Title') ?></h1>
<h2 style="text-align: center"><?php echo Yii::t('application', 'Bill Report Subtitle1') ?></h2>
<p style="text-align: center; margin: 0;"><?php echo Yii::t('application', 'Bill Report Subtitle2') ?></p>
<p style="text-align: center; margin: 0;"><?php echo Yii::t('application', 'Bill Report Subtitle3') ?></p>
<table border="1" cellspacing="0" cellpading="0" width="100%">
    <tr>
        <td style="width: 17%;" class="title">
            <?php echo Yii::t('application', 'Account No. (Register)') ?>
        </td>
        <td style="width: 16%;">            
            <?php echo $model->idptmaster0->caseno; ?>
        </td>
        <td style="width: 17%;" class="title">            
            <?php echo Yii::t('application', 'Account No. (Computer)') ?>
        </td>
        <td style="width: 16%;">            
            <?php echo encodePkey($model->idptmaster0->idccward0->idcczone, $model->idptmaster0->idccward, $model->idptmaster); ?>
        </td>
        <td style="width: 17%;" class="title">            
            <?php echo Yii::t('application', 'Ward No.') ?>
        </td>
        <td style="width: 16%;">            
            <?php echo $model->idptmaster0->idccward; ?>
        </td>
    </tr>
    <tr>
        <td style="width: 17%;" class="title">            
            <?php echo Yii::t('application', 'Ownername') ?>
        </td>
        <td style="width: 16%;" colspan="2">
            <?php echo $model->idptmaster0->ownername; ?>
        </td>
        <td style="width: 17%;" class="title">            
            <?php echo Yii::t('application', 'Fathername') ?>
        </td>
        <td style="width: 16%;" colspan="2">
            <?php echo $model->idptmaster0->fathername; ?>
        </td>
    </tr>
    <tr>
        <td style="width: 17%;" class="title">            
            <?php echo Yii::t('application', 'Propertyaddress') ?>
        </td>
        <td style="width: 16%;" class="">            
            <?php echo $model->idptmaster0->propertyaddress; ?>
        </td>
        <td style="width: 17%;" class="title">            
            <?php echo Yii::t('application', 'Tax Type') ?>
        </td>
        <td style="width: 16%;" class="">            
            <?php echo Yii::t('application', 'Property Tax'); ?>
        </td>
        <td style="width: 17%;" class="title">            
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?php //echo Yii::t('application', 'Demand Deposite Date') ?>
        </td>
        <td style="width: 16%;" class="amount">            
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?php //echo Yii::t('application', ' - ') ?>
        </td>
    </tr>
</table>
<br/>
<table border="1" cellspacing="0" cellpading="0" width="100%">
    <tr style="background-color: lightgrey;">
        <th style="width: 3%;text-align: center;">
            <?php echo Yii::t('application', 'S.No.'); ?>
        </th>
        <th style="width: 32%;">
            <?php echo Yii::t('application', 'Particulars'); ?>
        </th>
        <th style="width: 13%;">
            <?php echo Yii::t('application', 'Previous Demand'); ?>            
        </th>
        <th style="width: 13%;">
            <?php echo Yii::t('application', 'Current Demand'); ?>            
        </th>
        <th style="width: 13%;">
            <?php echo Yii::t('application', 'Total Demand'); ?>                        
        </th>
        <th style="width: 13%;">
            <?php echo Yii::t('application', 'Previous Balance'); ?>            
        </th>
        <th style="width: 13%;">
            <?php echo Yii::t('application', 'Balance'); ?>            
        </th>
    </tr>
    <?php $grandtotal = 0;
    $i = 1; ?>
    <?php foreach ($demand['data'] as $row): ?>
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
                <?php echo $row[4] ?>
            </td>
            <td style="text-align: right;">
                <?php echo $row[3] - $row[4];
                $grandtotal += $row[3] - $row[4]; ?>
            </td>
        </tr>
<?php endforeach; ?>
    <tr style="background-color: lightgrey;">
        <td colspan="6" style="text-align: right;font-weight: bolder;font-size: 120%;">
<?php echo Yii::t('application', 'Total Balance for Deposite'); ?>
        </td>
        <td style="text-align: right;font-weight: bolder;font-size: 120%;">
<?php echo $grandtotal; ?>
        </td>
    </tr>
</table>
<br/>
<span style="float:right"><?php echo Yii::t('application', "Bill Report Bottom1"); ?></span>
<br/>
<?php echo Yii::t('application', "Bill Report Bottom2"); ?>
<hr/>