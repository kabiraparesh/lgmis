<?php

/**
 * This is the model class for table "{{cmcomplaint}}".
 *
 * The followings are the available columns in table '{{cmcomplaint}}':
 * @property string $idcmcomplaint
 * @property string $complaintname
 * @property string $idcmprioritylevel
 * @property string $departmentno
 * @property string $idcmstatus
 *
 * The followings are the available model relations:
 * @property Cmapplication[] $cmapplications
 * @property Cmprioritylevel $idcmprioritylevel0
 * @property Cmstatus $idcmstatus0
 */
class Cmcomplaint extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Cmcomplaint the static model class
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
		return '{{cmcomplaint}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('complaintname', 'required'),
			array('complaintname', 'length', 'max'=>45),
			array('idcmprioritylevel, departmentno, idcmstatus', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idcmcomplaint, complaintname, idcmprioritylevel, departmentno, idcmstatus', 'safe', 'on'=>'search'),
                        array('idcmprioritylevel, idcmstatus', 'validatefkeys'),
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
			'cmapplications' => array(self::HAS_MANY, 'Cmapplication', 'idcmcomplaint'),
			'idcmprioritylevel0' => array(self::BELONGS_TO, 'Cmprioritylevel', 'idcmprioritylevel'),
			'idcmstatus0' => array(self::BELONGS_TO, 'Cmstatus', 'idcmstatus'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idcmcomplaint' => Yii::t('application', 'Idcmcomplaint'),
			'complaintname' => Yii::t('application', 'Complaintname'),
			'idcmprioritylevel' => Yii::t('application', 'Idcmprioritylevel'),
			'departmentno' => Yii::t('application', 'Departmentno'),
			'idcmstatus' => Yii::t('application', 'Idcmstatus'),
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

		$criteria->compare('idcmcomplaint',$this->idcmcomplaint,true);
		$criteria->compare('complaintname',$this->complaintname,true);
		$criteria->compare('idcmprioritylevel',$this->idcmprioritylevel,true);
		$criteria->compare('departmentno',$this->departmentno,true);
		$criteria->compare('idcmstatus',$this->idcmstatus,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}