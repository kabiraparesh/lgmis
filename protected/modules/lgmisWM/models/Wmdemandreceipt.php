<?php

/**
 * This is the model class for table "{{wmdemandreceipt}}".
 *
 * The followings are the available columns in table '{{wmdemandreceipt}}':
 * @property string $idwmdemandreceipt
 * @property string $demanddate
 * @property string $idccdepartment
 * @property string $idwmdemand
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
 *
 * The followings are the available model relations:
 * @property Wmdemand $idwmdemand0
 * @property Ccdepartment $idccdepartment0
 */
class Wmdemandreceipt extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Wmdemandreceipt the static model class
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
		return '{{wmdemandreceipt}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
// 			array('idwmdemand, demandinname, demandamount, paymenttype', 'required'),
			array('idwmdemand, paymenttype', 'required'),
			array('paymenttype', 'numerical', 'integerOnly'=>true),
			array('idccdepartment, idwmdemand, amountpaid, windowno', 'length', 'max'=>10),
			array('demandinname', 'length', 'max'=>100),
			array('demandamount, bankname, branchname, username', 'length', 'max'=>45),
			array('chequeddpayorderno', 'length', 'max'=>20),
			array('receiptbookno, receiptno', 'length', 'max'=>255),
			array('narration, demanddate, chequeddpayorderdate, details', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idwmdemandreceipt, demanddate, idwmdemand, demandinname, demandamount, amountpaid, paymenttype, chequeddpayorderno, chequeddpayorderdate, bankname, branchname, windowno, username, receiptbookno, receiptno, details', 'safe', 'on'=>'search'),
            //array('idccdepartment, idwmdemand', 'validatefkeys'),
		);
	}        
        
        public function validatefkeys($attribute,$params){
               $aux = $attribute . '0';
               if(!$this->$aux)
                    $this->addError($attribute, LgmisWMModule::t('Incorrect {attribute}.', array('{attribute}'=>LgmisWMModule::t($attribute))));
        }      
        
        
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idwmdemand0' => array(self::BELONGS_TO, 'Wmdemand', 'idwmdemand'),
			'idccdepartment0' => array(self::BELONGS_TO, 'Ccdepartment', 'idccdepartment'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idwmdemandreceipt' => LgmisWMModule::t('Idwmdemandreceipt'),
			'demanddate' => LgmisWMModule::t('Demanddate'),
			'idccdepartment' => LgmisWMModule::t('Idccdepartment'),
			'idwmdemand' => LgmisWMModule::t('Idwmdemand'),
			'demandinname' => LgmisWMModule::t('Demandinname'),
			'demandamount' => LgmisWMModule::t('Demandamount'),
			'amountpaid' => LgmisWMModule::t('Amountpaid'),
			'paymenttype' => LgmisWMModule::t('Paymenttype'),
			'chequeddpayorderno' => LgmisWMModule::t('Chequeddpayorderno'),
			'chequeddpayorderdate' => LgmisWMModule::t('Chequeddpayorderdate'),
			'bankname' => LgmisWMModule::t('Bankname'),
			'branchname' => LgmisWMModule::t('Branchname'),
			'windowno' => LgmisWMModule::t('Windowno'),
			'username' => LgmisWMModule::t('Username'),
			'receiptbookno' => LgmisWMModule::t('Receiptbookno'),
			'receiptno' => LgmisWMModule::t('Receiptno'),
			'details' => LgmisWMModule::t('Details'),
			'narration' => LgmisWMModule::t('Narration'),
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

		$criteria->compare('idwmdemandreceipt',$this->idwmdemandreceipt,true);
		$criteria->compare('demanddate',$this->demanddate,true);
		$criteria->compare('idccdepartment',$this->idccdepartment,true);
		$criteria->compare('idwmdemand',$this->idwmdemand,true);
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