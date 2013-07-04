<?php

/**
 * This is the model class for table "{{bparearate}}".
 *
 * The followings are the available columns in table '{{bparearate}}':
 * @property string $idbparearate
 * @property string $idccfyear
 * @property string $idbpusagetype
 * @property string $raterange
 * @property string $scheduleperiod
 *
 * The followings are the available model relations:
 * @property Ccfyear $idccfyear0
 * @property Bpusagetype $idbpusagetype0
 */
class Bparearate extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Bparearate the static model class
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
		return '{{bparearate}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idccfyear, idbpusagetype, raterange, scheduleperiod', 'required'),
			array('idccfyear, idbpusagetype, scheduleperiod', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idbparearate, idccfyear, idbpusagetype, raterange, scheduleperiod', 'safe', 'on'=>'search'),
                        array('idccfyear, idbpusagetype', 'validatefkeys'),
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
			'idbpusagetype0' => array(self::BELONGS_TO, 'Bpusagetype', 'idbpusagetype'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idbparearate' => Yii::t('application', 'Idbparearate'),
			'idccfyear' => Yii::t('application', 'Idccfyear'),
			'idbpusagetype' => Yii::t('application', 'Idbpusagetype'),
			'raterange' => Yii::t('application', 'Raterange'),
			'scheduleperiod' => Yii::t('application', 'Scheduleperiod'),
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

		$criteria->compare('idbparearate',$this->idbparearate,true);
		$criteria->compare('idccfyear',$this->idccfyear,true);
		$criteria->compare('idbpusagetype',$this->idbpusagetype,true);
		$criteria->compare('raterange',$this->raterange,true);
		$criteria->compare('scheduleperiod',$this->scheduleperiod,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}