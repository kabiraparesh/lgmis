<?php

/**
 * This is the model class for table "{{rpdemand}}".
 *
 * The followings are the available columns in table '{{rpdemand}}':
 * @property string $idrpdemand
 * @property string $idrpproregist
 * @property string $name
 * @property string $address
 * @property string $idccward
 * @property string $openingbal
 * @property string $oldbal
 * @property string $billduedate
 * @property string $billlastdate
 * @property string $amtduedate
 * @property string $adtaftduedate
 * @property string $idccfyear
 *
 * The followings are the available model relations:
 * @property Ccfyear $idccfyear0
 * @property Ccward $idccward0
 * @property Rpproregist $idrpproregist0
 */
class Rpdemand extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Rpdemand the static model class
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
		return '{{rpdemand}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idrpdemand, idrpproregist', 'required'),
			array('idrpdemand, idrpproregist, idccward, idccfyear', 'length', 'max'=>10),
			array('name, address', 'length', 'max'=>100),
			array('openingbal, oldbal, amtduedate, adtaftduedate', 'length', 'max'=>15),
			array('billduedate, billlastdate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idrpdemand, idrpproregist, name, address, idccward, openingbal, oldbal, billduedate, billlastdate, amtduedate, adtaftduedate, idccfyear', 'safe', 'on'=>'search'),
                        array('idrpproregist, idccward, idccfyear', 'validatefkeys'),
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
			'idccfyear0' => array(self::BELONGS_TO, 'Ccfyear', 'idccfyear'),
			'idccward0' => array(self::BELONGS_TO, 'Ccward', 'idccward'),
			'idrpproregist0' => array(self::BELONGS_TO, 'Rpproregist', 'idrpproregist'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idrpdemand' => Yii::t('application', 'Idrpdemand'),
			'idrpproregist' => Yii::t('application', 'Idrpproregist'),
			'name' => Yii::t('application', 'Name'),
			'address' => Yii::t('application', 'Address'),
			'idccward' => Yii::t('application', 'Idccward'),
			'openingbal' => Yii::t('application', 'Openingbal'),
			'oldbal' => Yii::t('application', 'Oldbal'),
			'billduedate' => Yii::t('application', 'Billduedate'),
			'billlastdate' => Yii::t('application', 'Billlastdate'),
			'amtduedate' => Yii::t('application', 'Amtduedate'),
			'adtaftduedate' => Yii::t('application', 'Adtaftduedate'),
			'idccfyear' => Yii::t('application', 'Idccfyear'),
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

		$criteria->compare('idrpdemand',$this->idrpdemand,true);
		$criteria->compare('idrpproregist',$this->idrpproregist,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('idccward',$this->idccward,true);
		$criteria->compare('openingbal',$this->openingbal,true);
		$criteria->compare('oldbal',$this->oldbal,true);
		$criteria->compare('billduedate',$this->billduedate,true);
		$criteria->compare('billlastdate',$this->billlastdate,true);
		$criteria->compare('amtduedate',$this->amtduedate,true);
		$criteria->compare('adtaftduedate',$this->adtaftduedate,true);
		$criteria->compare('idccfyear',$this->idccfyear,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}