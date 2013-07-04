<?php

/**
 * This is the model class for table "{{wmplumber}}".
 *
 * The followings are the available columns in table '{{wmplumber}}':
 * @property string $idwmplumber
 * @property string $plumbername
 * @property string $address
 * @property string $details
 * @property string $phoneno
 *
 * The followings are the available model relations:
 * @property Wmmaster[] $wmmasters
 */
class Wmplumber extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Wmplumber the static model class
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
		return '{{wmplumber}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('plumbername, address, details, phoneno', 'required'),
			array('plumbername, address, details', 'length', 'max'=>100),
			array('phoneno', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idwmplumber, plumbername, address, details, phoneno', 'safe', 'on'=>'search'),
		);
	}        
        
        
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'wmmasters' => array(self::HAS_MANY, 'Wmmaster', 'idwmplumber'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idwmplumber' => LgmisWMModule::t('Idwmplumber'),
			'plumbername' => LgmisWMModule::t('Plumbername'),
			'address' => LgmisWMModule::t('Address'),
			'details' => LgmisWMModule::t('Details'),
			'phoneno' => LgmisWMModule::t('Phoneno'),
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

		$criteria->compare('idwmplumber',$this->idwmplumber,true);
		$criteria->compare('plumbername',$this->plumbername,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('details',$this->details,true);
		$criteria->compare('phoneno',$this->phoneno,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}