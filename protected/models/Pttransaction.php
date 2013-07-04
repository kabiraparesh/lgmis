<?php

/**
 * This is the model class for table "{{pttransaction}}".
 *
 * The followings are the available columns in table '{{pttransaction}}':
 * @property string $idpttransaction
 * @property string $idptmaster
 * @property string $idccfyear
 * @property string $oldpropertytax
 * @property string $oldservicetax
 * @property string $oldminsamekittax
 * @property string $oldsamekittax
 * @property string $oldwaterpttax
 * @property string $oldeducess
 * @property string $oldsubcess1
 * @property string $oldsubcess2
 * @property string $oldpttaxdiscount
 * @property string $oldpttaxsurcharge
 * @property string $propertytax
 * @property string $servicetax
 * @property string $minsamekittax
 * @property string $samekittax
 * @property string $waterpttax
 * @property string $educess
 * @property string $subcess1
 * @property string $subcess2
 * @property string $pttaxdiscount
 * @property string $pttaxsurcharge
 * @property string $resbhada
 * @property string $combhada
 * @property string $rentbhada
 * @property string $resbhadadis
 * @property string $combhadadis
 * @property string $rentbhadadis
 * @property string $resbhadaothdis
 * @property string $combhadaothdis
 * @property string $rentbhadaothdis
 * @property string $resbhada12kdis
 * @property string $combhada12kdis
 * @property string $rentbhada12kdis
 * @property string $respttax
 * @property string $compttax
 * @property string $rentpttax
 * @property string $resptselfdis
 * @property string $comptselfdis
 * @property string $rentptselfdis
 *
 * The followings are the available model relations:
 * @property Ccfyear $idccfyear0
 * @property Ptmaster $idptmaster0
 */
