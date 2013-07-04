<?php

/**
 * This is the model class for table "{{ccstatus}}".
 *
 * The followings are the available columns in table '{{ccstatus}}':
 * @property string $idccstatus
 * @property string $statusname
 *
 * The followings are the available model relations:
 * @property Lpapplicant[] $lpapplicants
 * @property Lpprepration[] $lppreprations
 * @property Pttransfer[] $pttransfers
 * @property Rcapplication[] $rcapplications
 * @property Rpproregist[] $rpproregists
 * @property Rtiinfo[] $rtiinfos
 * @property Wmmaster[] $wmmasters
 */
class Ccstatus extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Ccstatus the static model class
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
		return '{{ccstatus}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('statusname', 'required'),
			array('statusname', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idccstatus, statusname', 'safe', 'on'=>'search'),
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
			'lpapplicants' => array(self::HAS_MANY, 'Lpapplicant', 'idccstatus'),
			'lppreprations' => array(self::HAS_MANY, 'Lpprepration', 'idccstatus'),
			'pttransfers' => array(self::HAS_MANY, 'Pttransfer', 'idccstatus'),
			'rcapplications' => array(self::HAS_MANY, 'Rcapplication', 'idccstatus'),
			'rpproregists' => array(self::HAS_MANY, 'Rpproregist', 'idccstatus'),
			'rtiinfos' => array(self::HAS_MANY, 'Rtiinfo', 'idccstatus'),
			'wmmasters' => array(self::HAS_MANY, 'Wmmaster', 'idccstatus'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idccstatus' => Yii::t('application', 'Idccstatus'),
			'statusname' => Yii::t('application', 'Statusname'),
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

		$criteria->compare('idccstatus',$this->idccstatus,true);
		$criteria->compare('statusname',$this->statusname,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}