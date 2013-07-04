<?php

/**
 * This is the model class for table "{{ptbhadarate}}".
 *
 * The followings are the available columns in table '{{ptbhadarate}}':
 * @property string $idptbhadarate
 * @property string $aresidential
 * @property string $acommercial
 * @property string $bresidential
 * @property string $bcommercial
 * @property string $cresidential
 * @property string $ccommercial
 * @property string $dresidential
 * @property string $dcommercial
 * @property string $eresidential
 * @property string $ecommercial
 * @property string $idccfyear
 * @property string $idptrange
 * @property string $idptpropertyon
 *
 * The followings are the available model relations:
 * @property Ccfyear $idccfyear0
 * @property Ptpropertyon $idptpropertyon0
 * @property Ptrange $idptrange0
 */
class Ptbhadarate extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Ptbhadarate the static model class
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
		return '{{ptbhadarate}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idptpropertyon', 'required'),
			array('aresidential, acommercial, bresidential, bcommercial, cresidential, ccommercial, dresidential, dcommercial, eresidential, ecommercial', 'length', 'max'=>15),
			array('idccfyear, idptrange, idptpropertyon', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idptbhadarate, aresidential, acommercial, bresidential, bcommercial, cresidential, ccommercial, dresidential, dcommercial, eresidential, ecommercial, idccfyear, idptrange, idptpropertyon', 'safe', 'on'=>'search'),
                        array('idccfyear, idptrange, idptpropertyon', 'validatefkeys'),
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
			'idccfyear0' => array(self::BELONGS_TO, 'Ccfyear', 'idccfyear'),
			'idptpropertyon0' => array(self::BELONGS_TO, 'Ptpropertyon', 'idptpropertyon'),
			'idptrange0' => array(self::BELONGS_TO, 'Ptrange', 'idptrange'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idptbhadarate' => Yii::t('application', 'Idptbhadarate'),
			'aresidential' => Yii::t('application', 'Aresidential'),
			'acommercial' => Yii::t('application', 'Acommercial'),
			'bresidential' => Yii::t('application', 'Bresidential'),
			'bcommercial' => Yii::t('application', 'Bcommercial'),
			'cresidential' => Yii::t('application', 'Cresidential'),
			'ccommercial' => Yii::t('application', 'Ccommercial'),
			'dresidential' => Yii::t('application', 'Dresidential'),
			'dcommercial' => Yii::t('application', 'Dcommercial'),
			'eresidential' => Yii::t('application', 'Eresidential'),
			'ecommercial' => Yii::t('application', 'Ecommercial'),
			'idccfyear' => Yii::t('application', 'Idccfyear'),
			'idptrange' => Yii::t('application', 'Idptrange'),
			'idptpropertyon' => Yii::t('application', 'Idptpropertyon'),
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

		$criteria->compare('idptbhadarate',$this->idptbhadarate,true);
		$criteria->compare('aresidential',$this->aresidential,true);
		$criteria->compare('acommercial',$this->acommercial,true);
		$criteria->compare('bresidential',$this->bresidential,true);
		$criteria->compare('bcommercial',$this->bcommercial,true);
		$criteria->compare('cresidential',$this->cresidential,true);
		$criteria->compare('ccommercial',$this->ccommercial,true);
		$criteria->compare('dresidential',$this->dresidential,true);
		$criteria->compare('dcommercial',$this->dcommercial,true);
		$criteria->compare('eresidential',$this->eresidential,true);
		$criteria->compare('ecommercial',$this->ecommercial,true);
		$criteria->compare('idccfyear',$this->idccfyear,true);
		$criteria->compare('idptrange',$this->idptrange,true);
		$criteria->compare('idptpropertyon',$this->idptpropertyon,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}