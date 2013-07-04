<?php

/**
 * This is the model class for table "{{ptpropertyon}}".
 *
 * The followings are the available columns in table '{{ptpropertyon}}':
 * @property string $idptpropertyon
 * @property string $propertyon
 *
 * The followings are the available model relations:
 * @property Ptbhadarate[] $ptbhadarates
 * @property Ptmaster[] $ptmasters
 */
class Ptpropertyon extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Ptpropertyon the static model class
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
		return '{{ptpropertyon}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('propertyon', 'required'),
			array('propertyon', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idptpropertyon, propertyon', 'safe', 'on'=>'search'),
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
			'ptbhadarates' => array(self::HAS_MANY, 'Ptbhadarate', 'idptpropertyon'),
			'ptmasters' => array(self::HAS_MANY, 'Ptmaster', 'idptpropertyon'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idptpropertyon' => Yii::t('application', 'Idptpropertyon'),
			'propertyon' => Yii::t('application', 'Propertyon'),
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

		$criteria->compare('idptpropertyon',$this->idptpropertyon,true);
		$criteria->compare('propertyon',$this->propertyon,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}