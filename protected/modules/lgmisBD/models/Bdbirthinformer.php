<?php

/**
 * This is the model class for table "{{bdbirthinformer}}".
 *
 * The followings are the available columns in table '{{bdbirthinformer}}':
 * @property string $idbdbirthinformer
 * @property string $informername
 * @property string $informeraddress
 * @property string $childname
 * @property string $dob
 * @property string $timeofbirth
 * @property string $idccsex
 * @property string $fathername
 * @property string $fathereducation
 * @property string $mothername
 * @property string $idccreligion
 * @property string $motheroccupation
 * @property string $fatheroccupation
 * @property string $deliverymethod
 * @property string $birthplace
 *
 * The followings are the available model relations:
 * @property Bdbirthapplication[] $bdbirthapplications
 * @property Ccreligion $idccreligion0
 * @property Ccsex $idccsex0
 */
class Bdbirthinformer extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Bdbirthinformer the static model class
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
		return '{{bdbirthinformer}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('informername, fathername, mothername, deliverymethod, birthplace', 'required'),
			array('idbdbirthinformer, childname, idccsex, idccreligion', 'length', 'max'=>10),
			array('informername, informeraddress, fathername, fathereducation, mothername', 'length', 'max'=>100),
			array('motheroccupation, fatheroccupation, deliverymethod, birthplace', 'length', 'max'=>45),
			array('dob, timeofbirth', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idbdbirthinformer, informername, informeraddress, childname, dob, timeofbirth, idccsex, fathername, fathereducation, mothername, idccreligion, motheroccupation, fatheroccupation, deliverymethod, birthplace', 'safe', 'on'=>'search'),
                        array('idccsex, idccreligion', 'validatefkeys'),
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
			'bdbirthapplications' => array(self::HAS_MANY, 'Bdbirthapplication', 'idbdbirthinformer'),
			'idccreligion0' => array(self::BELONGS_TO, 'Ccreligion', 'idccreligion'),
			'idccsex0' => array(self::BELONGS_TO, 'Ccsex', 'idccsex'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idbdbirthinformer' => Yii::t('application', 'Idbdbirthinformer'),
			'informername' => Yii::t('application', 'Informername'),
			'informeraddress' => Yii::t('application', 'Informeraddress'),
			'childname' => Yii::t('application', 'Childname'),
			'dob' => Yii::t('application', 'Dob'),
			'timeofbirth' => Yii::t('application', 'Timeofbirth'),
			'idccsex' => Yii::t('application', 'Idccsex'),
			'fathername' => Yii::t('application', 'Fathername'),
			'fathereducation' => Yii::t('application', 'Fathereducation'),
			'mothername' => Yii::t('application', 'Mothername'),
			'idccreligion' => Yii::t('application', 'Idccreligion'),
			'motheroccupation' => Yii::t('application', 'Motheroccupation'),
			'fatheroccupation' => Yii::t('application', 'Fatheroccupation'),
			'deliverymethod' => Yii::t('application', 'Deliverymethod'),
			'birthplace' => Yii::t('application', 'Birthplace'),
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

		$criteria->compare('idbdbirthinformer',$this->idbdbirthinformer,true);
		$criteria->compare('informername',$this->informername,true);
		$criteria->compare('informeraddress',$this->informeraddress,true);
		$criteria->compare('childname',$this->childname,true);
		$criteria->compare('dob',$this->dob,true);
		$criteria->compare('timeofbirth',$this->timeofbirth,true);
		$criteria->compare('idccsex',$this->idccsex,true);
		$criteria->compare('fathername',$this->fathername,true);
		$criteria->compare('fathereducation',$this->fathereducation,true);
		$criteria->compare('mothername',$this->mothername,true);
		$criteria->compare('idccreligion',$this->idccreligion,true);
		$criteria->compare('motheroccupation',$this->motheroccupation,true);
		$criteria->compare('fatheroccupation',$this->fatheroccupation,true);
		$criteria->compare('deliverymethod',$this->deliverymethod,true);
		$criteria->compare('birthplace',$this->birthplace,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}