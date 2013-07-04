<?php

/**
 * This is the model class for table "{{fddemandreceipt}}".
 *
 * The followings are the available columns in table '{{fddemandreceipt}}':
 * @property string $idfddemandreceipt
 * @property string $demanddate
 * @property string $idccdepartment
 * @property string $demandnumber
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
 * @property string $receipttype
 *
 * The followings are the available model relations:
 * @property Ccdepartment $idccdepartment0
 * @property Rcapplication[] $rcapplications
 */
class Fddemandreceipt extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Fddemandreceipt the static model class
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
		return '{{fddemandreceipt}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('amountpaid, paymenttype', 'required'),
			array('paymenttype, receipttype', 'numerical', 'integerOnly'=>true),
			array('idccdepartment, demandnumber, amountpaid, windowno', 'length', 'max'=>10),
			array('demandinname', 'length', 'max'=>100),
			array('receiptbookno', 'length', 'max'=>255),
			array('receiptno', 'length', 'max'=>255),
			array('demandamount, bankname, branchname, username', 'length', 'max'=>45),
			array('chequeddpayorderno', 'length', 'max'=>20),
			array('narration, chequeddpayorderdate, details, demanddate', 'safe'),                    
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
//			array('receiptbookno, receiptno, idfddemandreceipt, demanddate, idccdepartment, demandnumber, demandinname, demandamount, amountpaid, paymenttype, chequeddpayorderno, chequeddpayorderdate, bankname, branchname, windowno, username', 'safe', 'on'=>'search'),
			array('details, receiptbookno, receiptno, idfddemandreceipt, demanddate, idccdepartment, demandnumber, demandinname, demandamount, amountpaid, paymenttype, chequeddpayorderno, chequeddpayorderdate, bankname, branchname, windowno, username, receipttype', 'safe', 'on'=>'search'),
                        array('idccdepartment', 'validatefkeys'),
		);
	}        
        
        public function validatefkeys($attribute,$params){
               $aux = $attribute . '0';
               if(!$this->$aux)
                    $this->addError($attribute, Yii::t('application', 'Incorrect {attribute}.', array('{attribute}'=>Yii::t('application', $attribute))));
        }      
        
        
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idccdepartment0' => array(self::BELONGS_TO, 'Ccdepartment', 'idccdepartment'),
			'rcapplications' => array(self::HAS_MANY, 'Rcapplication', 'idfddemandreceipt'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idfddemandreceipt' => Yii::t('application', 'Idfddemandreceipt'),
			'demanddate' => Yii::t('application', 'Demanddate'),
			'idccdepartment' => Yii::t('application', 'Idccdepartment'),
			'demandnumber' => Yii::t('application', 'Demandnumber'),
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
			'receipttype' => Yii::t('application', 'Receipt Type'),
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

		$criteria->compare('idfddemandreceipt',$this->idfddemandreceipt,true);
		$criteria->compare('demanddate',$this->demanddate,true);
		$criteria->compare('idccdepartment',$this->idccdepartment,true);
		$criteria->compare('demandnumber',$this->demandnumber,true);
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
		$criteria->compare('narration',$this->narration,true);
		$criteria->compare('receipttype',$this->receipttype,true);		
		
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}