<?php

/**
 * This is the model class for table "{{hremployeebasic}}".
 *
 * The followings are the available columns in table '{{hremployeebasic}}':
 * @property string $idhremployeebasic
 * @property string $idhremployee
 * @property string $orderno
 * @property string $orderdate
 * @property string $idhrpost
 * @property string $salaryapplifrom
 * @property string $nextincrement
 * @property string $idccward
 * @property string $workingplace
 * @property string $workingshift
 * @property string $bankaccountno
 * @property string $bankname
 * @property string $bankaddress
 * @property string $bankifsccode
 * @property string $actualbasic
 * @property string $basicless
 * @property string $isworker
 * @property string $issuspend
 * @property string $isondeputation
 * @property string $isnewpayscale
 * @property string $newpayscaledate
 * @property string $pfopening
 * @property string $pfloanopening
 * @property string $filenumber
 * @property string $ispensiongiven
 * @property string $pensionstartdate
 * @property string $pensionstopdate
 * @property string $pensionstopreason
 * @property string $narration
 *
 * The followings are the available model relations:
 * @property Ccward $idccward0
 * @property Hremployee $idhremployee0
 * @property Hrpost $idhrpost0
 */
class Hremployeebasic extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Hremployeebasic the static model class
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
		return '{{hremployeebasic}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idhremployee, orderno, orderdate, idhrpost, salaryapplifrom, nextincrement, idccward, workingplace, workingshift, bankaccountno, bankname, bankaddress, bankifsccode, actualbasic, basicless, isnewpayscale, filenumber, pensionstopreason, narration', 'required'),
			array('idhremployee, idhrpost, idccward, bankifsccode, actualbasic, basicless, isworker, issuspend, isondeputation, isnewpayscale, pfopening, pfloanopening, filenumber, ispensiongiven', 'length', 'max'=>10),
			array('orderno, workingplace, workingshift', 'length', 'max'=>45),
			array('bankaccountno', 'length', 'max'=>20),
			array('bankname, bankaddress, pensionstopreason', 'length', 'max'=>100),
			array('newpayscaledate, pensionstartdate, pensionstopdate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idhremployeebasic, idhremployee, orderno, orderdate, idhrpost, salaryapplifrom, nextincrement, idccward, workingplace, workingshift, bankaccountno, bankname, bankaddress, bankifsccode, actualbasic, basicless, isworker, issuspend, isondeputation, isnewpayscale, newpayscaledate, pfopening, pfloanopening, filenumber, ispensiongiven, pensionstartdate, pensionstopdate, pensionstopreason, narration', 'safe', 'on'=>'search'),
                        array('idhremployee, idhrpost, idccward', 'validatefkeys'),
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
			'idccward0' => array(self::BELONGS_TO, 'Ccward', 'idccward'),
			'idhremployee0' => array(self::BELONGS_TO, 'Hremployee', 'idhremployee'),
			'idhrpost0' => array(self::BELONGS_TO, 'Hrpost', 'idhrpost'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idhremployeebasic' => Yii::t('application', 'Idhremployeebasic'),
			'idhremployee' => Yii::t('application', 'Idhremployee'),
			'orderno' => Yii::t('application', 'Orderno'),
			'orderdate' => Yii::t('application', 'Orderdate'),
			'idhrpost' => Yii::t('application', 'Idhrpost'),
			'salaryapplifrom' => Yii::t('application', 'Salaryapplifrom'),
			'nextincrement' => Yii::t('application', 'Nextincrement'),
			'idccward' => Yii::t('application', 'Idccward'),
			'workingplace' => Yii::t('application', 'Workingplace'),
			'workingshift' => Yii::t('application', 'Workingshift'),
			'bankaccountno' => Yii::t('application', 'Bankaccountno'),
			'bankname' => Yii::t('application', 'Bankname'),
			'bankaddress' => Yii::t('application', 'Bankaddress'),
			'bankifsccode' => Yii::t('application', 'Bankifsccode'),
			'actualbasic' => Yii::t('application', 'Actualbasic'),
			'basicless' => Yii::t('application', 'Basicless'),
			'isworker' => Yii::t('application', 'Isworker'),
			'issuspend' => Yii::t('application', 'Issuspend'),
			'isondeputation' => Yii::t('application', 'Isondeputation'),
			'isnewpayscale' => Yii::t('application', 'Isnewpayscale'),
			'newpayscaledate' => Yii::t('application', 'Newpayscaledate'),
			'pfopening' => Yii::t('application', 'Pfopening'),
			'pfloanopening' => Yii::t('application', 'Pfloanopening'),
			'filenumber' => Yii::t('application', 'Filenumber'),
			'ispensiongiven' => Yii::t('application', 'Ispensiongiven'),
			'pensionstartdate' => Yii::t('application', 'Pensionstartdate'),
			'pensionstopdate' => Yii::t('application', 'Pensionstopdate'),
			'pensionstopreason' => Yii::t('application', 'Pensionstopreason'),
			'narration' => Yii::t('application', 'Narration'),
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
                
                 $criteria=new CDbCriteria;
                if(isset($_GET['id'])){
                    $this->idhremployee = $_GET['id'];
                }
                
		$criteria->compare('idhremployeebasic',$this->idhremployeebasic,true);
		$criteria->compare('idhremployee',$this->idhremployee,true);
		$criteria->compare('orderno',$this->orderno,true);
		$criteria->compare('orderdate',$this->orderdate,true);
		$criteria->compare('idhrpost',$this->idhrpost,true);
		$criteria->compare('salaryapplifrom',$this->salaryapplifrom,true);
		$criteria->compare('nextincrement',$this->nextincrement,true);
		$criteria->compare('idccward',$this->idccward,true);
		$criteria->compare('workingplace',$this->workingplace,true);
		$criteria->compare('workingshift',$this->workingshift,true);
		$criteria->compare('bankaccountno',$this->bankaccountno,true);
		$criteria->compare('bankname',$this->bankname,true);
		$criteria->compare('bankaddress',$this->bankaddress,true);
		$criteria->compare('bankifsccode',$this->bankifsccode,true);
		$criteria->compare('actualbasic',$this->actualbasic,true);
		$criteria->compare('basicless',$this->basicless,true);
		$criteria->compare('isworker',$this->isworker,true);
		$criteria->compare('issuspend',$this->issuspend,true);
		$criteria->compare('isondeputation',$this->isondeputation,true);
		$criteria->compare('isnewpayscale',$this->isnewpayscale,true);
		$criteria->compare('newpayscaledate',$this->newpayscaledate,true);
		$criteria->compare('pfopening',$this->pfopening,true);
		$criteria->compare('pfloanopening',$this->pfloanopening,true);
		$criteria->compare('filenumber',$this->filenumber,true);
		$criteria->compare('ispensiongiven',$this->ispensiongiven,true);
		$criteria->compare('pensionstartdate',$this->pensionstartdate,true);
		$criteria->compare('pensionstopdate',$this->pensionstopdate,true);
		$criteria->compare('pensionstopreason',$this->pensionstopreason,true);
		$criteria->compare('narration',$this->narration,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}