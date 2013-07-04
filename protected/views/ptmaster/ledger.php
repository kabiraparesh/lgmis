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
       if($idcczone == '' && isset($this->idccward) && isset($this->idccward0->idcczone0) && isset($this->idccward0->idcczone)){
            $idcczone = $this->idccward0->idcczone;
        }
        if($idccward == '' && isset($this->idccward)){
            $idccward = $this->idccward0->idccward;
        }
        if($idptmaster == '' && isset($this->idptmaster)){
            $idptmaster = $this->idptmaster;
        }
        return sprintf("%02s%02s%05s", $idcczone, $idccward, $idptmaster);
    }   

?>

<h1><?php echo Yii::t('application', 'Propertytax Ledger') ?></h1>
<br/>
<table border="1" cellspacing="0" cellpading="0" width="100%">
    <tr>
        <td style="width: 17%;" class="title">
            <?php echo Yii::t('application', 'Account No. (Register)') ?>
        </td>
        <td style="width: 16%;">            
            <?php echo $model->idptmaster; ?>
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
            <?php echo Yii::t('application', 'Old Balance') ?>
        </td>
        <td style="width: 16%;" class="amount">            
            <?php echo $grand_oldpropertytax . "/-"; ?>
        </td>
        <td style="width: 17%;" class="title">            
            <?php echo Yii::t('application', 'Current Demand') ?>
        </td>
        <td style="width: 16%;" class="amount">            
            <?php echo $grand_currentpropertytax . "/-"; ?>
        </td>
        <td style="width: 17%;" class="title">            
            <?php echo Yii::t('application', 'Deposite Amount') ?>
        </td>
        <td style="width: 16%;" class="amount">            
            <?php echo "0" . "/-"; ?>
        </td>
    </tr>
    <tr>
        <td class="title">
            <?php echo Yii::t('application', 'Final Amount') ?>
        </td>
        <td colspan="5" class="finalamount">
            <?php echo ($grand_oldpropertytax + $grand_currentpropertytax) . "/-"; ?>
        </td>
    </tr>
</table>
