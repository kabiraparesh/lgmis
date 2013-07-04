<?php

/**
 * This is the model class for table "{{pttransfer}}".
 *
 * The followings are the available columns in table '{{pttransfer}}':
 * @property string $idpttransfer
 * @property string $idptmaster
 * @property string $oldownername
 * @property string $oldowneraddress
 * @property string $newownername
 * @property string $newowneraddress
 * @property string $idccsex
 * @property string $idptexsumptor
 * @property string $renewaldate
 * @property string $caserenewalno
 * @property string $receipt
 * @property string $idccstatus
 *
 * The followings are the available model relations:
 * @property Ccsex $idccsex0
 * @property Ccstatus $idccstatus0
 * @property Ptmaster $idptmaster0
 * @property Ptexsumptor $idptexsumptor0
 */
class Pttransfer extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Pttransfer the static model class
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
		return '{{pttransfer}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idptmaster, oldownername, oldowneraddress, newownername, newowneraddress, caserenewalno, receipt', 'required'),
			array('idptmaster, idccsex, idptexsumptor, idccstatus', 'length', 'max'=>10),
			array('oldownername, oldowneraddress, newownername, newowneraddress, caserenewalno, receipt', 'length', 'max'=>100),
			array('renewaldate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idpttransfer, idptmaster, oldownername, oldowneraddress, newownername, newowneraddress, idccsex, idptexsumptor, renewaldate, caserenewalno, receipt, idccstatus', 'safe', 'on'=>'search'),
                        array('idptmaster, idccsex, idptexsumptor, idccstatus', 'validatefkeys'),
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
			'idccsex0' => array(self::BELONGS_TO, 'Ccsex', 'idccsex'),
			'idccstatus0' => array(self::BELONGS_TO, 'Ccstatus', 'idccstatus'),
			'idptmaster0' => array(self::BELONGS_TO, 'Ptmaster', 'idptmaster'),
			'idptexsumptor0' => array(self::BELONGS_TO, 'Ptexsumptor', 'idptexsumptor'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idpttransfer' => Yii::t('application', 'Idpttransfer'),
			'idptmaster' => Yii::t('application', 'Idptmaster'),
			'oldownername' => Yii::t('application', 'Oldownername'),
			'oldowneraddress' => Yii::t('application', 'Oldowneraddress'),
			'newownername' => Yii::t('application', 'Newownername'),
			'newowneraddress' => Yii::t('application', 'Newowneraddress'),
			'idccsex' => Yii::t('application', 'Idccsex'),
			'idptexsumptor' => Yii::t('application', 'Idptexsumptor'),
			'renewaldate' => Yii::t('application', 'Renewaldate'),
			'caserenewalno' => Yii::t('application', 'Caserenewalno'),
			'receipt' => Yii::t('application', 'Receipt'),
			'idccstatus' => Yii::t('application', 'Idccstatus'),
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

		$criteria->compare('idpttransfer',$this->idpttransfer,true);
		$criteria->compare('idptmaster',$this->idptmaster,true);
		$criteria->compare('oldownername',$this->oldownername,true);
		$criteria->compare('oldowneraddress',$this->oldowneraddress,true);
		$criteria->compare('newownername',$this->newownername,true);
		$criteria->compare('newowneraddress',$this->newowneraddress,true);
		$criteria->compare('idccsex',$this->idccsex,true);
		$criteria->compare('idptexsumptor',$this->idptexsumptor,true);
		$criteria->compare('renewaldate',$this->renewaldate,true);
		$criteria->compare('caserenewalno',$this->caserenewalno,true);
		$criteria->compare('receipt',$this->receipt,true);
		$criteria->compare('idccstatus',$this->idccstatus,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}