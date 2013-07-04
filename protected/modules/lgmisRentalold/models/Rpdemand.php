<?php

/**
 * This is the model class for table "{{rpdemand}}".
 *
 * The followings are the available columns in table '{{rpdemand}}':
 * @property string $idrpdemand
 * @property string $idrpshop
 * @property string $idccfyear
 * @property string $period
 * @property string $rpoldbalance
 * @property string $rpsurcharge
 * @property string $rpdemandamt
 * @property string $rpdemanddate
 *
 * The followings are the available model relations:
 * @property Ccfyear $idccfyear0
 */
class Rpdemand extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Rpdemand the static model class
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
		return '{{rpdemand}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idrpshop', 'required'),
			array('idrpshop, idccfyear, period, rpoldbalance, rpsurcharge, rpdemandamt', 'length', 'max'=>10),
			array('rpdemanddate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idrpdemand, idrpshop, idccfyear, period, rpoldbalance, rpsurcharge, rpdemandamt, rpdemanddate', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idrpdemand' => Yii::t('application', 'Idrpdemand'),
			'idrpshop' => Yii::t('application', 'Idrpshop'),
			'idccfyear' => Yii::t('application', 'Idccfyear'),
			'period' => Yii::t('application', 'Period'),
			'rpoldbalance' => Yii::t('application', 'Rpoldbalance'),
			'rpsurcharge' => Yii::t('application', 'Rpsurcharge'),
			'rpdemandamt' => Yii::t('application', 'Rpdemandamt'),
			'rpdemanddate' => Yii::t('application', 'Rpdemanddate'),
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

		$criteria->compare('idrpdemand',$this->idrpdemand,true);
		$criteria->compare('idrpshop',$this->idrpshop,true);
		$criteria->compare('idccfyear',$this->idccfyear,true);
		$criteria->compare('period',$this->period,true);
		$criteria->compare('rpoldbalance',$this->rpoldbalance,true);
		$criteria->compare('rpsurcharge',$this->rpsurcharge,true);
		$criteria->compare('rpdemandamt',$this->rpdemandamt,true);
		$criteria->compare('rpdemanddate',$this->rpdemanddate,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}