<?php
$this->breadcrumbs=array(
	Yii::t('application','Pttransactions')=>array('index'),
	Yii::t('application', $model->idpttransaction),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Pttransaction'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Pttransaction'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Pttransaction'))), 'url'=>array('update', 'id'=>$model->idpttransaction)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Pttransaction'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idpttransaction),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Pttransaction'))), 'url'=>array('admin')),
);
?>

<style>
    #pttransaction-grid tbody tr th{
        width: auto;
        text-align: justify;
    }
    #pttransaction-grid tbody tr td{
        text-align: right;
    }
    .pttransaction-total{
        background: lightgrey;
        font-weight: bolder;
        color: darkblue;
        text-decoration: underline;
    }
    .pttransaction-headers{
        background: darkblue;
        font-weight: bolder;
        color: lightgrey;
        font-size: 1.2em;
    }
</style>


<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Pttransaction'))) . ' #' . $model->idpttransaction;?></h1>

<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
        'id' => 'pttransaction-grid',     
	'data'=>$model,
        'htmlOptions' => array('width'=>'100%'),
	'attributes'=>array(
		'idpttransaction',
		'idptmaster',
//		'idccfyear',
                array(
                    'label'=>Yii::t('application', 'Ccfyear'),
                    'value'=>$model->idccfyear0->fyear,
                ),      
                array(
                    'label'=>Yii::t('application', 'Bhadarate'),
                    'value'=>'',
                    'cssClass'=>'pttransaction-headers',
                ),            
		'resbhada',
		'combhada',
		'rentbhada',
		'resbhadadis',
		'combhadadis',
		'rentbhadadis',
		'resbhadaothdis',
		'combhadaothdis',
		'rentbhadaothdis',
		'resbhada12kdis',
		'combhada12kdis',
		'rentbhada12kdis',
		'respttax',
		'compttax',
		'rentpttax',
		'resptselfdis',
		'comptselfdis',
		'rentptselfdis',
//		'propertytax',
                array(
                    'label'=>Yii::t('application', 'Grand Propertytax'),
                    'value'=>$model->propertytax,
                    'cssClass'=>'pttransaction-total',
                ),            
                array(
                    'label'=>Yii::t('application', 'Previous Propertytax'),
                    'value'=>'',
                    'cssClass'=>'pttransaction-headers',
                ),            
		'oldpropertytax',
		'oldservicetax',
		'oldminsamekittax',
		'oldsamekittax',
		'oldwaterpttax',
		'oldeducess',
		'oldsubcess1',
		'oldsubcess2',
		'oldpttaxdiscount',
		'oldpttaxsurcharge',
                array(
                    'label'=>Yii::t('application', 'Grand Old Propertytax'),
                    'value'=>$grand_oldpropertytax,
                    'cssClass'=>'pttransaction-total',
                ),            
                array(
                    'label'=>Yii::t('application', 'Current Propertytax'),
                    'value'=>'',
                    'cssClass'=>'pttransaction-headers',
                ),            
		'servicetax',
		'minsamekittax',
		'samekittax',
		'waterpttax',
		'educess',
		'subcess1',
		'subcess2',
                array(
                    'label'=>Yii::t('application', 'Grand Current Propertytax'),
                    'value'=>$grand_currentpropertytax,
                    'cssClass'=>'pttransaction-total',
                ),            
		'pttaxdiscount',
		'pttaxsurcharge',
                array(
                    'label'=>Yii::t('application', 'Final Propertytax'),
                    'value'=>$grand_oldpropertytax + $grand_currentpropertytax,
                    'cssClass'=>'pttransaction-total',
                ),            
	),
)); ?>
