<?php

/**
 * This is the model class for table "{{rptenant}}".
 *
 * The followings are the available columns in table '{{rptenant}}':
 * @property string $idrptenant
 * @property string $idrpshop
 * @property string $tenantname
 * @property string $tenantaddress
 * @property string $tenantcity
 * @property string $tenantcontact
 * @property string $hirefrom
 * @property string $shopname
 * @property string $headoffice
 * @property string $registrationno
 *
 * The followings are the available model relations:
 * @property Rpshop $idrpshop0
 */
class Rptenant extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Rptenant the static model class
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
		return '{{rptenant}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idrpshop, tenantname, tenantaddress, tenantcity, tenantcontact, hirefrom, shopname, registrationno', 'required'),
			array('idrpshop', 'length', 'max'=>10),
			array('tenantname, tenantaddress, shopname, headoffice', 'length', 'max'=>100),
			array('tenantcity, tenantcontact, registrationno', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idrptenant, idrpshop, tenantname, tenantaddress, tenantcity, tenantcontact, hirefrom, shopname, headoffice, registrationno', 'safe', 'on'=>'search'),
                        array('idrpshop', 'validatefkeys'),
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
			'idrpshop0' => array(self::BELONGS_TO, 'Rpshop', 'idrpshop'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idrptenant' => Yii::t('application', 'Idrptenant'),
			'idrpshop' => Yii::t('application', 'Idrpshop'),
			'tenantname' => Yii::t('application', 'Tenantname'),
			'tenantaddress' => Yii::t('application', 'Tenantaddress'),
			'tenantcity' => Yii::t('application', 'Tenantcity'),
			'tenantcontact' => Yii::t('application', 'Tenantcontact'),
			'hirefrom' => Yii::t('application', 'Hirefrom'),
			'shopname' => Yii::t('application', 'Shopname'),
			'headoffice' => Yii::t('application', 'Headoffice'),
			'registrationno' => Yii::t('application', 'Registrationno'),
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

		$criteria->compare('idrptenant',$this->idrptenant,true);
		$criteria->compare('idrpshop',$this->idrpshop,true);
		$criteria->compare('tenantname',$this->tenantname,true);
		$criteria->compare('tenantaddress',$this->tenantaddress,true);
		$criteria->compare('tenantcity',$this->tenantcity,true);
		$criteria->compare('tenantcontact',$this->tenantcontact,true);
		$criteria->compare('hirefrom',$this->hirefrom,true);
		$criteria->compare('shopname',$this->shopname,true);
		$criteria->compare('headoffice',$this->headoffice,true);
		$criteria->compare('registrationno',$this->registrationno,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}