<?php

/**
 * This is the model class for table "{{lpholiday}}".
 *
 * The followings are the available columns in table '{{lpholiday}}':
 * @property string $idlpholiday
 * @property string $holiday1
 * @property string $holiday2
 *
 * The followings are the available model relations:
 * @property Lpapplicant[] $lpapplicants
 */
class Lpholiday extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Lpholiday the static model class
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
		return '{{lpholiday}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idlpholiday', 'required'),
			array('idlpholiday', 'length', 'max'=>8),
			array('holiday1, holiday2', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idlpholiday, holiday1, holiday2', 'safe', 'on'=>'search'),
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
			'lpapplicants' => array(self::HAS_MANY, 'Lpapplicant', 'idlpholiday'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idlpholiday' => Yii::t('application', 'Idlpholiday'),
			'holiday1' => Yii::t('application', 'Holiday1'),
			'holiday2' => Yii::t('application', 'Holiday2'),
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

		$criteria->compare('idlpholiday',$this->idlpholiday,true);
		$criteria->compare('holiday1',$this->holiday1,true);
		$criteria->compare('holiday2',$this->holiday2,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}