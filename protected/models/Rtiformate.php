<?php

/**
 * This is the model class for table "{{rtiformate}}".
 *
 * The followings are the available columns in table '{{rtiformate}}':
 * @property string $idrtiformate
 * @property string $formatename
 * @property string $formatefees
 *
 * The followings are the available model relations:
 * @property Rtiinfo[] $rtiinfos
 */
class Rtiformate extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Rtiformate the static model class
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
		return '{{rtiformate}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('formatename', 'required'),
			array('idrtiformate, formatename, formatefees', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idrtiformate, formatename, formatefees', 'safe', 'on'=>'search'),
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
			'rtiinfos' => array(self::HAS_MANY, 'Rtiinfo', 'idrtiformate'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idrtiformate' => Yii::t('application', 'Idrtiformate'),
			'formatename' => Yii::t('application', 'Formatename'),
			'formatefees' => Yii::t('application', 'Formatefees'),
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

		$criteria->compare('idrtiformate',$this->idrtiformate,true);
		$criteria->compare('formatename',$this->formatename,true);
		$criteria->compare('formatefees',$this->formatefees,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}