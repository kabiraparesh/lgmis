<?php

/**
 * This is the model class for table "{{fdtransactionissuepurchase}}".
 *
 * The followings are the available columns in table '{{fdtransactionissuepurchase}}':
 * @property string $idtransactionissuepurchase
 * @property string $idfdtransactionmaster
 * @property string $idswstockitem
 * @property string $transissuepurchaseqty
 * @property string $transissuepurchaserate
 * @property string $transissuepurchasetotamt
 *
 * The followings are the available model relations:
 * @property Fdtransactionmaster $idfdtransactionmaster0
 * @property Swstockitem $idswstockitem0
 */
class Fdtransactionissuepurchase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Fdtransactionissuepurchase the static model class
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
		return '{{fdtransactionissuepurchase}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idfdtransactionmaster, idswstockitem, transissuepurchaseqty, transissuepurchaserate, transissuepurchasetotamt', 'required'),
			array('idfdtransactionmaster, idswstockitem, transissuepurchaseqty, transissuepurchaserate, transissuepurchasetotamt', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idtransactionissuepurchase, idfdtransactionmaster, idswstockitem, transissuepurchaseqty, transissuepurchaserate, transissuepurchasetotamt', 'safe', 'on'=>'search'),
                        array('idfdtransactionmaster, idswstockitem', 'validatefkeys'),
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
			'idfdtransactionmaster0' => array(self::BELONGS_TO, 'Fdtransactionmaster', 'idfdtransactionmaster'),
			'idswstockitem0' => array(self::BELONGS_TO, 'Swstockitem', 'idswstockitem'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idtransactionissuepurchase' => Yii::t('application', 'Idtransactionissuepurchase'),
			'idfdtransactionmaster' => Yii::t('application', 'Idfdtransactionmaster'),
			'idswstockitem' => Yii::t('application', 'Idswstockitem'),
			'transissuepurchaseqty' => Yii::t('application', 'Transissuepurchaseqty'),
			'transissuepurchaserate' => Yii::t('application', 'Transissuepurchaserate'),
			'transissuepurchasetotamt' => Yii::t('application', 'Transissuepurchasetotamt'),
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

		$criteria->compare('idtransactionissuepurchase',$this->idtransactionissuepurchase,true);
		$criteria->compare('idfdtransactionmaster',$this->idfdtransactionmaster,true);
		$criteria->compare('idswstockitem',$this->idswstockitem,true);
		$criteria->compare('transissuepurchaseqty',$this->transissuepurchaseqty,true);
		$criteria->compare('transissuepurchaserate',$this->transissuepurchaserate,true);
		$criteria->compare('transissuepurchasetotamt',$this->transissuepurchasetotamt,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}