<?php

/**
 * This is the model class for table "{{hremplearnleave}}".
 *
 * The followings are the available columns in table '{{hremplearnleave}}':
 * @property string $idhremplearnleave
 * @property string $idhremployee
 * @property string $earnedleaveno
 * @property string $earnedleavedate
 * @property string $earnedleavestartmonth
 * @property string $earnedleaveendmonth
 * @property string $earnedleave
 * @property string $earnedleavepayment
 * @property string $givenamount
 * @property string $earnedleavenarration
 *
 * The followings are the available model relations:
 * @property Hremployee $idhremployee0
 */
class Hremplearnleave extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Hremplearnleave the static model class
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
		return '{{hremplearnleave}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idhremployee, earnedleaveno, earnedleavedate, earnedleavestartmonth, earnedleaveendmonth, earnedleave, earnedleavepayment, givenamount, earnedleavenarration', 'required'),
			array('idhremployee, earnedleave, earnedleavepayment, givenamount', 'length', 'max'=>10),
			array('earnedleaveno, earnedleavestartmonth, earnedleaveendmonth', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idhremplearnleave, idhremployee, earnedleaveno, earnedleavedate, earnedleavestartmonth, earnedleaveendmonth, earnedleave, earnedleavepayment, givenamount, earnedleavenarration', 'safe', 'on'=>'search'),
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
			'idhremplearnleave' => Yii::t('application', 'Idhremplearnleave'),
			'idhremployee' => Yii::t('application', 'Idhremployee'),
			'earnedleaveno' => Yii::t('application', 'Earnedleaveno'),
			'earnedleavedate' => Yii::t('application', 'Earnedleavedate'),
			'earnedleavestartmonth' => Yii::t('application', 'Earnedleavestartmonth'),
			'earnedleaveendmonth' => Yii::t('application', 'Earnedleaveendmonth'),
			'earnedleave' => Yii::t('application', 'Earnedleave'),
			'earnedleavepayment' => Yii::t('application', 'Earnedleavepayment'),
			'givenamount' => Yii::t('application', 'Givenamount'),
			'earnedleavenarration' => Yii::t('application', 'Earnedleavenarration'),
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
		$criteria->compare('idhremplearnleave',$this->idhremplearnleave,true);
		$criteria->compare('idhremployee',$this->idhremployee,true);
		$criteria->compare('earnedleaveno',$this->earnedleaveno,true);
		$criteria->compare('earnedleavedate',$this->earnedleavedate,true);
		$criteria->compare('earnedleavestartmonth',$this->earnedleavestartmonth,true);
		$criteria->compare('earnedleaveendmonth',$this->earnedleaveendmonth,true);
		$criteria->compare('earnedleave',$this->earnedleave,true);
		$criteria->compare('earnedleavepayment',$this->earnedleavepayment,true);
		$criteria->compare('givenamount',$this->givenamount,true);
		$criteria->compare('earnedleavenarration',$this->earnedleavenarration,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}