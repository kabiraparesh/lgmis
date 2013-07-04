<?php

/**
 * This is the model class for table "{{hremplmember}}".
 *
 * The followings are the available columns in table '{{hremplmember}}':
 * @property string $idhremplmember
 * @property string $membername
 * @property string $memberage
 * @property string $idccsex
 * @property string $idccrelation
 * @property string $issuccessor
 * @property string $idhremployee
 *
 * The followings are the available model relations:
 * @property Ccsex $idccsex0
 * @property Hremployee $idhremployee0
 * @property Ccrelation $idccrelation0
 */
class Hremplmember extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Hremplmember the static model class
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
		return '{{hremplmember}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('membername, memberage, idccsex, idccrelation, idhremployee', 'required'),
			array('membername', 'length', 'max'=>100),
			array('memberage, idccsex, idccrelation, issuccessor, idhremployee', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idhremplmember, membername, memberage, idccsex, idccrelation, issuccessor, idhremployee', 'safe', 'on'=>'search'),
                        array('idccsex, idccrelation, idhremployee', 'validatefkeys'),
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
			'idccsex0' => array(self::BELONGS_TO, 'Ccsex', 'idccsex'),
			'idhremployee0' => array(self::BELONGS_TO, 'Hremployee', 'idhremployee'),
			'idccrelation0' => array(self::BELONGS_TO, 'Ccrelation', 'idccrelation'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idhremplmember' => Yii::t('application', 'Idhremplmember'),
			'membername' => Yii::t('application', 'Membername'),
			'memberage' => Yii::t('application', 'Memberage'),
			'idccsex' => Yii::t('application', 'Idccsex'),
			'idccrelation' => Yii::t('application', 'Idccrelation'),
			'issuccessor' => Yii::t('application', 'Issuccessor'),
			'idhremployee' => Yii::t('application', 'Idhremployee'),
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

		$criteria->compare('idhremplmember',$this->idhremplmember,true);
		$criteria->compare('membername',$this->membername,true);
		$criteria->compare('memberage',$this->memberage,true);
		$criteria->compare('idccsex',$this->idccsex,true);
		$criteria->compare('idccrelation',$this->idccrelation,true);
		$criteria->compare('issuccessor',$this->issuccessor,true);
		$criteria->compare('idhremployee',$this->idhremployee,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}