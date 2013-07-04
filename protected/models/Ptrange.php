<?php

/**
 * This is the model class for table "{{ptrange}}".
 *
 * The followings are the available columns in table '{{ptrange}}':
 * @property string $idptrange
 * @property string $rangeno
 * @property string $rangename
 *
 * The followings are the available model relations:
 * @property Ptbhadarate[] $ptbhadarates
 * @property Ptmaster[] $ptmasters
 */
class Ptrange extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Ptrange the static model class
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
		return '{{ptrange}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rangeno, rangename', 'required'),
			array('rangeno', 'length', 'max'=>10),
			array('rangename', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idptrange, rangeno, rangename', 'safe', 'on'=>'search'),
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
			'ptbhadarates' => array(self::HAS_MANY, 'Ptbhadarate', 'idptrange'),
			'ptmasters' => array(self::HAS_MANY, 'Ptmaster', 'idptrange'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idptrange' => Yii::t('application', 'Idptrange'),
			'rangeno' => Yii::t('application', 'Rangeno'),
			'rangename' => Yii::t('application', 'Rangename'),
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

		$criteria->compare('idptrange',$this->idptrange,true);
		$criteria->compare('rangeno',$this->rangeno,true);
		$criteria->compare('rangename',$this->rangename,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}