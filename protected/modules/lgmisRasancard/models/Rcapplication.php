<?php

/**
 * This is the model class for table "{{rcapplication}}".
 *
 * The followings are the available columns in table '{{rcapplication}}':
 * @property string $idrcapplication
 * @property string $adate
 * @property string $propertyno
 * @property string $aname
 * @property string $aaddress
 * @property string $idccward
 * @property string $livingfrom
 * @property string $idccoccupation
 * @property string $idccreligion
 * @property string $idcccategory
 * @property string $idccbpl
 * @property string $idrccolor
 * @property string $idccstatus
 * @property string $reqdoc
 * @property integer $idfddemandreceipt
 * @property string $idrcshop
 * @property string $csdate
 * @property integer $idrcfamdetail
 *
 * The followings are the available model relations:
 * @property Ccbpl $idccbpl0
 * @property Cccategory $idcccategory0
 * @property Ccoccupation $idccoccupation0
 * @property Ccreligion $idccreligion0
 * @property Ccstatus $idccstatus0
 * @property Ccward $idccward0
 * @property Rccolor $idrccolor0
 * @property Rcshop $idrcshop0
 * @property Rcfamdetail[] $rcfamdetails
 */
class Rcapplication extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Rcapplication the static model class
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
		return '{{rcapplication}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('propertyno, aname, aaddress, livingfrom, reqdoc', 'required'),
			array('idfddemandreceipt, idrcfamdetail', 'numerical', 'integerOnly'=>true),
			array('propertyno, aname, aaddress, livingfrom, reqdoc', 'length', 'max'=>100),
			array('idccward, idccoccupation, idccreligion, idcccategory, idccbpl, idrccolor, idccstatus, idrcshop', 'length', 'max'=>10),
			array('adate, csdate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idrcapplication, adate, propertyno, aname, aaddress, idccward, livingfrom, idccoccupation, idccreligion, idcccategory, idccbpl, idrccolor, idccstatus, reqdoc, idfddemandreceipt, idrcshop, csdate, idrcfamdetail', 'safe', 'on'=>'search'),
                        array('idccward, idccoccupation, idccreligion, idcccategory, idccbpl, idrccolor, idccstatus, idrcshop', 'validatefkeys'),
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
			'idccbpl0' => array(self::BELONGS_TO, 'Ccbpl', 'idccbpl'),
			'idcccategory0' => array(self::BELONGS_TO, 'Cccategory', 'idcccategory'),
			'idccoccupation0' => array(self::BELONGS_TO, 'Ccoccupation', 'idccoccupation'),
			'idccreligion0' => array(self::BELONGS_TO, 'Ccreligion', 'idccreligion'),
			'idccstatus0' => array(self::BELONGS_TO, 'Ccstatus', 'idccstatus'),
			'idccward0' => array(self::BELONGS_TO, 'Ccward', 'idccward'),
			'idrccolor0' => array(self::BELONGS_TO, 'Rccolor', 'idrccolor'),
			'idrcshop0' => array(self::BELONGS_TO, 'Rcshop', 'idrcshop'),
			'rcfamdetails' => array(self::HAS_MANY, 'Rcfamdetail', 'idrcapplication'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idrcapplication' => Yii::t('application', 'Idrcapplication'),
			'adate' => Yii::t('application', 'Adate'),
			'propertyno' => Yii::t('application', 'Propertyno'),
			'aname' => Yii::t('application', 'Aname'),
			'aaddress' => Yii::t('application', 'Aaddress'),
			'idccward' => Yii::t('application', 'Idccward'),
			'livingfrom' => Yii::t('application', 'Livingfrom'),
			'idccoccupation' => Yii::t('application', 'Idccoccupation'),
			'idccreligion' => Yii::t('application', 'Idccreligion'),
			'idcccategory' => Yii::t('application', 'Idcccategory'),
			'idccbpl' => Yii::t('application', 'Idccbpl'),
			'idrccolor' => Yii::t('application', 'Idrccolor'),
			'idccstatus' => Yii::t('application', 'Idccstatus'),
			'reqdoc' => Yii::t('application', 'Reqdoc'),
			'idfddemandreceipt' => Yii::t('application', 'Idfddemandreceipt'),
			'idrcshop' => Yii::t('application', 'Idrcshop'),
			'csdate' => Yii::t('application', 'Csdate'),
			'idrcfamdetail' => Yii::t('application', 'Idrcfamdetail'),
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

		$criteria->compare('idrcapplication',$this->idrcapplication,true);
		$criteria->compare('adate',$this->adate,true);
		$criteria->compare('propertyno',$this->propertyno,true);
		$criteria->compare('aname',$this->aname,true);
		$criteria->compare('aaddress',$this->aaddress,true);
		$criteria->compare('idccward',$this->idccward,true);
		$criteria->compare('livingfrom',$this->livingfrom,true);
		$criteria->compare('idccoccupation',$this->idccoccupation,true);
		$criteria->compare('idccreligion',$this->idccreligion,true);
		$criteria->compare('idcccategory',$this->idcccategory,true);
		$criteria->compare('idccbpl',$this->idccbpl,true);
		$criteria->compare('idrccolor',$this->idrccolor,true);
		$criteria->compare('idccstatus',$this->idccstatus,true);
		$criteria->compare('reqdoc',$this->reqdoc,true);
		$criteria->compare('idfddemandreceipt',$this->idfddemandreceipt);
		$criteria->compare('idrcshop',$this->idrcshop,true);
		$criteria->compare('csdate',$this->csdate,true);
		$criteria->compare('idrcfamdetail',$this->idrcfamdetail);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}