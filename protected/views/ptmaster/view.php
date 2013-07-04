<?php
$this->breadcrumbs=array(
	Yii::t('application','Ptmasters')=>array('index'),
	Yii::t('application', $model->idptmaster),
);

$this->menu=array(
//	array('label'=>Yii::t('application', 'List {title}', array('{title}'=>Yii::t('application', 'Ptmaster'))), 'url'=>array('index')),
	array('label'=>Yii::t('application', 'Create {title}', array('{title}'=>Yii::t('application', 'Ptmaster'))), 'url'=>array('create')),
	array('label'=>Yii::t('application', 'Update {title}', array('{title}'=>Yii::t('application', 'Ptmaster'))), 'url'=>array('update', 'id'=>$model->idptmaster)),
	array('label'=>Yii::t('application', 'Delete {title}', array('{title}'=>Yii::t('application', 'Ptmaster'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idptmaster),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('application', 'Manage {title}', array('{title}'=>Yii::t('application', 'Ptmaster'))), 'url'=>array('admin')),
);
?>

<style>
    #area-grid table tr td{
        text-align: center;
    }
    #area-grid table tbody tr:last-child{
        background: whitesmoke;
        font-weight: bolder;
        color: black;
    }    
    #property-grid{
        padding: 5px;
    }
    #property-grid tr, #property-grid tr th:first-line{
        text-align: justify;
    }
</style>

<h1><?php echo Yii::t('application', 'View {title}', array('{title}'=>Yii::t('application', 'Ptmaster'))) . ' #' . $model->idptmaster;?></h1>

<!--  start step-holder -->
<br/>
<div id="step-holder">
    <div class="step-no">1</div>
    <div class="step-dark-left"><?php echo Yii::t('application', 'Property Details'); ?></div>
    <div class="clear"></div>
</div>
<!--  end step-holder -->


<?php
 
 $this->widget('ext.eziiui.widgets.CDetailViewUI', array(
        'id' => 'property-grid',     
	'data'=>$model,
        'htmlOptions' => array('width'=>'100%'),
	'attributes'=>array(
		'idptmaster',
		'caseno',
//		'idccward',
//		'idpttype',
                array(
                    'label'=>Yii::t('application', 'Ccward'),
                    'value'=>$model->idccward0->wardname. ' (' .  $model->idccward . ')',
                ),            
                array(
                    'label'=>Yii::t('application', 'Pttype'),
                    'value'=>$model->idpttype0->type . ' (' .  $model->idpttype . ')',
                ),            
		'ownername',
		'owneraddress',
		'propertyno',
		'propertyaddress',
		'constyear',
                array(
                    'label'=>Yii::t('application', 'Ptpropertyon'),
                    'value'=>$model->idptpropertyon0->propertyon,
                ),            
//		'transferbreakup',
//		'trashed',
		'ledgerno',
//		'idcccolony',
//		'idptrange',
//		'idptpropertyon',
		'propertytax',
//		'idptservicetax',
//		'idptexsumtors',
//		'propertydetails',
//		'idccsex',
                array(
                    'label'=>Yii::t('application', 'Cccolony'),
                    'value'=>$model->idcccolony0->colonyname . ' (' .  $model->idcccolony . ')',
                ),            
                array(
                    'label'=>Yii::t('application', 'Ptrange'),
                    'value'=>$model->idptrange0->rangename . ' (' .  $model->idptrange . ')',
                ),            
	),
)); ?>


<!--  start step-holder -->
<br/>
<div id="step-holder">
    <div class="step-no">2</div>
    <div class="step-dark-left"><?php echo Yii::t('application', 'Floor Details'); ?></div>
    <div class="clear"></div>
