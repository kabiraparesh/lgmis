<?php

/**
 * Description of IDAdminSkinGrid
 *
 * @author ict
 */
class IDAdminSkinGrid extends CWidget {

    /**
     * @var string the locale ID (eg 'fr', 'de') for the language to be used by the date picker.
     * If this property is not set, I18N will not be involved. That is, the date picker will show in English.
     * You can force English language by setting the language attribute as '' (empty string)
     */
    public $language;

    /**
     * @var string The i18n Jquery UI script file. It uses scriptUrl property as base url.
     */
    public $i18nScriptFile = 'jquery-ui-i18n.min.js';

    /**
     * @var array The default options called just one time per request. This options will alter every other CJuiDatePicker instance in the page.
     * It has to be set at the first call of CJuiDatePicker widget in the request.
     */
    public $defaultOptions;
    public $columns = array();
    public $rows = array();
    public $expression = '';
    public $dataProvider;
    public $filter;
    
    public $baseUrl = '';
    public $clientScript = '';
    public $dlgHeight = 'auto';
    public $dlgWidth = 'auto';
    public $gridActionUrl = '';
    public $toolbar = array();
    public $title = null;
//    public $toolbar = array('reload'=>array('visible'=>true), 'new'=>array('visible'=>true), 'edit'=>array('visible'=>true), 'delete'=>array('visible'=>true), 'view'=>array('visible'=>true));

//    public $data = 'hiii';
//    public $dataProvider = 'hiii';


	/**
	 * Publishes the assets
	 */
	public function publishAssets() {
		$dir =dirname(__FILE__).DIRECTORY_SEPARATOR.'views';
		$this->baseUrl =Yii::app()->getAssetManager()->publish($dir);
	}


	public function registerClientScripts() {

		if ($this->baseUrl === '')
			throw new CException(Yii::t('IDAdminSkinGrid.skingrid', 'baseUrl must be set.'));

		$this->clientScript = Yii::app()->getClientScript();

		// JS
		$this->clientScript->registerScriptFile($this->baseUrl.'/jquery.validity.js');

		// CSS
		$this->clientScript->registerCssFile($this->baseUrl.'/jquery.validity.css');
                
		$this->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(dirname(__FILE__).'/assets').'/skingrid.js');
                
	}
    
    
    public function init() {
        if($this->title == null){
            $this->title = ucfirst($this->id);
        }        
    }

    public function run() {
        
        if(isset(Yii::app()->controller->module->id)){
            $this->gridActionUrl = Yii::app()->controller->module->id . '/' . $this->id;
        }        
        else{
            $this->gridActionUrl = $this->id;            
        }
        $this->publishAssets();
        $this->registerClientScripts();
        
        $this->render('idadminskingrid', array('dataProvider' => $this->dataProvider, 'columns' => $this->columns));
    }

}

?>
