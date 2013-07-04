<?php

/**
 * This is the model class for table "{{lpapplicant}}".
 *
 * The followings are the available columns in table '{{lpapplicant}}':
 * @property string $idlpapplicant
 * @property string $year
 * @property string $idccward
 * @property string $idcczone
 * @property string $busname
 * @property string $address
 * @property string $busplace
 * @property string $idlpgroup
 * @property string $idlprelative
 * @property string $idlplicency
 * @property string $temployee
 * @property string $idccsex
 * @property string $young
 * @property string $old
 * @property string $idlpholiday
 * @property string $fee
 * @property string $propertyno
 * @property string $waterno
 * @property string $idccstatus
 *
 * The followings are the available model relations:
 * @property Lplicency $idlplicency0
 * @property Ccstatus $idccstatus0
 * @property Ccward $idccward0
 * @property Cczone $idcczone0
 * @property Lpgroup $idlpgroup0
 * @property Lpholiday $idlpholiday0
 * @property Lprelative $idlprelative0
 * @property Lpprepration[] $lppreprations
 */
class Lpapplicant extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Lpapplicant the static model class
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
		return '{{lpapplicant}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idlpapplicant, busname, busplace, idlplicency, idlpholiday', 'required'),
			array('idlpapplicant, idlplicency, idlpholiday, propertyno, waterno', 'length', 'max'=>8),
			array('year, busname, address, busplace, temployee, young, old', 'length', 'max'=>100),
			array('idccward, idcczone, idlpgroup, idlprelative, idccsex, idccstatus', 'length', 'max'=>10),
			array('fee', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idlpapplicant, year, idccward, idcczone, busname, address, busplace, idlpgroup, idlprelative, idlplicency, temployee, idccsex, young, old, idlpholiday, fee, propertyno, waterno, idccstatus', 'safe', 'on'=>'search'),
                        array('idccward, idcczone, idlpgroup, idlprelative, idlplicency, idlpholiday, idccstatus', 'validatefkeys'),
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
			'idlplicency0' => array(self::BELONGS_TO, 'Lplicency', 'idlplicency'),
			'idccstatus0' => array(self::BELONGS_TO, 'Ccstatus', 'idccstatus'),
			'idccward0' => array(self::BELONGS_TO, 'Ccward', 'idccward'),
			'idcczone0' => array(self::BELONGS_TO, 'Cczone', 'idcczone'),
			'idlpgroup0' => array(self::BELONGS_TO, 'Lpgroup', 'idlpgroup'),
			'idlpholiday0' => array(self::BELONGS_TO, 'Lpholiday', 'idlpholiday'),
			'idlprelative0' => array(self::BELONGS_TO, 'Lprelative', 'idlprelative'),
			'lppreprations' => array(self::HAS_MANY, 'Lpprepration', 'idlpapplicant'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idlpapplicant' => Yii::t('application', 'Idlpapplicant'),
			'year' => Yii::t('application', 'Year'),
			'idccward' => Yii::t('application', 'Idccward'),
			'idcczone' => Yii::t('application', 'Idcczone'),
			'busname' => Yii::t('application', 'Busname'),
			'address' => Yii::t('application', 'Address'),
			'busplace' => Yii::t('application', 'Busplace'),
			'idlpgroup' => Yii::t('application', 'Idlpgroup'),
			'idlprelative' => Yii::t('application', 'Idlprelative'),
			'idlplicency' => Yii::t('application', 'Idlplicency'),
			'temployee' => Yii::t('application', 'Temployee'),
			'idccsex' => Yii::t('application', 'Idccsex'),
			'young' => Yii::t('application', 'Young'),
			'old' => Yii::t('application', 'Old'),
			'idlpholiday' => Yii::t('application', 'Idlpholiday'),
			'fee' => Yii::t('application', 'Fee'),
			'propertyno' => Yii::t('application', 'Propertyno'),
			'waterno' => Yii::t('application', 'Waterno'),
			'idccstatus' => Yii::t('application', 'Idccstatus'),
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

		$criteria->compare('idlpapplicant',$this->idlpapplicant,true);
		$criteria->compare('year',$this->year,true);
		$criteria->compare('idccward',$this->idccward,true);
		$criteria->compare('idcczone',$this->idcczone,true);
		$criteria->compare('busname',$this->busname,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('busplace',$this->busplace,true);
		$criteria->compare('idlpgroup',$this->idlpgroup,true);
		$criteria->compare('idlprelative',$this->idlprelative,true);
		$criteria->compare('idlplicency',$this->idlplicency,true);
		$criteria->compare('temployee',$this->temployee,true);
		$criteria->compare('idccsex',$this->idccsex,true);
		$criteria->compare('young',$this->young,true);
		$criteria->compare('old',$this->old,true);
		$criteria->compare('idlpholiday',$this->idlpholiday,true);
		$criteria->compare('fee',$this->fee,true);
		$criteria->compare('propertyno',$this->propertyno,true);
		$criteria->compare('waterno',$this->waterno,true);
		$criteria->compare('idccstatus',$this->idccstatus,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}