<?php

/**
 * This is the model class for table "{{ssgrant}}".
 *
 * The followings are the available columns in table '{{ssgrant}}':
 * @property string $idssgrant
 * @property string $type
 * @property string $amount
 * @property string $reason
 *
 * The followings are the available model relations:
 * @property Ssscheme[] $ssschemes
 */
class Ssgrant extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Ssgrant the static model class
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
		return '{{ssgrant}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type, reason', 'required'),
			array('type, reason', 'length', 'max'=>100),
			array('amount', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idssgrant, type, amount, reason', 'safe', 'on'=>'search'),
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
			'ssschemes' => array(self::HAS_MANY, 'Ssscheme', 'idssgrant'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idssgrant' => Yii::t('application', 'Idssgrant'),
			'type' => Yii::t('application', 'Type'),
			'amount' => Yii::t('application', 'Amount'),
			'reason' => Yii::t('application', 'Reason'),
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

		$criteria->compare('idssgrant',$this->idssgrant,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('reason',$this->reason,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}