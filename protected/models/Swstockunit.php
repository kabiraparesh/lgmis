<?php

/**
 * This is the model class for table "{{swstockunit}}".
 *
 * The followings are the available columns in table '{{swstockunit}}':
 * @property string $idswstockunit
 * @property string $unitsymbol
 * @property string $unitnamehi
 * @property string $unitnameen
 */
class Swstockunit extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Swstockunit the static model class
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
		return '{{swstockunit}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('unitnamehi, unitnameen', 'required'),
			array('unitsymbol, unitnamehi, unitnameen', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idswstockunit, unitsymbol, unitnamehi, unitnameen', 'safe', 'on'=>'search'),
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
			'idswstockunit' => Yii::t('application', 'Idswstockunit'),
			'unitsymbol' => Yii::t('application', 'Unitsymbol'),
			'unitnamehi' => Yii::t('application', 'Unitnamehi'),
			'unitnameen' => Yii::t('application', 'Unitnameen'),
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

		$criteria->compare('idswstockunit',$this->idswstockunit,true);
		$criteria->compare('unitsymbol',$this->unitsymbol,true);
		$criteria->compare('unitnamehi',$this->unitnamehi,true);
		$criteria->compare('unitnameen',$this->unitnameen,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}