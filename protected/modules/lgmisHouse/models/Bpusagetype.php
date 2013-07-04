<?php

/**
 * This is the model class for table "{{bpusagetype}}".
 *
 * The followings are the available columns in table '{{bpusagetype}}':
 * @property string $idbpusagetype
 * @property string $usagetype
 * @property string $description
 *
 * The followings are the available model relations:
 * @property Bpapplication[] $bpapplications
 * @property Bpapplication[] $bpapplications1
 * @property Bparearate[] $bparearates
 */
class Bpusagetype extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Bpusagetype the static model class
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
		return '{{bpusagetype}}';
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
			array('idbpusagetype, usagetype, description', 'safe', 'on'=>'search'),
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
			'bpapplications' => array(self::HAS_MANY, 'Bpapplication', 'idnewbpusagetype'),
			'bpapplications1' => array(self::HAS_MANY, 'Bpapplication', 'idbpusagetype'),
			'bparearates' => array(self::HAS_MANY, 'Bparearate', 'idbpusagetype'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idbpusagetype' => Yii::t('application', 'Idbpusagetype'),
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

		$criteria->compare('idbpusagetype',$this->idbpusagetype,true);
		$criteria->compare('usagetype',$this->usagetype,true);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}