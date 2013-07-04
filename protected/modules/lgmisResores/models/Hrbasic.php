<?php

/**
 * This is the model class for table "{{hrbasic}}".
 *
 * The followings are the available columns in table '{{hrbasic}}':
 * @property string $idhrbasic
 * @property string $start
 * @property string $increment
 * @property string $endto
 * @property string $display
 *
 * The followings are the available model relations:
 * @property Hrpost[] $hrposts
 */
class Hrbasic extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Hrbasic the static model class
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
		return '{{hrbasic}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('display', 'required'),
			array('start, increment, endto', 'length', 'max'=>10),
			array('display', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idhrbasic, start, increment, endto, display', 'safe', 'on'=>'search'),
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
			'hrposts' => array(self::HAS_MANY, 'Hrpost', 'idhrbasic'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idhrbasic' => Yii::t('application', 'Idhrbasic'),
			'start' => Yii::t('application', 'Start'),
			'increment' => Yii::t('application', 'Increment'),
			'endto' => Yii::t('application', 'Endto'),
			'display' => Yii::t('application', 'Display'),
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

		$criteria->compare('idhrbasic',$this->idhrbasic,true);
		$criteria->compare('start',$this->start,true);
		$criteria->compare('increment',$this->increment,true);
		$criteria->compare('endto',$this->endto,true);
		$criteria->compare('display',$this->display,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}