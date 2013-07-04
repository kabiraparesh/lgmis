<?php
class UploadExcel extends CFormModel
{
	public $upload_file;

	public function rules()
	{
		return array(
				array('upload_file', 'file', 'allowEmpty'=>true, 'types'=>'xls','maxSize'=>10*1024*1024),
		);
	}
	
	/**
	 * Saves the name, size, type and data of the uploaded file
	 */
	public function beforeSave()
	{
// 		syslog(LOG_WARNING, 'bs1...');
// 		if($file=CUploadedFile::getInstance($this,'photo'))
// 		{
// 			$fp = fopen($file->tempName, 'r');
// 			$content = fread($fp, filesize($file->tempName));
// 			fclose($fp);
// 			$this->photo = $content;
// 		}
// 		else{
// 			if($this->isNewRecord == 1){
// 				$url = Yii::app()->controller->module->registerImage('person.png');
// 				$url = "../" . $url;
// 				$fp = fopen($url, 'r');
// 				$content = fread($fp, filesize($url));
// 				fclose($fp);
// 				// 			$content = file_get_contents($url);
// 				$this->photo = $content;
// 			}
// 		}
	
		return parent::beforeSave();
	}
	

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
				'upload_file'=>'Upload File',
		);
	}

}
?>