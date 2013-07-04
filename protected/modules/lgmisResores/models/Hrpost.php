<?php

/**
 * This is the model class for table "{{hrpost}}".
 *
 * The followings are the available columns in table '{{hrpost}}':
 * @property string $idhrpost
 * @property string $postname
 * @property string $idccdepartment
 * @property string $idhrcategory
 * @property string $idhrclass
 * @property string $idhrbasic
 *
 * The followings are the available model relations:
 * @property Hremployeebasic[] $hremployeebasics
 * @property Ccdepartment $idccdepartment0
 * @property Hrbasic $idhrbasic0
 * @property Hrcategory $idhrcategory0
 * @property Hrclass $idhrclass0
 */
class Hrpost extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Hrpost the static model class
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
		return '{{hrpost}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idccdepartment, idhrcategory, idhrclass, idhrbasic', 'required'),
			array('postname', 'length', 'max'=>100),
			array('idccdepartment, idhrcategory, idhrclass, idhrbasic', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idhrpost, postname, idccdepartment, idhrcategory, idhrclass, idhrbasic', 'safe', 'on'=>'search'),
                        array('idccdepartment, idhrcategory, idhrclass, idhrbasic', 'validatefkeys'),
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
			'hremployeebasics' => array(self::HAS_MANY, 'Hremployeebasic', 'idhrpost'),
			'idccdepartment0' => array(self::BELONGS_TO, 'Ccdepartment', 'idccdepartment'),
			'idhrbasic0' => array(self::BELONGS_TO, 'Hrbasic', 'idhrbasic'),
			'idhrcategory0' => array(self::BELONGS_TO, 'Hrcategory', 'idhrcategory'),
			'idhrclass0' => array(self::BELONGS_TO, 'Hrclass', 'idhrclass'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idhrpost' => Yii::t('application', 'Idhrpost'),
			'postname' => Yii::t('application', 'Postname'),
			'idccdepartment' => Yii::t('application', 'Idccdepartment'),
			'idhrcategory' => Yii::t('application', 'Idhrcategory'),
			'idhrclass' => Yii::t('application', 'Idhrclass'),
			'idhrbasic' => Yii::t('application', 'Idhrbasic'),
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

		$criteria->compare('idhrpost',$this->idhrpost,true);
		$criteria->compare('postname',$this->postname,true);
		$criteria->compare('idccdepartment',$this->idccdepartment,true);
		$criteria->compare('idhrcategory',$this->idhrcategory,true);
		$criteria->compare('idhrclass',$this->idhrclass,true);
		$criteria->compare('idhrbasic',$this->idhrbasic,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}