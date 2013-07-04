<?php

/**
 * This is the model class for table "{{ccmonthendsetting}}".
 *
 * The followings are the available columns in table '{{ccmonthendsetting}}':
 * @property string $idccmonthendsetting
 * @property string $month
 * @property string $year
 * @property string $dayendstatus
 */
class Ccmonthendsetting extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Ccmonthendsetting the static model class
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
		return '{{ccmonthendsetting}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('month, year, dayendstatus', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idccmonthendsetting, month, year, dayendstatus', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idccmonthendsetting' => Yii::t('application', 'Idccmonthendsetting'),
			'month' => Yii::t('application', 'Month'),
			'year' => Yii::t('application', 'Year'),
			'dayendstatus' => Yii::t('application', 'Dayendstatus'),
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

		$criteria->compare('idccmonthendsetting',$this->idccmonthendsetting,true);
		$criteria->compare('month',$this->month,true);
		$criteria->compare('year',$this->year,true);
		$criteria->compare('dayendstatus',$this->dayendstatus,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}