<?php

/**
 * This is the model class for table "{{rpmarket}}".
 *
 * The followings are the available columns in table '{{rpmarket}}':
 * @property string $idrpmarket
 * @property string $mktname
 * @property string $idcccolony
 * @property string $idrplocation
 * @property string $idccbillingperiod
 *
 * The followings are the available model relations:
 * @property Cccolony $idcccolony0
 * @property Rplocation $idrplocation0
 * @property Ccbillingperiod $idccbillingperiod0
 * @property Rpshop[] $rpshops
 */
class Rpmarket extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Rpmarket the static model class
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
		return '{{rpmarket}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mktname, idrplocation, idccbillingperiod', 'required'),
			array('mktname', 'length', 'max'=>100),
			array('idcccolony, idrplocation, idccbillingperiod', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idrpmarket, mktname, idcccolony, idrplocation, idccbillingperiod', 'safe', 'on'=>'search'),
                        array('idcccolony, idrplocation, idccbillingperiod', 'validatefkeys'),
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
			'idcccolony0' => array(self::BELONGS_TO, 'Cccolony', 'idcccolony'),
			'idrplocation0' => array(self::BELONGS_TO, 'Rplocation', 'idrplocation'),
			'idccbillingperiod0' => array(self::BELONGS_TO, 'Ccbillingperiod', 'idccbillingperiod'),
			'rpshops' => array(self::HAS_MANY, 'Rpshop', 'idrpmarket'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idrpmarket' => Yii::t('application', 'Idrpmarket'),
			'mktname' => Yii::t('application', 'Mktname'),
			'idcccolony' => Yii::t('application', 'Idcccolony'),
			'idrplocation' => Yii::t('application', 'Idrplocation'),
			'idccbillingperiod' => Yii::t('application', 'Idccbillingperiod'),
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

		$criteria->compare('idrpmarket',$this->idrpmarket,true);
		$criteria->compare('mktname',$this->mktname,true);
		$criteria->compare('idcccolony',$this->idcccolony,true);
		$criteria->compare('idrplocation',$this->idrplocation,true);
		$criteria->compare('idccbillingperiod',$this->idccbillingperiod,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}