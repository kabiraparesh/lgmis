<?php

/**
 * This is the model class for table "{{bparearate}}".
 *
 * The followings are the available columns in table '{{bparearate}}':
 * @property string $idbparearate
 * @property string $arearate0to75
 * @property string $arearate76to125
 * @property string $arearate126to200
 * @property string $arearate201to300
 * @property string $arearate301to400
 * @property string $arearate401to600
 * @property string $arearate601to750
 * @property string $arearate751to1000
 * @property string $arearate1001to1250
 * @property string $arearate1251to1500
 * @property string $arearate1501to2000
 * @property string $arearate2001to2500
 * @property string $arearate2501above
 * @property string $idccfyear
 * @property string $idbpuseagetype
 *
 * The followings are the available model relations:
 * @property Bpuseagetype $idbpuseagetype0
 * @property Ccfyear $idccfyear0
 */
class Bparearate extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Bparearate the static model class
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
		return '{{bparearate}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idccfyear, idbpuseagetype', 'required'),
			array('arearate0to75, arearate76to125, arearate126to200, arearate201to300, arearate301to400, arearate401to600, arearate601to750, arearate751to1000, arearate1001to1250, arearate1251to1500, arearate1501to2000, arearate2001to2500, arearate2501above, idccfyear, idbpuseagetype', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idbparearate, arearate0to75, arearate76to125, arearate126to200, arearate201to300, arearate301to400, arearate401to600, arearate601to750, arearate751to1000, arearate1001to1250, arearate1251to1500, arearate1501to2000, arearate2001to2500, arearate2501above, idccfyear, idbpuseagetype', 'safe', 'on'=>'search'),
                        array('idccfyear, idbpuseagetype', 'validatefkeys'),
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
			'idbpuseagetype0' => array(self::BELONGS_TO, 'Bpuseagetype', 'idbpuseagetype'),
			'idccfyear0' => array(self::BELONGS_TO, 'Ccfyear', 'idccfyear'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idbparearate' => Yii::t('application', 'Idbparearate'),
			'arearate0to75' => Yii::t('application', 'Arearate0to75'),
			'arearate76to125' => Yii::t('application', 'Arearate76to125'),
			'arearate126to200' => Yii::t('application', 'Arearate126to200'),
			'arearate201to300' => Yii::t('application', 'Arearate201to300'),
			'arearate301to400' => Yii::t('application', 'Arearate301to400'),
			'arearate401to600' => Yii::t('application', 'Arearate401to600'),
			'arearate601to750' => Yii::t('application', 'Arearate601to750'),
			'arearate751to1000' => Yii::t('application', 'Arearate751to1000'),
			'arearate1001to1250' => Yii::t('application', 'Arearate1001to1250'),
			'arearate1251to1500' => Yii::t('application', 'Arearate1251to1500'),
			'arearate1501to2000' => Yii::t('application', 'Arearate1501to2000'),
			'arearate2001to2500' => Yii::t('application', 'Arearate2001to2500'),
			'arearate2501above' => Yii::t('application', 'Arearate2501above'),
			'idccfyear' => Yii::t('application', 'Idccfyear'),
			'idbpuseagetype' => Yii::t('application', 'Idbpuseagetype'),
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

		$criteria->compare('idbparearate',$this->idbparearate,true);
		$criteria->compare('arearate0to75',$this->arearate0to75,true);
		$criteria->compare('arearate76to125',$this->arearate76to125,true);
		$criteria->compare('arearate126to200',$this->arearate126to200,true);
		$criteria->compare('arearate201to300',$this->arearate201to300,true);
		$criteria->compare('arearate301to400',$this->arearate301to400,true);
		$criteria->compare('arearate401to600',$this->arearate401to600,true);
		$criteria->compare('arearate601to750',$this->arearate601to750,true);
		$criteria->compare('arearate751to1000',$this->arearate751to1000,true);
		$criteria->compare('arearate1001to1250',$this->arearate1001to1250,true);
		$criteria->compare('arearate1251to1500',$this->arearate1251to1500,true);
		$criteria->compare('arearate1501to2000',$this->arearate1501to2000,true);
		$criteria->compare('arearate2001to2500',$this->arearate2001to2500,true);
		$criteria->compare('arearate2501above',$this->arearate2501above,true);
		$criteria->compare('idccfyear',$this->idccfyear,true);
		$criteria->compare('idbpuseagetype',$this->idbpuseagetype,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}