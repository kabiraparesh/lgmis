<?php

/**
 * This is the model class for table "{{cccompanyinfo}}".
 *
 * The followings are the available columns in table '{{cccompanyinfo}}':
 * @property string $idcccomany
 * @property string $municipalname
 * @property string $password
 * @property string $address1
 * @property string $address2
 * @property string $city
 * @property string $district
 * @property string $state
 * @property string $pincode
 * @property string $contact1
 * @property string $contact2
 * @property string $fax
 * @property string $emailaddress
 * @property string $urladdress
 * @property string $currency
 * @property string $username
 */
class Cccompanyinfo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Cccompanyinfo the static model class
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
		return '{{cccompanyinfo}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('municipalname, password, address1, city, district, state, pincode, contact1, currency, username', 'required'),
			array('municipalname, address1, address2, city, district, state, emailaddress, urladdress', 'length', 'max'=>100),
			array('password, pincode, currency, username', 'length', 'max'=>45),
			array('contact1, contact2', 'length', 'max'=>15),
			array('fax', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idcccomany, municipalname, password, address1, address2, city, district, state, pincode, contact1, contact2, fax, emailaddress, urladdress, currency, username', 'safe', 'on'=>'search'),
		);
	}        
        
        
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idcccomany' => Yii::t('application', 'Idcccomany'),
			'municipalname' => Yii::t('application', 'Municipalname'),
			'password' => Yii::t('application', 'Password'),
			'address1' => Yii::t('application', 'Address1'),
			'address2' => Yii::t('application', 'Address2'),
			'city' => Yii::t('application', 'City'),
			'district' => Yii::t('application', 'District'),
			'state' => Yii::t('application', 'State'),
			'pincode' => Yii::t('application', 'Pincode'),
			'contact1' => Yii::t('application', 'Contact1'),
			'contact2' => Yii::t('application', 'Contact2'),
			'fax' => Yii::t('application', 'Fax'),
			'emailaddress' => Yii::t('application', 'Emailaddress'),
			'urladdress' => Yii::t('application', 'Urladdress'),
			'currency' => Yii::t('application', 'Currency'),
			'username' => Yii::t('application', 'Username'),
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

		$criteria->compare('idcccomany',$this->idcccomany,true);
		$criteria->compare('municipalname',$this->municipalname,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('address1',$this->address1,true);
		$criteria->compare('address2',$this->address2,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('district',$this->district,true);
		$criteria->compare('state',$this->state,true);
		$criteria->compare('pincode',$this->pincode,true);
		$criteria->compare('contact1',$this->contact1,true);
		$criteria->compare('contact2',$this->contact2,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('emailaddress',$this->emailaddress,true);
		$criteria->compare('urladdress',$this->urladdress,true);
		$criteria->compare('currency',$this->currency,true);
		$criteria->compare('username',$this->username,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}