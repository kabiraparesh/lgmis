<?php

/**
 * This is the model class for table "{{bddeathrate}}".
 *
 * The followings are the available columns in table '{{bddeathrate}}':
 * @property string $idbddeathrate
 * @property string $deathperiod
 * @property string $rate
 * @property string $idccfyear
 *
 * The followings are the available model relations:
 * @property Ccfyear $idccfyear0
 */
class Bddeathrate extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Bddeathrate the static model class
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
		return '{{bddeathrate}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('deathperiod, rate, idccfyear', 'required'),
			array('deathperiod', 'length', 'max'=>45),
			array('rate', 'length', 'max'=>10),
			array('idccfyear', 'length', 'max'=>4),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idbddeathrate, deathperiod, rate, idccfyear', 'safe', 'on'=>'search'),
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
			'idbddeathrate' => Yii::t('application', 'Idbddeathrate'),
			'deathperiod' => Yii::t('application', 'Deathperiod'),
			'rate' => Yii::t('application', 'Rate'),
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

		$criteria->compare('idbddeathrate',$this->idbddeathrate,true);
		$criteria->compare('deathperiod',$this->deathperiod,true);
		$criteria->compare('rate',$this->rate,true);
		$criteria->compare('idccfyear',$this->idccfyear,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}