<?php

/**
 * This is the model class for table "{{ptbreakup}}".
 *
 * The followings are the available columns in table '{{ptbreakup}}':
 * @property string $idptbreakup
 * @property string $date
 * @property string $oldservice
 * @property string $ownername
 * @property string $address
 *
 * The followings are the available model relations:
 * @property Ptbreakupdetail[] $ptbreakupdetails
 */
class Ptbreakup extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Ptbreakup the static model class
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
		return '{{ptbreakup}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date, oldservice, ownername, address', 'required'),
			array('oldservice', 'length', 'max'=>45),
			array('ownername, address', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idptbreakup, date, oldservice, ownername, address', 'safe', 'on'=>'search'),
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
			'ptbreakupdetails' => array(self::HAS_MANY, 'Ptbreakupdetail', 'idptbreakup'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idptbreakup' => Yii::t('application', 'Idptbreakup'),
			'date' => Yii::t('application', 'Date'),
			'oldservice' => Yii::t('application', 'Oldservice'),
			'ownername' => Yii::t('application', 'Ownername'),
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

		$criteria->compare('idptbreakup',$this->idptbreakup,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('oldservice',$this->oldservice,true);
		$criteria->compare('ownername',$this->ownername,true);
		$criteria->compare('address',$this->address,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}