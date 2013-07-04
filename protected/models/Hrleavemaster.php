<?php

/**
 * This is the model class for table "{{hrleavemaster}}".
 *
 * The followings are the available columns in table '{{hrleavemaster}}':
 * @property string $idhrleavemaster
 * @property string $idhremployee
 * @property string $foryear
 * @property string $formonth
 * @property string $workingdays
 * @property integer $attendence
 * @property string $casualleave
 * @property string $medicalleave
 * @property string $paidleave
 * @property string $otherleave
 * @property string $idccfyear
 *
 * The followings are the available model relations:
 * @property Ccfyear $idccfyear0
 * @property Hremployee $idhremployee0
 */
class Hrleavemaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Hrleavemaster the static model class
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
		return '{{hrleavemaster}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('attendence', 'numerical', 'integerOnly'=>true),
			array('idhrleavemaster, idhremployee, casualleave, medicalleave, paidleave, otherleave, idccfyear', 'length', 'max'=>10),
			array('foryear, formonth, workingdays', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idhrleavemaster, idhremployee, foryear, formonth, workingdays, attendence, casualleave, medicalleave, paidleave, otherleave, idccfyear', 'safe', 'on'=>'search'),
                        array('idhremployee, idccfyear', 'validatefkeys'),
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
			'idccfyear0' => array(self::BELONGS_TO, 'Ccfyear', 'idccfyear'),
			'idhremployee0' => array(self::BELONGS_TO, 'Hremployee', 'idhremployee'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idhrleavemaster' => Yii::t('application', 'Idhrleavemaster'),
			'idhremployee' => Yii::t('application', 'Idhremployee'),
			'foryear' => Yii::t('application', 'Foryear'),
			'formonth' => Yii::t('application', 'Formonth'),
			'workingdays' => Yii::t('application', 'Workingdays'),
			'attendence' => Yii::t('application', 'Attendence'),
			'casualleave' => Yii::t('application', 'Casualleave'),
			'medicalleave' => Yii::t('application', 'Medicalleave'),
			'paidleave' => Yii::t('application', 'Paidleave'),
			'otherleave' => Yii::t('application', 'Otherleave'),
			'idccfyear' => Yii::t('application', 'Idccfyear'),
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

		$criteria->compare('idhrleavemaster',$this->idhrleavemaster,true);
		$criteria->compare('idhremployee',$this->idhremployee,true);
		$criteria->compare('foryear',$this->foryear,true);
		$criteria->compare('formonth',$this->formonth,true);
		$criteria->compare('workingdays',$this->workingdays,true);
		$criteria->compare('attendence',$this->attendence);
		$criteria->compare('casualleave',$this->casualleave,true);
		$criteria->compare('medicalleave',$this->medicalleave,true);
		$criteria->compare('paidleave',$this->paidleave,true);
		$criteria->compare('otherleave',$this->otherleave,true);
		$criteria->compare('idccfyear',$this->idccfyear,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}