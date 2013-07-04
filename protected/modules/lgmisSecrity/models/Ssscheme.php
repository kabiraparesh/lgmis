<?php

/**
 * This is the model class for table "{{ssscheme}}".
 *
 * The followings are the available columns in table '{{ssscheme}}':
 * @property string $idssscheme
 * @property string $name
 * @property string $idcccategory
 * @property string $idccoccupation
 * @property string $sponseredby
 * @property string $department
 * @property string $benefictiories
 * @property string $eligcriteria
 * @property string $validity
 * @property string $otherbenefit
 * @property string $idssgrant
 *
 * The followings are the available model relations:
 * @property Cccategory $idcccategory0
 * @property Ccoccupation $idccoccupation0
 * @property Ssgrant $idssgrant0
 */
class Ssscheme extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Ssscheme the static model class
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
		return '{{ssscheme}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, sponseredby, benefictiories, eligcriteria, otherbenefit, idssgrant', 'required'),
			array('name, sponseredby, benefictiories, eligcriteria, otherbenefit', 'length', 'max'=>100),
			array('idcccategory, idccoccupation, department, idssgrant', 'length', 'max'=>10),
			array('validity', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idssscheme, name, idcccategory, idccoccupation, sponseredby, department, benefictiories, eligcriteria, validity, otherbenefit, idssgrant', 'safe', 'on'=>'search'),
                        array('idcccategory, idccoccupation, idssgrant', 'validatefkeys'),
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
			'idccoccupation0' => array(self::BELONGS_TO, 'Ccoccupation', 'idccoccupation'),
			'idssgrant0' => array(self::BELONGS_TO, 'Ssgrant', 'idssgrant'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idssscheme' => Yii::t('application', 'Idssscheme'),
			'name' => Yii::t('application', 'Name'),
			'idcccategory' => Yii::t('application', 'Idcccategory'),
			'idccoccupation' => Yii::t('application', 'Idccoccupation'),
			'sponseredby' => Yii::t('application', 'Sponseredby'),
			'department' => Yii::t('application', 'Department'),
			'benefictiories' => Yii::t('application', 'Benefictiories'),
			'eligcriteria' => Yii::t('application', 'Eligcriteria'),
			'validity' => Yii::t('application', 'Validity'),
			'otherbenefit' => Yii::t('application', 'Otherbenefit'),
			'idssgrant' => Yii::t('application', 'Idssgrant'),
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

		$criteria->compare('idssscheme',$this->idssscheme,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('idcccategory',$this->idcccategory,true);
		$criteria->compare('idccoccupation',$this->idccoccupation,true);
		$criteria->compare('sponseredby',$this->sponseredby,true);
		$criteria->compare('department',$this->department,true);
		$criteria->compare('benefictiories',$this->benefictiories,true);
		$criteria->compare('eligcriteria',$this->eligcriteria,true);
		$criteria->compare('validity',$this->validity,true);
		$criteria->compare('otherbenefit',$this->otherbenefit,true);
		$criteria->compare('idssgrant',$this->idssgrant,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}