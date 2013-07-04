<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of WmHelper
 *
 * @author ict
 */
class WmHelper {

    public function generateWmconfiguration($generate = false) {
        $idccfyear = Yii::app()->session['ccfyear']->idccfyear;
        $criteria = new CDbCriteria(array(
                    'condition' => 'idccfyear = :idccfyear',
                    'params' => array(':idccfyear' => $idccfyear)
                ));
        $count = 0;
        $jsonmessage = array();
        $status = 'Success';
        $message = LgmisWMModule::t('Wmconfiguration will generating for financial year {fyear}. Are you sure?', array('{fyear}' => Yii::app()->session['ccfyear']->fyear));
        if ($generate) {
            //delete any old entries...
            Wmconfiguration::model()->deleteAll($criteria);
            //add new entries
            $sql = "INSERT INTO {{wmconfiguration}} (idccfyear, idwmtype, idwmsize, wmtape)
                        SELECT $idccfyear as idccfyear, idwmtype, idwmsize, wmtape FROM 
                        {{wmtype}},
                        {{wmsize}},
                        (select 1 as wmtape union all select 2 as wmtape union all select 3 as wmtape) t";
            $connection = Yii::app()->db;
            $command = $connection->createCommand($sql);
            $rowCount = $command->execute();
        } else {
            $count = Wmconfiguration::model()->count($criteria);
        }
        if ($count > 0) {
            $status = 'Exists';
            $message = LgmisWMModule::t('Wmconfiguration already generated for financial year {fyear}. These items will be permanently deleted and cannot be recovered. Are you sure?', array('{fyear}' => Yii::app()->session['ccfyear']->fyear));
        }
        $jsonmessage['status'] = $status;
        $jsonmessage['message'] = $message;
        return CJSON::encode($jsonmessage);
    }

}

?>
