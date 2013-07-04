<?php

class LgmisRentalModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'lgmisRental.models.*',
			'lgmisRental.components.*',
                    'lgmisRental.helper.*',	
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
        
        
        public static function t($str = '', $params = array(), $dic = 'lgmisrental') {
		if (Yii::t("LgmisRentalModule", $str) == $str)
			return Yii::t("LgmisRentalModule." . $dic, $str, $params);
		else
			return Yii::t("LgmisRentalModule", $str, $params);
	}

	private $_assetsUrl;

	/**
	 * @return string the base URL that contains all published asset files of this module.
	 */
	public function getAssetsUrl()
	{
		if($this->_assetsUrl===null)
			$this->_assetsUrl=Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('lgmisRental.assets'));
		return $this->_assetsUrl;
	}

	/**
	 * @param string the base URL that contains all published asset files of this module.
	 */
	public function setAssetsUrl($value)
	{
		$this->_assetsUrl=$value;
	}

	public function registerCss($file, $media='all')
	{
		$href = $this->getAssetsUrl().'/css/'.$file;
		return '<link rel="stylesheet" type="text/css" href="'.$href.'" media="'.$media.'" />';
	}

	public function registerImage($file)
	{
		return $this->getAssetsUrl().'/images/'.$file;
	}

}
