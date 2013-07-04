<?php

/**
 * This is the model class for table "{{rcshop}}".
 *
 * The followings are the available columns in table '{{rcshop}}':
 * @property string $idrcshop
 * @property string $sname
 * @property string $idccward
 * @property string $saddress
 * @property string $owname
 * @property string $owaddress
 * @property string $sphone
 * @property string $owphone
 * @property string $sdate
 * @property string $edate
 *
 * The followings are the available model relations:
 * @property Rcapplication[] $rcapplications
 * @property Ccward $idccward0
 */
class Rcshop extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Rcshop the static model class
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
		return '{{rcshop}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sname, saddress, owname, owaddress, sphone, owphone', 'required'),
			array('sname, saddress, owname, owaddress, sphone, owphone', 'length', 'max'=>100),
			array('idccward', 'length', 'max'=>10),
			array('sdate, edate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idrcshop, sname, idccward, saddress, owname, owaddress, sphone, owphone, sdate, edate', 'safe', 'on'=>'search'),
                        array('idccward', 'validatefkeys'),
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
			'rcapplications' => array(self::HAS_MANY, 'Rcapplication', 'idrcshop'),
			'idccward0' => array(self::BELONGS_TO, 'Ccward', 'idccward'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idrcshop' => Yii::t('application', 'Idrcshop'),
			'sname' => Yii::t('application', 'Sname'),
			'idccward' => Yii::t('application', 'Idccward'),
			'saddress' => Yii::t('application', 'Saddress'),
			'owname' => Yii::t('application', 'Owname'),
			'owaddress' => Yii::t('application', 'Owaddress'),
			'sphone' => Yii::t('application', 'Sphone'),
			'owphone' => Yii::t('application', 'Owphone'),
			'sdate' => Yii::t('application', 'Sdate'),
			'edate' => Yii::t('application', 'Edate'),
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

		$criteria->compare('idrcshop',$this->idrcshop,true);
		$criteria->compare('sname',$this->sname,true);
		$criteria->compare('idccward',$this->idccward,true);
		$criteria->compare('saddress',$this->saddress,true);
		$criteria->compare('owname',$this->owname,true);
		$criteria->compare('owaddress',$this->owaddress,true);
		$criteria->compare('sphone',$this->sphone,true);
		$criteria->compare('owphone',$this->owphone,true);
		$criteria->compare('sdate',$this->sdate,true);
		$criteria->compare('edate',$this->edate,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}