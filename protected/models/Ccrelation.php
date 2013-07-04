<?php

/**
 * This is the model class for table "{{ccrelation}}".
 *
 * The followings are the available columns in table '{{ccrelation}}':
 * @property string $idccrelation
 * @property string $relationname
 *
 * The followings are the available model relations:
 * @property Lprelative[] $lprelatives
 * @property Rcfamdetail[] $rcfamdetails
 */
class Ccrelation extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Ccrelation the static model class
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
		return '{{ccrelation}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('relationname', 'required'),
			array('relationname', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idccrelation, relationname', 'safe', 'on'=>'search'),
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
			'lprelatives' => array(self::HAS_MANY, 'Lprelative', 'idccrelation'),
			'rcfamdetails' => array(self::HAS_MANY, 'Rcfamdetail', 'idccrelation'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idccrelation' => Yii::t('application', 'Idccrelation'),
			'relationname' => Yii::t('application', 'Relationname'),
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

		$criteria->compare('idccrelation',$this->idccrelation,true);
		$criteria->compare('relationname',$this->relationname,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}