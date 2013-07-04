<?php

/**
 * This is the model class for table "{{cmprioritylevel}}".
 *
 * The followings are the available columns in table '{{cmprioritylevel}}':
 * @property string $idcmprioritylevel
 * @property string $priorityname
 *
 * The followings are the available model relations:
 * @property Cmcomplaint[] $cmcomplaints
 */
class Cmprioritylevel extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Cmprioritylevel the static model class
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
		return '{{cmprioritylevel}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('priorityname', 'required'),
			array('idcmprioritylevel', 'length', 'max'=>10),
			array('priorityname', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idcmprioritylevel, priorityname', 'safe', 'on'=>'search'),
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
			'cmcomplaints' => array(self::HAS_MANY, 'Cmcomplaint', 'idcmprioritylevel'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idcmprioritylevel' => Yii::t('application', 'Idcmprioritylevel'),
			'priorityname' => Yii::t('application', 'Priorityname'),
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

		$criteria->compare('idcmprioritylevel',$this->idcmprioritylevel,true);
		$criteria->compare('priorityname',$this->priorityname,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}