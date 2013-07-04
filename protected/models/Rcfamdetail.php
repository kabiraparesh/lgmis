<?php

/**
 * This is the model class for table "{{rcfamdetail}}".
 *
 * The followings are the available columns in table '{{rcfamdetail}}':
 * @property string $idrcfamdetail
 * @property string $name
 * @property string $age
 * @property string $idccrelation
 * @property string $voterno
 * @property string $hfname
 * @property string $headoffamily
 *
 * The followings are the available model relations:
 * @property Rcapplication[] $rcapplications
 * @property Ccrelation $idccrelation0
 */
class Rcfamdetail extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Rcfamdetail the static model class
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
		return '{{rcfamdetail}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, voterno, hfname, headoffamily', 'length', 'max'=>100),
			array('age, idccrelation', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idrcfamdetail, name, age, idccrelation, voterno, hfname, headoffamily', 'safe', 'on'=>'search'),
                        array('idccrelation', 'validatefkeys'),
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
			'rcapplications' => array(self::HAS_MANY, 'Rcapplication', 'idrcfamdetail'),
			'idccrelation0' => array(self::BELONGS_TO, 'Ccrelation', 'idccrelation'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idrcfamdetail' => Yii::t('application', 'Idrcfamdetail'),
			'name' => Yii::t('application', 'Name'),
			'age' => Yii::t('application', 'Age'),
			'idccrelation' => Yii::t('application', 'Idccrelation'),
			'voterno' => Yii::t('application', 'Voterno'),
			'hfname' => Yii::t('application', 'Hfname'),
			'headoffamily' => Yii::t('application', 'Headoffamily'),
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

		$criteria->compare('idrcfamdetail',$this->idrcfamdetail,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('age',$this->age,true);
		$criteria->compare('idccrelation',$this->idccrelation,true);
		$criteria->compare('voterno',$this->voterno,true);
		$criteria->compare('hfname',$this->hfname,true);
		$criteria->compare('headoffamily',$this->headoffamily,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}