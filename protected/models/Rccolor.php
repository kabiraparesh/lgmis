<?php

/**
 * This is the model class for table "{{rccolor}}".
 *
 * The followings are the available columns in table '{{rccolor}}':
 * @property string $idrccolor
 * @property string $coloren
 *
 * The followings are the available model relations:
 * @property Rcapplication[] $rcapplications
 */
class Rccolor extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Rccolor the static model class
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
		return '{{rccolor}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('coloren', 'required'),
			array('coloren', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idrccolor, coloren', 'safe', 'on'=>'search'),
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
			'rcapplications' => array(self::HAS_MANY, 'Rcapplication', 'idrccolor'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idrccolor' => Yii::t('application', 'Idrccolor'),
			'coloren' => Yii::t('application', 'Coloren'),
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

		$criteria->compare('idrccolor',$this->idrccolor,true);
		$criteria->compare('coloren',$this->coloren,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}