class Pttransaction extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Pttransaction the static model class
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
		return '{{pttransaction}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idptmaster, resbhada, combhada, rentbhada, resbhadadis, combhadadis, rentbhadadis, resbhadaothdis, combhadaothdis, rentbhadaothdis, resbhada12kdis, combhada12kdis, rentbhada12kdis, respttax, compttax, rentpttax, resptselfdis, comptselfdis, rentptselfdis', 'required'),
			array('idptmaster, idccfyear', 'length', 'max'=>10),
			array('oldpropertytax, oldservicetax, oldminsamekittax, oldsamekittax, oldwaterpttax, oldeducess, oldsubcess1, oldsubcess2, oldpttaxdiscount, oldpttaxsurcharge, propertytax, servicetax, minsamekittax, samekittax, waterpttax, educess, subcess1, subcess2, pttaxdiscount, pttaxsurcharge, resbhada, combhada, rentbhada, resbhadadis, combhadadis, rentbhadadis, resbhadaothdis, combhadaothdis, rentbhadaothdis, resbhada12kdis, combhada12kdis, rentbhada12kdis, respttax, compttax, rentpttax, resptselfdis, comptselfdis, rentptselfdis', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idpttransaction, idptmaster, idccfyear, oldpropertytax, oldservicetax, oldminsamekittax, oldsamekittax, oldwaterpttax, oldeducess, oldsubcess1, oldsubcess2, oldpttaxdiscount, oldpttaxsurcharge, propertytax, servicetax, minsamekittax, samekittax, waterpttax, educess, subcess1, subcess2, pttaxdiscount, pttaxsurcharge, resbhada, combhada, rentbhada, resbhadadis, combhadadis, rentbhadadis, resbhadaothdis, combhadaothdis, rentbhadaothdis, resbhada12kdis, combhada12kdis, rentbhada12kdis, respttax, compttax, rentpttax, resptselfdis, comptselfdis, rentptselfdis', 'safe', 'on'=>'search'),
                        array('idptmaster, idccfyear', 'validatefkeys'),
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
			'idptmaster0' => array(self::BELONGS_TO, 'Ptmaster', 'idptmaster'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idpttransaction' => Yii::t('application', 'Idpttransaction'),
			'idptmaster' => Yii::t('application', 'Idptmaster'),
			'idccfyear' => Yii::t('application', 'Idccfyear'),
			'oldpropertytax' => Yii::t('application', 'Oldpropertytax'),
			'oldservicetax' => Yii::t('application', 'Oldservicetax'),
			'oldminsamekittax' => Yii::t('application', 'Oldminsamekittax'),
			'oldsamekittax' => Yii::t('application', 'Oldsamekittax'),
			'oldwaterpttax' => Yii::t('application', 'Oldwaterpttax'),
			'oldeducess' => Yii::t('application', 'Oldeducess'),
			'oldsubcess1' => Yii::t('application', 'Oldsubcess1'),
			'oldsubcess2' => Yii::t('application', 'Oldsubcess2'),
			'oldpttaxdiscount' => Yii::t('application', 'Oldpttaxdiscount'),
			'oldpttaxsurcharge' => Yii::t('application', 'Oldpttaxsurcharge'),
			'propertytax' => Yii::t('application', 'Propertytax'),
			'servicetax' => Yii::t('application', 'Servicetax'),
			'minsamekittax' => Yii::t('application', 'Minsamekittax'),
			'samekittax' => Yii::t('application', 'Samekittax'),
			'waterpttax' => Yii::t('application', 'Waterpttax'),
			'educess' => Yii::t('application', 'Educess'),
			'subcess1' => Yii::t('application', 'Subcess1'),
			'subcess2' => Yii::t('application', 'Subcess2'),
			'pttaxdiscount' => Yii::t('application', 'Pttaxdiscount'),
			'pttaxsurcharge' => Yii::t('application', 'Pttaxsurcharge'),
			'resbhada' => Yii::t('application', 'Resbhada'),
			'combhada' => Yii::t('application', 'Combhada'),
			'rentbhada' => Yii::t('application', 'Rentbhada'),
			'resbhadadis' => Yii::t('application', 'Resbhadadis'),
			'combhadadis' => Yii::t('application', 'Combhadadis'),
			'rentbhadadis' => Yii::t('application', 'Rentbhadadis'),
			'resbhadaothdis' => Yii::t('application', 'Resbhadaothdis'),
			'combhadaothdis' => Yii::t('application', 'Combhadaothdis'),
			'rentbhadaothdis' => Yii::t('application', 'Rentbhadaothdis'),
			'resbhada12kdis' => Yii::t('application', 'Resbhada12kdis'),
			'combhada12kdis' => Yii::t('application', 'Combhada12kdis'),
			'rentbhada12kdis' => Yii::t('application', 'Rentbhada12kdis'),
			'respttax' => Yii::t('application', 'Respttax'),
			'compttax' => Yii::t('application', 'Compttax'),
			'rentpttax' => Yii::t('application', 'Rentpttax'),
			'resptselfdis' => Yii::t('application', 'Resptselfdis'),
			'comptselfdis' => Yii::t('application', 'Comptselfdis'),
			'rentptselfdis' => Yii::t('application', 'Rentptselfdis'),
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

		$criteria->compare('idpttransaction',$this->idpttransaction,true);
		$criteria->compare('idptmaster',$this->idptmaster,true);
		$criteria->compare('idccfyear',$this->idccfyear,true);
		$criteria->compare('oldpropertytax',$this->oldpropertytax,true);
		$criteria->compare('oldservicetax',$this->oldservicetax,true);
		$criteria->compare('oldminsamekittax',$this->oldminsamekittax,true);
		$criteria->compare('oldsamekittax',$this->oldsamekittax,true);
		$criteria->compare('oldwaterpttax',$this->oldwaterpttax,true);
		$criteria->compare('oldeducess',$this->oldeducess,true);
		$criteria->compare('oldsubcess1',$this->oldsubcess1,true);
		$criteria->compare('oldsubcess2',$this->oldsubcess2,true);
		$criteria->compare('oldpttaxdiscount',$this->oldpttaxdiscount,true);
		$criteria->compare('oldpttaxsurcharge',$this->oldpttaxsurcharge,true);
		$criteria->compare('propertytax',$this->propertytax,true);
		$criteria->compare('servicetax',$this->servicetax,true);
		$criteria->compare('minsamekittax',$this->minsamekittax,true);
		$criteria->compare('samekittax',$this->samekittax,true);
		$criteria->compare('waterpttax',$this->waterpttax,true);
		$criteria->compare('educess',$this->educess,true);
		$criteria->compare('subcess1',$this->subcess1,true);
		$criteria->compare('subcess2',$this->subcess2,true);
		$criteria->compare('pttaxdiscount',$this->pttaxdiscount,true);
		$criteria->compare('pttaxsurcharge',$this->pttaxsurcharge,true);
		$criteria->compare('resbhada',$this->resbhada,true);
		$criteria->compare('combhada',$this->combhada,true);
		$criteria->compare('rentbhada',$this->rentbhada,true);
		$criteria->compare('resbhadadis',$this->resbhadadis,true);
		$criteria->compare('combhadadis',$this->combhadadis,true);
		$criteria->compare('rentbhadadis',$this->rentbhadadis,true);
		$criteria->compare('resbhadaothdis',$this->resbhadaothdis,true);
		$criteria->compare('combhadaothdis',$this->combhadaothdis,true);
		$criteria->compare('rentbhadaothdis',$this->rentbhadaothdis,true);
		$criteria->compare('resbhada12kdis',$this->resbhada12kdis,true);
		$criteria->compare('combhada12kdis',$this->combhada12kdis,true);
		$criteria->compare('rentbhada12kdis',$this->rentbhada12kdis,true);
		$criteria->compare('respttax',$this->respttax,true);
		$criteria->compare('compttax',$this->compttax,true);
		$criteria->compare('rentpttax',$this->rentpttax,true);
		$criteria->compare('resptselfdis',$this->resptselfdis,true);
		$criteria->compare('comptselfdis',$this->comptselfdis,true);
		$criteria->compare('rentptselfdis',$this->rentptselfdis,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}