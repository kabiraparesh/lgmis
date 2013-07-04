<?php

/**
 * This is the model class for table "{{lpapplicant}}".
 *
 * The followings are the available columns in table '{{lpapplicant}}':
 * @property string $idlpapplicant
 * @property string $bussname
 * @property string $bussaddress
 * @property string $idcccolony
 * @property string $idlpbtype
 * @property string $idlpbnature
 * @property string $oldregno
 * @property string $oldlicno
 * @property string $otheroffice
 * @property string $othergodown
 * @property string $otherworkingplace
 * @property string $idlptype
 * @property string $workingyoungm
 * @property string $workingyoungf
 * @property string $workingadultm
 * @property string $workingadultf
 *
 * The followings are the available model relations:
 * @property Cccolony $idcccolony0
 * @property Lptype $idlptype0
 * @property Lpbnature $idlpbnature0
 * @property Lpbtype $idlpbtype0
 * @property Lpdemand[] $lpdemands
 * @property Lplicency[] $lplicencies
 * @property Lprelative[] $lprelatives
 * @property Lpwellwisher[] $lpwellwishers
 */
class Lpapplicant extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Lpapplicant the static model class
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
		return '{{lpapplicant}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('bussname, bussaddress, idcccolony, idlpbnature, otheroffice, othergodown, otherworkingplace, idlptype, workingyoungm, workingyoungf, workingadultm, workingadultf', 'required'),
			array('bussname, bussaddress, otheroffice, othergodown, otherworkingplace', 'length', 'max'=>100),
			array('idcccolony, idlpbtype, idlpbnature, oldregno, oldlicno, idlptype, workingyoungm, workingyoungf, workingadultm, workingadultf', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idlpapplicant, bussname, bussaddress, idcccolony, idlpbtype, idlpbnature, oldregno, oldlicno, otheroffice, othergodown, otherworkingplace, idlptype, workingyoungm, workingyoungf, workingadultm, workingadultf', 'safe', 'on'=>'search'),
                        array('idcccolony, idlpbtype, idlpbnature, idlptype', 'validatefkeys'),
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
			'idcccolony0' => array(self::BELONGS_TO, 'Cccolony', 'idcccolony'),
			'idlptype0' => array(self::BELONGS_TO, 'Lptype', 'idlptype'),
			'idlpbnature0' => array(self::BELONGS_TO, 'Lpbnature', 'idlpbnature'),
			'idlpbtype0' => array(self::BELONGS_TO, 'Lpbtype', 'idlpbtype'),
			'lpdemands' => array(self::HAS_MANY, 'Lpdemand', 'idlpapplicant'),
			'lplicencies' => array(self::HAS_MANY, 'Lplicency', 'idlpapplicant'),
			'lprelatives' => array(self::HAS_MANY, 'Lprelative', 'idlpapplicant'),
			'lpwellwishers' => array(self::HAS_MANY, 'Lpwellwisher', 'idlpapplicant'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idlpapplicant' => Yii::t('application', 'Idlpapplicant'),
			'bussname' => Yii::t('application', 'Bussname'),
			'bussaddress' => Yii::t('application', 'Bussaddress'),
			'idcccolony' => Yii::t('application', 'Idcccolony'),
			'idlpbtype' => Yii::t('application', 'Idlpbtype'),
			'idlpbnature' => Yii::t('application', 'Idlpbnature'),
			'oldregno' => Yii::t('application', 'Oldregno'),
			'oldlicno' => Yii::t('application', 'Oldlicno'),
			'otheroffice' => Yii::t('application', 'Otheroffice'),
			'othergodown' => Yii::t('application', 'Othergodown'),
			'otherworkingplace' => Yii::t('application', 'Otherworkingplace'),
			'idlptype' => Yii::t('application', 'Idlptype'),
			'workingyoungm' => Yii::t('application', 'Workingyoungm'),
			'workingyoungf' => Yii::t('application', 'Workingyoungf'),
			'workingadultm' => Yii::t('application', 'Workingadultm'),
			'workingadultf' => Yii::t('application', 'Workingadultf'),
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

		$criteria->compare('idlpapplicant',$this->idlpapplicant,true);
		$criteria->compare('bussname',$this->bussname,true);
		$criteria->compare('bussaddress',$this->bussaddress,true);
		$criteria->compare('idcccolony',$this->idcccolony,true);
		$criteria->compare('idlpbtype',$this->idlpbtype,true);
		$criteria->compare('idlpbnature',$this->idlpbnature,true);
		$criteria->compare('oldregno',$this->oldregno,true);
		$criteria->compare('oldlicno',$this->oldlicno,true);
		$criteria->compare('otheroffice',$this->otheroffice,true);
		$criteria->compare('othergodown',$this->othergodown,true);
		$criteria->compare('otherworkingplace',$this->otherworkingplace,true);
		$criteria->compare('idlptype',$this->idlptype,true);
		$criteria->compare('workingyoungm',$this->workingyoungm,true);
		$criteria->compare('workingyoungf',$this->workingyoungf,true);
		$criteria->compare('workingadultm',$this->workingadultm,true);
		$criteria->compare('workingadultf',$this->workingadultf,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}