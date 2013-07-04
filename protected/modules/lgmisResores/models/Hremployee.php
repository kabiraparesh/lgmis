<?php

/**
 * This is the model class for table "{{hremployee}}".
 *
 * The followings are the available columns in table '{{hremployee}}':
 * @property string $idhremployee
 * @property string $empname
 * @property string $fathername
 * @property string $empdob
 * @property string $idccsex
 * @property string $idccreligion
 * @property string $idcccategory
 * @property string $presentaddress1
 * @property string $presentaddress2
 * @property string $presentcity
 * @property string $presentphone
 * @property string $email
 * @property string $documenttype
 * @property string $peraddress1
 * @property string $peraddress2
 * @property string $percity
 * @property string $perphone
 * @property string $mobileno
 * @property string $mothername
 * @property string $joiningdate
 * @property string $retiredate
 * @property string $identificationmark
 * @property string $maritalstatus
 * @property string $height
 * @property string $weight
 * @property string $gpfno
 * @property string $scstdetail
 * @property string $handicap
 * @property string $fingerprints
 * @property string $employeephoto
 * @property string $employeesign
 *
 * The followings are the available model relations:
 * @property Hremplearnleave[] $hremplearnleaves
 * @property Hrempleducation[] $hrempleducations
 * @property Hremplinsurance[] $hremplinsurances
 * @property Hremplloan[] $hremplloans
 * @property Hremplmember[] $hremplmembers
 * @property Cccategory $idcccategory0
 * @property Ccreligion $idccreligion0
 * @property Ccsex $idccsex0
 * @property Hremployeebasic[] $hremployeebasics
 * @property Hrleavemaster[] $hrleavemasters
 * @property Hrsalary[] $hrsalaries
 */
