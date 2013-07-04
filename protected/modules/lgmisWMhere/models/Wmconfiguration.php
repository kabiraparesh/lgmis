<?php

/**
 * This is the model class for table "{{wmconfiguration}}".
 *
 * The followings are the available columns in table '{{wmconfiguration}}':
 * @property string $idwmconfiguration
 * @property string $idccfyear
 * @property string $idwmtype
 * @property string $idwmsize
 * @property string $wmtape
 * @property string $newconncharge
 * @property string $tempconncharge
 * @property string $reconncharge
 * @property string $tempdisconncharge
 * @property string $surcharge
 * @property string $monthlycharges
 *
 * The followings are the available model relations:
 * @property Ccfyear $idccfyear0
 * @property Wmsize $idwmsize0
 * @property Wmtype $idwmtype0
 */
class Wmconfiguration extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Wmconfiguration the static model class
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
		return '{{wmconfiguration}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idccfyear, idwmtype, idwmsize, wmtape, newconncharge, tempconncharge, reconncharge, tempdisconncharge, surcharge, monthlycharges', 'required'),
			array('idccfyear, idwmtype, idwmsize, wmtape', 'length', 'max'=>10),
			array('newconncharge, tempconncharge, reconncharge, tempdisconncharge, surcharge, monthlycharges', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idwmconfiguration, idccfyear, idwmtype, idwmsize, wmtape, newconncharge, tempconncharge, reconncharge, tempdisconncharge, surcharge, monthlycharges', 'safe', 'on'=>'search'),
                        array('idccfyear, idwmtype, idwmsize', 'validatefkeys'),
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
			'idwmsize0' => array(self::BELONGS_TO, 'Wmsize', 'idwmsize'),
			'idwmtype0' => array(self::BELONGS_TO, 'Wmtype', 'idwmtype'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idwmconfiguration' => LgmisWMModule::t('Idwmconfiguration'),
			'idccfyear' => LgmisWMModule::t('Idccfyear'),
			'idwmtype' => LgmisWMModule::t('Idwmtype'),
			'idwmsize' => LgmisWMModule::t('Idwmsize'),
			'wmtape' => LgmisWMModule::t('Wmtape'),
			'newconncharge' => LgmisWMModule::t('Newconncharge'),
			'tempconncharge' => LgmisWMModule::t('Tempconncharge'),
			'reconncharge' => LgmisWMModule::t('Reconncharge'),
			'tempdisconncharge' => LgmisWMModule::t('Tempdisconncharge'),
			'surcharge' => LgmisWMModule::t('Surcharge'),
			'monthlycharges' => LgmisWMModule::t('Monthlycharges'),
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
                $this->idccfyear = Yii::app()->session['ccfyear']->idccfyear;

		$criteria=new CDbCriteria;

		$criteria->compare('idwmconfiguration',$this->idwmconfiguration,true);
		$criteria->compare('idccfyear',$this->idccfyear,true);
		$criteria->compare('idwmtype',$this->idwmtype,true);
		$criteria->compare('idwmsize',$this->idwmsize,true);
		$criteria->compare('wmtape',$this->wmtape,true);
		$criteria->compare('newconncharge',$this->newconncharge,true);
		$criteria->compare('tempconncharge',$this->tempconncharge,true);
		$criteria->compare('reconncharge',$this->reconncharge,true);
		$criteria->compare('tempdisconncharge',$this->tempdisconncharge,true);
		$criteria->compare('surcharge',$this->surcharge,true);
		$criteria->compare('monthlycharges',$this->monthlycharges,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}