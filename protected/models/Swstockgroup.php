<?php

/**
 * This is the model class for table "{{swstockgroup}}".
 *
 * The followings are the available columns in table '{{swstockgroup}}':
 * @property string $idswstockgroup
 * @property string $groupname
 * @property string $parent
 *
 * The followings are the available model relations:
 * @property Swstockitem[] $swstockitems
 */
class Swstockgroup extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Swstockgroup the static model class
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
		return '{{swstockgroup}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('groupname, parent', 'required'),
			array('groupname', 'length', 'max'=>100),
			array('parent', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idswstockgroup, groupname, parent', 'safe', 'on'=>'search'),
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
			'swstockitems' => array(self::HAS_MANY, 'Swstockitem', 'idswstockgroup'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idswstockgroup' => Yii::t('application', 'Idswstockgroup'),
			'groupname' => Yii::t('application', 'Groupname'),
			'parent' => Yii::t('application', 'Parent'),
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

		$criteria->compare('idswstockgroup',$this->idswstockgroup,true);
		$criteria->compare('groupname',$this->groupname,true);
		$criteria->compare('parent',$this->parent,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}