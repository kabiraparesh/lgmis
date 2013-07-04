<?php

/**
 * This is the model class for table "{{lprate}}".
 *
 * The followings are the available columns in table '{{lprate}}':
 * @property string $idlprate
 * @property string $idccfyear
 * @property string $idlpbnature
 * @property string $naturerate
 * @property string $renewalrate
 * @property string $cancelationrate
 * @property string $penaltyrate
 *
 * The followings are the available model relations:
 * @property Ccfyear $idccfyear0
 * @property Lpbnature $idlpbnature0
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
			array('naturerate, renewalrate, cancelationrate, penaltyrate', 'required'),
			array('idccfyear, idlpbnature, naturerate, renewalrate, cancelationrate, penaltyrate', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idlprate, idccfyear, idlpbnature, naturerate, renewalrate, cancelationrate, penaltyrate', 'safe', 'on'=>'search'),
                        array('idccfyear, idlpbnature', 'validatefkeys'),
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
			'idlpbnature0' => array(self::BELONGS_TO, 'Lpbnature', 'idlpbnature'),
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
			'idlpbnature' => Yii::t('application', 'Idlpbnature'),
			'naturerate' => Yii::t('application', 'Naturerate'),
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
		$criteria->compare('idlpbnature',$this->idlpbnature,true);
		$criteria->compare('naturerate',$this->naturerate,true);
		$criteria->compare('renewalrate',$this->renewalrate,true);
		$criteria->compare('cancelationrate',$this->cancelationrate,true);
		$criteria->compare('penaltyrate',$this->penaltyrate,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}