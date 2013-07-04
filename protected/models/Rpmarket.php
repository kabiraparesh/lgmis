<?php

/**
 * This is the model class for table "{{rpmarket}}".
 *
 * The followings are the available columns in table '{{rpmarket}}':
 * @property string $idrpmarket
 * @property string $name
 * @property string $location
 * @property string $idccward
 *
 * The followings are the available model relations:
 * @property Ccward $idccward0
 * @property Rpproregist[] $rpproregists
 * @property Rprate[] $rprates
 */
class Rpmarket extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Rpmarket the static model class
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
		return '{{rpmarket}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idrpmarket', 'required'),
			array('idrpmarket, idccward', 'length', 'max'=>10),
			array('name, location', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idrpmarket, name, location, idccward', 'safe', 'on'=>'search'),
                        array('idccward', 'validatefkeys'),
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
			'idccward0' => array(self::BELONGS_TO, 'Ccward', 'idccward'),
			'rpproregists' => array(self::HAS_MANY, 'Rpproregist', 'idrpmarket'),
			'rprates' => array(self::HAS_MANY, 'Rprate', 'idrpmarket'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idrpmarket' => Yii::t('application', 'Idrpmarket'),
			'name' => Yii::t('application', 'Name'),
			'location' => Yii::t('application', 'Location'),
			'idccward' => Yii::t('application', 'Idccward'),
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

		$criteria->compare('idrpmarket',$this->idrpmarket,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('idccward',$this->idccward,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}