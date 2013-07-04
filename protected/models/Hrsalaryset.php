<?php

/**
 * This is the model class for table "{{hrsalaryset}}".
 *
 * The followings are the available columns in table '{{hrsalaryset}}':
 * @property string $idhrsalaryset
 * @property string $idhremployee
 * @property string $salaryyear
 * @property string $salarymonth
 * @property integer $currentbasic
 * @property integer $earning1
 * @property integer $earning2
 * @property integer $earning3
 * @property integer $earning4
 * @property integer $earning5
 * @property integer $deduction1
 * @property integer $deduction2
 * @property integer $deduction3
 * @property integer $deduction4
 * @property integer $deduction5
 * @property integer $deduction6
 * @property integer $deduction7
 * @property integer $deduction8
 * @property integer $deduction9
 *
 * The followings are the available model relations:
 * @property Hremployee $idhremployee0
 */
class Hrsalaryset extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Hrsalaryset the static model class
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
		return '{{hrsalaryset}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idhrsalaryset', 'required'),
			array('currentbasic, earning1, earning2, earning3, earning4, earning5, deduction1, deduction2, deduction3, deduction4, deduction5, deduction6, deduction7, deduction8, deduction9', 'numerical', 'integerOnly'=>true),
			array('idhrsalaryset, idhremployee', 'length', 'max'=>10),
			array('salaryyear, salarymonth', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idhrsalaryset, idhremployee, salaryyear, salarymonth, currentbasic, earning1, earning2, earning3, earning4, earning5, deduction1, deduction2, deduction3, deduction4, deduction5, deduction6, deduction7, deduction8, deduction9', 'safe', 'on'=>'search'),
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
			'idhrsalaryset' => Yii::t('application', 'Idhrsalaryset'),
			'idhremployee' => Yii::t('application', 'Idhremployee'),
			'salaryyear' => Yii::t('application', 'Salaryyear'),
			'salarymonth' => Yii::t('application', 'Salarymonth'),
			'currentbasic' => Yii::t('application', 'Currentbasic'),
			'earning1' => Yii::t('application', 'Earning1'),
			'earning2' => Yii::t('application', 'Earning2'),
			'earning3' => Yii::t('application', 'Earning3'),
			'earning4' => Yii::t('application', 'Earning4'),
			'earning5' => Yii::t('application', 'Earning5'),
			'deduction1' => Yii::t('application', 'Deduction1'),
			'deduction2' => Yii::t('application', 'Deduction2'),
			'deduction3' => Yii::t('application', 'Deduction3'),
			'deduction4' => Yii::t('application', 'Deduction4'),
			'deduction5' => Yii::t('application', 'Deduction5'),
			'deduction6' => Yii::t('application', 'Deduction6'),
			'deduction7' => Yii::t('application', 'Deduction7'),
			'deduction8' => Yii::t('application', 'Deduction8'),
			'deduction9' => Yii::t('application', 'Deduction9'),
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

		$criteria->compare('idhrsalaryset',$this->idhrsalaryset,true);
		$criteria->compare('idhremployee',$this->idhremployee,true);
		$criteria->compare('salaryyear',$this->salaryyear,true);
		$criteria->compare('salarymonth',$this->salarymonth,true);
		$criteria->compare('currentbasic',$this->currentbasic);
		$criteria->compare('earning1',$this->earning1);
		$criteria->compare('earning2',$this->earning2);
		$criteria->compare('earning3',$this->earning3);
		$criteria->compare('earning4',$this->earning4);
		$criteria->compare('earning5',$this->earning5);
		$criteria->compare('deduction1',$this->deduction1);
		$criteria->compare('deduction2',$this->deduction2);
		$criteria->compare('deduction3',$this->deduction3);
		$criteria->compare('deduction4',$this->deduction4);
		$criteria->compare('deduction5',$this->deduction5);
		$criteria->compare('deduction6',$this->deduction6);
		$criteria->compare('deduction7',$this->deduction7);
		$criteria->compare('deduction8',$this->deduction8);
		$criteria->compare('deduction9',$this->deduction9);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}