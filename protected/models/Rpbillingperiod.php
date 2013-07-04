<?php

/**
 * This is the model class for table "{{rpbillingperiod}}".
 *
 * The followings are the available columns in table '{{rpbillingperiod}}':
 * @property string $idrpbillingperiod
 * @property string $type
 * @property string $idccfyear
 *
 * The followings are the available model relations:
 * @property Ccfyear $idccfyear0
 * @property Rptenant[] $rptenants
 */
class Rpbillingperiod extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Rpbillingperiod the static model class
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
		return '{{rpbillingperiod}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idrpbillingperiod', 'required'),
			array('idrpbillingperiod, idccfyear', 'length', 'max'=>10),
			array('type', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idrpbillingperiod, type, idccfyear', 'safe', 'on'=>'search'),
                        array('idccfyear', 'validatefkeys'),
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
			'idccfyear0' => array(self::BELONGS_TO, 'Ccfyear', 'idccfyear'),
			'rptenants' => array(self::HAS_MANY, 'Rptenant', 'idrpbillingperiod'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idrpbillingperiod' => Yii::t('application', 'Idrpbillingperiod'),
			'type' => Yii::t('application', 'Type'),
			'idccfyear' => Yii::t('application', 'Idccfyear'),
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

		$criteria->compare('idrpbillingperiod',$this->idrpbillingperiod,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('idccfyear',$this->idccfyear,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}