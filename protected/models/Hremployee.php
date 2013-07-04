<?php

/**
 * This is the model class for table "{{hremployee}}".
 *
 * The followings are the available columns in table '{{hremployee}}':
 * @property string $idhremployee
 * @property string $name
 * @property string $fathername
 * @property string $dob
 * @property string $idccsex
 * @property string $idccreligion
 * @property string $idcccategory
 * @property string $presentaddress1
 * @property string $presentaddress2
 * @property string $presentcity
 * @property string $presentphone
 * @property string $email
 * @property string $idcceducation
 * @property string $documenttype
 * @property string $idhrpost
 * @property string $idhrbasic
 * @property string $idccdepartment
 * @property string $workingplace
 * @property string $shift
 * @property string $doj
 * @property string $currentbasic
 * @property string $incrementmonth
 *
 * The followings are the available model relations:
 * @property Cccategory $idcccategory0
 * @property Ccdepartment $idccdepartment0
 * @property Cceducation $idcceducation0
 * @property Ccreligion $idccreligion0
 * @property Ccsex $idccsex0
 * @property Hrbasic $idhrbasic0
 * @property Hrpost $idhrpost0
 * @property Hrleavemaster[] $hrleavemasters
 * @property Hrsalaryset[] $hrsalarysets
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
			array('presentaddress1, presentaddress2, presentcity, presentphone, idhrpost, idhrbasic', 'required'),
			array('name, fathername, presentaddress1, presentaddress2, presentcity, presentphone, email, documenttype, workingplace, shift, incrementmonth', 'length', 'max'=>100),
			array('idccsex, idccreligion, idcccategory, idcceducation, idhrpost, idhrbasic, idccdepartment, currentbasic', 'length', 'max'=>10),
			array('dob, doj', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idhremployee, name, fathername, dob, idccsex, idccreligion, idcccategory, presentaddress1, presentaddress2, presentcity, presentphone, email, idcceducation, documenttype, idhrpost, idhrbasic, idccdepartment, workingplace, shift, doj, currentbasic, incrementmonth', 'safe', 'on'=>'search'),
                        array('idccsex, idccreligion, idcccategory, idcceducation, idhrpost, idhrbasic, idccdepartment', 'validatefkeys'),
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
			'idccdepartment0' => array(self::BELONGS_TO, 'Ccdepartment', 'idccdepartment'),
			'idcceducation0' => array(self::BELONGS_TO, 'Cceducation', 'idcceducation'),
			'idccreligion0' => array(self::BELONGS_TO, 'Ccreligion', 'idccreligion'),
			'idccsex0' => array(self::BELONGS_TO, 'Ccsex', 'idccsex'),
			'idhrbasic0' => array(self::BELONGS_TO, 'Hrbasic', 'idhrbasic'),
			'idhrpost0' => array(self::BELONGS_TO, 'Hrpost', 'idhrpost'),
			'hrleavemasters' => array(self::HAS_MANY, 'Hrleavemaster', 'idhremployee'),
			'hrsalarysets' => array(self::HAS_MANY, 'Hrsalaryset', 'idhremployee'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idhremployee' => Yii::t('application', 'Idhremployee'),
			'name' => Yii::t('application', 'Name'),
			'fathername' => Yii::t('application', 'Fathername'),
			'dob' => Yii::t('application', 'Dob'),
			'idccsex' => Yii::t('application', 'Idccsex'),
			'idccreligion' => Yii::t('application', 'Idccreligion'),
			'idcccategory' => Yii::t('application', 'Idcccategory'),
			'presentaddress1' => Yii::t('application', 'Presentaddress1'),
			'presentaddress2' => Yii::t('application', 'Presentaddress2'),
			'presentcity' => Yii::t('application', 'Presentcity'),
			'presentphone' => Yii::t('application', 'Presentphone'),
			'email' => Yii::t('application', 'Email'),
			'idcceducation' => Yii::t('application', 'Idcceducation'),
			'documenttype' => Yii::t('application', 'Documenttype'),
			'idhrpost' => Yii::t('application', 'Idhrpost'),
			'idhrbasic' => Yii::t('application', 'Idhrbasic'),
			'idccdepartment' => Yii::t('application', 'Idccdepartment'),
			'workingplace' => Yii::t('application', 'Workingplace'),
			'shift' => Yii::t('application', 'Shift'),
			'doj' => Yii::t('application', 'Doj'),
			'currentbasic' => Yii::t('application', 'Currentbasic'),
			'incrementmonth' => Yii::t('application', 'Incrementmonth'),
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('fathername',$this->fathername,true);
		$criteria->compare('dob',$this->dob,true);
		$criteria->compare('idccsex',$this->idccsex,true);
		$criteria->compare('idccreligion',$this->idccreligion,true);
		$criteria->compare('idcccategory',$this->idcccategory,true);
		$criteria->compare('presentaddress1',$this->presentaddress1,true);
		$criteria->compare('presentaddress2',$this->presentaddress2,true);
		$criteria->compare('presentcity',$this->presentcity,true);
		$criteria->compare('presentphone',$this->presentphone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('idcceducation',$this->idcceducation,true);
		$criteria->compare('documenttype',$this->documenttype,true);
		$criteria->compare('idhrpost',$this->idhrpost,true);
		$criteria->compare('idhrbasic',$this->idhrbasic,true);
		$criteria->compare('idccdepartment',$this->idccdepartment,true);
		$criteria->compare('workingplace',$this->workingplace,true);
		$criteria->compare('shift',$this->shift,true);
		$criteria->compare('doj',$this->doj,true);
		$criteria->compare('currentbasic',$this->currentbasic,true);
		$criteria->compare('incrementmonth',$this->incrementmonth,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}