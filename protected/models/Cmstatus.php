<?php

/**
 * This is the model class for table "{{cmstatus}}".
 *
 * The followings are the available columns in table '{{cmstatus}}':
 * @property string $idcmstatus
 * @property string $statusname
 *
 * The followings are the available model relations:
 * @property Cmapplication[] $cmapplications
 * @property Cmcomplaint[] $cmcomplaints
 */
class Cmstatus extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Cmstatus the static model class
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
		return '{{cmstatus}}';
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
			array('idcmstatus', 'length', 'max'=>10),
			array('statusname', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idcmstatus, statusname', 'safe', 'on'=>'search'),
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
			'cmapplications' => array(self::HAS_MANY, 'Cmapplication', 'idcmstatus'),
			'cmcomplaints' => array(self::HAS_MANY, 'Cmcomplaint', 'idcmstatus'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idcmstatus' => Yii::t('application', 'Idcmstatus'),
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

		$criteria->compare('idcmstatus',$this->idcmstatus,true);
		$criteria->compare('statusname',$this->statusname,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}