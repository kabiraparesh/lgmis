<?php

/**
 * This is the model class for table "{{wmsize}}".
 *
 * The followings are the available columns in table '{{wmsize}}':
 * @property string $idwmsize
 * @property string $wmsize
 *
 * The followings are the available model relations:
 * @property Wmconfiguration[] $wmconfigurations
 * @property Wmmaster[] $wmmasters
 */
class Wmsize extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Wmsize the static model class
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
		return '{{wmsize}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('wmsize', 'required'),
			array('wmsize', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idwmsize, wmsize', 'safe', 'on'=>'search'),
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
			'wmconfigurations' => array(self::HAS_MANY, 'Wmconfiguration', 'idwmsize'),
			'wmmasters' => array(self::HAS_MANY, 'Wmmaster', 'idwmsize'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idwmsize' => Yii::t('application', 'Idwmsize'),
			'wmsize' => Yii::t('application', 'Wmsize'),
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

		$criteria->compare('idwmsize',$this->idwmsize,true);
		$criteria->compare('wmsize',$this->wmsize,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}