<?php

/**
 * This is the model class for table "{{rtiperiodtypes}}".
 *
 * The followings are the available columns in table '{{rtiperiodtypes}}':
 * @property string $idrtiperiodtypes
 * @property string $periodname
 *
 * The followings are the available model relations:
 * @property Rtiinfo[] $rtiinfos
 */
class Rtiperiodtypes extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Rtiperiodtypes the static model class
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
		return '{{rtiperiodtypes}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('periodname', 'required'),
			array('idrtiperiodtypes, periodname', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idrtiperiodtypes, periodname', 'safe', 'on'=>'search'),
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
			'rtiinfos' => array(self::HAS_MANY, 'Rtiinfo', 'idrtiperiodtypes'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idrtiperiodtypes' => Yii::t('application', 'Idrtiperiodtypes'),
			'periodname' => Yii::t('application', 'Periodname'),
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

		$criteria->compare('idrtiperiodtypes',$this->idrtiperiodtypes,true);
		$criteria->compare('periodname',$this->periodname,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}