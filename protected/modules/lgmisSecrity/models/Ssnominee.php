<?php

/**
 * This is the model class for table "{{ssnominee}}".
 *
 * The followings are the available columns in table '{{ssnominee}}':
 * @property string $idssnominee
 * @property string $name
 * @property string $age
 * @property string $idccrelation
 * @property string $idssapplication
 *
 * The followings are the available model relations:
 * @property Ccrelation $idccrelation0
 * @property Ssapplication $idssapplication0
 */
class Ssnominee extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Ssnominee the static model class
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
		return '{{ssnominee}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, idssapplication', 'required'),
			array('name', 'length', 'max'=>8),
			array('age, idccrelation, idssapplication', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idssnominee, name, age, idccrelation, idssapplication', 'safe', 'on'=>'search'),
                        array('idccrelation, idssapplication', 'validatefkeys'),
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
			'idccrelation0' => array(self::BELONGS_TO, 'Ccrelation', 'idccrelation'),
			'idssapplication0' => array(self::BELONGS_TO, 'Ssapplication', 'idssapplication'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idssnominee' => Yii::t('application', 'Idssnominee'),
			'name' => Yii::t('application', 'Name'),
			'age' => Yii::t('application', 'Age'),
			'idccrelation' => Yii::t('application', 'Idccrelation'),
			'idssapplication' => Yii::t('application', 'Idssapplication'),
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

                 $criteria=new CDbCriteria;
                if(isset($_GET['id'])){
                    $this->idssapplication = $_GET['id'];
                }
		$criteria->compare('idssnominee',$this->idssnominee,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('age',$this->age,true);
		$criteria->compare('idccrelation',$this->idccrelation,true);
		$criteria->compare('idssapplication',$this->idssapplication,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}