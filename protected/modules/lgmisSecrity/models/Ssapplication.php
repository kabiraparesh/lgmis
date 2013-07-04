<?php

/**
 * This is the model class for table "{{ssapplication}}".
 *
 * The followings are the available columns in table '{{ssapplication}}':
 * @property string $idssapplication
 * @property string $type
 * @property string $name
 * @property string $fhname
 * @property string $markident
 * @property string $dob
 * @property string $idcccategory
 * @property string $remmitaddress
 * @property string $permanentadd
 * @property string $domicileadd
 * @property string $yearreskling
 * @property string $monincome
 * @property string $immproperty
 * @property string $presentresiding
 * @property string $bornresiding
 * @property string $incometax
 * @property string $servicedetail
 * @property string $pansionreceipt
 * @property string $nationnality
 * @property string $idccsex
 * @property string $dodhusband
 * @property string $freedomfighter
 * @property string $addfreedfighter
 * @property string $idccstatus
 * @property string $bankbranch
 * @property string $bankaccountno
 * @property string $ifsccode
 * @property string $documentssubmit
 *
 * The followings are the available model relations:
 * @property Cccategory $idcccategory0
 * @property Ccsex $idccsex0
 * @property Ccstatus $idccstatus0
 * @property Ssnominee[] $ssnominees
 */
class Ssapplication extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Ssapplication the static model class
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
		return '{{ssapplication}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type, name, fhname, markident, remmitaddress, permanentadd, domicileadd, yearreskling, immproperty, presentresiding, bornresiding, servicedetail, pansionreceipt, nationnality, freedomfighter, addfreedfighter, bankbranch, bankaccountno, ifsccode, documentssubmit', 'required'),
			array('type, name, fhname, markident, remmitaddress, permanentadd, domicileadd, yearreskling, immproperty, presentresiding, bornresiding, servicedetail, pansionreceipt, nationnality, freedomfighter, addfreedfighter, bankbranch, documentssubmit', 'length', 'max'=>100),
			array('idcccategory, idccsex, idccstatus', 'length', 'max'=>10),
			array('monincome, incometax', 'length', 'max'=>15),
			array('bankaccountno, ifsccode', 'length', 'max'=>20),
			array('dob, dodhusband', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idssapplication, type, name, fhname, markident, dob, idcccategory, remmitaddress, permanentadd, domicileadd, yearreskling, monincome, immproperty, presentresiding, bornresiding, incometax, servicedetail, pansionreceipt, nationnality, idccsex, dodhusband, freedomfighter, addfreedfighter, idccstatus, bankbranch, bankaccountno, ifsccode, documentssubmit', 'safe', 'on'=>'search'),
                        array('idcccategory, idccsex, idccstatus', 'validatefkeys'),
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
			'idcccategory0' => array(self::BELONGS_TO, 'Cccategory', 'idcccategory'),
			'idccsex0' => array(self::BELONGS_TO, 'Ccsex', 'idccsex'),
			'idccstatus0' => array(self::BELONGS_TO, 'Ccstatus', 'idccstatus'),
			'ssnominees' => array(self::HAS_MANY, 'Ssnominee', 'idssapplication'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idssapplication' => Yii::t('application', 'Idssapplication'),
			'type' => Yii::t('application', 'Type'),
			'name' => Yii::t('application', 'Name'),
			'fhname' => Yii::t('application', 'Fhname'),
			'markident' => Yii::t('application', 'Markident'),
			'dob' => Yii::t('application', 'Dob'),
			'idcccategory' => Yii::t('application', 'Idcccategory'),
			'remmitaddress' => Yii::t('application', 'Remmitaddress'),
			'permanentadd' => Yii::t('application', 'Permanentadd'),
			'domicileadd' => Yii::t('application', 'Domicileadd'),
			'yearreskling' => Yii::t('application', 'Yearreskling'),
			'monincome' => Yii::t('application', 'Monincome'),
			'immproperty' => Yii::t('application', 'Immproperty'),
			'presentresiding' => Yii::t('application', 'Presentresiding'),
			'bornresiding' => Yii::t('application', 'Bornresiding'),
			'incometax' => Yii::t('application', 'Incometax'),
			'servicedetail' => Yii::t('application', 'Servicedetail'),
			'pansionreceipt' => Yii::t('application', 'Pansionreceipt'),
			'nationnality' => Yii::t('application', 'Nationnality'),
			'idccsex' => Yii::t('application', 'Idccsex'),
			'dodhusband' => Yii::t('application', 'Dodhusband'),
			'freedomfighter' => Yii::t('application', 'Freedomfighter'),
			'addfreedfighter' => Yii::t('application', 'Addfreedfighter'),
			'idccstatus' => Yii::t('application', 'Idccstatus'),
			'bankbranch' => Yii::t('application', 'Bankbranch'),
			'bankaccountno' => Yii::t('application', 'Bankaccountno'),
			'ifsccode' => Yii::t('application', 'Ifsccode'),
			'documentssubmit' => Yii::t('application', 'Documentssubmit'),
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

		$criteria->compare('idssapplication',$this->idssapplication,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('fhname',$this->fhname,true);
		$criteria->compare('markident',$this->markident,true);
		$criteria->compare('dob',$this->dob,true);
		$criteria->compare('idcccategory',$this->idcccategory,true);
		$criteria->compare('remmitaddress',$this->remmitaddress,true);
		$criteria->compare('permanentadd',$this->permanentadd,true);
		$criteria->compare('domicileadd',$this->domicileadd,true);
		$criteria->compare('yearreskling',$this->yearreskling,true);
		$criteria->compare('monincome',$this->monincome,true);
		$criteria->compare('immproperty',$this->immproperty,true);
		$criteria->compare('presentresiding',$this->presentresiding,true);
		$criteria->compare('bornresiding',$this->bornresiding,true);
		$criteria->compare('incometax',$this->incometax,true);
		$criteria->compare('servicedetail',$this->servicedetail,true);
		$criteria->compare('pansionreceipt',$this->pansionreceipt,true);
		$criteria->compare('nationnality',$this->nationnality,true);
		$criteria->compare('idccsex',$this->idccsex,true);
		$criteria->compare('dodhusband',$this->dodhusband,true);
		$criteria->compare('freedomfighter',$this->freedomfighter,true);
		$criteria->compare('addfreedfighter',$this->addfreedfighter,true);
		$criteria->compare('idccstatus',$this->idccstatus,true);
		$criteria->compare('bankbranch',$this->bankbranch,true);
		$criteria->compare('bankaccountno',$this->bankaccountno,true);
		$criteria->compare('ifsccode',$this->ifsccode,true);
		$criteria->compare('documentssubmit',$this->documentssubmit,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}