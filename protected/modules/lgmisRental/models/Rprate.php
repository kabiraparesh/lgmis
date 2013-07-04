<?php

/**
 * This is the model class for table "{{rprate}}".
 *
 * The followings are the available columns in table '{{rprate}}':
 * @property string $idrprate
 * @property string $idccfyear
 * @property string $idrplocation
 * @property string $idrprange
 * @property string $monthlycharges
 * @property string $surcharge
 *
 * The followings are the available model relations:
 * @property Ccfyear $idccfyear0
 * @property Rplocation $idrplocation0
 * @property Rprange $idrprange0
 */
class Rprate extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Rprate the static model class
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
		return '{{rprate}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idrplocation', 'required'),
			array('idccfyear, idrplocation, idrprange', 'length', 'max'=>10),
			array('monthlycharges, surcharge', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idrprate, idccfyear, idrplocation, idrprange, monthlycharges, surcharge', 'safe', 'on'=>'search'),
                        array('idccfyear, idrplocation, idrprange', 'validatefkeys'),
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
			'idrplocation0' => array(self::BELONGS_TO, 'Rplocation', 'idrplocation'),
			'idrprange0' => array(self::BELONGS_TO, 'Rprange', 'idrprange'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idrprate' => Yii::t('application', 'Idrprate'),
			'idccfyear' => Yii::t('application', 'Idccfyear'),
			'idrplocation' => Yii::t('application', 'Idrplocation'),
			'idrprange' => Yii::t('application', 'Idrprange'),
			'monthlycharges' => Yii::t('application', 'Monthlycharges'),
			'surcharge' => Yii::t('application', 'Surcharge'),
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

		$criteria->compare('idrprate',$this->idrprate,true);
		$criteria->compare('idccfyear',$this->idccfyear,true);
		$criteria->compare('idrplocation',$this->idrplocation,true);
		$criteria->compare('idrprange',$this->idrprange,true);
		$criteria->compare('monthlycharges',$this->monthlycharges,true);
		$criteria->compare('surcharge',$this->surcharge,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}