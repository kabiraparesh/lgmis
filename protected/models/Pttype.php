<?php

/**
 * This is the model class for table "{{pttype}}".
 *
 * The followings are the available columns in table '{{pttype}}':
 * @property string $idpttype
 * @property string $type
 *
 * The followings are the available model relations:
 * @property Ptmaster[] $ptmasters
 */
class Pttype extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Pttype the static model class
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
		return '{{pttype}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type', 'required'),
			array('type', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idpttype, type', 'safe', 'on'=>'search'),
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
			'ptmasters' => array(self::HAS_MANY, 'Ptmaster', 'idpttype'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idpttype' => Yii::t('application', 'Idpttype'),
			'type' => Yii::t('application', 'Type'),
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

		$criteria->compare('idpttype',$this->idpttype,true);
		$criteria->compare('type',$this->type,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}