<?php

/**
 * This is the model class for table "{{rprent}}".
 *
 * The followings are the available columns in table '{{rprent}}':
 * @property string $idrprent
 * @property string $idrptenant
 * @property string $tenanttype
 * @property string $propertyno
 * @property string $rentfrom
 * @property string $rentupto
 * @property string $deposit
 *
 * The followings are the available model relations:
 * @property Rptenant $idrptenant0
 */
class Rprent extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Rprent the static model class
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
		return '{{rprent}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idrprent, idrptenant, tenanttype', 'required'),
			array('idrprent, idrptenant', 'length', 'max'=>10),
			array('tenanttype, propertyno', 'length', 'max'=>100),
			array('rentfrom, rentupto, deposit', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idrprent, idrptenant, tenanttype, propertyno, rentfrom, rentupto, deposit', 'safe', 'on'=>'search'),
                        array('idrptenant', 'validatefkeys'),
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
			'idrptenant0' => array(self::BELONGS_TO, 'Rptenant', 'idrptenant'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idrprent' => Yii::t('application', 'Idrprent'),
			'idrptenant' => Yii::t('application', 'Idrptenant'),
			'tenanttype' => Yii::t('application', 'Tenanttype'),
			'propertyno' => Yii::t('application', 'Propertyno'),
			'rentfrom' => Yii::t('application', 'Rentfrom'),
			'rentupto' => Yii::t('application', 'Rentupto'),
			'deposit' => Yii::t('application', 'Deposit'),
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

		$criteria->compare('idrprent',$this->idrprent,true);
		$criteria->compare('idrptenant',$this->idrptenant,true);
		$criteria->compare('tenanttype',$this->tenanttype,true);
		$criteria->compare('propertyno',$this->propertyno,true);
		$criteria->compare('rentfrom',$this->rentfrom,true);
		$criteria->compare('rentupto',$this->rentupto,true);
		$criteria->compare('deposit',$this->deposit,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}