<?php

/**
 * This is the model class for table "{{bddeathapplication}}".
 *
 * The followings are the available columns in table '{{bddeathapplication}}':
 * @property string $idbddeathapplication
 * @property string $idbddeathinformer
 * @property string $applicationdate
 * @property string $idccstatus
 * @property string $applicantname
 * @property string $applicantaddress
 * @property string $age
 * @property string $dateofdeath
 *
 * The followings are the available model relations:
 * @property Ccstatus $idccstatus0
 * @property Bddeathinformer $idbddeathinformer0
 */
class Bddeathapplication extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Bddeathapplication the static model class
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
		return '{{bddeathapplication}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('applicantname, applicantaddress, age, dateofdeath', 'required'),
			array('idbddeathinformer, idccstatus', 'length', 'max'=>10),
			array('applicantname, applicantaddress, age', 'length', 'max'=>100),
			array('applicationdate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idbddeathapplication, idbddeathinformer, applicationdate, idccstatus, applicantname, applicantaddress, age, dateofdeath', 'safe', 'on'=>'search'),
                        array('idbddeathinformer, idccstatus', 'validatefkeys'),
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
			'idccstatus0' => array(self::BELONGS_TO, 'Ccstatus', 'idccstatus'),
			'idbddeathinformer0' => array(self::BELONGS_TO, 'Bddeathinformer', 'idbddeathinformer'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idbddeathapplication' => Yii::t('application', 'Idbddeathapplication'),
			'idbddeathinformer' => Yii::t('application', 'Idbddeathinformer'),
			'applicationdate' => Yii::t('application', 'Applicationdate'),
			'idccstatus' => Yii::t('application', 'Idccstatus'),
			'applicantname' => Yii::t('application', 'Applicantname'),
			'applicantaddress' => Yii::t('application', 'Applicantaddress'),
			'age' => Yii::t('application', 'Age'),
			'dateofdeath' => Yii::t('application', 'Dateofdeath'),
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

		$criteria->compare('idbddeathapplication',$this->idbddeathapplication,true);
		$criteria->compare('idbddeathinformer',$this->idbddeathinformer,true);
		$criteria->compare('applicationdate',$this->applicationdate,true);
		$criteria->compare('idccstatus',$this->idccstatus,true);
		$criteria->compare('applicantname',$this->applicantname,true);
		$criteria->compare('applicantaddress',$this->applicantaddress,true);
		$criteria->compare('age',$this->age,true);
		$criteria->compare('dateofdeath',$this->dateofdeath,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}