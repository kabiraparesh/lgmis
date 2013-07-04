<?php

/**
 * This is the model class for table "{{ptdetailmeta}}".
 *
 * The followings are the available columns in table '{{ptdetailmeta}}':
 * @property string $idptdetailmeta
 * @property string $desc
 * @property string $pusage
 */
class Ptdetailmeta extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Ptdetailmeta the static model class
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
		return '{{ptdetailmeta}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('desc, pusage', 'required'),
			array('desc, pusage', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idptdetailmeta, desc, pusage', 'safe', 'on'=>'search'),
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
			'idptdetailmeta' => Yii::t('application', 'Idptdetailmeta'),
			'desc' => Yii::t('application', 'Desc'),
			'pusage' => Yii::t('application', 'Pusage'),
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

		$criteria->compare('idptdetailmeta',$this->idptdetailmeta,true);
		$criteria->compare('desc',$this->desc,true);
		$criteria->compare('pusage',$this->pusage,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}