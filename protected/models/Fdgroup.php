<?php

/**
 * This is the model class for table "{{fdgroup}}".
 *
 * The followings are the available columns in table '{{fdgroup}}':
 * @property string $idfdgroup
 * @property string $fdgroupname
 * @property integer $under
 * @property integer $idfdrules
 *
 * The followings are the available model relations:
 * @property Fdrules $idfdrules0
 * @property Fdledger[] $fdledgers
 */
class Fdgroup extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Fdgroup the static model class
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
		return '{{fdgroup}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fdgroupname, under, idfdrules', 'required'),
			array('under, idfdrules', 'numerical', 'integerOnly'=>true),
			array('fdgroupname', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idfdgroup, fdgroupname, under, idfdrules', 'safe', 'on'=>'search'),
                        array('idfdrules', 'validatefkeys'),
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
			'idfdrules0' => array(self::BELONGS_TO, 'Fdrules', 'idfdrules'),
			'fdledgers' => array(self::HAS_MANY, 'Fdledger', 'idfdgroup'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idfdgroup' => Yii::t('application', 'Idfdgroup'),
			'fdgroupname' => Yii::t('application', 'Fdgroupname'),
			'under' => Yii::t('application', 'Under'),
			'idfdrules' => Yii::t('application', 'Idfdrules'),
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

		$criteria->compare('idfdgroup',$this->idfdgroup,true);
		$criteria->compare('fdgroupname',$this->fdgroupname,true);
		$criteria->compare('under',$this->under);
		$criteria->compare('idfdrules',$this->idfdrules);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}