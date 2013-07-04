<?php

/**
 * This is the model class for table "{{cczone}}".
 *
 * The followings are the available columns in table '{{cczone}}':
 * @property string $idcczone
 * @property string $zonename
 *
 * The followings are the available model relations:
 * @property Ccward[] $ccwards
 * @property Lpapplicant[] $lpapplicants
 */
class Cczone extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Cczone the static model class
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
		return '{{cczone}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('zonename', 'required'),
			array('zonename', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idcczone, zonename', 'safe', 'on'=>'search'),
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
			'ccwards' => array(self::HAS_MANY, 'Ccward', 'idcczone'),
			'lpapplicants' => array(self::HAS_MANY, 'Lpapplicant', 'idcczone'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idcczone' => Yii::t('application', 'Idcczone'),
			'zonename' => Yii::t('application', 'Zonename'),
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

		$criteria->compare('idcczone',$this->idcczone,true);
		$criteria->compare('zonename',$this->zonename,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}