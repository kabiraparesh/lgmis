<?php

/**
 * This is the model class for table "{{bpuseagetype}}".
 *
 * The followings are the available columns in table '{{bpuseagetype}}':
 * @property string $idbpuseagetype
 * @property string $usagetype
 * @property string $description
 *
 * The followings are the available model relations:
 * @property Bparearate[] $bparearates
 */
class Bpuseagetype extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Bpuseagetype the static model class
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
		return '{{bpuseagetype}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usagetype', 'required'),
			array('usagetype, description', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idbpuseagetype, usagetype, description', 'safe', 'on'=>'search'),
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
			'bparearates' => array(self::HAS_MANY, 'Bparearate', 'idbpuseagetype'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idbpuseagetype' => Yii::t('application', 'Idbpuseagetype'),
			'usagetype' => Yii::t('application', 'Usagetype'),
			'description' => Yii::t('application', 'Description'),
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

		$criteria->compare('idbpuseagetype',$this->idbpuseagetype,true);
		$criteria->compare('usagetype',$this->usagetype,true);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}