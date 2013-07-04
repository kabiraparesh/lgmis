<?php
if (Yii::app()->request->isAjaxRequest) {
//    Yii::app()->clientscript->scriptMap['jquery.js'] = false;
//    Yii::app()->clientscript->scriptMap['jquery-ui.min.js'] = false;
}

?>
<script>
    $(document).ready(function () {
        $( "input:submit").button();
        $( "input:button").button();
    });
</script>

<style>
    .ui-multiselect-checkboxes label{
        width: 100%;
    }
    .ui-multiselect-checkboxes span{
        padding-left: 7px;
        vertical-align: top;
    }
    #area-grid table.items {
        table-layout: fixed;
        width: 100%;
/*        width: 15px;*/
/*        width: auto !important;*/
    }    
    #area-grid label{
        width: 120px;
        font-weight: bold;
    }
    #area-grid  table.items th {
        word-wrap: break-word;
        vertical-align: top;
/*        width: 20px !important;*/
    }
    #area-grid table.items td {
        text-align: center;
        height: 40px;
/*        width: 20px !important;*/
    }
    #property-details tr{
        vertical-align: top;
    }
    #property-details label{
        width: 100%;
        display: block;
        font-weight: bold;
    }
</style>


<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ptmaster-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php  echo Yii::t('application', 'Fields with <span class="required">*</span> are required.');?></p>

	<?php echo $form->errorSummary($model); ?>
        <!--  start step-holder -->
        <br/><br/>
        <div id="step-holder">
            <div class="step-no">1</div>
            <div class="step-dark-left"><?php echo Yii::t('application', 'Property Details'); ?></div>
            <div class="clear"></div>
        </div>
        <!--  end step-holder -->

        <table id="property-details" cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td style="width: 33%">
                    <div class="row">
                            <?php echo $form->labelEx($model,'idccward'); ?>		
                            <?php echo $form->textField($model,'idccward',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#ptmaster-form").find(\'#Ptmaster_idccward\').val()',), 'url'=>CController::createUrl('ccward/jsonmessage'), 'success'=>'function(data){js:$("#ptmaster-form").find(\'#Ptmaster_idcccolony\').val(\'\'); $(\'#' . ucfirst(CHtml::activeId($model,'idcccolony')) . '_msg\').text(\' - \'); $(\'#' . ucfirst(CHtml::activeId($model,'idccward')) . '_msg\').text(data.message);}'))); ?>
                            <span id="<?php echo ucfirst(CHtml::activeId($model,'idccward')); ?>_msg">
                                <?php echo !isset($model->idccward0->wardname) || $model->isNewRecord ? "-" : $model->idccward0->wardname; ?>
                            </span>
                            <?php
                                $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                                echo CHtml::ajaxLink(
                                        $imghtml, 
                                        array('ccward/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                                        array(
                                            "data" => array(
                                                "isAjaxRequest" => 1,
                                            ),
                                            'success' => 'function(data){
                                                    window.cid = "ptmaster";
                                                    window.eid = "Ptmaster_idccward";
                                                    window.url = "'. CController::createUrl('ccward/jsonmessage').'";
                                                    $("#dialog-popup-select").html(data);
                                                    $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Ccwards') .'");
                                                    $("#dialog-popup-select").dialog("open"); 

                                                    return false;
                                                }'
                                ) 
                                );
                                ?>
                            <?php echo $form->error($model,'idccward'); ?>
                    </div>
                </td>
                <td style="width: 33%">        
                    <div class="row">
                            <?php echo $form->labelEx($model,'idcccolony'); ?>		
                            <?php echo $form->textField($model,'idcccolony',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#ptmaster-form").find(\'#Ptmaster_idcccolony\').val()','idccward'=>'js:$("#ptmaster-form").find(\'#Ptmaster_idccward\').val()',), 'url'=>CController::createUrl('ptmaster/jsonmessageCccolony'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idcccolony')) . '_msg\').text(data.message);}'))); ?>
                            <span id="<?php echo ucfirst(CHtml::activeId($model,'idcccolony')); ?>_msg">
                                <?php echo !isset($model->idcccolony0->colonyname) || $model->isNewRecord ? "-" : $model->idcccolony0->colonyname; ?>
                            </span>
                            <?php
                                $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                                echo CHtml::ajaxLink(
                                        $imghtml, 
                                        array('cccolony/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                                        array(
                                            "data" => array(
                                                "isAjaxRequest" => 1,
                                                'idccward'=>'js:$("#ptmaster-form").find(\'#Ptmaster_idccward\').val()',
                                             ),
                                            'success' => 'function(data){
                                                    window.cid = "ptmaster";
                                                    window.eid = "Ptmaster_idcccolony";
                                                    window.url = "'. CController::createUrl('cccolony/jsonmessage').'";
                                                    $("#dialog-popup-select").html(data);
                                                    $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Cccolonies') .'");
                                                    $("#dialog-popup-select").dialog("open"); 

                                                    return false;
                                                }'
                                ) 
                                );
                                ?>
                            <?php echo $form->error($model,'idcccolony'); ?>
                    </div>                            
                </td>
                <td style="width: 34%">
                    <div class="row">
                            <?php echo $form->labelEx($model,'idptrange'); ?>		
                            <?php echo $form->textField($model,'idptrange',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#ptmaster-form").find(\'#Ptmaster_idptrange\').val()',), 'url'=>CController::createUrl('ptrange/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idptrange')) . '_msg\').text(data.message);}'))); ?>
                            <span id="<?php echo ucfirst(CHtml::activeId($model,'idptrange')); ?>_msg">
                                <?php echo !isset($model->idptrange0->rangeno) || $model->isNewRecord ? "-" : $model->idptrange0->rangeno; ?>
                            </span>
                            <?php
                                $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                                echo CHtml::ajaxLink(
                                        $imghtml, 
                                        array('ptrange/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                                        array(
                                            "data" => array(
                                                "isAjaxRequest" => 1,
                                            ),
                                            'success' => 'function(data){
                                                    window.cid = "ptmaster";
                                                    window.eid = "Ptmaster_idptrange";
                                                    window.url = "'. CController::createUrl('ptrange/jsonmessage').'";
                                                    $("#dialog-popup-select").html(data);
                                                    $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Ptranges') .'");
                                                    $("#dialog-popup-select").dialog("open"); 

                                                    return false;
                                                }'
                                ) 
                                );
                                ?>
                            <?php echo $form->error($model,'idptrange'); ?>
                    </div>                    
                </td>
            </tr>
            <tr>
                <td style="width: 33%">
                    <div class="row">
                            <?php echo $form->labelEx($model,'idptpropertyon'); ?>		
                            <?php echo $form->textField($model,'idptpropertyon',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#ptmaster-form").find(\'#Ptmaster_idptpropertyon\').val()',), 'url'=>CController::createUrl('ptpropertyon/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idptpropertyon')) . '_msg\').text(data.message);}'))); ?>
                            <span id="<?php echo ucfirst(CHtml::activeId($model,'idptpropertyon')); ?>_msg">
                                <?php echo !isset($model->idptpropertyon0->propertyon) || $model->isNewRecord ? "-" : $model->idptpropertyon0->propertyon; ?>
                            </span>
                            <?php
                                $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                                echo CHtml::ajaxLink(
                                        $imghtml, 
                                        array('ptpropertyon/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                                        array(
                                            "data" => array(
                                                "isAjaxRequest" => 1,
                                            ),
                                            'success' => 'function(data){
                                                    window.cid = "ptmaster";
                                                    window.eid = "Ptmaster_idptpropertyon";
                                                    window.url = "'. CController::createUrl('ptpropertyon/jsonmessage').'";
                                                    $("#dialog-popup-select").html(data);
                                                    $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Ptpropertyons') .'");
                                                    $("#dialog-popup-select").dialog("open"); 

                                                    return false;
                                                }'
                                ) 
                                );
                                ?>
                            <?php echo $form->error($model,'idptpropertyon'); ?>
                    </div>                    
                </td>
                <td style="width: 33%">
                    <div class="row">
                            <?php echo $form->labelEx($model,'idpttype'); ?>		
                            <?php echo $form->textField($model,'idpttype',array('size'=>10,'maxlength'=>10,'ajax'=>array('type'=>'POST', 'dataType'=>'json', 'data'=>array('cid'=>'js:$("#ptmaster-form").find(\'#Ptmaster_idpttype\').val()',), 'url'=>CController::createUrl('pttype/jsonmessage'), 'success'=>'function(data){$(\'#' . ucfirst(CHtml::activeId($model,'idpttype')) . '_msg\').text(data.message);}'))); ?>
                            <span id="<?php echo ucfirst(CHtml::activeId($model,'idpttype')); ?>_msg">
                                <?php echo !isset($model->idpttype0->type) || $model->isNewRecord ? "-" : $model->idpttype0->type; ?>
                            </span>
                            <?php
                                $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/tooltip.png');
                                echo CHtml::ajaxLink(
                                        $imghtml, 
                                        array('pttype/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                                        array(
                                            "data" => array(
                                                "isAjaxRequest" => 1,
                                            ),
                                            'success' => 'function(data){
                                                    window.cid = "ptmaster";
                                                    window.eid = "Ptmaster_idpttype";
                                                    window.url = "'. CController::createUrl('pttype/jsonmessage').'";
                                                    $("#dialog-popup-select").html(data);
                                                    $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Pttypes') .'");
                                                    $("#dialog-popup-select").dialog("open"); 

                                                    return false;
                                                }'
                                ) 
                                );
                                ?>
                            <?php echo $form->error($model,'idpttype'); ?>
                    </div>                     
                </td>
                <td style="width: 34%">
                </td>
            </tr>
            <tr>
                <td style="width: 33%">
                    <div class="row">
                            <?php echo $form->labelEx($model,'caseno'); ?>		
                            <?php echo $form->textField($model,'caseno',array('size'=>10,'maxlength'=>10)); ?>
                            <?php echo $form->error($model,'caseno'); ?>
                    </div>                    
                </td>
                <td style="width: 33%">
                    <div class="row">
                            <?php echo $form->labelEx($model,'ledgerno'); ?>		
                            <?php echo $form->textField($model,'ledgerno',array('size'=>10,'maxlength'=>45)); ?>
                            <?php echo $form->error($model,'ledgerno'); ?>
                    </div>                    
                </td>
                <td style="width: 34%">
                    
                </td>
            </tr>
            <tr>
                <td style="width: 33%">
	<div class="row">
		<?php echo $form->labelEx($model,'ownername'); ?>		
                <?php echo $form->textField($model,'ownername',array('size'=>20,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'ownername'); ?>
	</div>
                </td>
                <td style="width: 33%">
	<div class="row">
		<?php echo $form->labelEx($model,'fathername'); ?>		
                <?php echo $form->textField($model,'fathername',array('size'=>20,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'fathername'); ?>
	</div>
                </td>
                <td style="width: 34%">
	<div class="row">
		<?php echo $form->labelEx($model,'owneraddress'); ?>		
                <?php echo $form->textField($model,'owneraddress',array('size'=>20,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'owneraddress'); ?>
	</div>                    
                </td>
            </tr>
            <tr>
                <td style="width: 33%">
        
                    <div class="row">
                            <?php echo $form->labelEx($model,'propertyno'); ?>		
                            <?php echo $form->textField($model,'propertyno',array('size'=>10,'maxlength'=>45)); ?>
                            <?php echo $form->error($model,'propertyno'); ?>
                    </div>                    
                </td>
                <td style="width: 33%">
	<div class="row">
		<?php echo $form->labelEx($model,'propertyaddress'); ?>		
                <?php echo $form->textField($model,'propertyaddress',array('size'=>20,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'propertyaddress'); ?>
                <?php
//                    $imghtml = CHtml::image(Yii::app()->request->baseUrl . '/images/copy.png');
//                    echo CHtml::ajaxLink(
//                            $imghtml, 
//                            array('ccward/popupview'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
//                            array(
//                                "data" => array(
//                                    "isAjaxRequest" => 1,
//                                ),
//                                'success' => 'function(data){
//                                        window.cid = "cccolony";
//                                        window.eid = "Cccolony_idccward";
//                                        window.url = "'. CController::createUrl('ccward/jsonmessage').'";
//                                        $("#dialog-popup-select").html(data);
//                                        $("#dialog-popup-select").dialog("option", "title", "'. Yii::t('application', 'Ccwards') .'");
//                                        $("#dialog-popup-select").dialog("open"); 
//           
//                                        return false;
//                                    }'
//                    ) 
//                    );
                
$this->widget('zii.widgets.jui.CJuiButton', array(
    'buttonType'=>'button',
    'name'=>'btnClick',
    'caption'=>Yii::t('application', 'Copy Address'),
    'options'=>array('icons'=>'js:{primary:"ui-icon-copy"}', 'style'=>'padding:0px'),
    'onclick'=>'js:function(){$("#Ptmaster_propertyaddress").val($("#Ptmaster_owneraddress").val()); return false;}',
));                
                
                
                    ?>
            
	</div>
                    
                </td>
                <td style="width: 34%">
	<div class="row">
		<?php echo $form->labelEx($model,'constyear'); ?>		
                <?php echo $form->textField($model,'constyear',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'constyear'); ?>
	</div>                    
                </td>
            </tr>
            <tr>
                <td style="width: 33%">
                    <table cellspacing="0" cellpadding="0">
                        <tr>
                            <td style="width: 50%;">
                                <div class="row">
                                        <?php echo $form->labelEx($model,'propertytax'); ?>		
                                        <?php echo $form->checkBox($model,'propertytax'); ?>
                                        <?php echo $form->error($model,'propertytax'); ?>
                                </div>                                
                            </td>
                            <td style="width: 50%;">
                                <div class="row">
                                        <?php echo $form->labelEx($model,'watertax'); ?>		
                                        <?php echo $form->checkBox($model,'watertax'); ?>
                                        <?php echo $form->error($model,'watertax'); ?>
                                </div>                                
                            </td>
                        </tr>
                        <tr>
                        	<td>
                                <div class="row">
                                		<?php echo $form->labelEx($model, "newproperty"); ?>
                                		<?php echo $form->checkBox($model, "newproperty"); ?>
                                </div>                                
                        	</td>
                        	<td>
                        		<!-- If needed, add Other Parameter here... -->
                        	</td>
                        </tr>
                    </table>
                </td>
                <td style="width: 33%">
	<div class="row">
                <?php
                    $criteria = new CDbCriteria(array(
                        'condition' => 'idccfyear = :idccfyear',
                        'params' => array(':idccfyear' => Yii::app()->session['ccfyear']->idccfyear)
                    ));
                    $ptservicetaxs = array();
                    $ptservicetaxs[0] = Yii::t('application', 'None');
                    foreach(Ptservicetax::model()->findAll($criteria) as $ptservicetax){
                        $ptservicetaxs[$ptservicetax->idptservicetax] = "$ptservicetax->servicetype ($ptservicetax->taxrate%)";
                    } 
                ?>
		<?php echo $form->labelEx($model,'idptservicetax'); ?>
                <?php echo $form->dropDownList($model, 'idptservicetax', $ptservicetaxs, $htmlOptions=array('style'=>'width:210px;')); ?>
                <?php //echo $form->checkBox($model,'idptservicetax'); ?>
		<?php //echo $form->error($model,'idptservicetax'); ?>
	</div>
                    
                </td>
                <td style="width: 34%">
                    <div class="row">
                        <?php echo $form->labelEx($model,'idptexsumtors'); ?>
                        <?php echo $form->hiddenField($model, 'idptexsumtors'); ?>
                        <?php //echo $form->textArea($model,'idptexsumtors',array('rows'=>6, 'cols'=>50)); ?>
                        <?php //echo $form->error($model,'idptexsumtors'); ?>
                        
                        <?php                    
                            $ptexsumptors = Ptexsumptor::model()->findAll();

                            // format models as $key=>$value with listData
                            $list = CHtml::listData($ptexsumptors, 
                                                'idptexsumptor', 'type');
                        ?>
                        <?php                    
                            $this->widget('ext.EchMultiSelect.EchMultiSelect', array(
                                'name'=>'idptexsumtors[]',
//                                'model'=>$model,
//                                'dropDownAttribute'=>'idptexsumtors',
                                'data'=>$list,
                                'value'=>  explode(",", $model->idptexsumtors),
                                'dropDownHtmlOptions'=> array(
                                    'class'=>'span-10',
                                    'id'=>'idptexsumtors',  
                                ),
                                'theme' => 'dark-hive',
                                'options' => array( 
                                    //'header'=> Yii::t('application','Choose an Option!'),
                                    'minWidth'=>350,
                                    'position'=>array('my'=>'left bottom', 'at'=>'left top'),
                                    'filter'=>true,
                                    'style'=>'width:100%;',
                                ),                        
                                'filterOptions'=> array(
                                    'width'=>150,
                                ),                        
                            ));            
                        ?>
                    </div>                    
                </td>
            </tr>
        </table>
        
	<div class="row">
                <?php echo $form->hiddenField($model,'transferbreakup'); ?>
                <?php echo $form->hiddenField($model,'trashed'); ?>
	</div>
        
	<div class="row">
		<?php //echo $form->labelEx($model,'propertydetails'); ?>		
                <?php //echo $form->textArea($model,'propertydetails',array('rows'=>6, 'cols'=>50)); ?>
		<?php //echo $form->error($model,'propertydetails'); ?>
	</div>

        <!-- Grid -->
    <?php
//    echo CHtml::activeTextField($data['aresidential']);
    $columns = array(
        array(
            'name' => 'id',
            'value' => 'CHtml::hiddenField("propertydetails[" . $data[\'id\'] . "][id]", $data[\'id\'], array(\'width\'=>20,\'size\'=>5,\'maxlength\'=>30,\'style\'=>\'text-align:right\'))',
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
            'value' => 'CHtml::textField("propertydetails[" . $data[\'id\'] . "][aresidential]", $data[\'aresidential\'], array(\'width\'=>20,\'size\'=>5,\'maxlength\'=>30,\'style\'=>\'text-align:right\'))',
            'type' => 'raw',
        ),
        array(
            'header' => Yii::t('application', 'Acommercial'),
            'name' => 'acommercial',
            'value' => 'CHtml::textField("propertydetails[" . $data[\'id\'] . "][acommercial]", $data[\'acommercial\'], array(\'width\'=>20,\'size\'=>5,\'maxlength\'=>30,\'style\'=>\'text-align:right\'))',
            'type' => 'raw',
        ),
        array(
            'header' => Yii::t('application', 'Arental'),
            'name' => 'arental',
            'value' => 'CHtml::textField("propertydetails[" . $data[\'id\'] . "][arental]", $data[\'arental\'], array(\'width\'=>20,\'size\'=>5,\'maxlength\'=>30,\'style\'=>\'text-align:right\'))',
            'type' => 'raw',
        ),
        array(
            'header' => Yii::t('application', 'Bresidential'),
            'name' => 'bresidential',
            'value' => 'CHtml::textField("propertydetails[" . $data[\'id\'] . "][bresidential]", $data[\'bresidential\'], array(\'width\'=>20,\'size\'=>5,\'maxlength\'=>30,\'style\'=>\'text-align:right\'))',
            'type' => 'raw',
        ),
        array(
            'header' => Yii::t('application', 'Bcommercial'),
            'name' => 'bcommercial',
            'value' => 'CHtml::textField("propertydetails[" . $data[\'id\'] . "][bcommercial]", $data[\'bcommercial\'], array(\'width\'=>20,\'size\'=>5,\'maxlength\'=>30,\'style\'=>\'text-align:right\'))',
            'type' => 'raw',
        ),
        array(
            'header' => Yii::t('application', 'Brental'),
            'name' => 'brental',
            'value' => 'CHtml::textField("propertydetails[" . $data[\'id\'] . "][brental]", $data[\'brental\'], array(\'width\'=>20,\'size\'=>5,\'maxlength\'=>30,\'style\'=>\'text-align:right\'))',
            'type' => 'raw',
        ),
        array(
            'header' => Yii::t('application', 'Cresidential'),
            'name' => 'cresidential',
            'value' => 'CHtml::textField("propertydetails[" . $data[\'id\'] . "][cresidential]", $data[\'cresidential\'], array(\'width\'=>20,\'size\'=>5,\'maxlength\'=>30,\'style\'=>\'text-align:right\'))',
            'type' => 'raw',
        ),
        array(
            'header' => Yii::t('application', 'Ccommercial'),
            'name' => 'ccommercial',
            'value' => 'CHtml::textField("propertydetails[" . $data[\'id\'] . "][ccommercial]", $data[\'ccommercial\'], array(\'width\'=>20,\'size\'=>5,\'maxlength\'=>30,\'style\'=>\'text-align:right\'))',
            'type' => 'raw',
        ),
        array(
            'header' => Yii::t('application', 'Crental'),
            'name' => 'crental',
            'value' => 'CHtml::textField("propertydetails[" . $data[\'id\'] . "][crental]", $data[\'crental\'], array(\'width\'=>20,\'size\'=>5,\'maxlength\'=>30,\'style\'=>\'text-align:right\'))',
            'type' => 'raw',
        ),
        array(
            'header' => Yii::t('application', 'Dresidential'),
            'name' => 'dresidential',
            'value' => 'CHtml::textField("propertydetails[" . $data[\'id\'] . "][dresidential]", $data[\'dresidential\'], array(\'width\'=>20,\'size\'=>5,\'maxlength\'=>30,\'style\'=>\'text-align:right\'))',
            'type' => 'raw',
        ),
        array(
            'header' => Yii::t('application', 'Dcommercial'),
            'name' => 'dcommercial',
            'value' => 'CHtml::textField("propertydetails[" . $data[\'id\'] . "][dcommercial]", $data[\'dcommercial\'], array(\'width\'=>20,\'size\'=>5,\'maxlength\'=>30,\'style\'=>\'text-align:right\'))',
            'type' => 'raw',
        ),
        array(
            'header' => Yii::t('application', 'Drental'),
            'name' => 'drental',
            'value' => 'CHtml::textField("propertydetails[" . $data[\'id\'] . "][drental]", $data[\'drental\'], array(\'width\'=>20,\'size\'=>5,\'maxlength\'=>30,\'style\'=>\'text-align:right\'))',
            'type' => 'raw',
        ),
        array(
            'header' => Yii::t('application', 'Eresidential'),
            'name' => 'eresidential',
            'value' => 'CHtml::textField("propertydetails[" . $data[\'id\'] . "][eresidential]", $data[\'eresidential\'], array(\'width\'=>20,\'size\'=>5,\'maxlength\'=>30,\'style\'=>\'text-align:right\'))',
            'type' => 'raw',
        ),
        array(
            'header' => Yii::t('application', 'Ecommercial'),
            'name' => 'ecommercial',
            'value' => 'CHtml::textField("propertydetails[" . $data[\'id\'] . "][ecommercial]", $data[\'ecommercial\'], array(\'width\'=>20,\'size\'=>5,\'maxlength\'=>30,\'style\'=>\'text-align:right\'))',
            'type' => 'raw',
        ),
        array(
            'header' => Yii::t('application', 'Erental'),
            'name' => 'erental',
            'value' => 'CHtml::textField("propertydetails[" . $data[\'id\'] . "][erental]", $data[\'erental\'], array(\'width\'=>20,\'size\'=>5,\'maxlength\'=>30,\'style\'=>\'text-align:right\'))',
            'type' => 'raw',
        ),
    );
    ?>
      
<!--  start step-holder -->
<br/>
<div id="step-holder">
    <div class="step-no">2</div>
    <div class="step-dark-left"><?php echo Yii::t('application', 'Floor Details'); ?></div>
    <div class="clear"></div>
</div>
<!--  end step-holder -->
        
    <?php
    $this->widget('ext.eziiui.widgets.grid.CGridViewUI', array(
        'id' => 'area-grid',
        'dataProvider' => $dataProvider,
        'columns' => $columns,
        'enablePagination' => false,
        'summaryText' => '',
//        'filter' => $filtersForm,
    ));
    ?>
        
        <!-- Grid End Here... -->
        
        
        <!--  start step-holder -->
        <br/><br/>
        <div id="step-holder">
            <div class="step-no">3</div>
            <div class="step-dark-left"><?php echo Yii::t('application', 'Old Transaction'); ?></div>
            <div class="clear"></div>
        </div>
        <!--  end step-holder -->
        
        <table id="property-details" cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td style="width: 33%">
                    <div class="row">
                            <?php echo $form->labelEx($model,'oldpropertytax'); ?>		
                            <?php echo $form->textField($model,'oldpropertytax'); ?>
                            <?php echo $form->error($model,'oldpropertytax'); ?>
                    </div>
                </td>
                <td style="width: 33%">
                    <div class="row">
                            <?php echo $form->labelEx($model,'oldservicetax'); ?>		
                            <?php echo $form->textField($model,'oldservicetax'); ?>
                            <?php echo $form->error($model,'oldservicetax'); ?>
                    </div>
                </td>
                <td style="width: 34%">
                    <div class="row">
                            <?php echo $form->labelEx($model,'oldminsamekittax'); ?>		
                            <?php echo $form->textField($model,'oldminsamekittax'); ?>
                            <?php echo $form->error($model,'oldminsamekittax'); ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 33%">
                    <div class="row">
                            <?php echo $form->labelEx($model,'oldsamekittax'); ?>		
                            <?php echo $form->textField($model,'oldsamekittax'); ?>
                            <?php echo $form->error($model,'oldsamekittax'); ?>
                    </div>
                </td>
                <td style="width: 33%">
                    <div class="row">
                            <?php echo $form->labelEx($model,'oldwaterpttax'); ?>		
                            <?php echo $form->textField($model,'oldwaterpttax'); ?>
                            <?php echo $form->error($model,'oldwaterpttax'); ?>
                    </div>
                </td>
                <td style="width: 34%">
                    <div class="row">
                            <?php echo $form->labelEx($model,'oldeducess'); ?>		
                            <?php echo $form->textField($model,'oldeducess'); ?>
                            <?php echo $form->error($model,'oldeducess'); ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 33%">
                    <div class="row">
                            <?php echo $form->labelEx($model,'oldsubcess1'); ?>		
                            <?php echo $form->textField($model,'oldsubcess1'); ?>
                            <?php echo $form->error($model,'oldsubcess1'); ?>
                    </div>
                </td>
                <td style="width: 33%">
                    <div class="row">
                            <?php echo $form->labelEx($model,'oldsubcess2'); ?>		
                            <?php echo $form->textField($model,'oldsubcess2'); ?>
                            <?php echo $form->error($model,'oldsubcess2'); ?>
                    </div>
                </td>
                <td style="width: 34%">
                    <div class="row">
                            <?php echo $form->labelEx($model,'oldpttaxdiscount'); ?>		
                            <?php echo $form->textField($model,'oldpttaxdiscount'); ?>
                            <?php echo $form->error($model,'oldpttaxdiscount'); ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 33%">
                    <div class="row">
                            <?php echo $form->labelEx($model,'oldpttaxsurcharge'); ?>		
                            <?php echo $form->textField($model,'oldpttaxsurcharge'); ?>
                            <?php echo $form->error($model,'oldpttaxsurcharge'); ?>
                    </div>
                </td>
                <td style="width: 33%">
                </td>
                <td style="width: 34%">
                </td>
            </tr>
        </table>
        
        
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('application', 'Create') : Yii::t('application', 'Save')); ?>
                <input type="submit" onclick='window.open("<?php echo Yii::app()->createUrl('ptmaster/admin'); ?>", "_self");' value="<?php echo Yii::t('application', 'Cancel'); ?>"/>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
if(Yii::app()->controller->action->id == 'update'){
    $this->widget('ext.ajaxform.JAjaxForm', array(
        'formId' => 'ptmaster-form',
        'options' => array(
            'dataType' => 'json',
            'success' => 'js:function(data,statusText) { 
                        if(data.status == "Success"){                        
                            window.open("'.Yii::app()->createUrl('ptmaster/admin').'", "_self");
                        }
                        else{
                            $("#dialog-warning-msg").html("' . Yii::t('application', 'An error occurred while the form was being submitted.<br/>Please check your form data.') . '" + data.status); 
                            $("#dialog-warning").dialog("open"); 
                            return false;
                        }
            }',
        ),
    ));    
}
if(Yii::app()->controller->action->id == 'create'){
    $this->widget('ext.ajaxform.JAjaxForm', array(
        'formId' => 'ptmaster-form',
        'options' => array(
            'dataType' => 'json',
            'success' => 'js:function(data,statusText) { 
                        if(data.status == "Success"){                        
                            window.open("'.Yii::app()->createUrl('ptmaster/create').'&isAjaxRequest=1", "_self");
                            return true;
                        }
                        else{
                            $("#dialog-warning-msg").html("' . Yii::t('application', 'An error occurred while the form was being submitted.<br/>Please check your form data.') . '" + data.status); 
                            $("#dialog-warning").dialog("open"); 
                            return false;
                        }
            }',
        ),
    ));    
}
?>



<script type="text/javascript">
   
    function refreshTotal(){
        sum = 0;
        for(i=0; i<=4; i++){
            sum += parseFloat($('#propertydetails_' + i + '_aresidential').val());
        }
        $('#propertydetails_5_aresidential').val(sum);
        sum = 0;
        for(i=0; i<=4; i++){
            sum += parseFloat($('#propertydetails_' + i + '_acommercial').val());
        }
        $('#propertydetails_5_acommercial').val(sum);
        sum = 0;
        for(i=0; i<=4; i++){
            sum += parseFloat($('#propertydetails_' + i + '_arental').val());
        }
        $('#propertydetails_5_arental').val(sum);

        sum = 0;
        for(i=0; i<=4; i++){
            sum += parseFloat($('#propertydetails_' + i + '_bresidential').val());
        }
        $('#propertydetails_5_bresidential').val(sum);
        sum = 0;
        for(i=0; i<=4; i++){
            sum += parseFloat($('#propertydetails_' + i + '_bcommercial').val());
        }
        $('#propertydetails_5_bcommercial').val(sum);
        sum = 0;
        for(i=0; i<=4; i++){
            sum += parseFloat($('#propertydetails_' + i + '_brental').val());
        }
        $('#propertydetails_5_brental').val(sum);

        sum = 0;
        for(i=0; i<=4; i++){
            sum += parseFloat($('#propertydetails_' + i + '_cresidential').val());
        }
        $('#propertydetails_5_cresidential').val(sum);
        sum = 0;
        for(i=0; i<=4; i++){
            sum += parseFloat($('#propertydetails_' + i + '_ccommercial').val());
        }
        $('#propertydetails_5_ccommercial').val(sum);
        sum = 0;
        for(i=0; i<=4; i++){
            sum += parseFloat($('#propertydetails_' + i + '_crental').val());
        }
        $('#propertydetails_5_crental').val(sum);

        sum = 0;
        for(i=0; i<=4; i++){
            sum += parseFloat($('#propertydetails_' + i + '_dresidential').val());
        }
        $('#propertydetails_5_dresidential').val(sum);
        sum = 0;
        for(i=0; i<=4; i++){
            sum += parseFloat($('#propertydetails_' + i + '_dcommercial').val());
        }
        $('#propertydetails_5_dcommercial').val(sum);
        sum = 0;
        for(i=0; i<=4; i++){
            sum += parseFloat($('#propertydetails_' + i + '_drental').val());
        }
        $('#propertydetails_5_drental').val(sum);
        
        sum = 0;
        for(i=0; i<=4; i++){
            sum += parseFloat($('#propertydetails_' + i + '_eresidential').val());
        }
        $('#propertydetails_5_eresidential').val(sum);
        sum = 0;
        for(i=0; i<=4; i++){
            sum += parseFloat($('#propertydetails_' + i + '_ecommercial').val());
        }
        $('#propertydetails_5_ecommercial').val(sum);
        sum = 0;
        for(i=0; i<=4; i++){
            sum += parseFloat($('#propertydetails_' + i + '_erental').val());
        }
        $('#propertydetails_5_erental').val(sum);
    }
    
    refreshTotal();
    
    $('input[id^="propertydetails_"]').change(function() {
        refreshTotal();
    });   
    
    $('input[id^="propertydetails_5_"]').attr('readonly','readonly');


    $(document).ready(function() {
        $('input[id^="propertydetails_"]').keydown(function(event) {
            // Backspace, tab, enter, end, home, left, right,decimal(.)in number part, decimal(.) in alphabet
            // We don't support the del key in Opera because del == . == 46.
            var controlKeys = [8, 9, 13, 35, 36, 37, 39,110,190];
            // IE doesn't support indexOf
            var isControlKey = controlKeys.join(",").match(new RegExp(event.which));
            // Some browsers just don't raise events for control keys. Easy.
            // e.g. Safari backspace.
            if (!event.which || // Control keys in most browsers. e.g. Firefox tab is 0
            (49 <= event.which && event.which <= 57) || // Always 1 through 9
            (96 <= event.which && event.which <= 106) || // Always 1 through 9 from number section 
            (48 == event.which && $(this).attr("value")) || // No 0 first digit
            (96 == event.which && $(this).attr("value")) || // No 0 first digit from number section
            isControlKey) { // Opera assigns values for control keys.
                return;
            } else {
                event.preventDefault();
            }
        });

    });


</script>
