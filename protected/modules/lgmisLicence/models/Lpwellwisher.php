<?php

/**
 * This is the model class for table "{{lpwellwisher}}".
 *
 * The followings are the available columns in table '{{lpwellwisher}}':
 * @property string $idwellwisher
 * @property string $wishername
 * @property string $wisherage
 * @property string $idccsex
 * @property string $wisheraddress
 * @property string $idlpapplicant
 * @property string $wishercontact
 *
 * The followings are the available model relations:
 * @property Lpapplicant $idlpapplicant0
 * @property Ccsex $idccsex0
 */
class Lpwellwisher extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Lpwellwisher the static model class
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
		return '{{lpwellwisher}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('wishername, wisherage, idccsex, wisheraddress, idlpapplicant, wishercontact', 'required'),
			array('wishername, wisherage, wisheraddress', 'length', 'max'=>100),
			array('idccsex, idlpapplicant', 'length', 'max'=>10),
			array('wishercontact', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idwellwisher, wishername, wisherage, idccsex, wisheraddress, idlpapplicant, wishercontact', 'safe', 'on'=>'search'),
                        array('idccsex, idlpapplicant', 'validatefkeys'),
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
			'idlpapplicant0' => array(self::BELONGS_TO, 'Lpapplicant', 'idlpapplicant'),
			'idccsex0' => array(self::BELONGS_TO, 'Ccsex', 'idccsex'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idwellwisher' => Yii::t('application', 'Idwellwisher'),
			'wishername' => Yii::t('application', 'Wishername'),
			'wisherage' => Yii::t('application', 'Wisherage'),
			'idccsex' => Yii::t('application', 'Idccsex'),
			'wisheraddress' => Yii::t('application', 'Wisheraddress'),
			'idlpapplicant' => Yii::t('application', 'Idlpapplicant'),
			'wishercontact' => Yii::t('application', 'Wishercontact'),
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
                    $this->idlpapplicant = $_GET['id'];
                }
                
		$criteria->compare('idwellwisher',$this->idwellwisher,true);
		$criteria->compare('wishername',$this->wishername,true);
		$criteria->compare('wisherage',$this->wisherage,true);
		$criteria->compare('idccsex',$this->idccsex,true);
		$criteria->compare('wisheraddress',$this->wisheraddress,true);
		$criteria->compare('idlpapplicant',$this->idlpapplicant,true);
		$criteria->compare('wishercontact',$this->wishercontact,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}