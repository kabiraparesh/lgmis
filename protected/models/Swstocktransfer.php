<?php

/**
 * This is the model class for table "{{swstocktransfer}}".
 *
 * The followings are the available columns in table '{{swstocktransfer}}':
 * @property string $idswstocktransfer
 * @property string $transferdate
 * @property string $transfernarration
 * @property string $idswstockreceived
 *
 * The followings are the available model relations:
 * @property Swstockreceived $idswstockreceived0
 * @property Swstocktransferdestination[] $swstocktransferdestinations
 * @property Swstocktransfersource[] $swstocktransfersources
 */
class Swstocktransfer extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Swstocktransfer the static model class
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
		return '{{swstocktransfer}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('transferdate, transfernarration, idswstockreceived', 'required'),
			array('transfernarration', 'length', 'max'=>255),
			array('idswstockreceived', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idswstocktransfer, transferdate, transfernarration, idswstockreceived', 'safe', 'on'=>'search'),
                        array('idswstockreceived', 'validatefkeys'),
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
			'idswstockreceived0' => array(self::BELONGS_TO, 'Swstockreceived', 'idswstockreceived'),
			'swstocktransferdestinations' => array(self::HAS_MANY, 'Swstocktransferdestination', 'idswstocktransfer'),
			'swstocktransfersources' => array(self::HAS_MANY, 'Swstocktransfersource', 'idswstocktransfer'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idswstocktransfer' => Yii::t('application', 'Idswstocktransfer'),
			'transferdate' => Yii::t('application', 'Transferdate'),
			'transfernarration' => Yii::t('application', 'Transfernarration'),
			'idswstockreceived' => Yii::t('application', 'Idswstockreceived'),
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

		$criteria->compare('idswstocktransfer',$this->idswstocktransfer,true);
		$criteria->compare('transferdate',$this->transferdate,true);
		$criteria->compare('transfernarration',$this->transfernarration,true);
		$criteria->compare('idswstockreceived',$this->idswstockreceived,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}