class Hremployee extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Hremployee the static model class
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
		return '{{hremployee}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('empname, fathername, presentaddress1, presentaddress2, presentcity, presentphone, email, documenttype, peraddress1, peraddress2, percity, perphone, mobileno, mothername, joiningdate, retiredate, identificationmark, height, weight, gpfno, scstdetail, handicap, fingerprints, employeephoto, employeesign', 'required'),
			array('empname, fathername, presentaddress1, presentaddress2, presentcity, email, documenttype, peraddress1, peraddress2, percity, mothername, identificationmark, scstdetail', 'length', 'max'=>100),
			array('idccsex, idccreligion, idcccategory, maritalstatus, height, weight, handicap', 'length', 'max'=>10),
			array('presentphone, perphone, mobileno', 'length', 'max'=>20),
			array('gpfno, fingerprints, employeephoto, employeesign', 'length', 'max'=>45),
			array('empdob', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idhremployee, empname, fathername, empdob, idccsex, idccreligion, idcccategory, presentaddress1, presentaddress2, presentcity, presentphone, email, documenttype, peraddress1, peraddress2, percity, perphone, mobileno, mothername, joiningdate, retiredate, identificationmark, maritalstatus, height, weight, gpfno, scstdetail, handicap, fingerprints, employeephoto, employeesign', 'safe', 'on'=>'search'),
                        array('idccsex, idccreligion, idcccategory', 'validatefkeys'),
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
			'hremplearnleaves' => array(self::HAS_MANY, 'Hremplearnleave', 'idhremployee'),
			'hrempleducations' => array(self::HAS_MANY, 'Hrempleducation', 'idhremployee'),
			'hremplinsurances' => array(self::HAS_MANY, 'Hremplinsurance', 'idhremployee'),
			'hremplloans' => array(self::HAS_MANY, 'Hremplloan', 'idhremployee'),
			'hremplmembers' => array(self::HAS_MANY, 'Hremplmember', 'idhremployee'),
			'idcccategory0' => array(self::BELONGS_TO, 'Cccategory', 'idcccategory'),
			'idccreligion0' => array(self::BELONGS_TO, 'Ccreligion', 'idccreligion'),
			'idccsex0' => array(self::BELONGS_TO, 'Ccsex', 'idccsex'),
			'hremployeebasics' => array(self::HAS_MANY, 'Hremployeebasic', 'idhremployee'),
			'hrleavemasters' => array(self::HAS_MANY, 'Hrleavemaster', 'idhremployee'),
			'hrsalaries' => array(self::HAS_MANY, 'Hrsalary', 'idhremployee'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idhremployee' => Yii::t('application', 'Idhremployee'),
			'empname' => Yii::t('application', 'Empname'),
			'fathername' => Yii::t('application', 'Fathername'),
			'empdob' => Yii::t('application', 'Empdob'),
			'idccsex' => Yii::t('application', 'Idccsex'),
			'idccreligion' => Yii::t('application', 'Idccreligion'),
			'idcccategory' => Yii::t('application', 'Idcccategory'),
			'presentaddress1' => Yii::t('application', 'Presentaddress1'),
			'presentaddress2' => Yii::t('application', 'Presentaddress2'),
			'presentcity' => Yii::t('application', 'Presentcity'),
			'presentphone' => Yii::t('application', 'Presentphone'),
			'email' => Yii::t('application', 'Email'),
			'documenttype' => Yii::t('application', 'Documenttype'),
			'peraddress1' => Yii::t('application', 'Peraddress1'),
			'peraddress2' => Yii::t('application', 'Peraddress2'),
			'percity' => Yii::t('application', 'Percity'),
			'perphone' => Yii::t('application', 'Perphone'),
			'mobileno' => Yii::t('application', 'Mobileno'),
			'mothername' => Yii::t('application', 'Mothername'),
			'joiningdate' => Yii::t('application', 'Joiningdate'),
			'retiredate' => Yii::t('application', 'Retiredate'),
			'identificationmark' => Yii::t('application', 'Identificationmark'),
			'maritalstatus' => Yii::t('application', 'Maritalstatus'),
			'height' => Yii::t('application', 'Height'),
			'weight' => Yii::t('application', 'Weight'),
			'gpfno' => Yii::t('application', 'Gpfno'),
			'scstdetail' => Yii::t('application', 'Scstdetail'),
			'handicap' => Yii::t('application', 'Handicap'),
			'fingerprints' => Yii::t('application', 'Fingerprints'),
			'employeephoto' => Yii::t('application', 'Employeephoto'),
			'employeesign' => Yii::t('application', 'Employeesign'),
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

		$criteria->compare('idhremployee',$this->idhremployee,true);
		$criteria->compare('empname',$this->empname,true);
		$criteria->compare('fathername',$this->fathername,true);
		$criteria->compare('empdob',$this->empdob,true);
		$criteria->compare('idccsex',$this->idccsex,true);
		$criteria->compare('idccreligion',$this->idccreligion,true);
		$criteria->compare('idcccategory',$this->idcccategory,true);
		$criteria->compare('presentaddress1',$this->presentaddress1,true);
		$criteria->compare('presentaddress2',$this->presentaddress2,true);
		$criteria->compare('presentcity',$this->presentcity,true);
		$criteria->compare('presentphone',$this->presentphone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('documenttype',$this->documenttype,true);
		$criteria->compare('peraddress1',$this->peraddress1,true);
		$criteria->compare('peraddress2',$this->peraddress2,true);
		$criteria->compare('percity',$this->percity,true);
		$criteria->compare('perphone',$this->perphone,true);
		$criteria->compare('mobileno',$this->mobileno,true);
		$criteria->compare('mothername',$this->mothername,true);
		$criteria->compare('joiningdate',$this->joiningdate,true);
		$criteria->compare('retiredate',$this->retiredate,true);
		$criteria->compare('identificationmark',$this->identificationmark,true);
		$criteria->compare('maritalstatus',$this->maritalstatus,true);
		$criteria->compare('height',$this->height,true);
		$criteria->compare('weight',$this->weight,true);
		$criteria->compare('gpfno',$this->gpfno,true);
		$criteria->compare('scstdetail',$this->scstdetail,true);
		$criteria->compare('handicap',$this->handicap,true);
		$criteria->compare('fingerprints',$this->fingerprints,true);
		$criteria->compare('employeephoto',$this->employeephoto,true);
		$criteria->compare('employeesign',$this->employeesign,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}