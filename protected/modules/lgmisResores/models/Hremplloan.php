<?php

/**
 * This is the model class for table "{{hremplloan}}".
 *
 * The followings are the available columns in table '{{hremplloan}}':
 * @property string $idhremplloan
 * @property string $idhremployee
 * @property string $loannumber
 * @property string $loandate
 * @property string $loanamount
 * @property string $installmentamt
 * @property string $installmentstartdate
 * @property string $installmentenddate
 * @property string $loantype
 * @property string $loanaccountno
 * @property string $loanbankname
 * @property string $loannarration
 *
 * The followings are the available model relations:
 * @property Hremployee $idhremployee0
 */
class Hremplloan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Hremplloan the static model class
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
		return '{{hremplloan}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idhremployee, loannumber, loandate, loanamount, installmentamt, installmentstartdate, installmentenddate, loantype, loanaccountno, loanbankname, loannarration', 'required'),
			array('idhremployee, loanamount, installmentamt', 'length', 'max'=>10),
			array('loannumber, loanaccountno', 'length', 'max'=>20),
			array('loantype', 'length', 'max'=>25),
			array('loanbankname', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idhremplloan, idhremployee, loannumber, loandate, loanamount, installmentamt, installmentstartdate, installmentenddate, loantype, loanaccountno, loanbankname, loannarration', 'safe', 'on'=>'search'),
                        array('idhremployee', 'validatefkeys'),
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
			'idhremployee0' => array(self::BELONGS_TO, 'Hremployee', 'idhremployee'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idhremplloan' => Yii::t('application', 'Idhremplloan'),
			'idhremployee' => Yii::t('application', 'Idhremployee'),
			'loannumber' => Yii::t('application', 'Loannumber'),
			'loandate' => Yii::t('application', 'Loandate'),
			'loanamount' => Yii::t('application', 'Loanamount'),
			'installmentamt' => Yii::t('application', 'Installmentamt'),
			'installmentstartdate' => Yii::t('application', 'Installmentstartdate'),
			'installmentenddate' => Yii::t('application', 'Installmentenddate'),
			'loantype' => Yii::t('application', 'Loantype'),
			'loanaccountno' => Yii::t('application', 'Loanaccountno'),
			'loanbankname' => Yii::t('application', 'Loanbankname'),
			'loannarration' => Yii::t('application', 'Loannarration'),
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

		$criteria->compare('idhremplloan',$this->idhremplloan,true);
		$criteria->compare('idhremployee',$this->idhremployee,true);
		$criteria->compare('loannumber',$this->loannumber,true);
		$criteria->compare('loandate',$this->loandate,true);
		$criteria->compare('loanamount',$this->loanamount,true);
		$criteria->compare('installmentamt',$this->installmentamt,true);
		$criteria->compare('installmentstartdate',$this->installmentstartdate,true);
		$criteria->compare('installmentenddate',$this->installmentenddate,true);
		$criteria->compare('loantype',$this->loantype,true);
		$criteria->compare('loanaccountno',$this->loanaccountno,true);
		$criteria->compare('loanbankname',$this->loanbankname,true);
		$criteria->compare('loannarration',$this->loannarration,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}