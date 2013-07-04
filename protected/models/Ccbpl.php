<?php

/**
 * This is the model class for table "{{ccbpl}}".
 *
 * The followings are the available columns in table '{{ccbpl}}':
 * @property string $idccbpl
 * @property string $survey
 * @property string $idccward
 * @property string $headoffamily
 * @property string $bplname
 * @property string $bpladdress
 * @property string $idccsex
 * @property string $idcccategory
 * @property string $idccreligion
 * @property string $monthlyincome
 * @property string $familymember
 * @property string $remark
 *
 * The followings are the available model relations:
 * @property Cccategory $idcccategory0
 * @property Ccreligion $idccreligion0
 * @property Ccsex $idccsex0
 * @property Ccward $idccward0
 * @property Rcapplication[] $rcapplications
 */
class Ccbpl extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Ccbpl the static model class
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
		return '{{ccbpl}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('survey, bplname, bpladdress, remark', 'required'),
			array('survey, headoffamily, bplname, bpladdress, remark', 'length', 'max'=>100),
			array('idccward, idccsex, idcccategory, idccreligion, familymember', 'length', 'max'=>10),
			array('monthlyincome', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idccbpl, survey, idccward, headoffamily, bplname, bpladdress, idccsex, idcccategory, idccreligion, monthlyincome, familymember, remark', 'safe', 'on'=>'search'),
                        array('idccward, idccsex, idcccategory, idccreligion', 'validatefkeys'),
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
			'idcccategory0' => array(self::BELONGS_TO, 'Cccategory', 'idcccategory'),
			'idccreligion0' => array(self::BELONGS_TO, 'Ccreligion', 'idccreligion'),
			'idccsex0' => array(self::BELONGS_TO, 'Ccsex', 'idccsex'),
			'idccward0' => array(self::BELONGS_TO, 'Ccward', 'idccward'),
			'rcapplications' => array(self::HAS_MANY, 'Rcapplication', 'idccbpl'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idccbpl' => Yii::t('application', 'Idccbpl'),
			'survey' => Yii::t('application', 'Survey'),
			'idccward' => Yii::t('application', 'Idccward'),
			'headoffamily' => Yii::t('application', 'Headoffamily'),
			'bplname' => Yii::t('application', 'Bplname'),
			'bpladdress' => Yii::t('application', 'Bpladdress'),
			'idccsex' => Yii::t('application', 'Idccsex'),
			'idcccategory' => Yii::t('application', 'Idcccategory'),
			'idccreligion' => Yii::t('application', 'Idccreligion'),
			'monthlyincome' => Yii::t('application', 'Monthlyincome'),
			'familymember' => Yii::t('application', 'Familymember'),
			'remark' => Yii::t('application', 'Remark'),
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

		$criteria->compare('idccbpl',$this->idccbpl,true);
		$criteria->compare('survey',$this->survey,true);
		$criteria->compare('idccward',$this->idccward,true);
		$criteria->compare('headoffamily',$this->headoffamily,true);
		$criteria->compare('bplname',$this->bplname,true);
		$criteria->compare('bpladdress',$this->bpladdress,true);
		$criteria->compare('idccsex',$this->idccsex,true);
		$criteria->compare('idcccategory',$this->idcccategory,true);
		$criteria->compare('idccreligion',$this->idccreligion,true);
		$criteria->compare('monthlyincome',$this->monthlyincome,true);
		$criteria->compare('familymember',$this->familymember,true);
		$criteria->compare('remark',$this->remark,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}