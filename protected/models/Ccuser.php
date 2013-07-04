<?php

/**
 * This is the model class for table "{{ccuser}}".
 *
 * The followings are the available columns in table '{{ccuser}}':
 * @property string $idccuser
 * @property string $uname
 * @property string $password
 * @property string $type
 */
class Ccuser extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Ccuser the static model class
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
		return '{{ccuser}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uname, password, type', 'required'),
			array('uname, password, type', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idccuser, uname, password, type', 'safe', 'on'=>'search'),
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
			'idccuser' => Yii::t('application', 'Idccuser'),
			'uname' => Yii::t('application', 'Uname'),
			'password' => Yii::t('application', 'Password'),
			'type' => Yii::t('application', 'Type'),
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

		$criteria->compare('idccuser',$this->idccuser,true);
		$criteria->compare('uname',$this->uname,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('type',$this->type,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}