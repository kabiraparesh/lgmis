<?php

/**
 * This is the model class for table "{{cmgroup}}".
 *
 * The followings are the available columns in table '{{cmgroup}}':
 * @property string $idcmgroup
 * @property string $groupname
 * @property string $idccdepartment
 *
 * The followings are the available model relations:
 * @property Cmcategories[] $cmcategories
 * @property Ccdepartment $idccdepartment0
 */
class Cmgroup extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Cmgroup the static model class
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
		return '{{cmgroup}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('groupname, idccdepartment', 'required'),
			array('groupname', 'length', 'max'=>100),
			array('idccdepartment', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idcmgroup, groupname, idccdepartment', 'safe', 'on'=>'search'),
                        array('idccdepartment', 'validatefkeys'),
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
			'cmcategories' => array(self::HAS_MANY, 'Cmcategories', 'idcmgroup'),
			'idccdepartment0' => array(self::BELONGS_TO, 'Ccdepartment', 'idccdepartment'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idcmgroup' => Yii::t('application', 'Idcmgroup'),
			'groupname' => Yii::t('application', 'Groupname'),
			'idccdepartment' => Yii::t('application', 'Idccdepartment'),
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

		$criteria->compare('idcmgroup',$this->idcmgroup,true);
		$criteria->compare('groupname',$this->groupname,true);
		$criteria->compare('idccdepartment',$this->idccdepartment,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}