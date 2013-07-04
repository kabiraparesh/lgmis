<?php

/**
 * This is the model class for table "{{cccategory}}".
 *
 * The followings are the available columns in table '{{cccategory}}':
 * @property string $idcccategory
 * @property string $categoryname
 *
 * The followings are the available model relations:
 * @property Ccbpl[] $ccbpls
 * @property Hremployee[] $hremployees
 * @property Rcapplication[] $rcapplications
 */
class Cccategory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Cccategory the static model class
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
		return '{{cccategory}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('categoryname', 'required'),
			array('categoryname', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idcccategory, categoryname', 'safe', 'on'=>'search'),
		);
	}        
        
        
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'ccbpls' => array(self::HAS_MANY, 'Ccbpl', 'idcccategory'),
			'hremployees' => array(self::HAS_MANY, 'Hremployee', 'idcccategory'),
			'rcapplications' => array(self::HAS_MANY, 'Rcapplication', 'idcccategory'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idcccategory' => Yii::t('application', 'Idcccategory'),
			'categoryname' => Yii::t('application', 'Categoryname'),
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

		$criteria->compare('idcccategory',$this->idcccategory,true);
		$criteria->compare('categoryname',$this->categoryname,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}