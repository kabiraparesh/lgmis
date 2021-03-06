<?php

/**
 * This is the model class for table "{{wmmaster}}".
 *
 * The followings are the available columns in table '{{wmmaster}}':
 * @property string $idwmmaster
 * @property string $saralno
 * @property string $connectionno
 * @property string $ownername
 * @property string $fathername
 * @property string $address
 * @property string $idcccolony
 * @property string $idccfyear
 * @property string $wmappdate
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
 * @property string $disconnectdate
 * @property string $idwmexsumptor
 * @property string $params
 *
 * The followings are the available model relations:
 * @property Wmdemand[] $wmdemands
 * @property Ccfyear $idccfyear0
 * @property Ccstatus $idccstatus0
 * @property Wmplumber $idwmplumber0
 * @property Wmsize $idwmsize0
 * @property Wmtype $idwmtype0
 * @property Cccolony $idcccolony0
 * @property Wmexsumptor $idwmexsumptor0
 */
class Wmmaster extends CActiveRecord
{
	
	public $idccward;
	
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
			array('ownername, idcccolony, wmmasterflag, idwmexsumptor', 'required'),
			array('wmmasterflag', 'numerical', 'integerOnly'=>true),
			array('saralno, connectionno', 'length', 'max'=>45),
			array('ownername, fathername, wmdetails', 'length', 'max'=>100),
			array('address', 'length', 'max'=>255),
			array('idcccolony', 'length', 'max'=>11),
			array('idccfyear, idptmaster, idwmtype, idwmsize, wmtape, idwmplumber, idccstatus, mainlindia, mainlindis, idwmexsumptor', 'length', 'max'=>10),
			array('wmappdate, disconnectdate, params', 'safe'),
			array('idccward', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idwmmaster, saralno, connectionno, ownername, fathername, address, idcccolony, idccfyear, wmappdate, idptmaster, idwmtype, idwmsize, wmtape, idwmplumber, idccstatus, mainlindia, mainlindis, wmdetails, wmmasterflag, disconnectdate, idwmexsumptor, params', 'safe', 'on'=>'search'),
                        array('idcccolony, idccfyear, idwmtype, idwmsize, idwmplumber, idccstatus, idwmexsumptor', 'validatefkeys'),
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
			'wmdemands' => array(self::HAS_MANY, 'Wmdemand', 'idwmmaster'),
			'idccfyear0' => array(self::BELONGS_TO, 'Ccfyear', 'idccfyear'),
			'idccstatus0' => array(self::BELONGS_TO, 'Ccstatus', 'idccstatus'),
			'idwmplumber0' => array(self::BELONGS_TO, 'Wmplumber', 'idwmplumber'),
			'idwmsize0' => array(self::BELONGS_TO, 'Wmsize', 'idwmsize'),
			'idwmtype0' => array(self::BELONGS_TO, 'Wmtype', 'idwmtype'),
			'idcccolony0' => array(self::BELONGS_TO, 'Cccolony', 'idcccolony'),
			'idwmexsumptor0' => array(self::BELONGS_TO, 'Wmexsumptor', 'idwmexsumptor'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idwmmaster' => LgmisWMModule::t('Idwmmaster'),
			'saralno' => LgmisWMModule::t('Saralno'),
			'connectionno' => LgmisWMModule::t('Connectionno'),
			'ownername' => LgmisWMModule::t('Ownername'),
			'fathername' => LgmisWMModule::t('Fathername'),
			'address' => LgmisWMModule::t('Address'),
			'idcccolony' => LgmisWMModule::t('Idcccolony'),
			'idccfyear' => LgmisWMModule::t('Idccfyear'),
			'wmappdate' => LgmisWMModule::t('Wmappdate'),
			'idptmaster' => LgmisWMModule::t('Idptmaster'),
			'idwmtype' => LgmisWMModule::t('Idwmtype'),
			'idwmsize' => LgmisWMModule::t('Idwmsize'),
			'wmtape' => LgmisWMModule::t('Wmtape'),
			'idwmplumber' => LgmisWMModule::t('Idwmplumber'),
			'idccstatus' => LgmisWMModule::t('Idccstatus'),
			'mainlindia' => LgmisWMModule::t('Mainlindia'),
			'mainlindis' => LgmisWMModule::t('Mainlindis'),
			'wmdetails' => LgmisWMModule::t('Wmdetails'),
			'wmmasterflag' => LgmisWMModule::t('Wmmasterflag'),
			'disconnectdate' => LgmisWMModule::t('Disconnectdate'),
			'idwmexsumptor' => LgmisWMModule::t('Idwmexsumptor'),
			'params' => LgmisWMModule::t('Params'),
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
		
		if($this->idccward > 0){
			$criteria->with = array('idcccolony0');				
			$criteria->compare('idcccolony0.idccward',$this->idccward, false);				
		}

//		$criteria->compare('idwmmaster',$this->idwmmaster,true);
		$criteria->compare('saralno',$this->saralno,true);
		$criteria->compare('connectionno',$this->connectionno,true);
		$criteria->compare('ownername',$this->ownername,true);
		$criteria->compare('fathername',$this->fathername,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('idcccolony',$this->idcccolony,true);
		$criteria->compare('idccfyear',$this->idccfyear,true);
		$criteria->compare('wmappdate',$this->wmappdate,true);
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
		$criteria->compare('disconnectdate',$this->disconnectdate,true);
		$criteria->compare('idwmexsumptor',$this->idwmexsumptor,true);
		$criteria->compare('params',$this->params,true);

                
		$cActiveDataProvider = new CActiveDataProvider(get_class($this));
                if($this->idwmmaster == ''){
                    $cActiveDataProvider = new CActiveDataProvider(get_class($this), array(
                            'criteria'=>$criteria,
                    ));                    
                    return $cActiveDataProvider;
                }
                else{
                    $data = array();
                    foreach(Wmmaster::model()->findAll($criteria) as $wmmaster){
//                        syslog(LOG_WARNING, $ptmaster->idccward0->idcczone . ' - ' . $ptmaster->idccward . ' - ' .  $ptmaster->idptmaster . ' ---> ' . $this->encodePkey($ptmaster->idccward0->idcczone, $ptmaster->idccward, $ptmaster->idptmaster));
                        syslog(LOG_WARNING, WmHelper::encodePkey($wmmaster));
                        if(!(strpos(WmHelper::encodePkey($wmmaster), $this->idwmmaster . '') === false)){
                            $data[] = $wmmaster;
                        }
                    }                
                    $cActiveDataProvider->setData($data);                    
                    return $cActiveDataProvider;                    
                }                
	}
}