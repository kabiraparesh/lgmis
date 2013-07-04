<?php

/**
 * This is the model class for table "{{ccfyear}}".
 *
 * The followings are the available columns in table '{{ccfyear}}':
 * @property string $idccfyear
 * @property string $fyear
 *
 * The followings are the available model relations:
 * @property Bparearate[] $bparearates
 * @property Hrleavemaster[] $hrleavemasters
 * @property Hrleavesetting[] $hrleavesettings
 * @property Lpprepration[] $lppreprations
 * @property Lprate[] $lprates
 * @property Ptbhadarate[] $ptbhadarates
 * @property Ptservicetax[] $ptservicetaxes
 * @property Pttaxrate[] $pttaxrates
 * @property Pttransaction[] $pttransactions
 * @property Rcrate[] $rcrates
 * @property Rpbillingperiod[] $rpbillingperiods
 * @property Rpdemand[] $rpdemands
 * @property Rprate[] $rprates
 * @property Wmconfiguration[] $wmconfigurations
 * @property Wmdemand[] $wmdemands
 * @property Wmmaster[] $wmmasters
 */
class Ccfyear extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Ccfyear the static model class
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
		return '{{ccfyear}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fyear', 'required'),
			array('fyear', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idccfyear, fyear', 'safe', 'on'=>'search'),
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
			'bparearates' => array(self::HAS_MANY, 'Bparearate', 'idccfyear'),
			'hrleavemasters' => array(self::HAS_MANY, 'Hrleavemaster', 'idccfyear'),
			'hrleavesettings' => array(self::HAS_MANY, 'Hrleavesetting', 'idccfyear'),
			'lppreprations' => array(self::HAS_MANY, 'Lpprepration', 'idccfyear'),
			'lprates' => array(self::HAS_MANY, 'Lprate', 'idccfyear'),
			'ptbhadarates' => array(self::HAS_MANY, 'Ptbhadarate', 'idccfyear'),
			'ptservicetaxes' => array(self::HAS_MANY, 'Ptservicetax', 'idccfyear'),
			'pttaxrates' => array(self::HAS_MANY, 'Pttaxrate', 'idccfyear'),
			'pttransactions' => array(self::HAS_MANY, 'Pttransaction', 'idccfyear'),
			'rcrates' => array(self::HAS_MANY, 'Rcrate', 'idccfyear'),
			'rpbillingperiods' => array(self::HAS_MANY, 'Rpbillingperiod', 'idccfyear'),
			'rpdemands' => array(self::HAS_MANY, 'Rpdemand', 'idccfyear'),
			'rprates' => array(self::HAS_MANY, 'Rprate', 'idccfyear'),
			'wmconfigurations' => array(self::HAS_MANY, 'Wmconfiguration', 'idccfyear'),
			'wmdemands' => array(self::HAS_MANY, 'Wmdemand', 'idccfyear'),
			'wmmasters' => array(self::HAS_MANY, 'Wmmaster', 'idccfyear'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idccfyear' => Yii::t('application', 'Idccfyear'),
			'fyear' => Yii::t('application', 'Fyear'),
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

		$criteria->compare('idccfyear',$this->idccfyear,true);
		$criteria->compare('fyear',$this->fyear,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}