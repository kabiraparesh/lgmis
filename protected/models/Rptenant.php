<?php

/**
 * This is the model class for table "{{rptenant}}".
 *
 * The followings are the available columns in table '{{rptenant}}':
 * @property string $idrptenant
 * @property string $idrpbillingperiod
 * @property string $name
 * @property string $address
 * @property string $contactno
 *
 * The followings are the available model relations:
 * @property Rprent[] $rprents
 * @property Rpbillingperiod $idrpbillingperiod0
 */
class Rptenant extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Rptenant the static model class
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
		return '{{rptenant}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idrptenant, idrpbillingperiod', 'required'),
			array('idrptenant, idrpbillingperiod', 'length', 'max'=>10),
			array('name, address, contactno', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idrptenant, idrpbillingperiod, name, address, contactno', 'safe', 'on'=>'search'),
                        array('idrpbillingperiod', 'validatefkeys'),
		);
	}        
        
        public function validatefkeys($attribute,$params){
               $aux = $attribute . '0';
               if(!$this->$aux)
                    $this->addError($attribute, Yii::t('application', 'Incorrect {attribute}.', array('{attribute}'=>Yii::t('application', $attribute))));
        }      
        
        
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'rprents' => array(self::HAS_MANY, 'Rprent', 'idrptenant'),
			'idrpbillingperiod0' => array(self::BELONGS_TO, 'Rpbillingperiod', 'idrpbillingperiod'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idrptenant' => Yii::t('application', 'Idrptenant'),
			'idrpbillingperiod' => Yii::t('application', 'Idrpbillingperiod'),
			'name' => Yii::t('application', 'Name'),
			'address' => Yii::t('application', 'Address'),
			'contactno' => Yii::t('application', 'Contactno'),
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

		$criteria->compare('idrptenant',$this->idrptenant,true);
		$criteria->compare('idrpbillingperiod',$this->idrpbillingperiod,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('contactno',$this->contactno,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}