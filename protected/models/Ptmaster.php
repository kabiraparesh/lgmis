<?php

/**
 * This is the model class for table "{{ptmaster}}".
 *
 * The followings are the available columns in table '{{ptmaster}}':
 * @property string $idptmaster
 * @property string $caseno
 * @property string $idccward
 * @property string $idpttype
 * @property string $ownername
 * @property string $fathername
 * @property string $owneraddress
 * @property string $propertyno
 * @property string $propertyaddress
 * @property string $constyear
 * @property integer $transferbreakup
 * @property integer $trashed
 * @property string $ledgerno
 * @property string $idcccolony
 * @property string $idptrange
 * @property string $idptpropertyon
 * @property integer $propertytax
 * @property integer $watertax
 * @property string $idptservicetax
 * @property string $idptexsumtors
 * @property string $propertydetails
 * @property string $idccsex
 *
 * The followings are the available model relations:
 * @property Ccward $idccward0
 * @property Pttype $idpttype0
 * @property Cccolony $idcccolony0
 * @property Ccsex $idccsex0
 * @property Ptpropertyon $idptpropertyon0
 * @property Ptrange $idptrange0
 * @property Pttransaction[] $pttransactions
 * @property Pttransfer[] $pttransfers
 * @property Wmmaster[] $wmmasters
 */
class Ptmaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Ptmaster the static model class
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
		return '{{ptmaster}}';
	}

	public $oldpropertytax = 0;
	public $oldservicetax = 0;
	public $oldminsamekittax = 0;
	public $oldsamekittax = 0;
	public $oldwaterpttax = 0;
	public $oldeducess = 0;
	public $oldsubcess1 = 0;
	public $oldsubcess2 = 0;
	public $oldpttaxdiscount = 0;
	public $oldpttaxsurcharge = 0;
	public $newproperty = 0;


	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				array('ownername, owneraddress, idcccolony, idptrange, idptpropertyon, propertytax', 'required'),
				array('transferbreakup, trashed, propertytax, watertax', 'numerical', 'integerOnly'=>true),
				array('caseno, idccward, idpttype, constyear, idcccolony, idptrange, idptpropertyon, idptservicetax, idccsex', 'length', 'max'=>10),
				array('ownername, fathername, owneraddress, propertyaddress', 'length', 'max'=>100),
				array('propertyno, ledgerno', 'length', 'max'=>45),
				array('idptexsumtors, propertydetails, params', 'safe'),
				// The following rule is used by search().
				// Please remove those attributes that should not be searched.
				array('idptmaster, caseno, idccward, idpttype, ownername, fathername, owneraddress, propertyno, propertyaddress, constyear, transferbreakup, trashed, ledgerno, idcccolony, idptrange, idptpropertyon, propertytax, watertax, idptservicetax, idptexsumtors, propertydetails, idccsex', 'safe', 'on'=>'search'),
				array('idccward, idpttype, idcccolony, idptrange, idptpropertyon, idccsex', 'validatefkeys'),

				array('oldpropertytax, oldservicetax, oldminsamekittax, oldsamekittax, oldwaterpttax, oldeducess, oldsubcess1, oldsubcess2, oldpttaxdiscount, oldpttaxsurcharge', 'safe'),
				array('oldpropertytax, oldservicetax, oldminsamekittax, oldsamekittax, oldwaterpttax, oldeducess, oldsubcess1, oldsubcess2, oldpttaxdiscount, oldpttaxsurcharge', 'numerical'),
				array('oldpropertytax, oldservicetax, oldminsamekittax, oldsamekittax, oldwaterpttax, oldeducess, oldsubcess1, oldsubcess2, oldpttaxdiscount, oldpttaxsurcharge', 'required'),
				array('newproperty', 'safe'),
		);
	}

	public function validatefkeys($attribute,$params){
		//               $aux = $attribute . '0';
		//               if(!$this->$aux)
			//                    $this->addError($attribute, Yii::t('application', 'Incorrect {attribute}.', array('{attribute}'=>Yii::t('application', $attribute))));
	}


	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
				'idccward0' => array(self::BELONGS_TO, 'Ccward', 'idccward'),
				'idpttype0' => array(self::BELONGS_TO, 'Pttype', 'idpttype'),
				'idcccolony0' => array(self::BELONGS_TO, 'Cccolony', 'idcccolony'),
				'idccsex0' => array(self::BELONGS_TO, 'Ccsex', 'idccsex'),
				'idptpropertyon0' => array(self::BELONGS_TO, 'Ptpropertyon', 'idptpropertyon'),
				'idptrange0' => array(self::BELONGS_TO, 'Ptrange', 'idptrange'),
				'pttransactions' => array(self::HAS_MANY, 'Pttransaction', 'idptmaster'),
				'pttransfers' => array(self::HAS_MANY, 'Pttransfer', 'idptmaster'),
				'wmmasters' => array(self::HAS_MANY, 'Wmmaster', 'idptmaster'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
				'idptmaster' => Yii::t('application', 'Idptmaster'),
				'caseno' => Yii::t('application', 'Caseno'),
				'idccward' => Yii::t('application', 'Idccward'),
				'idpttype' => Yii::t('application', 'Idpttype'),
				'ownername' => Yii::t('application', 'Ownername'),
				'fathername' => Yii::t('application', 'Fathername'),
				'owneraddress' => Yii::t('application', 'Owneraddress'),
				'propertyno' => Yii::t('application', 'Propertyno'),
				'propertyaddress' => Yii::t('application', 'Propertyaddress'),
				'constyear' => Yii::t('application', 'Constyear'),
				'transferbreakup' => Yii::t('application', 'Transferbreakup'),
				'trashed' => Yii::t('application', 'Trashed'),
				'ledgerno' => Yii::t('application', 'Ledgerno'),
				'idcccolony' => Yii::t('application', 'Idcccolony'),
				'idptrange' => Yii::t('application', 'Idptrange'),
				'idptpropertyon' => Yii::t('application', 'Idptpropertyon'),
				'propertytax' => Yii::t('application', 'Propertytax'),
				'watertax' => Yii::t('application', 'Watertax'),
				'idptservicetax' => Yii::t('application', 'Idptservicetax'),
				'idptexsumtors' => Yii::t('application', 'Idptexsumtors'),
				'propertydetails' => Yii::t('application', 'Propertydetails'),
				'params' => Yii::t('application', 'Params'),
				'idccsex' => Yii::t('application', 'Idccsex'),
				'oldpropertytax' => Yii::t('application', 'Oldpropertytax'),
				'oldservicetax' => Yii::t('application', 'Oldservicetax'),
				'oldminsamekittax' => Yii::t('application', 'Oldminsamekittax'),
				'oldsamekittax' => Yii::t('application', 'Oldsamekittax'),
				'oldwaterpttax' => Yii::t('application', 'Oldwaterpttax'),
				'oldeducess' => Yii::t('application', 'Oldeducess'),
				'oldsubcess1' => Yii::t('application', 'Oldsubcess1'),
				'oldsubcess2' => Yii::t('application', 'Oldsubcess2'),
				'oldpttaxdiscount' => Yii::t('application', 'Oldpttaxdiscount'),
				'oldpttaxsurcharge' => Yii::t('application', 'Oldpttaxsurcharge'),
				'newproperty' => Yii::t('application', 'New Property'),
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

		//                syslog(LOG_WARNING, "IDptmaster: " . $this->idptmaster . ' - ' . $this->encodePkey());

		//		$criteria->compare('idptmaster', $this->idptmaster,true);
		$criteria->compare('caseno',$this->caseno,true);
		$criteria->compare('idccward',$this->idccward,true);
		$criteria->compare('idpttype',$this->idpttype,true);
		$criteria->compare('ownername',$this->ownername,true);
		$criteria->compare('fathername',$this->fathername,true);
		$criteria->compare('owneraddress',$this->owneraddress,true);
		$criteria->compare('propertyno',$this->propertyno,true);
		$criteria->compare('propertyaddress',$this->propertyaddress,true);
		$criteria->compare('constyear',$this->constyear,true);
		$criteria->compare('transferbreakup',$this->transferbreakup);
		$criteria->compare('trashed',$this->trashed);
		$criteria->compare('ledgerno',$this->ledgerno,true);
		$criteria->compare('idcccolony',$this->idcccolony,true);
		$criteria->compare('idptrange',$this->idptrange,true);
		$criteria->compare('idptpropertyon',$this->idptpropertyon,true);
		$criteria->compare('propertytax',$this->propertytax);
		$criteria->compare('watertax',$this->watertax);
		$criteria->compare('idptservicetax',$this->idptservicetax,true);
		$criteria->compare('idptexsumtors',$this->idptexsumtors,true);
		$criteria->compare('propertydetails',$this->propertydetails,true);
		$criteria->compare('idccsex',$this->idccsex,true);

		$cActiveDataProvider = new CActiveDataProvider(get_class($this));
		if($this->idptmaster == ''){
			$cActiveDataProvider = new CActiveDataProvider(get_class($this), array(
					'criteria'=>$criteria,
			));
			return $cActiveDataProvider;
		}
		else{
			$data = array();
			foreach(Ptmaster::model()->findAll($criteria) as $ptmaster){
				syslog(LOG_WARNING, $ptmaster->idccward0->idcczone . ' - ' . $ptmaster->idccward . ' - ' .  $ptmaster->idptmaster . ' ---> ' . $this->encodePkey($ptmaster->idccward0->idcczone, $ptmaster->idccward, $ptmaster->idptmaster));

				if(!(strpos($this->encodePkey($ptmaster->idccward0->idcczone, $ptmaster->idccward, $ptmaster->idptmaster), $this->idptmaster . '') === false)){
					$data[] = $ptmaster;
				}
			}
			$cActiveDataProvider->setData($data);
			return $cActiveDataProvider;
		}
	}

	public function porpertydetailsDataProvider() {
		if (!$this->propertydetails) {
			for ($i = 0; $i <= 5; $i++) {
				$rawData[$i]['id'] = $i;
			}
			$rawData[0]['category'] = Yii::t('application', 'Ground Floor');
			$rawData[1]['category'] = Yii::t('application', 'First Floor');
			$rawData[2]['category'] = Yii::t('application', 'Second Floor');
			$rawData[3]['category'] = Yii::t('application', 'Third Floor');
			$rawData[4]['category'] = Yii::t('application', 'Above Third / Basement');
			$rawData[5]['category'] = Yii::t('application', 'Total');

			for ($i = 0; $i <= 5; $i++) {
				$rawData[$i]['aresidential'] = 0;
				$rawData[$i]['acommercial'] = 0;
				$rawData[$i]['arental'] = 0;
				$rawData[$i]['bresidential'] = 0;
				$rawData[$i]['bcommercial'] = 0;
				$rawData[$i]['brental'] = 0;
				$rawData[$i]['cresidential'] = 0;
				$rawData[$i]['ccommercial'] = 0;
				$rawData[$i]['crental'] = 0;
				$rawData[$i]['dresidential'] = 0;
				$rawData[$i]['dcommercial'] = 0;
				$rawData[$i]['drental'] = 0;
				$rawData[$i]['eresidential'] = 0;
				$rawData[$i]['ecommercial'] = 0;
				$rawData[$i]['erental'] = 0;

			}
		} else {
			$rawData = json_decode($this->propertydetails, true);
		}

		$dataProvider = new CArrayDataProvider($rawData, array(
				'id' => 'porpertydetailsDataProvider',
		));
		return $dataProvider;
	}

	public function porpertydetailsDataProviderView() {
		if (!$this->propertydetails) {
			for ($i = 0; $i <= 5; $i++) {
				$rawData[$i]['id'] = $i;
			}
			$rawData[0]['category'] = Yii::t('application', 'Ground Floor');
			$rawData[1]['category'] = Yii::t('application', 'First Floor');
			$rawData[2]['category'] = Yii::t('application', 'Second Floor');
			$rawData[3]['category'] = Yii::t('application', 'Third Floor');
			$rawData[4]['category'] = Yii::t('application', 'Above Third / Basement');
			$rawData[5]['category'] = Yii::t('application', 'Total');

			for ($i = 0; $i <= 5; $i++) {
				$rawData[$i]['aresidential'] = 0;
				$rawData[$i]['acommercial'] = 0;
				$rawData[$i]['arental'] = 0;
				$rawData[$i]['bresidential'] = 0;
				$rawData[$i]['bcommercial'] = 0;
				$rawData[$i]['brental'] = 0;
				$rawData[$i]['cresidential'] = 0;
				$rawData[$i]['ccommercial'] = 0;
				$rawData[$i]['crental'] = 0;
				$rawData[$i]['dresidential'] = 0;
				$rawData[$i]['dcommercial'] = 0;
				$rawData[$i]['drental'] = 0;
				$rawData[$i]['eresidential'] = 0;
				$rawData[$i]['ecommercial'] = 0;
				$rawData[$i]['erental'] = 0;

			}
		} else {
			$rawData = json_decode($this->propertydetails, true);
		}

		//        $rawData = json_decode($this->propertydetails, true);

		//        $rawData[0]['aresidential'] = $rawData[0]['aresidential'] + $rawData[1]['aresidential'];

		$dataProvider = new CArrayDataProvider($rawData, array(
				'id' => 'porpertydetailsDataProvider',
		));
		return $dataProvider;
	}

	//    public function encodePkey($idcczone = $this->idccward0->idcczone, $idccward = $this->idccward, $idptmaster = $this->idptmaster){
	public function encodePkey($idcczone = '', $idccward = '', $idptmaster = ''){
		if($idcczone == '' && isset($this->idccward) && isset($this->idccward0->idcczone0) && isset($this->idccward0->idcczone)){
			$idcczone = $this->idccward0->idcczone;
		}
		if($idccward == '' && isset($this->idccward)){
			$idccward = $this->idccward0->idccward;
		}
		if($idptmaster == '' && isset($this->idptmaster)){
			$idptmaster = $this->idptmaster;
		}
		//        syslog(LOG_WARNING, "ward: $idcczone, $idccward, $idptmaster..."  . '  ' . sprintf("%02s%02s%05s", $idcczone, $idccward, $idptmaster));
		return sprintf("%02s%02s%05s", $idcczone, $idccward, $idptmaster);
	}

}