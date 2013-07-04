<?php

/**
 * This is the model class for table "{{ccsex}}".
 *
 * The followings are the available columns in table '{{ccsex}}':
 * @property string $idccsex
 * @property string $sexname
 *
 * The followings are the available model relations:
 * @property Ccbpl[] $ccbpls
 * @property Hremployee[] $hremployees
 * @property Lplicency[] $lplicencies
 * @property Lprelative[] $lprelatives
 * @property Ptmaster[] $ptmasters
 * @property Pttransfer[] $pttransfers
 */
class Ccsex extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Ccsex the static model class
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
		return '{{ccsex}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sexname', 'required'),
			array('sexname', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idccsex, sexname', 'safe', 'on'=>'search'),
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
			'ccbpls' => array(self::HAS_MANY, 'Ccbpl', 'idccsex'),
			'hremployees' => array(self::HAS_MANY, 'Hremployee', 'idccsex'),
			'lplicencies' => array(self::HAS_MANY, 'Lplicency', 'idccsex'),
			'lprelatives' => array(self::HAS_MANY, 'Lprelative', 'idccsex'),
			'ptmasters' => array(self::HAS_MANY, 'Ptmaster', 'idccsex'),
			'pttransfers' => array(self::HAS_MANY, 'Pttransfer', 'idccsex'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idccsex' => Yii::t('application', 'Idccsex'),
			'sexname' => Yii::t('application', 'Sexname'),
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

		$criteria->compare('idccsex',$this->idccsex,true);
		$criteria->compare('sexname',$this->sexname,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}