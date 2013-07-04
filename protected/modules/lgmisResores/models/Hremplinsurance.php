<?php

/**
 * This is the model class for table "{{hremplinsurance}}".
 *
 * The followings are the available columns in table '{{hremplinsurance}}':
 * @property string $idhremplinsurance
 * @property string $idhremployee
 * @property string $policynumber
 * @property string $policydate
 * @property string $policyamount
 * @property string $policyinstallment
 * @property string $totalpremium
 * @property string $premiumstartdate
 * @property string $premiumenddate
 * @property string $insurancenarration
 *
 * The followings are the available model relations:
 * @property Hremployee $idhremployee0
 */
class Hremplinsurance extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Hremplinsurance the static model class
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
		return '{{hremplinsurance}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idhremployee, policynumber, policydate, policyamount, policyinstallment, totalpremium, premiumstartdate, premiumenddate, insurancenarration', 'required'),
			array('idhremployee, policyamount, policyinstallment, totalpremium', 'length', 'max'=>10),
			array('policynumber', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idhremplinsurance, idhremployee, policynumber, policydate, policyamount, policyinstallment, totalpremium, premiumstartdate, premiumenddate, insurancenarration', 'safe', 'on'=>'search'),
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
			'idhremplinsurance' => Yii::t('application', 'Idhremplinsurance'),
			'idhremployee' => Yii::t('application', 'Idhremployee'),
			'policynumber' => Yii::t('application', 'Policynumber'),
			'policydate' => Yii::t('application', 'Policydate'),
			'policyamount' => Yii::t('application', 'Policyamount'),
			'policyinstallment' => Yii::t('application', 'Policyinstallment'),
			'totalpremium' => Yii::t('application', 'Totalpremium'),
			'premiumstartdate' => Yii::t('application', 'Premiumstartdate'),
			'premiumenddate' => Yii::t('application', 'Premiumenddate'),
			'insurancenarration' => Yii::t('application', 'Insurancenarration'),
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
		$criteria->compare('idhremplinsurance',$this->idhremplinsurance,true);
		$criteria->compare('idhremployee',$this->idhremployee,true);
		$criteria->compare('policynumber',$this->policynumber,true);
		$criteria->compare('policydate',$this->policydate,true);
		$criteria->compare('policyamount',$this->policyamount,true);
		$criteria->compare('policyinstallment',$this->policyinstallment,true);
		$criteria->compare('totalpremium',$this->totalpremium,true);
		$criteria->compare('premiumstartdate',$this->premiumstartdate,true);
		$criteria->compare('premiumenddate',$this->premiumenddate,true);
		$criteria->compare('insurancenarration',$this->insurancenarration,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}