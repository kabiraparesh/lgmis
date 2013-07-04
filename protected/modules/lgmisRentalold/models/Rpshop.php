<?php

/**
 * This is the model class for table "{{rpshop}}".
 *
 * The followings are the available columns in table '{{rpshop}}':
 * @property string $idrpshop
 * @property string $shopno
 * @property string $shopname
 * @property string $address
 * @property string $idrpmarket
 * @property string $idrprange
 * @property string $monthlyrent
 * @property string $monthlysurcharge
 *
 * The followings are the available model relations:
 * @property Rpmarket $idrpmarket0
 * @property Rprange $idrprange0
 * @property Rptenant[] $rptenants
 */
class Rpshop extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Rpshop the static model class
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
		return '{{rpshop}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('shopno, shopname, address, idrpmarket, idrprange, monthlyrent, monthlysurcharge', 'required'),
			array('shopno', 'length', 'max'=>20),
			array('shopname, address', 'length', 'max'=>100),
			array('idrpmarket, idrprange', 'length', 'max'=>10),
			array('monthlyrent, monthlysurcharge', 'length', 'max'=>7),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idrpshop, shopno, shopname, address, idrpmarket, idrprange, monthlyrent, monthlysurcharge', 'safe', 'on'=>'search'),
                        array('idrpmarket, idrprange', 'validatefkeys'),
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
			'idrpmarket0' => array(self::BELONGS_TO, 'Rpmarket', 'idrpmarket'),
			'idrprange0' => array(self::BELONGS_TO, 'Rprange', 'idrprange'),
			'rptenants' => array(self::HAS_MANY, 'Rptenant', 'idrpshop'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idrpshop' => Yii::t('application', 'Idrpshop'),
			'shopno' => Yii::t('application', 'Shopno'),
			'shopname' => Yii::t('application', 'Shopname'),
			'address' => Yii::t('application', 'Address'),
			'idrpmarket' => Yii::t('application', 'Idrpmarket'),
			'idrprange' => Yii::t('application', 'Idrprange'),
			'monthlyrent' => Yii::t('application', 'Monthlyrent'),
			'monthlysurcharge' => Yii::t('application', 'Monthlysurcharge'),
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

		$criteria->compare('idrpshop',$this->idrpshop,true);
		$criteria->compare('shopno',$this->shopno,true);
		$criteria->compare('shopname',$this->shopname,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('idrpmarket',$this->idrpmarket,true);
		$criteria->compare('idrprange',$this->idrprange,true);
		$criteria->compare('monthlyrent',$this->monthlyrent,true);
		$criteria->compare('monthlysurcharge',$this->monthlysurcharge,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}