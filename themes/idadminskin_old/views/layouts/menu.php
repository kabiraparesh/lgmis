<?php

//$this->widget('ext.IDAdminSkinMenu.IDAdminSkinMenu', array(
//    'activateParents' => true,
//    'items' => array(
//        array('label' => 'Home', 'url' => array('/site/index'), 'items' => array(
//                array('label' => 'About', 'url' => array('/site/page', 'view' => 'about')),
//            )
//        ),
//        array('label' => 'Contact', 'url' => array('/site/contact')),
//        array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
//        array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
//    ),
//));
?>

<?php
    $propertytaxajax = '
        $("#dialog").html("'. Yii::t('application','Property Tax generated successfuly for financial year {fyear}.', array('{fyear}'=>Yii::app()->session['ccfyear']->fyear)) .'");
        $("#dialog").dialog("option", "title", "'. Yii::t('application','Generate Property Tax') .'");
        $("#dialog").dialog("option", "height", "100");
        $("#dialog").dialog("option", "width", "300");
        $("#dialog").dialog("open"); 
        return false;
    ';
?>

<?php
$this->widget('ext.IDAdminSkinMenu.IDAdminSkinMenu', array(
    'activateParents' => true,
    'items' => array(
        array('label' => Yii::t('application', 'Property'), 'url' => array('ptmaster/admin'), 'active'=>(Yii::app()->controller->id == 'ptmaster' || (Yii::app()->controller->id == 'fddemandreceipt' && Yii::app()->controller->action->id == 'admin') ), 'items' => array(
                array('label' => Yii::t('application', 'Ptmasters'), 'url' => array('ptmaster/admin')),
                array('label' => Yii::t('application', 'Create'), 'url' => array('ptmaster/create', 'isAjaxRequest' => 1), 'active'=>Yii::app()->controller->id == 'ptmaster' && Yii::app()->controller->action->id == 'create'),
                array('label' => Yii::t('application', 'Update'), 'url' => array('ptmaster/update', 'id' => isset($_REQUEST['id']) ? $_REQUEST['id'] : 0, 'isAjaxRequest' => 1), 'active'=>Yii::app()->controller->id == 'ptmaster' && Yii::app()->controller->action->id == 'update', 'visible'=>Yii::app()->controller->id == 'ptmaster' && Yii::app()->controller->action->id == 'update'),
                array('label' => Yii::t('application', 'Fddemandreceipt'), 'url' => array('fddemandreceipt/admin')),
            )
        ),
        array('label' => Yii::t('application', 'Central Configuration'), 'url' => array('#'), 'items' => array(
                array('label' => Yii::t('application', 'Cczones'), 'url' => array('cczone/admin')),
                array('label' => Yii::t('application', 'Ccwards'), 'url' => array('ccward/admin')),
                array('label' => Yii::t('application', 'Cccolonys'), 'url' => array('cccolony/admin')),
            )
        ),
        array('label' => Yii::t('application', 'Property Tax'), 'url' => array('ptrange/admin'), 'items' => array(
                array('label' => Yii::t('application', 'Ptranges'), 'url' => array('ptrange/admin')),
                array('label' => Yii::t('application', 'Ptpropertyons'), 'url' => array('ptpropertyon/admin')),
                array('label' => Yii::t('application', 'Ptbhadarates'), 'url' => array('ptbhadarate/admin')),
                array('label' => Yii::t('application', 'Pttaxrates'), 'url' => array('pttaxrate/admin')),
                array('label' => Yii::t('application', 'Ptservicetaxes'), 'url' => array('ptservicetax/admin')),
                array('label' => Yii::t('application', 'Ptexsumptors'), 'url' => array('ptexsumptor/admin')),
                array('label' => Yii::t('application', 'Generate Property Tax'), 'url' => array(''), 'linkOptions' => array('onclick' => "". $propertytaxajax . "")),
            )
        ),
        array('label' => Yii::t('application', 'Login'), 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
        array('label' => Yii::t('application', 'Logout') . ' (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
    ),
));
?>
