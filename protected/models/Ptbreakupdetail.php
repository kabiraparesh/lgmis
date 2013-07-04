<?php

/**
 * This is the model class for table "{{ptbreakupdetail}}".
 *
 * The followings are the available columns in table '{{ptbreakupdetail}}':
 * @property string $idptbreakupdetail
 * @property string $idptbreakup
 * @property string $newserviceno
 *
 * The followings are the available model relations:
 * @property Ptbreakup $idptbreakup0
 */
class Ptbreakupdetail extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Ptbreakupdetail the static model class
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
		return '{{ptbreakupdetail}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idptbreakup, newserviceno', 'required'),
			array('idptbreakup', 'length', 'max'=>10),
			array('newserviceno', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idptbreakupdetail, idptbreakup, newserviceno', 'safe', 'on'=>'search'),
                        array('idptbreakup', 'validatefkeys'),
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
			'idptbreakup0' => array(self::BELONGS_TO, 'Ptbreakup', 'idptbreakup'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idptbreakupdetail' => Yii::t('application', 'Idptbreakupdetail'),
			'idptbreakup' => Yii::t('application', 'Idptbreakup'),
			'newserviceno' => Yii::t('application', 'Newserviceno'),
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

		$criteria->compare('idptbreakupdetail',$this->idptbreakupdetail,true);
		$criteria->compare('idptbreakup',$this->idptbreakup,true);
		$criteria->compare('newserviceno',$this->newserviceno,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}