<?php

/**
 * This is the model class for table "{{fdvouchertype}}".
 *
 * The followings are the available columns in table '{{fdvouchertype}}':
 * @property string $idfdvouchertype
 * @property string $vouchertype
 *
 * The followings are the available model relations:
 * @property Fdtransactionmaster[] $fdtransactionmasters
 */
class Fdvouchertype extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Fdvouchertype the static model class
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
		return '{{fdvouchertype}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('vouchertype', 'required'),
			array('vouchertype', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idfdvouchertype, vouchertype', 'safe', 'on'=>'search'),
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
			'fdtransactionmasters' => array(self::HAS_MANY, 'Fdtransactionmaster', 'idfdvouchertype'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idfdvouchertype' => Yii::t('application', 'Idfdvouchertype'),
			'vouchertype' => Yii::t('application', 'Vouchertype'),
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

		$criteria->compare('idfdvouchertype',$this->idfdvouchertype,true);
		$criteria->compare('vouchertype',$this->vouchertype,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}