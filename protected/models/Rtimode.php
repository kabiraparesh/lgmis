<?php

/**
 * This is the model class for table "{{rtimode}}".
 *
 * The followings are the available columns in table '{{rtimode}}':
 * @property string $idrtimode
 * @property string $modename
 * @property string $modefees
 *
 * The followings are the available model relations:
 * @property Rtiinfo[] $rtiinfos
 */
class Rtimode extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Rtimode the static model class
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
		return '{{rtimode}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('modename', 'required'),
			array('idrtimode, modefees', 'length', 'max'=>10),
			array('modename', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idrtimode, modename, modefees', 'safe', 'on'=>'search'),
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
			'rtiinfos' => array(self::HAS_MANY, 'Rtiinfo', 'idrtimode'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idrtimode' => Yii::t('application', 'Idrtimode'),
			'modename' => Yii::t('application', 'Modename'),
			'modefees' => Yii::t('application', 'Modefees'),
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

		$criteria->compare('idrtimode',$this->idrtimode,true);
		$criteria->compare('modename',$this->modename,true);
		$criteria->compare('modefees',$this->modefees,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}