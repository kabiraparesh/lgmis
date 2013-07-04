<?php

/**
 * This is the model class for table "{{cmcategories}}".
 *
 * The followings are the available columns in table '{{cmcategories}}':
 * @property string $idcmcategories
 * @property string $categoriesname
 * @property string $idcmgroup
 *
 * The followings are the available model relations:
 * @property Cmapplication[] $cmapplications
 * @property Cmgroup $idcmgroup0
 */
class Cmcategories extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Cmcategories the static model class
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
		return '{{cmcategories}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('categoriesname, idcmgroup', 'required'),
			array('categoriesname', 'length', 'max'=>45),
			array('idcmgroup', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idcmcategories, categoriesname, idcmgroup', 'safe', 'on'=>'search'),
                        array('idcmgroup', 'validatefkeys'),
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
			'cmapplications' => array(self::HAS_MANY, 'Cmapplication', 'idcmcategories'),
			'idcmgroup0' => array(self::BELONGS_TO, 'Cmgroup', 'idcmgroup'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idcmcategories' => Yii::t('application', 'Idcmcategories'),
			'categoriesname' => Yii::t('application', 'Categoriesname'),
			'idcmgroup' => Yii::t('application', 'Idcmgroup'),
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

		$criteria->compare('idcmcategories',$this->idcmcategories,true);
		$criteria->compare('categoriesname',$this->categoriesname,true);
		$criteria->compare('idcmgroup',$this->idcmgroup,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}