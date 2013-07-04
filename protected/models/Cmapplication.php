<?php

/**
 * This is the model class for table "{{cmapplication}}".
 *
 * The followings are the available columns in table '{{cmapplication}}':
 * @property string $idcmapplication
 * @property string $applicantname
 * @property string $applicantaddress
 * @property string $idcmcomplaint
 * @property string $idcmstatus
 *
 * The followings are the available model relations:
 * @property Cmcomplaint $idcmcomplaint0
 * @property Cmstatus $idcmstatus0
 */
class Cmapplication extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Cmapplication the static model class
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
		return '{{cmapplication}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('applicantname, applicantaddress', 'required'),
			array('applicantname, applicantaddress', 'length', 'max'=>45),
			array('idcmcomplaint, idcmstatus', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idcmapplication, applicantname, applicantaddress, idcmcomplaint, idcmstatus', 'safe', 'on'=>'search'),
                        array('idcmcomplaint, idcmstatus', 'validatefkeys'),
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
			'idcmcomplaint0' => array(self::BELONGS_TO, 'Cmcomplaint', 'idcmcomplaint'),
			'idcmstatus0' => array(self::BELONGS_TO, 'Cmstatus', 'idcmstatus'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idcmapplication' => Yii::t('application', 'Idcmapplication'),
			'applicantname' => Yii::t('application', 'Applicantname'),
			'applicantaddress' => Yii::t('application', 'Applicantaddress'),
			'idcmcomplaint' => Yii::t('application', 'Idcmcomplaint'),
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

		$criteria->compare('idcmapplication',$this->idcmapplication,true);
		$criteria->compare('applicantname',$this->applicantname,true);
		$criteria->compare('applicantaddress',$this->applicantaddress,true);
		$criteria->compare('idcmcomplaint',$this->idcmcomplaint,true);
		$criteria->compare('idcmstatus',$this->idcmstatus,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}