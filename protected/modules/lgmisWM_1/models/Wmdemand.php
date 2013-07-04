<?php

/**
 * This is the model class for table "{{wmdemand}}".
 *
 * The followings are the available columns in table '{{wmdemand}}':
 * @property string $idwmdemand
 * @property string $idwmmaster
 * @property string $idccfyear
 * @property string $idccmonth
 * @property string $wmoldbalance
 * @property string $wmsurcharge
 * @property string $wmdemandamt
 * @property string $wmdemanddate
 *
 * The followings are the available model relations:
 * @property Ccfyear $idccfyear0
 * @property Ccmonth $idccmonth0
 * @property Wmmaster $idwmmaster0
 */
class Wmdemand extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Wmdemand the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{wmdemand}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idwmmaster, wmdemanddate', 'required'),
			array('idwmmaster, idccfyear, idccmonth, wmoldbalance, wmsurcharge, wmdemandamt', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idwmdemand, idwmmaster, idccfyear, idccmonth, wmoldbalance, wmsurcharge, wmdemandamt, wmdemanddate', 'safe', 'on'=>'search'),
                        array('idwmmaster, idccfyear, idccmonth', 'validatefkeys'),
		);
	}        
        
        public function validatefkeys($attribute,$params){
               $aux = $attribute . '0';
               if(!$this->$aux)
                    $this->addError($attribute, LgmisWMModule::t('Incorrect {attribute}.', array('{attribute}'=>LgmisWMModule::t($attribute))));
        }      
        
        
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idccfyear0' => array(self::BELONGS_TO, 'Ccfyear', 'idccfyear'),
			'idccmonth0' => array(self::BELONGS_TO, 'Ccmonth', 'idccmonth'),
			'idwmmaster0' => array(self::BELONGS_TO, 'Wmmaster', 'idwmmaster'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idwmdemand' => LgmisWMModule::t('Idwmdemand'),
			'idwmmaster' => LgmisWMModule::t('Idwmmaster'),
			'idccfyear' => LgmisWMModule::t('Idccfyear'),
			'idccmonth' => LgmisWMModule::t('Idccmonth'),
			'wmoldbalance' => LgmisWMModule::t('Wmoldbalance'),
			'wmsurcharge' => LgmisWMModule::t('Wmsurcharge'),
			'wmdemandamt' => LgmisWMModule::t('Wmdemandamt'),
			'wmdemanddate' => LgmisWMModule::t('Wmdemanddate'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idwmdemand',$this->idwmdemand,true);
		$criteria->compare('idwmmaster',$this->idwmmaster,true);
		$criteria->compare('idccfyear',$this->idccfyear,true);
		$criteria->compare('idccmonth',$this->idccmonth,true);
		$criteria->compare('wmoldbalance',$this->wmoldbalance,true);
		$criteria->compare('wmsurcharge',$this->wmsurcharge,true);
		$criteria->compare('wmdemandamt',$this->wmdemandamt,true);
		$criteria->compare('wmdemanddate',$this->wmdemanddate,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}