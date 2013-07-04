<?php

/**
 * This is the model class for table "{{fdmeasure}}".
 *
 * The followings are the available columns in table '{{fdmeasure}}':
 * @property string $idfdmeasure
 * @property string $unitsymbol
 * @property string $unitname
 *
 * The followings are the available model relations:
 * @property Swstockitem[] $swstockitems
 */
class Fdmeasure extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Fdmeasure the static model class
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
		return '{{fdmeasure}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('unitsymbol, unitname', 'required'),
			array('unitsymbol', 'length', 'max'=>10),
			array('unitname', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idfdmeasure, unitsymbol, unitname', 'safe', 'on'=>'search'),
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
			'swstockitems' => array(self::HAS_MANY, 'Swstockitem', 'idfdmeasure'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idfdmeasure' => Yii::t('application', 'Idfdmeasure'),
			'unitsymbol' => Yii::t('application', 'Unitsymbol'),
			'unitname' => Yii::t('application', 'Unitname'),
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

		$criteria->compare('idfdmeasure',$this->idfdmeasure,true);
		$criteria->compare('unitsymbol',$this->unitsymbol,true);
		$criteria->compare('unitname',$this->unitname,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}