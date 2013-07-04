<?php

/**
 * This is the model class for table "{{wmmaster}}".
 *
 * The followings are the available columns in table '{{wmmaster}}':
 * @property string $idwmmaster
 * @property string $idccfyear
 * @property string $adate
 * @property string $ownername
 * @property string $houseownername
 * @property string $idccward
 * @property string $idptmaster
 * @property string $idwmtype
 * @property string $idwmsize
 * @property string $wmtape
 * @property string $idwmplumber
 * @property string $idccstatus
 * @property string $mainlindia
 * @property string $mainlindis
 * @property string $wmdetails
 * @property integer $wmmasterflag
 * @property string $receiptno
 * @property string $address
 *
 * The followings are the available model relations:
 * @property Wmdemand[] $wmdemands
 * @property Ccfyear $idccfyear0
 * @property Ccstatus $idccstatus0
 * @property Ccward $idccward0
 * @property Ptmaster $idptmaster0
 * @property Wmplumber $idwmplumber0
 * @property Wmsize $idwmsize0
 * @property Wmtype $idwmtype0
 */
class Wmmaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Wmmaster the static model class
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
		return '{{wmmaster}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ownername, houseownername, idptmaster, idwmplumber, mainlindia, mainlindis, wmmasterflag, receiptno, address', 'required'),
			array('wmmasterflag', 'numerical', 'integerOnly'=>true),
			array('idccfyear, idccward, idptmaster, idwmtype, idwmsize, wmtape, idwmplumber, idccstatus, mainlindia, mainlindis, receiptno', 'length', 'max'=>10),
			array('ownername, houseownername, wmdetails', 'length', 'max'=>100),
			array('address', 'length', 'max'=>50),
			array('adate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idwmmaster, idccfyear, adate, ownername, houseownername, idccward, idptmaster, idwmtype, idwmsize, wmtape, idwmplumber, idccstatus, mainlindia, mainlindis, wmdetails, wmmasterflag, receiptno, address', 'safe', 'on'=>'search'),
                        array('idccfyear, idccward, idptmaster, idwmtype, idwmsize, idwmplumber, idccstatus', 'validatefkeys'),
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
			'wmdemands' => array(self::HAS_MANY, 'Wmdemand', 'idwmmaster'),
			'idccfyear0' => array(self::BELONGS_TO, 'Ccfyear', 'idccfyear'),
			'idccstatus0' => array(self::BELONGS_TO, 'Ccstatus', 'idccstatus'),
			'idccward0' => array(self::BELONGS_TO, 'Ccward', 'idccward'),
			'idptmaster0' => array(self::BELONGS_TO, 'Ptmaster', 'idptmaster'),
			'idwmplumber0' => array(self::BELONGS_TO, 'Wmplumber', 'idwmplumber'),
			'idwmsize0' => array(self::BELONGS_TO, 'Wmsize', 'idwmsize'),
			'idwmtype0' => array(self::BELONGS_TO, 'Wmtype', 'idwmtype'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idwmmaster' => Yii::t('application', 'Idwmmaster'),
			'idccfyear' => Yii::t('application', 'Idccfyear'),
			'adate' => Yii::t('application', 'Adate'),
			'ownername' => Yii::t('application', 'Ownername'),
			'houseownername' => Yii::t('application', 'Houseownername'),
			'idccward' => Yii::t('application', 'Idccward'),
			'idptmaster' => Yii::t('application', 'Idptmaster'),
			'idwmtype' => Yii::t('application', 'Idwmtype'),
			'idwmsize' => Yii::t('application', 'Idwmsize'),
			'wmtape' => Yii::t('application', 'Wmtape'),
			'idwmplumber' => Yii::t('application', 'Idwmplumber'),
			'idccstatus' => Yii::t('application', 'Idccstatus'),
			'mainlindia' => Yii::t('application', 'Mainlindia'),
			'mainlindis' => Yii::t('application', 'Mainlindis'),
			'wmdetails' => Yii::t('application', 'Wmdetails'),
			'wmmasterflag' => Yii::t('application', 'Wmmasterflag'),
			'receiptno' => Yii::t('application', 'Receiptno'),
			'address' => Yii::t('application', 'Address'),
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

		$criteria->compare('idwmmaster',$this->idwmmaster,true);
		$criteria->compare('idccfyear',$this->idccfyear,true);
		$criteria->compare('adate',$this->adate,true);
		$criteria->compare('ownername',$this->ownername,true);
		$criteria->compare('houseownername',$this->houseownername,true);
		$criteria->compare('idccward',$this->idccward,true);
		$criteria->compare('idptmaster',$this->idptmaster,true);
		$criteria->compare('idwmtype',$this->idwmtype,true);
		$criteria->compare('idwmsize',$this->idwmsize,true);
		$criteria->compare('wmtape',$this->wmtape,true);
		$criteria->compare('idwmplumber',$this->idwmplumber,true);
		$criteria->compare('idccstatus',$this->idccstatus,true);
		$criteria->compare('mainlindia',$this->mainlindia,true);
		$criteria->compare('mainlindis',$this->mainlindis,true);
		$criteria->compare('wmdetails',$this->wmdetails,true);
		$criteria->compare('wmmasterflag',$this->wmmasterflag);
		$criteria->compare('receiptno',$this->receiptno,true);
		$criteria->compare('address',$this->address,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}