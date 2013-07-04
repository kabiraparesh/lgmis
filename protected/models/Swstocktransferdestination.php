<?php

/**
 * This is the model class for table "{{swstocktransferdestination}}".
 *
 * The followings are the available columns in table '{{swstocktransferdestination}}':
 * @property string $idswstocktransferdestination
 * @property string $idswstockitem
 * @property string $destinationquantity
 * @property string $destinationrateper
 * @property string $destinationvalue
 * @property string $idswstocktransfer
 *
 * The followings are the available model relations:
 * @property Swstockitem $idswstockitem0
 * @property Swstocktransfer $idswstocktransfer0
 */
class Swstocktransferdestination extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Swstocktransferdestination the static model class
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
		return '{{swstocktransferdestination}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idswstockitem, destinationquantity, destinationrateper, destinationvalue, idswstocktransfer', 'required'),
			array('idswstockitem, destinationquantity, idswstocktransfer', 'length', 'max'=>10),
			array('destinationrateper, destinationvalue', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idswstocktransferdestination, idswstockitem, destinationquantity, destinationrateper, destinationvalue, idswstocktransfer', 'safe', 'on'=>'search'),
                        array('idswstockitem, idswstocktransfer', 'validatefkeys'),
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
			'idswstocktransfer0' => array(self::BELONGS_TO, 'Swstocktransfer', 'idswstocktransfer'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idswstocktransferdestination' => Yii::t('application', 'Idswstocktransferdestination'),
			'idswstockitem' => Yii::t('application', 'Idswstockitem'),
			'destinationquantity' => Yii::t('application', 'Destinationquantity'),
			'destinationrateper' => Yii::t('application', 'Destinationrateper'),
			'destinationvalue' => Yii::t('application', 'Destinationvalue'),
			'idswstocktransfer' => Yii::t('application', 'Idswstocktransfer'),
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

		$criteria->compare('idswstocktransferdestination',$this->idswstocktransferdestination,true);
		$criteria->compare('idswstockitem',$this->idswstockitem,true);
		$criteria->compare('destinationquantity',$this->destinationquantity,true);
		$criteria->compare('destinationrateper',$this->destinationrateper,true);
		$criteria->compare('destinationvalue',$this->destinationvalue,true);
		$criteria->compare('idswstocktransfer',$this->idswstocktransfer,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}