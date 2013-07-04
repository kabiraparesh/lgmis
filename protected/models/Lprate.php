<?php

/**
 * This is the model class for table "{{lprate}}".
 *
 * The followings are the available columns in table '{{lprate}}':
 * @property string $idlprate
 * @property string $idccfyear
 * @property string $idlplicency
 * @property string $rate
 * @property string $renewalrate
 * @property string $cancelationrate
 * @property string $penaltyrate
 *
 * The followings are the available model relations:
 * @property Lpprepration[] $lppreprations
 * @property Lplicency $idlplicency0
 * @property Ccfyear $idccfyear0
 */
class Lprate extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Lprate the static model class
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
		return '{{lprate}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idlprate, cancelationrate', 'required'),
			array('idlprate, idlplicency', 'length', 'max'=>8),
			array('idccfyear', 'length', 'max'=>10),
			array('rate, renewalrate, cancelationrate, penaltyrate', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idlprate, idccfyear, idlplicency, rate, renewalrate, cancelationrate, penaltyrate', 'safe', 'on'=>'search'),
                        array('idccfyear, idlplicency', 'validatefkeys'),
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
			'lppreprations' => array(self::HAS_MANY, 'Lpprepration', 'idlprate'),
			'idlplicency0' => array(self::BELONGS_TO, 'Lplicency', 'idlplicency'),
			'idccfyear0' => array(self::BELONGS_TO, 'Ccfyear', 'idccfyear'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idlprate' => Yii::t('application', 'Idlprate'),
			'idccfyear' => Yii::t('application', 'Idccfyear'),
			'idlplicency' => Yii::t('application', 'Idlplicency'),
			'rate' => Yii::t('application', 'Rate'),
			'renewalrate' => Yii::t('application', 'Renewalrate'),
			'cancelationrate' => Yii::t('application', 'Cancelationrate'),
			'penaltyrate' => Yii::t('application', 'Penaltyrate'),
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

		$criteria->compare('idlprate',$this->idlprate,true);
		$criteria->compare('idccfyear',$this->idccfyear,true);
		$criteria->compare('idlplicency',$this->idlplicency,true);
		$criteria->compare('rate',$this->rate,true);
		$criteria->compare('renewalrate',$this->renewalrate,true);
		$criteria->compare('cancelationrate',$this->cancelationrate,true);
		$criteria->compare('penaltyrate',$this->penaltyrate,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}