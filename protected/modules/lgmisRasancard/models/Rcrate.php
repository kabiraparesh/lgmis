<?php

/**
 * This is the model class for table "{{rcrate}}".
 *
 * The followings are the available columns in table '{{rcrate}}':
 * @property string $idrcrate
 * @property string $idccfyear
 * @property string $whitercard
 * @property string $bluercard
 * @property string $yellowrcard
 * @property string $newrcard
 * @property string $renewrcard
 * @property string $reviewrcard
 *
 * The followings are the available model relations:
 * @property Ccfyear $idccfyear0
 */
class Rcrate extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Rcrate the static model class
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
		return '{{rcrate}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idccfyear', 'length', 'max'=>10),
			array('whitercard, bluercard, yellowrcard, newrcard, renewrcard, reviewrcard', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idrcrate, idccfyear, whitercard, bluercard, yellowrcard, newrcard, renewrcard, reviewrcard', 'safe', 'on'=>'search'),
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
			'idrcrate' => Yii::t('application', 'Idrcrate'),
			'idccfyear' => Yii::t('application', 'Idccfyear'),
			'whitercard' => Yii::t('application', 'Whitercard'),
			'bluercard' => Yii::t('application', 'Bluercard'),
			'yellowrcard' => Yii::t('application', 'Yellowrcard'),
			'newrcard' => Yii::t('application', 'Newrcard'),
			'renewrcard' => Yii::t('application', 'Renewrcard'),
			'reviewrcard' => Yii::t('application', 'Reviewrcard'),
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

		$criteria->compare('idrcrate',$this->idrcrate,true);
		$criteria->compare('idccfyear',$this->idccfyear,true);
		$criteria->compare('whitercard',$this->whitercard,true);
		$criteria->compare('bluercard',$this->bluercard,true);
		$criteria->compare('yellowrcard',$this->yellowrcard,true);
		$criteria->compare('newrcard',$this->newrcard,true);
		$criteria->compare('renewrcard',$this->renewrcard,true);
		$criteria->compare('reviewrcard',$this->reviewrcard,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}