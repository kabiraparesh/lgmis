<?php

/**
 * This is the model class for table "{{swstockitem}}".
 *
 * The followings are the available columns in table '{{swstockitem}}':
 * @property string $idswstockitem
 * @property string $idswstockgroup
 * @property string $idswstockunit
 * @property string $reorderlevel
 * @property string $category
 * @property string $itemname
 * @property string $noofunit
 * @property string $rate
 * @property string $brand
 * @property string $idfdmeasure
 * @property string $itemquantity
 * @property string $itemsvalue
 *
 * The followings are the available model relations:
 * @property Fdtransactionissuepurchase[] $fdtransactionissuepurchases
 * @property Swstockgroup $idswstockgroup0
 * @property Fdmeasure $idfdmeasure0
 * @property Swstockitem $idswstockitem0
 * @property Swstockitem $swstockitem
 * @property Swstockreceived[] $swstockreceiveds
 * @property Swstocktransferdestination[] $swstocktransferdestinations
 * @property Swstocktransfersource[] $swstocktransfersources
 */
class Swstockitem extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Swstockitem the static model class
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
		return '{{swstockitem}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idswstockgroup, idswstockunit, itemname, noofunit, rate, brand, idfdmeasure, itemquantity, itemsvalue', 'required'),
			array('idswstockgroup, idswstockunit, reorderlevel, noofunit, idfdmeasure, itemquantity, itemsvalue', 'length', 'max'=>10),
			array('category, itemname', 'length', 'max'=>100),
			array('rate', 'length', 'max'=>15),
			array('brand', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idswstockitem, idswstockgroup, idswstockunit, reorderlevel, category, itemname, noofunit, rate, brand, idfdmeasure, itemquantity, itemsvalue', 'safe', 'on'=>'search'),
                        array('idswstockitem, idswstockgroup, idfdmeasure', 'validatefkeys'),
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
			'fdtransactionissuepurchases' => array(self::HAS_MANY, 'Fdtransactionissuepurchase', 'idswstockitem'),
			'idswstockgroup0' => array(self::BELONGS_TO, 'Swstockgroup', 'idswstockgroup'),
			'idfdmeasure0' => array(self::BELONGS_TO, 'Fdmeasure', 'idfdmeasure'),
			'idswstockitem0' => array(self::BELONGS_TO, 'Swstockitem', 'idswstockitem'),
			'swstockitem' => array(self::HAS_ONE, 'Swstockitem', 'idswstockitem'),
			'swstockreceiveds' => array(self::HAS_MANY, 'Swstockreceived', 'idswstockitem'),
			'swstocktransferdestinations' => array(self::HAS_MANY, 'Swstocktransferdestination', 'idswstockitem'),
			'swstocktransfersources' => array(self::HAS_MANY, 'Swstocktransfersource', 'idswstockitem'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idswstockitem' => Yii::t('application', 'Idswstockitem'),
			'idswstockgroup' => Yii::t('application', 'Idswstockgroup'),
			'idswstockunit' => Yii::t('application', 'Idswstockunit'),
			'reorderlevel' => Yii::t('application', 'Reorderlevel'),
			'category' => Yii::t('application', 'Category'),
			'itemname' => Yii::t('application', 'Itemname'),
			'noofunit' => Yii::t('application', 'Noofunit'),
			'rate' => Yii::t('application', 'Rate'),
			'brand' => Yii::t('application', 'Brand'),
			'idfdmeasure' => Yii::t('application', 'Idfdmeasure'),
			'itemquantity' => Yii::t('application', 'Itemquantity'),
			'itemsvalue' => Yii::t('application', 'Itemsvalue'),
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

		$criteria->compare('idswstockitem',$this->idswstockitem,true);
		$criteria->compare('idswstockgroup',$this->idswstockgroup,true);
		$criteria->compare('idswstockunit',$this->idswstockunit,true);
		$criteria->compare('reorderlevel',$this->reorderlevel,true);
		$criteria->compare('category',$this->category,true);
		$criteria->compare('itemname',$this->itemname,true);
		$criteria->compare('noofunit',$this->noofunit,true);
		$criteria->compare('rate',$this->rate,true);
		$criteria->compare('brand',$this->brand,true);
		$criteria->compare('idfdmeasure',$this->idfdmeasure,true);
		$criteria->compare('itemquantity',$this->itemquantity,true);
		$criteria->compare('itemsvalue',$this->itemsvalue,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}