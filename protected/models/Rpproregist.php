<?php

/**
 * This is the model class for table "{{rpproregist}}".
 *
 * The followings are the available columns in table '{{rpproregist}}':
 * @property string $idrpproregist
 * @property string $idrpmarket
 * @property string $estabfrom
 * @property string $idccstatus
 * @property string $shopno
 *
 * The followings are the available model relations:
 * @property Rpdemand[] $rpdemands
 * @property Ccstatus $idccstatus0
 * @property Rpmarket $idrpmarket0
 */
class Rpproregist extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Rpproregist the static model class
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
		return '{{rpproregist}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idrpproregist, idrpmarket', 'required'),
			array('idrpproregist, idrpmarket, idccstatus', 'length', 'max'=>10),
			array('shopno', 'length', 'max'=>100),
			array('estabfrom', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idrpproregist, idrpmarket, estabfrom, idccstatus, shopno', 'safe', 'on'=>'search'),
                        array('idrpmarket, idccstatus', 'validatefkeys'),
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
			'rpdemands' => array(self::HAS_MANY, 'Rpdemand', 'idrpproregist'),
			'idccstatus0' => array(self::BELONGS_TO, 'Ccstatus', 'idccstatus'),
			'idrpmarket0' => array(self::BELONGS_TO, 'Rpmarket', 'idrpmarket'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idrpproregist' => Yii::t('application', 'Idrpproregist'),
			'idrpmarket' => Yii::t('application', 'Idrpmarket'),
			'estabfrom' => Yii::t('application', 'Estabfrom'),
			'idccstatus' => Yii::t('application', 'Idccstatus'),
			'shopno' => Yii::t('application', 'Shopno'),
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

		$criteria->compare('idrpproregist',$this->idrpproregist,true);
		$criteria->compare('idrpmarket',$this->idrpmarket,true);
		$criteria->compare('estabfrom',$this->estabfrom,true);
		$criteria->compare('idccstatus',$this->idccstatus,true);
		$criteria->compare('shopno',$this->shopno,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}