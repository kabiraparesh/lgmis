<?php

/**
 * This is the model class for table "{{lpmanadatory}}".
 *
 * The followings are the available columns in table '{{lpmanadatory}}':
 * @property string $idlpmanadatory
 * @property string $lname
 * @property string $issuedby
 *
 * The followings are the available model relations:
 * @property Lpbnature[] $lpbnatures
 */
class Lpmanadatory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Lpmanadatory the static model class
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
		return '{{lpmanadatory}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('lname, issuedby', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idlpmanadatory, lname, issuedby', 'safe', 'on'=>'search'),
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
			'lpbnatures' => array(self::HAS_MANY, 'Lpbnature', 'idlpmanadatory'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idlpmanadatory' => Yii::t('application', 'Idlpmanadatory'),
			'lname' => Yii::t('application', 'Lname'),
			'issuedby' => Yii::t('application', 'Issuedby'),
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

		$criteria->compare('idlpmanadatory',$this->idlpmanadatory,true);
		$criteria->compare('lname',$this->lname,true);
		$criteria->compare('issuedby',$this->issuedby,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}