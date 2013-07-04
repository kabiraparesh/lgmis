<?php

/**
 * This is the model class for table "{{rtiapplication}}".
 *
 * The followings are the available columns in table '{{rtiapplication}}':
 * @property string $idrtiapplication
 * @property string $applicantname
 * @property string $houseno
 * @property string $area
 * @property string $city
 * @property string $phone1
 * @property string $mobile
 * @property string $officername
 * @property string $idfdtransactionmaster
 *
 * The followings are the available model relations:
 * @property Fdtransactionmaster $idfdtransactionmaster0
 */
class Rtiapplication extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Rtiapplication the static model class
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
		return '{{rtiapplication}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('applicantname, houseno, phone1, officername, idfdtransactionmaster', 'required'),
			array('idrtiapplication, city, mobile, idfdtransactionmaster', 'length', 'max'=>10),
			array('applicantname', 'length', 'max'=>25),
			array('houseno', 'length', 'max'=>2),
			array('area', 'length', 'max'=>30),
			array('phone1', 'length', 'max'=>12),
			array('officername', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idrtiapplication, applicantname, houseno, area, city, phone1, mobile, officername, idfdtransactionmaster', 'safe', 'on'=>'search'),
                        array('idfdtransactionmaster', 'validatefkeys'),
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
			'idfdtransactionmaster0' => array(self::BELONGS_TO, 'Fdtransactionmaster', 'idfdtransactionmaster'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idrtiapplication' => Yii::t('application', 'Idrtiapplication'),
			'applicantname' => Yii::t('application', 'Applicantname'),
			'houseno' => Yii::t('application', 'Houseno'),
			'area' => Yii::t('application', 'Area'),
			'city' => Yii::t('application', 'City'),
			'phone1' => Yii::t('application', 'Phone1'),
			'mobile' => Yii::t('application', 'Mobile'),
			'officername' => Yii::t('application', 'Officername'),
			'idfdtransactionmaster' => Yii::t('application', 'Idfdtransactionmaster'),
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

		$criteria->compare('idrtiapplication',$this->idrtiapplication,true);
		$criteria->compare('applicantname',$this->applicantname,true);
		$criteria->compare('houseno',$this->houseno,true);
		$criteria->compare('area',$this->area,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('phone1',$this->phone1,true);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('officername',$this->officername,true);
		$criteria->compare('idfdtransactionmaster',$this->idfdtransactionmaster,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}