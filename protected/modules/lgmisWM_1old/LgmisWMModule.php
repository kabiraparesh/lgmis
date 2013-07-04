<?php

class LgmisWMModule extends CWebModule {

    public function init() {
        // this method is called when the module is being created
        // you may place code here to customize the module or the application
        // import the module-level models and components
        $this->setImport(array(
            'lgmisWM.models.*',
            'lgmisWM.components.*',
        ));
    }

    public function beforeControllerAction($controller, $action) {
        if (parent::beforeControllerAction($controller, $action)) {
            // this method is called before any module controller action is performed
            // you may place customized code here
            return true;
        }
        else
            return false;
    }

    /**
     * @param $str
     * @param $params
     * @param $dic
     * @return string
     */
    public static function t($str = '', $params = array(), $dic = 'lgmiswm') {
        if (Yii::t("LgmisWMModule", $str) == $str)
            return Yii::t("LgmisWMModule." . $dic, $str, $params);
        else
            return Yii::t("LgmisWMModule", $str, $params);
    }

}
