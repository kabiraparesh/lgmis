<?php

/**
 * This is the model class for table "{{bpapplication}}".
 *
 * The followings are the available columns in table '{{bpapplication}}':
 * @property string $idbpapplication
 * @property string $applicantname
 * @property string $applicantaddress
 * @property string $plotstatus
 * @property string $idbpusagetype
 * @property string $idnewbpusagetype
 * @property string $newconstructionarea
 * @property string $groundfloorarea
 * @property string $firstfloorarea
 * @property string $secondfloorarea
 * @property string $abovethirdbasement
 * @property integer $earthqcertificate
 * @property integer $registrycopy
 * @property integer $khasaramap
 * @property integer $blueprint
 * @property string $applicationdate
 * @property string $caseno
 * @property string $otherdetails
 * @property string $idccfyear
 * @property string $idccstatus
 * @property string $permissiondate
 *
 * The followings are the available model relations:
 * @property Ccfyear $idccfyear0
 * @property Bpusagetype $idnewbpusagetype0
 * @property Ccstatus $idccstatus0
 * @property Bpusagetype $idbpusagetype0
 */
class Bpapplication extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Bpapplication the static model class
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
		return '{{bpapplication}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('applicantname, plotstatus, abovethirdbasement, caseno, otherdetails, permissiondate', 'required'),
			array('earthqcertificate, registrycopy, khasaramap, blueprint', 'numerical', 'integerOnly'=>true),
			array('applicantname, applicantaddress, plotstatus, abovethirdbasement, otherdetails', 'length', 'max'=>100),
			array('idbpusagetype, idnewbpusagetype, caseno, idccfyear, idccstatus', 'length', 'max'=>10),
			array('newconstructionarea, groundfloorarea, firstfloorarea, secondfloorarea', 'length', 'max'=>15),
			array('applicationdate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idbpapplication, applicantname, applicantaddress, plotstatus, idbpusagetype, idnewbpusagetype, newconstructionarea, groundfloorarea, firstfloorarea, secondfloorarea, abovethirdbasement, earthqcertificate, registrycopy, khasaramap, blueprint, applicationdate, caseno, otherdetails, idccfyear, idccstatus, permissiondate', 'safe', 'on'=>'search'),
                        array('idbpusagetype, idnewbpusagetype, idccfyear, idccstatus', 'validatefkeys'),
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
			'idnewbpusagetype0' => array(self::BELONGS_TO, 'Bpusagetype', 'idnewbpusagetype'),
			'idccstatus0' => array(self::BELONGS_TO, 'Ccstatus', 'idccstatus'),
			'idbpusagetype0' => array(self::BELONGS_TO, 'Bpusagetype', 'idbpusagetype'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idbpapplication' => Yii::t('application', 'Idbpapplication'),
			'applicantname' => Yii::t('application', 'Applicantname'),
			'applicantaddress' => Yii::t('application', 'Applicantaddress'),
			'plotstatus' => Yii::t('application', 'Plotstatus'),
			'idbpusagetype' => Yii::t('application', 'Idbpusagetype'),
			'idnewbpusagetype' => Yii::t('application', 'Idnewbpusagetype'),
			'newconstructionarea' => Yii::t('application', 'Newconstructionarea'),
			'groundfloorarea' => Yii::t('application', 'Groundfloorarea'),
			'firstfloorarea' => Yii::t('application', 'Firstfloorarea'),
			'secondfloorarea' => Yii::t('application', 'Secondfloorarea'),
			'abovethirdbasement' => Yii::t('application', 'Abovethirdbasement'),
			'earthqcertificate' => Yii::t('application', 'Earthqcertificate'),
			'registrycopy' => Yii::t('application', 'Registrycopy'),
			'khasaramap' => Yii::t('application', 'Khasaramap'),
			'blueprint' => Yii::t('application', 'Blueprint'),
			'applicationdate' => Yii::t('application', 'Applicationdate'),
			'caseno' => Yii::t('application', 'Caseno'),
			'otherdetails' => Yii::t('application', 'Otherdetails'),
			'idccfyear' => Yii::t('application', 'Idccfyear'),
			'idccstatus' => Yii::t('application', 'Idccstatus'),
			'permissiondate' => Yii::t('application', 'Permissiondate'),
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

		$criteria->compare('idbpapplication',$this->idbpapplication,true);
		$criteria->compare('applicantname',$this->applicantname,true);
		$criteria->compare('applicantaddress',$this->applicantaddress,true);
		$criteria->compare('plotstatus',$this->plotstatus,true);
		$criteria->compare('idbpusagetype',$this->idbpusagetype,true);
		$criteria->compare('idnewbpusagetype',$this->idnewbpusagetype,true);
		$criteria->compare('newconstructionarea',$this->newconstructionarea,true);
		$criteria->compare('groundfloorarea',$this->groundfloorarea,true);
		$criteria->compare('firstfloorarea',$this->firstfloorarea,true);
		$criteria->compare('secondfloorarea',$this->secondfloorarea,true);
		$criteria->compare('abovethirdbasement',$this->abovethirdbasement,true);
		$criteria->compare('earthqcertificate',$this->earthqcertificate);
		$criteria->compare('registrycopy',$this->registrycopy);
		$criteria->compare('khasaramap',$this->khasaramap);
		$criteria->compare('blueprint',$this->blueprint);
		$criteria->compare('applicationdate',$this->applicationdate,true);
		$criteria->compare('caseno',$this->caseno,true);
		$criteria->compare('otherdetails',$this->otherdetails,true);
		$criteria->compare('idccfyear',$this->idccfyear,true);
		$criteria->compare('idccstatus',$this->idccstatus,true);
		$criteria->compare('permissiondate',$this->permissiondate,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}