<?php

/**
 * This is the model class for table "{{rprange}}".
 *
 * The followings are the available columns in table '{{rprange}}':
 * @property string $idrprange
 * @property string $rangetype
 *
 * The followings are the available model relations:
 * @property Rprate[] $rprates
 * @property Rpshop[] $rpshops
 */
class Rprange extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Rprange the static model class
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
		return '{{rprange}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rangetype', 'required'),
			array('rangetype', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idrprange, rangetype', 'safe', 'on'=>'search'),
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
			'rprates' => array(self::HAS_MANY, 'Rprate', 'idrprange'),
			'rpshops' => array(self::HAS_MANY, 'Rpshop', 'idrprange'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idrprange' => Yii::t('application', 'Idrprange'),
			'rangetype' => Yii::t('application', 'Rangetype'),
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

		$criteria->compare('idrprange',$this->idrprange,true);
		$criteria->compare('rangetype',$this->rangetype,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}