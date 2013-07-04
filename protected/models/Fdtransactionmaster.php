<?php

/**
 * This is the model class for table "{{fdtransactionmaster}}".
 *
 * The followings are the available columns in table '{{fdtransactionmaster}}':
 * @property string $idfdtransactionmaster
 * @property string $transactionmastervoucherdate
 * @property string $transactionmasternarration
 * @property string $idfdvouchertype
 *
 * The followings are the available model relations:
 * @property Fdtransactiondetails[] $fdtransactiondetails
 * @property Fdtransactionissuepurchase[] $fdtransactionissuepurchases
 * @property Fdvouchertype $idfdvouchertype0
 * @property Rtiapplication[] $rtiapplications
 */
class Fdtransactionmaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Fdtransactionmaster the static model class
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
		return '{{fdtransactionmaster}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('transactionmasternarration', 'required'),
			array('transactionmasternarration', 'length', 'max'=>100),
			array('idfdvouchertype', 'length', 'max'=>10),
			array('transactionmastervoucherdate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idfdtransactionmaster, transactionmastervoucherdate, transactionmasternarration, idfdvouchertype', 'safe', 'on'=>'search'),
                        array('idfdvouchertype', 'validatefkeys'),
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
			'fdtransactiondetails' => array(self::HAS_MANY, 'Fdtransactiondetails', 'idfdtransactionmaster'),
			'fdtransactionissuepurchases' => array(self::HAS_MANY, 'Fdtransactionissuepurchase', 'idfdtransactionmaster'),
			'idfdvouchertype0' => array(self::BELONGS_TO, 'Fdvouchertype', 'idfdvouchertype'),
			'rtiapplications' => array(self::HAS_MANY, 'Rtiapplication', 'idfdtransactionmaster'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idfdtransactionmaster' => Yii::t('application', 'Idfdtransactionmaster'),
			'transactionmastervoucherdate' => Yii::t('application', 'Transactionmastervoucherdate'),
			'transactionmasternarration' => Yii::t('application', 'Transactionmasternarration'),
			'idfdvouchertype' => Yii::t('application', 'Idfdvouchertype'),
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

		$criteria->compare('idfdtransactionmaster',$this->idfdtransactionmaster,true);
		$criteria->compare('transactionmastervoucherdate',$this->transactionmastervoucherdate,true);
		$criteria->compare('transactionmasternarration',$this->transactionmasternarration,true);
		$criteria->compare('idfdvouchertype',$this->idfdvouchertype,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}