</div>
<!--  end step-holder -->

    <?php
    $columns = array(
        array(
            'name' => 'id',
            'value' => '$data[\'id\']',
            'type' => 'raw',
            'headerHtmlOptions' => array('style' => 'display:none'),
            'htmlOptions' => array('style' => 'display:none'),
        ),
        array(
            'name' => 'category',
            'value' => 'CHtml::hiddenField("propertydetails[" . $data[\'id\'] . "][category]", $data[\'category\'], array(\'width\'=>20,\'size\'=>5,\'maxlength\'=>30,\'style\'=>\'text-align:right\'))',
            'type' => 'raw',
            'headerHtmlOptions' => array('style' => 'display:none'),
            'htmlOptions' => array('style' => 'display:none'),
        ),
        array(
            'header' => Yii::t('application', 'Category'),
            'name' => 'category',
            'value' => '$data[\'category\']',
            'htmlOptions' => array('style' => 'font-weight: bold;'),
        ),
        array(
            'header' => Yii::t('application', 'Aresidential'),
            'name' => 'aresidential',
            'value' => '"<span class=\'". $data[\'category\'] ."_". $data[\'id\']."\'>" . $data[\'aresidential\'] . "</span>"',
//            'value' => 'CHtml::textField("propertydetails[" . $data[\'id\'] . "][acommercial]", $data[\'acommercial\'], array(\'width\'=>20,\'size\'=>5,\'maxlength\'=>30,\'style\'=>\'text-align:right\'))',            
            'type' => 'raw',
        ),
        array(
            'header' => Yii::t('application', 'Acommercial'),
            'name' => 'acommercial',
            'value' => '$data[\'acommercial\']',
            'type' => 'raw',
        ),
        array(
            'header' => Yii::t('application', 'Arental'),
            'name' => 'arental',
            'value' => '$data[\'arental\']',
            'type' => 'raw',
        ),
        array(
            'header' => Yii::t('application', 'Bresidential'),
            'name' => 'bresidential',
            'value' => '$data[\'bresidential\']',
            'type' => 'raw',
        ),
        array(
            'header' => Yii::t('application', 'Bcommercial'),
            'name' => 'bcommercial',
            'value' => '$data[\'bcommercial\']',
            'type' => 'raw',
        ),
        array(
            'header' => Yii::t('application', 'Brental'),
            'name' => 'brental',
            'value' => '$data[\'brental\']',
            'type' => 'raw',
        ),
        array(
            'header' => Yii::t('application', 'Cresidential'),
            'name' => 'cresidential',
            'value' => '$data[\'cresidential\']',
            'type' => 'raw',
        ),
        array(
            'header' => Yii::t('application', 'Ccommercial'),
            'name' => 'ccommercial',
            'value' => '$data[\'ccommercial\']',
            'type' => 'raw',
        ),
        array(
            'header' => Yii::t('application', 'Crental'),
            'name' => 'crental',
            'value' => '$data[\'crental\']',
            'type' => 'raw',
        ),
        array(
            'header' => Yii::t('application', 'Dresidential'),
            'name' => 'dresidential',
            'value' => '$data[\'dresidential\']',
            'type' => 'raw',
        ),
        array(
            'header' => Yii::t('application', 'Dcommercial'),
            'name' => 'dcommercial',
            'value' => '$data[\'dcommercial\']',
            'type' => 'raw',
        ),
        array(
            'header' => Yii::t('application', 'Drental'),
            'name' => 'drental',
            'value' => '$data[\'drental\']',
            'type' => 'raw',
        ),
        array(
            'header' => Yii::t('application', 'Eresidential'),
            'name' => 'eresidential',
            'value' => '$data[\'eresidential\']',
            'type' => 'raw',
        ),
        array(
            'header' => Yii::t('application', 'Ecommercial'),
            'name' => 'ecommercial',
            'value' => '$data[\'ecommercial\']',
            'type' => 'raw',
        ),
        array(
            'header' => Yii::t('application', 'Erental'),
            'name' => 'erental',
            'value' => '$data[\'erental\']',
            'type' => 'raw',
        ),
    );

?>


      
       
    <?php
    $this->widget('ext.eziiui.widgets.grid.CGridViewUI', array(
        'id' => 'area-grid',
        'dataProvider' => $dataProvider,
        'columns' => $columns,
        'enablePagination' => false,
        'summaryText' => '',
    ));
    ?>
        
        <!-- Grid End Here... -->
        
