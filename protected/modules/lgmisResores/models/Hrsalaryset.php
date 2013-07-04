<?php

/**
 * This is the model class for table "{{hrsalaryset}}".
 *
 * The followings are the available columns in table '{{hrsalaryset}}':
 * @property string $idhrsalaryset
 * @property string $idccfyear
 * @property string $dafix
 * @property string $da
 * @property string $hra
 * @property string $ca
 * @property string $cca
 * @property string $specialpay
 * @property string $wa
 * @property string $pf
 * @property string $ir
 * @property string $dpf
 * @property string $lpf
 * @property string $fa
 * @property string $ga
 * @property string $gpf
 * @property string $hrent
 * @property string $wrent
 * @property string $fbs
 * @property string $scst
 *
 * The followings are the available model relations:
 * @property Ccfyear $idccfyear0
 */
class Hrsalaryset extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Hrsalaryset the static model class
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
		return '{{hrsalaryset}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idccfyear, dafix, da, hra, ca, cca, specialpay, wa, pf, ir, dpf, lpf, fa, ga, gpf, hrent, wrent, fbs, scst', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idhrsalaryset, idccfyear, dafix, da, hra, ca, cca, specialpay, wa, pf, ir, dpf, lpf, fa, ga, gpf, hrent, wrent, fbs, scst', 'safe', 'on'=>'search'),
                        array('idccfyear', 'validatefkeys'),
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
			'idccfyear0' => array(self::BELONGS_TO, 'Ccfyear', 'idccfyear'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idhrsalaryset' => Yii::t('application', 'Idhrsalaryset'),
			'idccfyear' => Yii::t('application', 'Idccfyear'),
			'dafix' => Yii::t('application', 'Dafix'),
			'da' => Yii::t('application', 'Da'),
			'hra' => Yii::t('application', 'Hra'),
			'ca' => Yii::t('application', 'Ca'),
			'cca' => Yii::t('application', 'Cca'),
			'specialpay' => Yii::t('application', 'Specialpay'),
			'wa' => Yii::t('application', 'Wa'),
			'pf' => Yii::t('application', 'Pf'),
			'ir' => Yii::t('application', 'Ir'),
			'dpf' => Yii::t('application', 'Dpf'),
			'lpf' => Yii::t('application', 'Lpf'),
			'fa' => Yii::t('application', 'Fa'),
			'ga' => Yii::t('application', 'Ga'),
			'gpf' => Yii::t('application', 'Gpf'),
			'hrent' => Yii::t('application', 'Hrent'),
			'wrent' => Yii::t('application', 'Wrent'),
			'fbs' => Yii::t('application', 'Fbs'),
			'scst' => Yii::t('application', 'Scst'),
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

		$criteria->compare('idhrsalaryset',$this->idhrsalaryset,true);
		$criteria->compare('idccfyear',$this->idccfyear,true);
		$criteria->compare('dafix',$this->dafix,true);
		$criteria->compare('da',$this->da,true);
		$criteria->compare('hra',$this->hra,true);
		$criteria->compare('ca',$this->ca,true);
		$criteria->compare('cca',$this->cca,true);
		$criteria->compare('specialpay',$this->specialpay,true);
		$criteria->compare('wa',$this->wa,true);
		$criteria->compare('pf',$this->pf,true);
		$criteria->compare('ir',$this->ir,true);
		$criteria->compare('dpf',$this->dpf,true);
		$criteria->compare('lpf',$this->lpf,true);
		$criteria->compare('fa',$this->fa,true);
		$criteria->compare('ga',$this->ga,true);
		$criteria->compare('gpf',$this->gpf,true);
		$criteria->compare('hrent',$this->hrent,true);
		$criteria->compare('wrent',$this->wrent,true);
		$criteria->compare('fbs',$this->fbs,true);
		$criteria->compare('scst',$this->scst,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}