<?php

/**
 * This is the model class for table "{{lplicency}}".
 *
 * The followings are the available columns in table '{{lplicency}}':
 * @property string $idlplicency
 * @property string $licencyname
 * @property string $licencyage
 * @property string $idccsex
 * @property string $licencyaddress
 * @property string $idlpapplicant
 * @property string $licencycontact
 *
 * The followings are the available model relations:
 * @property Ccsex $idccsex0
 * @property Lpapplicant $idlpapplicant0
 */
class Lplicency extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Lplicency the static model class
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
		return '{{lplicency}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('licencyname, licencyage, licencyaddress, idlpapplicant, licencycontact', 'required'),
			array('licencyname, licencyage, licencyaddress', 'length', 'max'=>100),
			array('idccsex, idlpapplicant', 'length', 'max'=>10),
			array('licencycontact', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idlplicency, licencyname, licencyage, idccsex, licencyaddress, idlpapplicant, licencycontact', 'safe', 'on'=>'search'),
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
			'idccsex0' => array(self::BELONGS_TO, 'Ccsex', 'idccsex'),
			'idlpapplicant0' => array(self::BELONGS_TO, 'Lpapplicant', 'idlpapplicant'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idlplicency' => Yii::t('application', 'Idlplicency'),
			'licencyname' => Yii::t('application', 'Licencyname'),
			'licencyage' => Yii::t('application', 'Licencyage'),
			'idccsex' => Yii::t('application', 'Idccsex'),
			'licencyaddress' => Yii::t('application', 'Licencyaddress'),
			'idlpapplicant' => Yii::t('application', 'Idlpapplicant'),
			'licencycontact' => Yii::t('application', 'Licencycontact'),
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
                
		$criteria->compare('idlplicency',$this->idlplicency,true);
		$criteria->compare('licencyname',$this->licencyname,true);
		$criteria->compare('licencyage',$this->licencyage,true);
		$criteria->compare('idccsex',$this->idccsex,true);
		$criteria->compare('licencyaddress',$this->licencyaddress,true);
		$criteria->compare('idlpapplicant',$this->idlpapplicant,true);
		$criteria->compare('licencycontact',$this->licencycontact,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}