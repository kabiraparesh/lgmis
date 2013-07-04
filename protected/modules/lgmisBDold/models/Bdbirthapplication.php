<?php

/**
 * This is the model class for table "{{bdbirthapplication}}".
 *
 * The followings are the available columns in table '{{bdbirthapplication}}':
 * @property string $idbdbirthapplication
 * @property string $idbdbirthinformer
 * @property string $applicationdate
 * @property string $idccstatus
 * @property string $applicantname
 * @property string $applicantaddress
 * @property string $dob
 *
 * The followings are the available model relations:
 * @property Bdbirthinformer $idbdbirthinformer0
 * @property Ccstatus $idccstatus0
 */
class Bdbirthapplication extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Bdbirthapplication the static model class
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
		return '{{bdbirthapplication}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('applicantname, applicantaddress', 'required'),
			array('idbdbirthinformer, idccstatus', 'length', 'max'=>10),
			array('applicantname, applicantaddress', 'length', 'max'=>100),
			array('applicationdate, dob', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idbdbirthapplication, idbdbirthinformer, applicationdate, idccstatus, applicantname, applicantaddress, dob', 'safe', 'on'=>'search'),
                        array('idbdbirthinformer, idccstatus', 'validatefkeys'),
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
			'idbdbirthinformer0' => array(self::BELONGS_TO, 'Bdbirthinformer', 'idbdbirthinformer'),
			'idccstatus0' => array(self::BELONGS_TO, 'Ccstatus', 'idccstatus'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idbdbirthapplication' => Yii::t('application', 'Idbdbirthapplication'),
			'idbdbirthinformer' => Yii::t('application', 'Idbdbirthinformer'),
			'applicationdate' => Yii::t('application', 'Applicationdate'),
			'idccstatus' => Yii::t('application', 'Idccstatus'),
			'applicantname' => Yii::t('application', 'Applicantname'),
			'applicantaddress' => Yii::t('application', 'Applicantaddress'),
			'dob' => Yii::t('application', 'Dob'),
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
                if(isset($_GET['id'])){
                    $this->idbdbirthinformer = $_GET['id'];
                }
		$criteria->compare('idbdbirthapplication',$this->idbdbirthapplication,true);
		$criteria->compare('idbdbirthinformer',$this->idbdbirthinformer,true);
		$criteria->compare('applicationdate',$this->applicationdate,true);
		$criteria->compare('idccstatus',$this->idccstatus,true);
		$criteria->compare('applicantname',$this->applicantname,true);
		$criteria->compare('applicantaddress',$this->applicantaddress,true);
		$criteria->compare('dob',$this->dob,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}