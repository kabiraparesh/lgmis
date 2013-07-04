<?php

/**
 * This is the model class for table "{{hrpost}}".
 *
 * The followings are the available columns in table '{{hrpost}}':
 * @property string $idhrpost
 * @property string $post
 * @property string $postgroup
 *
 * The followings are the available model relations:
 * @property Hremployee[] $hremployees
 */
class Hrpost extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Hrpost the static model class
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
		return '{{hrpost}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idhrpost', 'required'),
			array('idhrpost', 'length', 'max'=>10),
			array('post, postgroup', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idhrpost, post, postgroup', 'safe', 'on'=>'search'),
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
			'hremployees' => array(self::HAS_MANY, 'Hremployee', 'idhrpost'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idhrpost' => Yii::t('application', 'Idhrpost'),
			'post' => Yii::t('application', 'Post'),
			'postgroup' => Yii::t('application', 'Postgroup'),
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

		$criteria->compare('idhrpost',$this->idhrpost,true);
		$criteria->compare('post',$this->post,true);
		$criteria->compare('postgroup',$this->postgroup,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}