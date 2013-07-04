<?php

/**
 * This is the model class for table "{{lpbnature}}".
 *
 * The followings are the available columns in table '{{lpbnature}}':
 * @property string $idlpbnature
 * @property string $natureen
 * @property string $idlpmanadatory
 *
 * The followings are the available model relations:
 * @property Lpmanadatory $idlpmanadatory0
 * @property Lpprepration[] $lppreprations
 */
class Lpbnature extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Lpbnature the static model class
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
		return '{{lpbnature}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('natureen', 'required'),
			array('natureen', 'length', 'max'=>100),
			array('idlpmanadatory', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idlpbnature, natureen, idlpmanadatory', 'safe', 'on'=>'search'),
                        array('idlpmanadatory', 'validatefkeys'),
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
			'idlpmanadatory0' => array(self::BELONGS_TO, 'Lpmanadatory', 'idlpmanadatory'),
			'lppreprations' => array(self::HAS_MANY, 'Lpprepration', 'idlpbnature'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idlpbnature' => Yii::t('application', 'Idlpbnature'),
			'natureen' => Yii::t('application', 'Natureen'),
			'idlpmanadatory' => Yii::t('application', 'Idlpmanadatory'),
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

		$criteria->compare('idlpbnature',$this->idlpbnature,true);
		$criteria->compare('natureen',$this->natureen,true);
		$criteria->compare('idlpmanadatory',$this->idlpmanadatory,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}