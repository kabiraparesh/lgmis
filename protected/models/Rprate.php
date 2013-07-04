<?php

/**
 * This is the model class for table "{{rprate}}".
 *
 * The followings are the available columns in table '{{rprate}}':
 * @property string $idrprate
 * @property string $idccfyear
 * @property string $idrpmarket
 * @property string $rate
 *
 * The followings are the available model relations:
 * @property Ccfyear $idccfyear0
 * @property Rpmarket $idrpmarket0
 */
class Rprate extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Rprate the static model class
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
		return '{{rprate}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idrprate, idrpmarket', 'required'),
			array('idrprate, idccfyear, idrpmarket', 'length', 'max'=>10),
			array('rate', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idrprate, idccfyear, idrpmarket, rate', 'safe', 'on'=>'search'),
                        array('idccfyear, idrpmarket', 'validatefkeys'),
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
			'idrpmarket0' => array(self::BELONGS_TO, 'Rpmarket', 'idrpmarket'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idrprate' => Yii::t('application', 'Idrprate'),
			'idccfyear' => Yii::t('application', 'Idccfyear'),
			'idrpmarket' => Yii::t('application', 'Idrpmarket'),
			'rate' => Yii::t('application', 'Rate'),
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

		$criteria->compare('idrprate',$this->idrprate,true);
		$criteria->compare('idccfyear',$this->idccfyear,true);
		$criteria->compare('idrpmarket',$this->idrpmarket,true);
		$criteria->compare('rate',$this->rate,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}