<?php

/**
 * This is the model class for table "{{wmexsumptor}}".
 *
 * The followings are the available columns in table '{{wmexsumptor}}':
 * @property string $idwmexsumptor
 * @property string $exsumptortype
 * @property string $rebate
 *
 * The followings are the available model relations:
 * @property Wmmaster[] $wmmasters
 */
class Wmexsumptor extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Wmexsumptor the static model class
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
		return '{{wmexsumptor}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('exsumptortype', 'required'),
			array('exsumptortype', 'length', 'max'=>45),
			array('rebate', 'length', 'max'=>7),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idwmexsumptor, exsumptortype, rebate', 'safe', 'on'=>'search'),
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
			'wmmasters' => array(self::HAS_MANY, 'Wmmaster', 'idwmexsumptor'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idwmexsumptor' => LgmisWMModule::t('Idwmexsumptor'),
			'exsumptortype' => LgmisWMModule::t('Exsumptortype'),
			'rebate' => LgmisWMModule::t('Rebate'),
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

		$criteria->compare('idwmexsumptor',$this->idwmexsumptor,true);
		$criteria->compare('exsumptortype',$this->exsumptortype,true);
		$criteria->compare('rebate',$this->rebate,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}