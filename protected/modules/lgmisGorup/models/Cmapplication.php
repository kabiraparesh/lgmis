<?php

/**
 * This is the model class for table "{{cmapplication}}".
 *
 * The followings are the available columns in table '{{cmapplication}}':
 * @property string $idcmapplication
 * @property string $idcmsource
 * @property string $applicantname
 * @property string $applicantaddress
 * @property string $idccstatus
 * @property string $idcmprioritylevel
 * @property string $idcmperiod
 * @property string $idcmcategories
 * @property string $description
 * @property string $complaintlocation
 * @property string $idcccolony
 * @property string $applicantphone
 * @property string $applicantmobile
 * @property string $applicantemail
 *
 * The followings are the available model relations:
 * @property Cmcategories $idcmcategories0
 * @property Cmprioritylevel $idcmprioritylevel0
 * @property Cccolony $idcccolony0
 * @property Cmperiod $idcmperiod0
 * @property Cmsource $idcmsource0
 */
class Cmapplication extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Cmapplication the static model class
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
		return '{{cmapplication}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idcmsource, applicantname, idcmprioritylevel, idcmperiod, idcmcategories, description, complaintlocation, idcccolony, applicantphone, applicantmobile, applicantemail', 'required'),
			array('idcmsource, idccstatus, idcmprioritylevel, idcmperiod, idcmcategories, idcccolony', 'length', 'max'=>10),
			array('applicantname, applicantemail', 'length', 'max'=>45),
			array('applicantaddress, complaintlocation', 'length', 'max'=>100),
			array('description', 'length', 'max'=>150),
			array('applicantphone, applicantmobile', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idcmapplication, idcmsource, applicantname, applicantaddress, idccstatus, idcmprioritylevel, idcmperiod, idcmcategories, description, complaintlocation, idcccolony, applicantphone, applicantmobile, applicantemail', 'safe', 'on'=>'search'),
                        array('idcmsource, idcmprioritylevel, idcmperiod, idcmcategories, idcccolony', 'validatefkeys'),
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
			'idcmcategories0' => array(self::BELONGS_TO, 'Cmcategories', 'idcmcategories'),
			'idcmprioritylevel0' => array(self::BELONGS_TO, 'Cmprioritylevel', 'idcmprioritylevel'),
			'idcccolony0' => array(self::BELONGS_TO, 'Cccolony', 'idcccolony'),
			'idcmperiod0' => array(self::BELONGS_TO, 'Cmperiod', 'idcmperiod'),
			'idcmsource0' => array(self::BELONGS_TO, 'Cmsource', 'idcmsource'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idcmapplication' => Yii::t('application', 'Idcmapplication'),
			'idcmsource' => Yii::t('application', 'Idcmsource'),
			'applicantname' => Yii::t('application', 'Applicantname'),
			'applicantaddress' => Yii::t('application', 'Applicantaddress'),
			'idccstatus' => Yii::t('application', 'Idccstatus'),
			'idcmprioritylevel' => Yii::t('application', 'Idcmprioritylevel'),
			'idcmperiod' => Yii::t('application', 'Idcmperiod'),
			'idcmcategories' => Yii::t('application', 'Idcmcategories'),
			'description' => Yii::t('application', 'Description'),
			'complaintlocation' => Yii::t('application', 'Complaintlocation'),
			'idcccolony' => Yii::t('application', 'Idcccolony'),
			'applicantphone' => Yii::t('application', 'Applicantphone'),
			'applicantmobile' => Yii::t('application', 'Applicantmobile'),
			'applicantemail' => Yii::t('application', 'Applicantemail'),
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

		$criteria->compare('idcmapplication',$this->idcmapplication,true);
		$criteria->compare('idcmsource',$this->idcmsource,true);
		$criteria->compare('applicantname',$this->applicantname,true);
		$criteria->compare('applicantaddress',$this->applicantaddress,true);
		$criteria->compare('idccstatus',$this->idccstatus,true);
		$criteria->compare('idcmprioritylevel',$this->idcmprioritylevel,true);
		$criteria->compare('idcmperiod',$this->idcmperiod,true);
		$criteria->compare('idcmcategories',$this->idcmcategories,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('complaintlocation',$this->complaintlocation,true);
		$criteria->compare('idcccolony',$this->idcccolony,true);
		$criteria->compare('applicantphone',$this->applicantphone,true);
		$criteria->compare('applicantmobile',$this->applicantmobile,true);
		$criteria->compare('applicantemail',$this->applicantemail,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}