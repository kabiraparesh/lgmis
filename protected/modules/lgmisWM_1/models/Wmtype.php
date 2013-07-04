<?php

/**
 * This is the model class for table "{{wmtype}}".
 *
 * The followings are the available columns in table '{{wmtype}}':
 * @property string $idwmtype
 * @property string $wmtype
 *
 * The followings are the available model relations:
 * @property Wmconfiguration[] $wmconfigurations
 * @property Wmmaster[] $wmmasters
 */
class Wmtype extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Wmtype the static model class
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
		return '{{wmtype}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('wmtype', 'required'),
			array('wmtype', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idwmtype, wmtype', 'safe', 'on'=>'search'),
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
			'wmconfigurations' => array(self::HAS_MANY, 'Wmconfiguration', 'idwmtype'),
			'wmmasters' => array(self::HAS_MANY, 'Wmmaster', 'idwmtype'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idwmtype' => LgmisWMModule::t('Idwmtype'),
			'wmtype' => LgmisWMModule::t('Wmtype'),
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

		$criteria->compare('idwmtype',$this->idwmtype,true);
		$criteria->compare('wmtype',$this->wmtype,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}