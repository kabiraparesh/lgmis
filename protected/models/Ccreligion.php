<?php

/**
 * This is the model class for table "{{ccreligion}}".
 *
 * The followings are the available columns in table '{{ccreligion}}':
 * @property string $idccreligion
 * @property string $religionname
 *
 * The followings are the available model relations:
 * @property Ccbpl[] $ccbpls
 * @property Hremployee[] $hremployees
 * @property Rcapplication[] $rcapplications
 */
class Ccreligion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Ccreligion the static model class
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
		return '{{ccreligion}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('religionname', 'required'),
			array('religionname', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idccreligion, religionname', 'safe', 'on'=>'search'),
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
			'ccbpls' => array(self::HAS_MANY, 'Ccbpl', 'idccreligion'),
			'hremployees' => array(self::HAS_MANY, 'Hremployee', 'idccreligion'),
			'rcapplications' => array(self::HAS_MANY, 'Rcapplication', 'idccreligion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idccreligion' => Yii::t('application', 'Idccreligion'),
			'religionname' => Yii::t('application', 'Religionname'),
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

		$criteria->compare('idccreligion',$this->idccreligion,true);
		$criteria->compare('religionname',$this->religionname,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}