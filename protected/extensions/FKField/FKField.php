<?php

/**
 * Description of InputGrid
 *
 * @author ict
 */
class FKField extends CInputWidget {

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
    public $baseUrl = '';
    public $clientScript = '';
    public $columns;
    public $data;
    public $relatedmodel;
    public $title = null;

//    public $data = 'hiii';
//    public $dataProvider = 'hiii';

    /**
     * Publishes the assets
     */
    public function publishAssets() {
        $dir = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'views';
        $this->baseUrl = Yii::app()->getAssetManager()->publish($dir);
    }

    public function registerClientScripts() {

        if ($this->baseUrl === '')
            throw new CException(Yii::t('FKField.fkfield', 'baseUrl must be set.'));
    }

    public function init() {
        parent::init();


        if ($this->baseUrl === '')
            $this->baseUrl = Yii::app()->getAssetManager()->publish(dirname(__FILE__) . '/assets/');
        
        if($this->title == null){
            $this->title = get_class($this->relatedmodel);
        }
        
        //$this->baseScriptUrl=Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('zii.widgets.assets')).'/gridview';
    }

    public function run() {
//        $this->publishAssets();
//        $this->registerClientScripts();
        $this->relatedmodel->unsetAttributes();
        
//        syslog(LOG_WARNING, 'XYZ: -->' . get_class($this->relatedmodel) );
        
        if(isset($_GET[get_class($this->relatedmodel)]))
            $this->relatedmodel->attributes=$_GET[get_class($this->relatedmodel)];


        list($name, $id) = $this->resolveNameID();

        $value = CHtml::resolveValue($this->model, $this->attribute);

        if (isset($this->htmlOptions['id']))
            $id = $this->htmlOptions['id'];
        else
            $this->htmlOptions['id'] = $id;
        if (isset($this->htmlOptions['name']))
            $name = $this->htmlOptions['name'];

        if ($this->hasModel()) {
            echo CHtml::activeTextField($this->model, $this->attribute, $this->htmlOptions);
            $attribute = $this->attribute;
        } else {
            echo CHtml::textField($name, $this->value, $this->htmlOptions);
        }
        
//        syslog(LOG_WARNING, 'viewPath: -->' . $this->viewPath);


//        syslog(LOG_WARNING, 'cls: -->' . get_class($this->model));
        array_push($this->columns, array(
            'header' => Yii::t('FKField.fkfield', 'Action'),
            'value' => '"<img onclick=\"check(\''.$this->attribute.'\',\'".$data->'.$this->attribute.'."\');\" src=\"'.$this->baseUrl.'/done.gif\" alt=\"Select\"/>"',
            'type' => 'raw',
            'htmlOptions' => array('style'=>'text-align:center;'),
        ));
//        syslog(LOG_WARNING, 'after1: -->' . print_r($this->columns, true));

        $this->render('fkfield');
    }

}

?>
