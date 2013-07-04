<?php

/**
 * This is the model class for table "{{hrempleducation}}".
 *
 * The followings are the available columns in table '{{hrempleducation}}':
 * @property string $idhrempleducation
 * @property string $idhremployee
 * @property string $examination
 * @property string $examyear
 * @property string $examsubjects
 * @property string $examdivision
 * @property string $boarduniversity
 *
 * The followings are the available model relations:
 * @property Hremployee $idhremployee0
 */
class Hrempleducation extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Hrempleducation the static model class
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
		return '{{hrempleducation}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idhremployee, examination, examyear, examsubjects, examdivision, boarduniversity', 'required'),
			array('idhremployee, examyear, examdivision', 'length', 'max'=>10),
			array('examination', 'length', 'max'=>50),
			array('examsubjects, boarduniversity', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idhrempleducation, idhremployee, examination, examyear, examsubjects, examdivision, boarduniversity', 'safe', 'on'=>'search'),
                        array('idhremployee', 'validatefkeys'),
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
			'idhremployee0' => array(self::BELONGS_TO, 'Hremployee', 'idhremployee'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idhrempleducation' => Yii::t('application', 'Idhrempleducation'),
			'idhremployee' => Yii::t('application', 'Idhremployee'),
			'examination' => Yii::t('application', 'Examination'),
			'examyear' => Yii::t('application', 'Examyear'),
			'examsubjects' => Yii::t('application', 'Examsubjects'),
			'examdivision' => Yii::t('application', 'Examdivision'),
			'boarduniversity' => Yii::t('application', 'Boarduniversity'),
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
                    $this->idhremployee = $_GET['id'];
                }
		$criteria->compare('idhrempleducation',$this->idhrempleducation,true);
		$criteria->compare('idhremployee',$this->idhremployee,true);
		$criteria->compare('examination',$this->examination,true);
		$criteria->compare('examyear',$this->examyear,true);
		$criteria->compare('examsubjects',$this->examsubjects,true);
		$criteria->compare('examdivision',$this->examdivision,true);
		$criteria->compare('boarduniversity',$this->boarduniversity,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}