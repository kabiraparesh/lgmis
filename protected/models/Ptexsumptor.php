<?php

/**
 * This is the model class for table "{{ptexsumptor}}".
 *
 * The followings are the available columns in table '{{ptexsumptor}}':
 * @property string $idptexsumptor
 * @property string $type
 * @property string $rebate
 *
 * The followings are the available model relations:
 * @property Pttransfer[] $pttransfers
 */
class Ptexsumptor extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Ptexsumptor the static model class
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
		return '{{ptexsumptor}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type, rebate', 'required'),
			array('type', 'length', 'max'=>45),
			array('rebate', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idptexsumptor, type, rebate', 'safe', 'on'=>'search'),
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
			'pttransfers' => array(self::HAS_MANY, 'Pttransfer', 'idptexsumptor'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idptexsumptor' => Yii::t('application', 'Idptexsumptor'),
			'type' => Yii::t('application', 'Type'),
			'rebate' => Yii::t('application', 'Rebate'),
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

		$criteria->compare('idptexsumptor',$this->idptexsumptor,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('rebate',$this->rebate,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}