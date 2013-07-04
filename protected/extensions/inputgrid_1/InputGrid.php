<?php

/**
 * Description of InputGrid
 *
 * @author ict
 */
class InputGrid extends CInputWidget {

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
    
    public $baseUrl = '';
    public $clientScript = '';

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
			throw new CException(Yii::t('InputGrid', 'baseUrl must be set.'));

		$this->clientScript = Yii::app()->getClientScript();

		// JS
		$this->clientScript->registerScriptFile($this->baseUrl.'/jquery.validity.js');

		// CSS
		$this->clientScript->registerCssFile($this->baseUrl.'/jquery.validity.css');
	}
    
    
    public function init() {
        
    }

    public function run() {
//        $this->publishAssets();
//        $this->registerClientScripts();
        
        list($name, $id) = $this->resolveNameID();

        $value = CHtml::resolveValue($this->model, $this->attribute);

        if (isset($this->htmlOptions['id']))
            $id = $this->htmlOptions['id'];
        else
            $this->htmlOptions['id'] = $id;
        if (isset($this->htmlOptions['name']))
            $name = $this->htmlOptions['name'];

        if ($this->hasModel()) {
            echo CHtml::activeHiddenField($this->model, $this->attribute, $this->htmlOptions);
            $attribute = $this->attribute;
        } else {
            echo CHtml::hiddenField($name, $this->value, $this->htmlOptions);
        }

        $this->render('inputgrid', array('dataProvider' => $this->getDataProvider(), 'columns' => $this->getColumns()));
    }

    public function getColumns() {
        $columns = array();
        $columns[] = array(
            'name' => 'id',
//            'value' => 'CHtml::textField("propertydetails[" . $data[\'id\'] . "][id]", $data[\'id\'], array(\'width\'=>20,\'size\'=>5,\'maxlength\'=>30,\'style\'=>\'text-align:right\'))',
//            'type' => 'raw',
            'header' => '',
            'headerHtmlOptions' => array('style' => 'display:none'),
            'htmlOptions' => array('style' => 'display:none'),
        );
//        $columns[] = array(
//            'name' => 'rowheading',
//            'type' => 'raw',
//            'header' => '',
////            'headerHtmlOptions' => array('style' => 'display:none'),
//                'htmlOptions' => array('style' => 'font-weight:bolder;', 'width' => 20),
//        );
        foreach ($this->columns as $column) {
            $header = '';
            if (isset($column['header'])) {
                $header = $column['header'];
            } else {
                $header = Yii::t('application', $column['name']);
            }
            $type = 'text';
            if (isset($column['type'])) {
                $type = $column['type'];
            }

            $htmlOptions = array();
            if (isset($column['htmlOptions'])) {
                $htmlOptions = $column['htmlOptions'];
            }

            if ($type == 'textField') {
                $htmlOptions['onchange'] = 'refresh()';
                $columns[] = array(
                    'name' => $column['name'],
                    'header' => $header,
                    'value' => '$data[\'id\'] === "summary" ? "<span class=\'summary\' id=\''.$this->id. '[".$data[\'id\']."][' . $column['name'] .  ']\'>" . $data[\'' . $column['name'] . '\'] . "</span>" : CHtml::textField("' . $this->id . '[".$data[\'id\']."][' . $column['name'] . ']", $data[\'' . $column['name'] . '\'], $this->htmlOptions)',
//                    'value' => 'CHtml::textField("' . $this->id . '[".$data[\'id\']."][' . $column['name'] . ']", $data[\'' . $column['name'] . '\'], array(\'onchange\'=>\'refresh()\'))',
                    'type' => 'raw',
                    'htmlOptions' => $htmlOptions,
                );
            }
            if ($type == 'hiddenField') {
                $columns[] = array(
                    'name' => $column['name'],
                    'header' => $header,
                    //"' . $this->id . '[".$data[\'id\']."][' . $column['name'] . ']"
                    'value' => '$data[\'id\'] === "summary" ? "<span  class=\'summary\' id=\''.$this->id. '[".$data[\'id\']."][' . $column['name'] .  ']\'>" . $data[\'' . $column['name'] . '\'] . "</span>" : "<span id=\''.$this->id. '[".$data[\'id\']."][' . $column['name'] .  ']\'>" . $data[\'' . $column['name'] . '\']  . "</span>" . CHtml::hiddenField("' . $this->id . '[".$data[\'id\']."][' . $column['name'] . ']", $data[\'' . $column['name'] . '\'])',
                    'type' => 'raw',
                    'htmlOptions' => $htmlOptions,
                );
            }
            if ($type == 'text') {
                $columns[] = array(
                    'name' => $column['name'],
                    'header' => $header,
                    'value' => '$data[\'id\'] === "summary" ? "<span  class=\'summary\' id=\''.$this->id. '[".$data[\'id\']."][' . $column['name'] .  ']\'>" . $data[\'' . $column['name'] . '\'] . "</span>" : "<span id=\''.$this->id. '[".$data[\'id\']."][' . $column['name'] .  ']\'>" . $data[\'' . $column['name'] . '\'] . "</span>"', 
                    'type' => 'raw',
                    'htmlOptions' => $htmlOptions,
                );
            }
        }
        return $columns;
    }

    public function getDataProvider() {
        $summaryColumns = array();
        $totalcolumns = sizeof($this->columns);
        $totalrows = 1;
        if (isset($this->rows['data'])) {
            $totalrows = sizeof($this->rows['data']);
        }
        else{
            if (isset($this->rows['rows'])) {
                $totalrows = $this->rows['rows'];
            }            
        }
        for ($i = 0; $i < $totalrows; $i++) {
            $rawData[$i]['id'] = $i;
        }

//        $i = 0;
//        foreach ($this->rows as $row) {
//            $rawData[$i++]['rowheading'] = $row['header'];
//        }

        $value = CHtml::resolveValue($this->model, $this->attribute);
        if (!isset($value) || strlen($value) == 0) {
            for ($i = 0; $i < $totalrows; $i++) {
                $j = 0;
                foreach ($this->columns as $column) {
//                    echo $this->rows[$i]['default'];
//                    if (isset($this->rows[$i]['default']) && is_array($this->rows[$i]['default'])) {
//                        if (isset($this->rows[$i]['default'][$column['name']])) {
//                            $rawData[$i][$column['name']] = $this->rows[$i]['default'][$column['name']];
//                        } else {
//                            if (isset($this->rows[$i]['default'][$j])) {
//                                $rawData[$i][$column['name']] = $this->rows[$i]['default'][$j];
//                            } else {
//                                $rawData[$i][$column['name']] = 0;
//                            }
//                        }
//                    } else {
//                        $rawData[$i][$column['name']] = 0;
//                    }
                    if (isset($this->rows['data']) && isset($this->rows['data'][$i][$j]) ) {
                        $rawData[$i][$column['name']] = $this->rows['data'][$i][$j];
                    } else {
                        $rawData[$i][$column['name']] = '';
                    }

                    $j++;
                }

//                foreach ($this->columns as $column) {
//                    $rawData[$i][$column['name']] = 0;
//                }
            }
        } else {
            $jsonss = json_decode($value, true);
            $array = array();
            foreach ($jsonss as $jsons) {
                $array[$jsons['name']] = $jsons['value'];
            }
            
            for ($i = 0; $i < $totalrows; $i++) {
                foreach ($this->columns as $column) {
                    $id = $this->id . "[" . $i . "][" . $column['name'] . "]";
                    if (isset($array[$id])) {
                        $rawData[$i][$column['name']] = $array[$id];
                    } else {
                        $rawData[$i][$column['name']] = 0;
                    }
                }
            }
            
        }

        
        for ($i = 0; $i < $totalrows; $i++) {
            foreach ($this->columns as $column) {
                if (isset($column['summary'])) {
                    $summaryColumns[$column['name']] = $column['summary'];
                }
            }
        }

//        $rawData[10] = array();
        if(sizeof($summaryColumns) > 0){
            foreach ($this->columns as $column) {
                $rawData[$totalrows][$column['name']] = '';
                $rawData[$totalrows]['id'] = 'summary';
            }            
//            foreach($summaryColumns as $name=>$summary){
//                $sum = 0;
//                for ($i = 0; $i < $totalrows; $i++) {
//                    $sum += $rawData[$i][$name];
//                }
//                $rawData[$totalrows][$name] = $sum;                
//            }            
        }


        $dataProvider = new CArrayDataProvider($rawData, array(
                    'id' => 'dataProvider',
                    'pagination'=>array('pageSize'=>$totalrows+1)
                ));
        return $dataProvider;
    }

}

?>
