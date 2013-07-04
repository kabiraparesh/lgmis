<?php

/**
 * This is the model class for table "{{fdledger}}".
 *
 * The followings are the available columns in table '{{fdledger}}':
 * @property string $idfdledger
 * @property string $ledgername
 * @property string $idfdgroup
 * @property string $openingbal
 * @property string $currentbal
 * @property string $openingbalance
 * @property string $currentbalance
 *
 * The followings are the available model relations:
 * @property Fdgroup $idfdgroup0
 * @property Fdtransactiondetails[] $fdtransactiondetails
 */
class Fdledger extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Fdledger the static model class
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
		return '{{fdledger}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('openingbal, currentbal, openingbalance, currentbalance', 'required'),
			array('ledgername', 'length', 'max'=>100),
			array('idfdgroup', 'length', 'max'=>10),
			array('openingbal, currentbal, openingbalance, currentbalance', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idfdledger, ledgername, idfdgroup, openingbal, currentbal, openingbalance, currentbalance', 'safe', 'on'=>'search'),
                        array('idfdgroup', 'validatefkeys'),
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
			'idfdgroup0' => array(self::BELONGS_TO, 'Fdgroup', 'idfdgroup'),
			'fdtransactiondetails' => array(self::HAS_MANY, 'Fdtransactiondetails', 'idfdledger'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idfdledger' => Yii::t('application', 'Idfdledger'),
			'ledgername' => Yii::t('application', 'Ledgername'),
			'idfdgroup' => Yii::t('application', 'Idfdgroup'),
			'openingbal' => Yii::t('application', 'Openingbal'),
			'currentbal' => Yii::t('application', 'Currentbal'),
			'openingbalance' => Yii::t('application', 'Openingbalance'),
			'currentbalance' => Yii::t('application', 'Currentbalance'),
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

		$criteria->compare('idfdledger',$this->idfdledger,true);
		$criteria->compare('ledgername',$this->ledgername,true);
		$criteria->compare('idfdgroup',$this->idfdgroup,true);
		$criteria->compare('openingbal',$this->openingbal,true);
		$criteria->compare('currentbal',$this->currentbal,true);
		$criteria->compare('openingbalance',$this->openingbalance,true);
		$criteria->compare('currentbalance',$this->currentbalance,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}