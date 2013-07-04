<?php

/**
 * This is the model class for table "{{fdrules}}".
 *
 * The followings are the available columns in table '{{fdrules}}':
 * @property integer $idfdrules
 * @property string $description
 * @property integer $contracr
 * @property integer $contradr
 * @property integer $paymentcr
 * @property integer $paymentdr
 * @property integer $receiptcr
 * @property integer $receiptdr
 * @property integer $journalcr
 * @property integer $journaldr
 * @property integer $salescr
 * @property integer $salesdr
 * @property integer $purchasecr
 * @property integer $purchasedr
 *
 * The followings are the available model relations:
 * @property Fdgroup[] $fdgroups
 */
class Fdrules extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Fdrules the static model class
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
		return '{{fdrules}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('contracr, contradr, paymentcr, paymentdr, receiptcr, receiptdr, journalcr, journaldr, salescr, salesdr, purchasecr, purchasedr', 'numerical', 'integerOnly'=>true),
			array('description', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idfdrules, description, contracr, contradr, paymentcr, paymentdr, receiptcr, receiptdr, journalcr, journaldr, salescr, salesdr, purchasecr, purchasedr', 'safe', 'on'=>'search'),
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
			'fdgroups' => array(self::HAS_MANY, 'Fdgroup', 'idfdrules'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idfdrules' => Yii::t('application', 'Idfdrules'),
			'description' => Yii::t('application', 'Description'),
			'contracr' => Yii::t('application', 'Contracr'),
			'contradr' => Yii::t('application', 'Contradr'),
			'paymentcr' => Yii::t('application', 'Paymentcr'),
			'paymentdr' => Yii::t('application', 'Paymentdr'),
			'receiptcr' => Yii::t('application', 'Receiptcr'),
			'receiptdr' => Yii::t('application', 'Receiptdr'),
			'journalcr' => Yii::t('application', 'Journalcr'),
			'journaldr' => Yii::t('application', 'Journaldr'),
			'salescr' => Yii::t('application', 'Salescr'),
			'salesdr' => Yii::t('application', 'Salesdr'),
			'purchasecr' => Yii::t('application', 'Purchasecr'),
			'purchasedr' => Yii::t('application', 'Purchasedr'),
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

		$criteria->compare('idfdrules',$this->idfdrules);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('contracr',$this->contracr);
		$criteria->compare('contradr',$this->contradr);
		$criteria->compare('paymentcr',$this->paymentcr);
		$criteria->compare('paymentdr',$this->paymentdr);
		$criteria->compare('receiptcr',$this->receiptcr);
		$criteria->compare('receiptdr',$this->receiptdr);
		$criteria->compare('journalcr',$this->journalcr);
		$criteria->compare('journaldr',$this->journaldr);
		$criteria->compare('salescr',$this->salescr);
		$criteria->compare('salesdr',$this->salesdr);
		$criteria->compare('purchasecr',$this->purchasecr);
		$criteria->compare('purchasedr',$this->purchasedr);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}