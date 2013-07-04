<?php

/**
 * This is the model class for table "{{ccward}}".
 *
 * The followings are the available columns in table '{{ccward}}':
 * @property string $idccward
 * @property string $wardname
 * @property string $idcczone
 *
 * The followings are the available model relations:
 * @property Ccbpl[] $ccbpls
 * @property Cccolony[] $cccolonies
 * @property Cczone $idcczone0
 * @property Lpapplicant[] $lpapplicants
 * @property Ptmaster[] $ptmasters
 * @property Rcapplication[] $rcapplications
 * @property Rcshop[] $rcshops
 * @property Rpdemand[] $rpdemands
 * @property Rpmarket[] $rpmarkets
 * @property Wmmaster[] $wmmasters
 */
class Ccward extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Ccward the static model class
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
		return '{{ccward}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('wardname', 'required'),
			array('wardname', 'length', 'max'=>100),
			array('idcczone', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idccward, wardname, idcczone', 'safe', 'on'=>'search'),
                        array('idcczone', 'validatefkeys'),
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
			'ccbpls' => array(self::HAS_MANY, 'Ccbpl', 'idccward'),
			'cccolonies' => array(self::HAS_MANY, 'Cccolony', 'idccward'),
			'idcczone0' => array(self::BELONGS_TO, 'Cczone', 'idcczone'),
			'lpapplicants' => array(self::HAS_MANY, 'Lpapplicant', 'idccward'),
			'ptmasters' => array(self::HAS_MANY, 'Ptmaster', 'idccward'),
			'rcapplications' => array(self::HAS_MANY, 'Rcapplication', 'idccward'),
			'rcshops' => array(self::HAS_MANY, 'Rcshop', 'idccward'),
			'rpdemands' => array(self::HAS_MANY, 'Rpdemand', 'idccward'),
			'rpmarkets' => array(self::HAS_MANY, 'Rpmarket', 'idccward'),
			'wmmasters' => array(self::HAS_MANY, 'Wmmaster', 'idccward'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idccward' => Yii::t('application', 'Idccward'),
			'wardname' => Yii::t('application', 'Wardname'),
			'idcczone' => Yii::t('application', 'Idcczone'),
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

		$criteria->compare('idccward',$this->idccward,true);
		$criteria->compare('wardname',$this->wardname,true);
		$criteria->compare('idcczone',$this->idcczone,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}