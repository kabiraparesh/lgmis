<?php

/**
 * This is the model class for table "{{bddeathinformer}}".
 *
 * The followings are the available columns in table '{{bddeathinformer}}':
 * @property string $idbddeathinformer
 * @property string $informername
 * @property string $informeraddress
 * @property string $personname
 * @property string $dod
 * @property string $timeofdeath
 * @property string $idccsex
 * @property string $fhname
 * @property string $crematorymethod
 * @property string $reasondeath
 * @property string $idccreligion
 * @property string $other
 *
 * The followings are the available model relations:
 * @property Bddeathapplication[] $bddeathapplications
 * @property Ccreligion $idccreligion0
 * @property Ccsex $idccsex0
 */
class Bddeathinformer extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Bddeathinformer the static model class
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
		return '{{bddeathinformer}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('informername, personname, fhname, crematorymethod, reasondeath', 'required'),
			array('informername, informeraddress, personname, fhname, crematorymethod, reasondeath, other', 'length', 'max'=>100),
			array('idccsex, idccreligion', 'length', 'max'=>10),
			array('dod, timeofdeath', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idbddeathinformer, informername, informeraddress, personname, dod, timeofdeath, idccsex, fhname, crematorymethod, reasondeath, idccreligion, other', 'safe', 'on'=>'search'),
                        array('idccsex, idccreligion', 'validatefkeys'),
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
			'bddeathapplications' => array(self::HAS_MANY, 'Bddeathapplication', 'idbddeathinformer'),
			'idccreligion0' => array(self::BELONGS_TO, 'Ccreligion', 'idccreligion'),
			'idccsex0' => array(self::BELONGS_TO, 'Ccsex', 'idccsex'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idbddeathinformer' => Yii::t('application', 'Idbddeathinformer'),
			'informername' => Yii::t('application', 'Informername'),
			'informeraddress' => Yii::t('application', 'Informeraddress'),
			'personname' => Yii::t('application', 'Personname'),
			'dod' => Yii::t('application', 'Dod'),
			'timeofdeath' => Yii::t('application', 'Timeofdeath'),
			'idccsex' => Yii::t('application', 'Idccsex'),
			'fhname' => Yii::t('application', 'Fhname'),
			'crematorymethod' => Yii::t('application', 'Crematorymethod'),
			'reasondeath' => Yii::t('application', 'Reasondeath'),
			'idccreligion' => Yii::t('application', 'Idccreligion'),
			'other' => Yii::t('application', 'Other'),
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

		$criteria->compare('idbddeathinformer',$this->idbddeathinformer,true);
		$criteria->compare('informername',$this->informername,true);
		$criteria->compare('informeraddress',$this->informeraddress,true);
		$criteria->compare('personname',$this->personname,true);
		$criteria->compare('dod',$this->dod,true);
		$criteria->compare('timeofdeath',$this->timeofdeath,true);
		$criteria->compare('idccsex',$this->idccsex,true);
		$criteria->compare('fhname',$this->fhname,true);
		$criteria->compare('crematorymethod',$this->crematorymethod,true);
		$criteria->compare('reasondeath',$this->reasondeath,true);
		$criteria->compare('idccreligion',$this->idccreligion,true);
		$criteria->compare('other',$this->other,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}