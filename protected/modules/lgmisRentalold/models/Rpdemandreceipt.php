<?php

/**
 * This is the model class for table "{{rpdemandreceipt}}".
 *
 * The followings are the available columns in table '{{rpdemandreceipt}}':
 * @property string $idrpdemandreceipt
 * @property string $demanddate
 * @property string $idccdepartment
 * @property string $idrpdemand
 * @property string $demandinname
 * @property string $demandamount
 * @property string $amountpaid
 * @property integer $paymenttype
 * @property string $chequeddpayorderno
 * @property string $chequeddpayorderdate
 * @property string $bankname
 * @property string $branchname
 * @property string $windowno
 * @property string $username
 * @property string $receiptbookno
 * @property string $receiptno
 * @property string $details
 * @property string $narration
 *
 * The followings are the available model relations:
 * @property Ccdepartment $idccdepartment0
 */
class Rpdemandreceipt extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Rpdemandreceipt the static model class
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
		return '{{rpdemandreceipt}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idrpdemand, paymenttype', 'required'),
			array('paymenttype', 'numerical', 'integerOnly'=>true),
			array('idccdepartment, idrpdemand, amountpaid, windowno', 'length', 'max'=>10),
			array('demandinname', 'length', 'max'=>100),
			array('demandamount, bankname, branchname, username', 'length', 'max'=>45),
			array('chequeddpayorderno', 'length', 'max'=>20),
			array('receiptbookno, receiptno', 'length', 'max'=>255),
			array('demanddate, chequeddpayorderdate, details, narration', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idrpdemandreceipt, demanddate, idccdepartment, idrpdemand, demandinname, demandamount, amountpaid, paymenttype, chequeddpayorderno, chequeddpayorderdate, bankname, branchname, windowno, username, receiptbookno, receiptno, details, narration', 'safe', 'on'=>'search'),
                       // array('idccdepartment', 'validatefkeys'),
		);
	}        
        
        public function validatefkeys($attribute,$params){
               $aux = $attribute . '0';
               if(!$this->$aux)
                    $this->addError($attribute, LgmisRentalModule::t('Incorrect {attribute}.', array('{attribute}'=>LgmisRentalModule::t($attribute))));
        }      
        
        
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
                 'idrpdemand0' => array(self::BELONGS_TO, 'Rpdemand', 'idrpdemand'),
		'idccdepartment0' => array(self::BELONGS_TO, 'Ccdepartment', 'idccdepartment'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idrpdemandreceipt' => Yii::t('application', 'Idrpdemandreceipt'),
			'demanddate' => Yii::t('application', 'Demanddate'),
			'idccdepartment' => Yii::t('application', 'Idccdepartment'),
			'idrpdemand' => Yii::t('application', 'Idrpdemand'),
			'demandinname' => Yii::t('application', 'Demandinname'),
			'demandamount' => Yii::t('application', 'Demandamount'),
			'amountpaid' => Yii::t('application', 'Amountpaid'),
			'paymenttype' => Yii::t('application', 'Paymenttype'),
			'chequeddpayorderno' => Yii::t('application', 'Chequeddpayorderno'),
			'chequeddpayorderdate' => Yii::t('application', 'Chequeddpayorderdate'),
			'bankname' => Yii::t('application', 'Bankname'),
			'branchname' => Yii::t('application', 'Branchname'),
			'windowno' => Yii::t('application', 'Windowno'),
			'username' => Yii::t('application', 'Username'),
			'receiptbookno' => Yii::t('application', 'Receiptbookno'),
			'receiptno' => Yii::t('application', 'Receiptno'),
			'details' => Yii::t('application', 'Details'),
			'narration' => Yii::t('application', 'Narration'),
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

		$criteria->compare('idrpdemandreceipt',$this->idrpdemandreceipt,true);
		$criteria->compare('demanddate',$this->demanddate,true);
		$criteria->compare('idccdepartment',$this->idccdepartment,true);
		$criteria->compare('idrpdemand',$this->idrpdemand,true);
		$criteria->compare('demandinname',$this->demandinname,true);
		$criteria->compare('demandamount',$this->demandamount,true);
		$criteria->compare('amountpaid',$this->amountpaid,true);
		$criteria->compare('paymenttype',$this->paymenttype);
		$criteria->compare('chequeddpayorderno',$this->chequeddpayorderno,true);
		$criteria->compare('chequeddpayorderdate',$this->chequeddpayorderdate,true);
		$criteria->compare('bankname',$this->bankname,true);
		$criteria->compare('branchname',$this->branchname,true);
		$criteria->compare('windowno',$this->windowno,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('receiptbookno',$this->receiptbookno,true);
		$criteria->compare('receiptno',$this->receiptno,true);
		$criteria->compare('details',$this->details,true);
		$criteria->compare('narration',$this->narration,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}