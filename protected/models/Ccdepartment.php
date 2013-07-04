<?php

/**
 * This is the model class for table "{{ccdepartment}}".
 *
 * The followings are the available columns in table '{{ccdepartment}}':
 * @property string $idccdepartment
 * @property string $departmentname
 * @property string $departmentcode
 * @property integer $demandflag
 *
 * The followings are the available model relations:
 * @property Fddemandreceipt[] $fddemandreceipts
 * @property Hremployee[] $hremployees
 */
class Ccdepartment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Ccdepartment the static model class
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
		return '{{ccdepartment}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('departmentname, departmentcode, demandflag', 'required'),
			array('demandflag', 'numerical', 'integerOnly'=>true),
			array('departmentname', 'length', 'max'=>100),
			array('departmentcode', 'length', 'max'=>4),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idccdepartment, departmentname, departmentcode, demandflag', 'safe', 'on'=>'search'),
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
			'fddemandreceipts' => array(self::HAS_MANY, 'Fddemandreceipt', 'idccdepartment'),
			'hremployees' => array(self::HAS_MANY, 'Hremployee', 'idccdepartment'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idccdepartment' => Yii::t('application', 'Idccdepartment'),
			'departmentname' => Yii::t('application', 'Departmentname'),
			'departmentcode' => Yii::t('application', 'Departmentcode'),
			'demandflag' => Yii::t('application', 'Demandflag'),
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

		$criteria->compare('idccdepartment',$this->idccdepartment,true);
		$criteria->compare('departmentname',$this->departmentname,true);
		$criteria->compare('departmentcode',$this->departmentcode,true);
		$criteria->compare('demandflag',$this->demandflag);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}