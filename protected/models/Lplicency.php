<?php

/**
 * This is the model class for table "{{lplicency}}".
 *
 * The followings are the available columns in table '{{lplicency}}':
 * @property string $idlplicency
 * @property string $name
 * @property string $age
 * @property string $idccsex
 * @property string $address
 *
 * The followings are the available model relations:
 * @property Lpapplicant[] $lpapplicants
 * @property Ccsex $idccsex0
 * @property Lprate[] $lprates
 */
class Lplicency extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Lplicency the static model class
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
		return '{{lplicency}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idlplicency', 'required'),
			array('idlplicency', 'length', 'max'=>8),
			array('name, age, address', 'length', 'max'=>100),
			array('idccsex', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idlplicency, name, age, idccsex, address', 'safe', 'on'=>'search'),
                        array('idccsex', 'validatefkeys'),
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
			'lpapplicants' => array(self::HAS_MANY, 'Lpapplicant', 'idlplicency'),
			'idccsex0' => array(self::BELONGS_TO, 'Ccsex', 'idccsex'),
			'lprates' => array(self::HAS_MANY, 'Lprate', 'idlplicency'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idlplicency' => Yii::t('application', 'Idlplicency'),
			'name' => Yii::t('application', 'Name'),
			'age' => Yii::t('application', 'Age'),
			'idccsex' => Yii::t('application', 'Idccsex'),
			'address' => Yii::t('application', 'Address'),
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

		$criteria->compare('idlplicency',$this->idlplicency,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('age',$this->age,true);
		$criteria->compare('idccsex',$this->idccsex,true);
		$criteria->compare('address',$this->address,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}