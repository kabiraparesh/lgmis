<?php

/**
 * This is the model class for table "{{swstockreceived}}".
 *
 * The followings are the available columns in table '{{swstockreceived}}':
 * @property string $idswstockreceived
 * @property string $ledgerdate
 * @property string $idswstockitem
 * @property string $received
 * @property string $noofunit
 * @property string $rate
 * @property string $idcporder
 *
 * The followings are the available model relations:
 * @property Swstockitem $idswstockitem0
 * @property Swstocktransfer[] $swstocktransfers
 */
class Swstockreceived extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Swstockreceived the static model class
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
		return '{{swstockreceived}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idswstockitem, idcporder', 'required'),
			array('idswstockitem, received, noofunit, idcporder', 'length', 'max'=>10),
			array('rate', 'length', 'max'=>15),
			array('ledgerdate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idswstockreceived, ledgerdate, idswstockitem, received, noofunit, rate, idcporder', 'safe', 'on'=>'search'),
                        array('idswstockitem', 'validatefkeys'),
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
			'idswstockitem0' => array(self::BELONGS_TO, 'Swstockitem', 'idswstockitem'),
			'swstocktransfers' => array(self::HAS_MANY, 'Swstocktransfer', 'idswstockreceived'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idswstockreceived' => Yii::t('application', 'Idswstockreceived'),
			'ledgerdate' => Yii::t('application', 'Ledgerdate'),
			'idswstockitem' => Yii::t('application', 'Idswstockitem'),
			'received' => Yii::t('application', 'Received'),
			'noofunit' => Yii::t('application', 'Noofunit'),
			'rate' => Yii::t('application', 'Rate'),
			'idcporder' => Yii::t('application', 'Idcporder'),
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

		$criteria->compare('idswstockreceived',$this->idswstockreceived,true);
		$criteria->compare('ledgerdate',$this->ledgerdate,true);
		$criteria->compare('idswstockitem',$this->idswstockitem,true);
		$criteria->compare('received',$this->received,true);
		$criteria->compare('noofunit',$this->noofunit,true);
		$criteria->compare('rate',$this->rate,true);
		$criteria->compare('idcporder',$this->idcporder,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}