<?php

/**
 * This is the model class for table "{{cmperiodtype}}".
 *
 * The followings are the available columns in table '{{cmperiodtype}}':
 * @property string $idcmperiodtype
 * @property string $periodname
 */
class Cmperiodtype extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Cmperiodtype the static model class
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
		return '{{cmperiodtype}}';
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
			array('idcmperiodtype, periodname', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idcmperiodtype, periodname', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idcmperiodtype' => Yii::t('application', 'Idcmperiodtype'),
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

		$criteria->compare('idcmperiodtype',$this->idcmperiodtype,true);
		$criteria->compare('periodname',$this->periodname,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}