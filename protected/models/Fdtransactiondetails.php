<?php

/**
 * This is the model class for table "{{fdtransactiondetails}}".
 *
 * The followings are the available columns in table '{{fdtransactiondetails}}':
 * @property string $idfdtransactiondetails
 * @property string $idfdtransactionmaster
 * @property string $idfdledger
 * @property string $transactionamount
 * @property string $tdpercentage
 * @property string $transactioncrdr
 *
 * The followings are the available model relations:
 * @property Fdledger $idfdledger0
 * @property Fdtransactionmaster $idfdtransactionmaster0
 */
class Fdtransactiondetails extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Fdtransactiondetails the static model class
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
		return '{{fdtransactiondetails}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idfdtransactionmaster, idfdledger, transactionamount, tdpercentage, transactioncrdr', 'required'),
			array('idfdtransactionmaster, idfdledger, transactionamount, tdpercentage', 'length', 'max'=>10),
			array('transactioncrdr', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idfdtransactiondetails, idfdtransactionmaster, idfdledger, transactionamount, tdpercentage, transactioncrdr', 'safe', 'on'=>'search'),
                        array('idfdtransactionmaster, idfdledger', 'validatefkeys'),
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
			'idfdledger0' => array(self::BELONGS_TO, 'Fdledger', 'idfdledger'),
			'idfdtransactionmaster0' => array(self::BELONGS_TO, 'Fdtransactionmaster', 'idfdtransactionmaster'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idfdtransactiondetails' => Yii::t('application', 'Idfdtransactiondetails'),
			'idfdtransactionmaster' => Yii::t('application', 'Idfdtransactionmaster'),
			'idfdledger' => Yii::t('application', 'Idfdledger'),
			'transactionamount' => Yii::t('application', 'Transactionamount'),
			'tdpercentage' => Yii::t('application', 'Tdpercentage'),
			'transactioncrdr' => Yii::t('application', 'Transactioncrdr'),
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

		$criteria->compare('idfdtransactiondetails',$this->idfdtransactiondetails,true);
		$criteria->compare('idfdtransactionmaster',$this->idfdtransactionmaster,true);
		$criteria->compare('idfdledger',$this->idfdledger,true);
		$criteria->compare('transactionamount',$this->transactionamount,true);
		$criteria->compare('tdpercentage',$this->tdpercentage,true);
		$criteria->compare('transactioncrdr',$this->transactioncrdr,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}