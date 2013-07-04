<?php

/**
 * This is the model class for table "{{lpbtype}}".
 *
 * The followings are the available columns in table '{{lpbtype}}':
 * @property string $idlpbtype
 * @property string $btypeen
 */
class Lpbtype extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Lpbtype the static model class
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
		return '{{lpbtype}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('btypeen', 'required'),
			array('btypeen', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idlpbtype, btypeen', 'safe', 'on'=>'search'),
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
			'idlpbtype' => Yii::t('application', 'Idlpbtype'),
			'btypeen' => Yii::t('application', 'Btypeen'),
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

		$criteria->compare('idlpbtype',$this->idlpbtype,true);
		$criteria->compare('btypeen',$this->btypeen,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}