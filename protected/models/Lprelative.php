<?php

/**
 * This is the model class for table "{{lprelative}}".
 *
 * The followings are the available columns in table '{{lprelative}}':
 * @property string $idlprelative
 * @property string $name
 * @property string $age
 * @property string $idccsex
 * @property string $idccrelation
 *
 * The followings are the available model relations:
 * @property Lpapplicant[] $lpapplicants
 * @property Ccrelation $idccrelation0
 * @property Ccsex $idccsex0
 */
class Lprelative extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Lprelative the static model class
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
		return '{{lprelative}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, age', 'length', 'max'=>100),
			array('idccsex, idccrelation', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idlprelative, name, age, idccsex, idccrelation', 'safe', 'on'=>'search'),
                        array('idccsex, idccrelation', 'validatefkeys'),
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
			'lpapplicants' => array(self::HAS_MANY, 'Lpapplicant', 'idlprelative'),
			'idccrelation0' => array(self::BELONGS_TO, 'Ccrelation', 'idccrelation'),
			'idccsex0' => array(self::BELONGS_TO, 'Ccsex', 'idccsex'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idlprelative' => Yii::t('application', 'Idlprelative'),
			'name' => Yii::t('application', 'Name'),
			'age' => Yii::t('application', 'Age'),
			'idccsex' => Yii::t('application', 'Idccsex'),
			'idccrelation' => Yii::t('application', 'Idccrelation'),
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

		$criteria->compare('idlprelative',$this->idlprelative,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('age',$this->age,true);
		$criteria->compare('idccsex',$this->idccsex,true);
		$criteria->compare('idccrelation',$this->idccrelation,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}