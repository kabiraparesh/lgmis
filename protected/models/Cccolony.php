<?php

/**
 * This is the model class for table "{{cccolony}}".
 *
 * The followings are the available columns in table '{{cccolony}}':
 * @property string $idcccolony
 * @property string $colonyname
 * @property string $idccward
 *
 * The followings are the available model relations:
 * @property Ccward $idccward0
 * @property Ptmaster[] $ptmasters
 */
class Cccolony extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Cccolony the static model class
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
		return '{{cccolony}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('colonyname, idccward', 'required'),
			array('colonyname', 'length', 'max'=>100),
			array('idccward', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idcccolony, colonyname, idccward', 'safe', 'on'=>'search'),
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
			'idccward0' => array(self::BELONGS_TO, 'Ccward', 'idccward'),
			'ptmasters' => array(self::HAS_MANY, 'Ptmaster', 'idcccolony'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idcccolony' => Yii::t('application', 'Idcccolony'),
			'colonyname' => Yii::t('application', 'Colonyname'),
			'idccward' => Yii::t('application', 'Idccward'),
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

		$criteria->compare('idcccolony',$this->idcccolony,true);
		$criteria->compare('colonyname',$this->colonyname,true);
                
                if(isset($_REQUEST['idccward'])){
//                    syslog(LOG_WARNING, 'idccward2... ' . $_REQUEST['idccward']);
                    $this->idccward = $_REQUEST['idccward'];
                }                
                
		$criteria->compare('idccward',$this->idccward,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}