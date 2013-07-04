<?php

/**
 * This is the model class for table "{{lpprepration}}".
 *
 * The followings are the available columns in table '{{lpprepration}}':
 * @property string $idlpprepration
 * @property string $idlpapplicant
 * @property string $idlpbnature
 * @property string $idlprate
 * @property string $renewaldate
 * @property string $idccstatus
 * @property string $issueddate
 * @property string $idccfyear
 *
 * The followings are the available model relations:
 * @property Ccstatus $idccstatus0
 * @property Lpapplicant $idlpapplicant0
 * @property Lpbnature $idlpbnature0
 * @property Lprate $idlprate0
 * @property Ccfyear $idccfyear0
 */
class Lpprepration extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Lpprepration the static model class
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
		return '{{lpprepration}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idlpprepration, idlpapplicant, idlprate', 'required'),
			array('idlpprepration, idlpapplicant, idlprate', 'length', 'max'=>8),
			array('idlpbnature, idccstatus, idccfyear', 'length', 'max'=>10),
			array('renewaldate, issueddate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idlpprepration, idlpapplicant, idlpbnature, idlprate, renewaldate, idccstatus, issueddate, idccfyear', 'safe', 'on'=>'search'),
                        array('idlpapplicant, idlpbnature, idlprate, idccstatus, idccfyear', 'validatefkeys'),
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
			'idccstatus0' => array(self::BELONGS_TO, 'Ccstatus', 'idccstatus'),
			'idlpapplicant0' => array(self::BELONGS_TO, 'Lpapplicant', 'idlpapplicant'),
			'idlpbnature0' => array(self::BELONGS_TO, 'Lpbnature', 'idlpbnature'),
			'idlprate0' => array(self::BELONGS_TO, 'Lprate', 'idlprate'),
			'idccfyear0' => array(self::BELONGS_TO, 'Ccfyear', 'idccfyear'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idlpprepration' => Yii::t('application', 'Idlpprepration'),
			'idlpapplicant' => Yii::t('application', 'Idlpapplicant'),
			'idlpbnature' => Yii::t('application', 'Idlpbnature'),
			'idlprate' => Yii::t('application', 'Idlprate'),
			'renewaldate' => Yii::t('application', 'Renewaldate'),
			'idccstatus' => Yii::t('application', 'Idccstatus'),
			'issueddate' => Yii::t('application', 'Issueddate'),
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

		$criteria->compare('idlpprepration',$this->idlpprepration,true);
		$criteria->compare('idlpapplicant',$this->idlpapplicant,true);
		$criteria->compare('idlpbnature',$this->idlpbnature,true);
		$criteria->compare('idlprate',$this->idlprate,true);
		$criteria->compare('renewaldate',$this->renewaldate,true);
		$criteria->compare('idccstatus',$this->idccstatus,true);
		$criteria->compare('issueddate',$this->issueddate,true);
		$criteria->compare('idccfyear',$this->idccfyear,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}