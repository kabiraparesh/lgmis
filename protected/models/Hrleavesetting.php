<?php

/**
 * This is the model class for table "{{hrleavesetting}}".
 *
 * The followings are the available columns in table '{{hrleavesetting}}':
 * @property string $idhrleavesetting
 * @property string $leaveyear
 * @property integer $casualleave
 * @property integer $medicalleave
 * @property integer $paidleave
 * @property integer $otherleave
 * @property string $idccfyear
 *
 * The followings are the available model relations:
 * @property Ccfyear $idccfyear0
 */
class Hrleavesetting extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Hrleavesetting the static model class
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
		return '{{hrleavesetting}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idhrleavesetting', 'required'),
			array('casualleave, medicalleave, paidleave, otherleave', 'numerical', 'integerOnly'=>true),
			array('idhrleavesetting, idccfyear', 'length', 'max'=>10),
			array('leaveyear', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idhrleavesetting, leaveyear, casualleave, medicalleave, paidleave, otherleave, idccfyear', 'safe', 'on'=>'search'),
                        array('idccfyear', 'validatefkeys'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idhrleavesetting' => Yii::t('application', 'Idhrleavesetting'),
			'leaveyear' => Yii::t('application', 'Leaveyear'),
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

		$criteria->compare('idhrleavesetting',$this->idhrleavesetting,true);
		$criteria->compare('leaveyear',$this->leaveyear,true);
		$criteria->compare('casualleave',$this->casualleave);
		$criteria->compare('medicalleave',$this->medicalleave);
		$criteria->compare('paidleave',$this->paidleave);
		$criteria->compare('otherleave',$this->otherleave);
		$criteria->compare('idccfyear',$this->idccfyear,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}