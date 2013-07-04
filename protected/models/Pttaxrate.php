<?php

/**
 * This is the model class for table "{{pttaxrate}}".
 *
 * The followings are the available columns in table '{{pttaxrate}}':
 * @property string $idpttaxrate
 * @property string $permanentdiscount
 * @property string $otherdiscount
 * @property string $discount12k
 * @property string $pttaxrate
 * @property string $selfusediscount
 * @property string $panelty
 * @property string $minsamekittax
 * @property string $samekittax
 * @property string $waterpttax
 * @property string $educess
 * @property string $subcess1
 * @property string $subcess2
 * @property string $pttaxdiscount
 * @property string $pttaxsurcharge
 * @property string $idccfyear
 *
 * The followings are the available model relations:
 * @property Ccfyear $idccfyear0
 */
class Pttaxrate extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Pttaxrate the static model class
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
		return '{{pttaxrate}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('minsamekittax, samekittax, waterpttax, educess, subcess1, subcess2, pttaxdiscount, pttaxsurcharge, idccfyear', 'required'),
			array('permanentdiscount, otherdiscount, discount12k, pttaxrate, selfusediscount, panelty, minsamekittax, samekittax, waterpttax, educess, subcess1, subcess2, pttaxdiscount, pttaxsurcharge', 'length', 'max'=>15),
			array('idccfyear, idptrange', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idpttaxrate, permanentdiscount, otherdiscount, discount12k, pttaxrate, selfusediscount, panelty, minsamekittax, samekittax, waterpttax, educess, subcess1, subcess2, pttaxdiscount, pttaxsurcharge, idccfyear, idptrange', 'safe', 'on'=>'search'),
            array('idccfyear', 'validatefkeys'),
            array('idptrange', 'validatefkeys'),
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
			'idptrange0' => array(self::BELONGS_TO, 'Ptrange', 'idptrange'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idpttaxrate' => Yii::t('application', 'Idpttaxrate'),
			'permanentdiscount' => Yii::t('application', 'Permanentdiscount'),
			'otherdiscount' => Yii::t('application', 'Otherdiscount'),
			'discount12k' => Yii::t('application', 'Discount12k'),
			'pttaxrate' => Yii::t('application', 'Pttaxrate'),
			'selfusediscount' => Yii::t('application', 'Selfusediscount'),
			'panelty' => Yii::t('application', 'Panelty'),
			'minsamekittax' => Yii::t('application', 'Minsamekittax'),
			'samekittax' => Yii::t('application', 'Samekittax'),
			'waterpttax' => Yii::t('application', 'Waterpttax'),
			'educess' => Yii::t('application', 'Educess'),
			'subcess1' => Yii::t('application', 'Subcess1'),
			'subcess2' => Yii::t('application', 'Subcess2'),
			'pttaxdiscount' => Yii::t('application', 'Pttaxdiscount'),
			'pttaxsurcharge' => Yii::t('application', 'Pttaxsurcharge'),
			'idccfyear' => Yii::t('application', 'Idccfyear'),
			'idptrange' => Yii::t('application', 'Idptrange'),
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

		$criteria->compare('idpttaxrate',$this->idpttaxrate,true);
		$criteria->compare('permanentdiscount',$this->permanentdiscount,true);
		$criteria->compare('otherdiscount',$this->otherdiscount,true);
		$criteria->compare('discount12k',$this->discount12k,true);
		$criteria->compare('pttaxrate',$this->pttaxrate,true);
		$criteria->compare('selfusediscount',$this->selfusediscount,true);
		$criteria->compare('panelty',$this->panelty,true);
		$criteria->compare('minsamekittax',$this->minsamekittax,true);
		$criteria->compare('samekittax',$this->samekittax,true);
		$criteria->compare('waterpttax',$this->waterpttax,true);
		$criteria->compare('educess',$this->educess,true);
		$criteria->compare('subcess1',$this->subcess1,true);
		$criteria->compare('subcess2',$this->subcess2,true);
		$criteria->compare('pttaxdiscount',$this->pttaxdiscount,true);
		$criteria->compare('pttaxsurcharge',$this->pttaxsurcharge,true);
		$criteria->compare('idccfyear',$this->idccfyear,true);
		$criteria->compare('idptrange',$this->idptrange,true);
		
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}