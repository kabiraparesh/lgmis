<?php

/**
 * This is the model class for table "{{rtiinfo}}".
 *
 * The followings are the available columns in table '{{rtiinfo}}':
 * @property string $idrtiinfo
 * @property string $details
 * @property string $idrtiperiodtypes
 * @property string $idrtiformate
 * @property string $idrtimode
 * @property string $idccstatus
 * @property string $idrtidepartment
 *
 * The followings are the available model relations:
 * @property Ccstatus $idccstatus0
 * @property Rtidepartment $idrtidepartment0
 * @property Rtiformate $idrtiformate0
 * @property Rtimode $idrtimode0
 * @property Rtiperiodtypes $idrtiperiodtypes0
 */
class Rtiinfo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Rtiinfo the static model class
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
		return '{{rtiinfo}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idrtiinfo, idrtiperiodtypes, idrtiformate, idrtimode, idccstatus, idrtidepartment', 'length', 'max'=>10),
			array('details', 'length', 'max'=>500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idrtiinfo, details, idrtiperiodtypes, idrtiformate, idrtimode, idccstatus, idrtidepartment', 'safe', 'on'=>'search'),
                        array('idrtiperiodtypes, idrtiformate, idrtimode, idccstatus, idrtidepartment', 'validatefkeys'),
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
			'idccstatus0' => array(self::BELONGS_TO, 'Ccstatus', 'idccstatus'),
			'idrtidepartment0' => array(self::BELONGS_TO, 'Rtidepartment', 'idrtidepartment'),
			'idrtiformate0' => array(self::BELONGS_TO, 'Rtiformate', 'idrtiformate'),
			'idrtimode0' => array(self::BELONGS_TO, 'Rtimode', 'idrtimode'),
			'idrtiperiodtypes0' => array(self::BELONGS_TO, 'Rtiperiodtypes', 'idrtiperiodtypes'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idrtiinfo' => Yii::t('application', 'Idrtiinfo'),
			'details' => Yii::t('application', 'Details'),
			'idrtiperiodtypes' => Yii::t('application', 'Idrtiperiodtypes'),
			'idrtiformate' => Yii::t('application', 'Idrtiformate'),
			'idrtimode' => Yii::t('application', 'Idrtimode'),
			'idccstatus' => Yii::t('application', 'Idccstatus'),
			'idrtidepartment' => Yii::t('application', 'Idrtidepartment'),
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

		$criteria->compare('idrtiinfo',$this->idrtiinfo,true);
		$criteria->compare('details',$this->details,true);
		$criteria->compare('idrtiperiodtypes',$this->idrtiperiodtypes,true);
		$criteria->compare('idrtiformate',$this->idrtiformate,true);
		$criteria->compare('idrtimode',$this->idrtimode,true);
		$criteria->compare('idccstatus',$this->idccstatus,true);
		$criteria->compare('idrtidepartment',$this->idrtidepartment,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}