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
//    $propertytaxajax = '
//        $("#dialog").html("'. Yii::t('application','Property Tax generated successfuly for financial year {fyear}.', array('{fyear}'=>Yii::app()->session['ccfyear']->fyear)) .'");
//        $("#dialog").dialog("option", "title", "'. Yii::t('application','Generate Property Tax') .'");
//        $("#dialog").dialog("option", "height", "100");
//        $("#dialog").dialog("option", "width", "300");
//        $("#dialog").dialog("open"); 
//        return false;
//    ';

    
    $propertytaxajax = '
        $.ajax({
            url: "' . Yii::app()->createUrl('propertytax/generateAllBetma') . '",
            success: function(data){
                $("#dialog").html("'. Yii::t('application','Property Tax generated successfuly for financial year {fyear}.', array('{fyear}'=>Yii::app()->session['ccfyear']->fyear)) .'");
                $("#dialog").dialog("option", "title", "'. Yii::t('application','Generate Property Tax') .'");
                $("#dialog").dialog("option", "height", "100");
                $("#dialog").dialog("option", "width", "300");
                $("#dialog").dialog("open"); 
                return false;
            }
        });
        return false;        
    ';
    
?>

<?php
    $items = array(

    	array('label' => Yii::t('application', 'Configuration'), 'url' => array('#'), 'visible' => Yii::app()->user->getName() == 'admin','items' => array(
    			array('label' => Yii::t('application', 'Central Configuration'), 'url' => array('#'), 'visible' => Yii::app()->user->getName() == 'admin','items' => array(
    					array('label' => Yii::t('application', 'Cczones'), 'url' => array('/cczone/admin')),
    					array('label' => Yii::t('application', 'Ccwards'), 'url' => array('/ccward/admin'), 'active'=>!isset($_REQUEST['report']) && Yii::app()->controller->route == 'ccward/admin'),
    					array('label' => Yii::t('application', 'Cccolonys'), 'url' => array('/cccolony/admin')),
    				)
    			),
    			array('label' => Yii::t('application', 'Property Tax Configuration'), 'url' => array('/ptrange/admin'), 'visible' => Yii::app()->user->getName() == 'admin', 'items' => array(
    					array('label' => Yii::t('application', 'Ptranges'), 'url' => array('/ptrange/admin')),
    					array('label' => Yii::t('application', 'Ptpropertyons'), 'url' => array('/ptpropertyon/admin')),
    					array('label' => Yii::t('application', 'Ptbhadarates'), 'url' => array('/ptbhadarate/admin')),
    					array('label' => Yii::t('application', 'Pttaxrates'), 'url' => array('/pttaxrate/admin')),
    					array('label' => Yii::t('application', 'Ptservicetaxes'), 'url' => array('/ptservicetax/admin')),
    					array('label' => Yii::t('application', 'Ptexsumptors'), 'url' => array('/ptexsumptor/admin')),
    					array('label' => Yii::t('application', 'Generate Property Tax'), 'url' => array(''), 'linkOptions' => array('onclick' => "". $propertytaxajax . "")),
                                )
    			),
                        array('label' => Yii::t('application', 'Water Tax'), 'url' => array('/lgmisWM/wmmaster/admin'), 'items' => array(
                                   //    array('label' => Yii::t('application', 'Wmmaster'), 'url' => array('/lgmisWM/wmmaster/admin')),
                                       array('label' => Yii::t('application', 'Wmconfiguration'), 'visible' => Yii::app()->user->getName() == 'admin', 'url' => array('/lgmisWM/wmconfiguration/admin')),
                                       array('label' => Yii::t('application', 'Generate Property Tax'), 'visible' => Yii::app()->user->getName() == 'admin', 'url' => array('/lgmisWM/wmdemand/generate')),
                                 )
                         ),
                        array('label' => Yii::t('application', 'BirthDeath'), 'url' => array('/lgmisBD/bdbirthrate/admin'), 'visible' => Yii::app()->user->getName() == 'admin', 'items' => array(
                                        array('label' => Yii::t('application', 'Birthrate'), 'url' => array('/lgmisBD/bdbirthrate/admin')),
                                        array('label' => Yii::t('application', 'Deathrate'), 'visible' , 'url' => array('/lgmisBD/bddeathrate/admin')),
                                   )
                           ),
    			array('label' => Yii::t('application', 'Licence'), 'url' => array('/lgmisLicence/lpbtype/admin'), 'items' => array(
                                        array('label' => Yii::t('application', 'Btype'), 'url' => array('/lgmisLicence/lpbtype/admin')),
                                        array('label' => Yii::t('application', 'Type'), 'visible' , 'url' => array('/lgmisLicence/lptype/admin')),
                                        array('label' => Yii::t('application', 'Group'), 'visible' , 'url' => array('/lgmisLicence/lpgroup/admin')),    
                                        array('label' => Yii::t('application', 'Mandatory'), 'visible' , 'url' => array('/lgmisLicence/lpmanadatory/admin')), 
                                        array('label' => Yii::t('application', 'Nature'), 'visible' , 'url' => array('/lgmisLicence/lpbnature/admin')),  
                                        array('label' => Yii::t('application', 'BRate'), 'visible' , 'url' => array('/lgmisLicence/lprate/admin')),  
                                        array('label' => Yii::t('application', 'Add Demand'), 'url' => array('#')),
                                    )
                             ),
                                array('label' => Yii::t('application', 'RentalProperty'), 'url' => array('/lgmisRental/rplocation/admin'), 'items' => array(
                                        array('label' => Yii::t('application', 'RPLocation'), 'url' => array('/lgmisRental/rplocation/admin')),
                                        array('label' => Yii::t('application', 'RPMarket'), 'visible' , 'url' => array('/lgmisRental/rpmarket/admin')),
                                        array('label' => Yii::t('application', 'RPRange'), 'visible' , 'url' => array('/lgmisRental/rprange/admin')),    
                                        array('label' => Yii::t('application', 'RPRate'), 'visible' , 'url' => array('/lgmisRental/rprate/admin')), 
                                        array('label' => Yii::t('application', 'Add Demand'), 'visible' , 'url' => array('/lgmisRental/rpdemand/generate')),  
               // array('label' => Yii::t('application', 'Tenant'), 'visible' , 'url' => array('/lgmisRental/rptenant/admin')),  
             )
        ),
							 array('label' => Yii::t('application', 'Buildingpermission'), 'url' => array('/lgmisHouse/bpusagetype/admin'), 'items' => array(
                                        array('label' => Yii::t('application', 'UseageType'), 'url' => array('/lgmisHouse/bpusagetype/admin')),
                                        array('label' => Yii::t('application', 'Arearate'), 'visible' , 'url' => array('/lgmisHouse/bparearate/admin')),
                                   )
                            ),
            
                            array('label' => Yii::t('application', 'Humanresource'), 'url' => array('/lgmisResores/hrbasic/admin'), 'items' => array(
                                        array('label' => Yii::t('application', 'Basic'), 'url' => array('/lgmisResores/hrbasic/admin')),
                                        array('label' => Yii::t('application', 'Setting'), 'visible' , 'url' => array('/lgmisResores/hrleavesetting/admin')),
                                        array('label' => Yii::t('application', 'Post'), 'visible' , 'url' => array('/lgmisResores/hrpost/admin')),    
                                        array('label' => Yii::t('application', 'Salaryset'), 'visible' , 'url' => array('/lgmisResores/hrsalaryset/admin')), 
                                        array('label' => Yii::t('application', 'Add Salary'), 'visible' , 'url' => array('#')),  
                                )
                            ),
            
             array('label' => Yii::t('application', 'Rashan Card'), 'url' => array('/lgmisRasancard/rcrate/admin'), 'items' => array(
                                        array('label' => Yii::t('application', 'Cardrate'), 'url' => array('/lgmisRasancard/rcrate/admin')),
                                        array('label' => Yii::t('application', 'RashanShop'), 'visible' , 'url' => array('/lgmisRasancard/rcshop/admin')),
                                       
                                 )
                        ), 
            
                         
                                   array('label' => Yii::t('application', 'ComplaintMgt'), 'url' => array('/lgmisGorup/cmgroup/admin'), 'items' => array(
                                        array('label' => Yii::t('application', 'ComplaintGroup'), 'url' => array('/lgmisGorup/cmgroup/admin')),
                                        array('label' => Yii::t('application', 'ComplaintCategories'), 'visible' , 'url' => array('/lgmisGorup/cmcategories/admin')),
                                        array('label' => Yii::t('application', 'Complainttype'), 'visible' , 'url' => array('/lgmisGorup/cmcomplaint/admin')),    
                                      
                
                                
                                )
                        ),
                 
            
                                array('label' => Yii::t('application', 'SocialSecurity'), 'url' => array('/lgmisSecrity/ssgrant/admin'), 'items' => array(
                                        array('label' => Yii::t('application', 'SSGrant'), 'url' => array('/lgmisSecrity/ssgrant/admin')),
                                        array('label' => Yii::t('application', 'SSScheme'), 'visible' , 'url' => array('/lgmisSecrity/ssscheme/admin')),
                                        
               // array('label' => Yii::t('application', 'Nominee'), 'visible' , 'url' => array('/lgmisSecrity/ssnominee/admin')), 
                                )
                        ),

                 )
    	),
       
    	/*array('label' => Yii::t('application', 'Central Configuration'), 'url' => array('#'), 'visible' => Yii::app()->user->getName() == 'admin','items' => array(
                array('label' => Yii::t('application', 'Cczones'), 'url' => array('/cczone/admin')),
                array('label' => Yii::t('application', 'Ccwards'), 'url' => array('/ccward/admin'), 'active'=>!isset($_REQUEST['report']) && Yii::app()->controller->route == 'ccward/admin'),
                array('label' => Yii::t('application', 'Cccolonys'), 'url' => array('/cccolony/admin')),
            )
        ),
        array('label' => Yii::t('application', 'Property Tax Configuration'), 'url' => array('/ptrange/admin'), 'visible' => Yii::app()->user->getName() == 'admin', 'items' => array(
                array('label' => Yii::t('application', 'Ptranges'), 'url' => array('/ptrange/admin')),
                array('label' => Yii::t('application', 'Ptpropertyons'), 'url' => array('/ptpropertyon/admin')),
                array('label' => Yii::t('application', 'Ptbhadarates'), 'url' => array('/ptbhadarate/admin')),
                array('label' => Yii::t('application', 'Pttaxrates'), 'url' => array('/pttaxrate/admin')),
                array('label' => Yii::t('application', 'Ptservicetaxes'), 'url' => array('/ptservicetax/admin')),
                array('label' => Yii::t('application', 'Ptexsumptors'), 'url' => array('/ptexsumptor/admin')),
                array('label' => Yii::t('application', 'Generate Property Tax'), 'url' => array(''), 'linkOptions' => array('onclick' => "". $propertytaxajax . "")),
            )
        ),*/
        array('label' => Yii::t('application', 'Pravisthy'), 'url' => array('/lgmisBD/bdbirthrate/admin'), 'visible' => Yii::app()->user->getName() == 'admin', 'items' => array(
        		
        		
        		 array('label' => Yii::t('application', 'Property'), 'url' => array('/ptmaster/admin'), 'active'=>(!isset($_REQUEST['report']) && Yii::app()->controller->id == 'ptmaster' || (Yii::app()->controller->id == 'fddemandreceipt' && Yii::app()->controller->action->id == 'admin') ), 'items' => array(
                array('label' => Yii::t('application', 'Ptmasters'), 'url' => array('/ptmaster/admin')),
               // array('label' => Yii::t('application', 'Create'), 'url' => array('/ptmaster/create', 'isAjaxRequest' => 1), 'active'=>Yii::app()->controller->id == 'ptmaster' && Yii::app()->controller->action->id == 'create'),
                array('label' => Yii::t('application', 'Update'), 'url' => array('/ptmaster/update', 'id' => isset($_REQUEST['id']) ? $_REQUEST['id'] : 0, 'isAjaxRequest' => 1), 'active'=>Yii::app()->controller->id == 'ptmaster' && Yii::app()->controller->action->id == 'update', 'visible'=>Yii::app()->controller->id == 'ptmaster' && Yii::app()->controller->action->id == 'update'),
//                array('label' => Yii::t('application', 'Fddemandreceipt'), 'url' => array('/fddemandreceipt/admin')),
            )
        ),
        		array('label' => Yii::t('application', 'Water Tax'), 'url' => array('/lgmisWM/wmmaster/admin'), 'items' => array(
        				    array('label' => Yii::t('application', 'Wmmaster'), 'url' => array('/lgmisWM/wmmaster/admin')),
        				//array('label' => Yii::t('application', 'Wmconfiguration'), 'visible' => Yii::app()->user->getName() == 'admin', 'url' => array('/lgmisWM/wmconfiguration/admin')),
        				//   array('label' => Yii::t('application', 'Generate Property Tax'), 'visible' => Yii::app()->user->getName() == 'admin', 'url' => array('/lgmisWM/wmdemand/generate')),
        		)
        		),
                        array('label' => Yii::t('application', 'BirthDeath'), 'url' => array('/lgmisBD/bdbirthrate/admin'), 'visible' => Yii::app()->user->getName() == 'admin', 'items' => array(
                                       array('label' => Yii::t('application', 'Birthinfo'), 'visible' , 'url' => array('/lgmisBD/bdbirthinformer/admin')),    
                                       array('label' => Yii::t('application', 'Deathinfo'), 'visible' , 'url' => array('/lgmisBD/bddeathinformer/admin')),  
                                       )
                             ),
                         array('label' => Yii::t('application', 'Licence'), 'url' => array('/lgmisLicence/lpbtype/admin'), 'items' => array(
                                         array('label' => Yii::t('application', 'LCApplication'), 'url' => array('/lgmisLicence/lpapplicant/admin')),
                                         
                                       )
                              ),
               array('label' => Yii::t('application', 'RentalProperty'), 'url' => array('/lgmisRental/rplocation/admin'), 'items' => array(
                                array('label' => Yii::t('application', 'RPShop'), 'visible' , 'url' => array('/lgmisRental/rpshop/admin')),  
)),
							  array('label' => Yii::t('application', 'Buildingpermission'), 'url' => array('/lgmisHouse/bpusagetype/admin'), 'items' => array(
                                         array('label' => Yii::t('application', 'BPApplication'), 'visible' , 'url' => array('/lgmisHouse/bpapplication/admin')),    
                                       )
                             ),
                         array('label' => Yii::t('application', 'Humanresource'), 'url' => array('/lgmisResores/hrbasic/admin'), 'items' => array(
            
                                        array('label' => Yii::t('application', 'Employee'), 'visible' , 'url' => array('/lgmisResores/hremployee/admin')),  
                                        array('label' => Yii::t('application', 'EmpLeave'), 'visible' , 'url' => array('/lgmisResores/hrleavemaster/admin')),  
                                        array('label' => Yii::t('application', 'MonthlySalary'), 'visible' , 'url' => array('#')),  
                                        )
                            ),
            array('label' => Yii::t('application', 'Rashan Card'), 'url' => array('/lgmisRasancard/rcrate/admin'), 'items' => array(               
                                     array('label' => Yii::t('application', 'RCApplication'), 'visible' , 'url' => array('/lgmisRasancard/rcapplication/admin')),
                                        )
                            ),
               array('label' => Yii::t('application', 'ComplaintMgt'), 'url' => array('/lgmisGorup/cmgroup/admin'), 'items' => array(

                             array('label' => Yii::t('application', 'CMApplication'), 'visible' , 'url' => array('/lgmisGorup/cmapplication/admin')), 
                )
                   
                   ),
            
            array('label' => Yii::t('application', 'SocialSecurity'), 'url' => array('/lgmisSecrity/ssgrant/admin'), 'items' => array(
                         array('label' => Yii::t('application', 'SSApplication'), 'visible' , 'url' => array('/lgmisSecrity/ssapplication/admin')),    
            
                        )
            
            ),
            

                   )
            ),
       /* array('label' => Yii::t('application', 'Property'), 'url' => array('/ptmaster/admin'), 'active'=>(!isset($_REQUEST['report']) && Yii::app()->controller->id == 'ptmaster' || (Yii::app()->controller->id == 'fddemandreceipt' && Yii::app()->controller->action->id == 'admin') ), 'items' => array(
                array('label' => Yii::t('application', 'Ptmasters'), 'url' => array('/ptmaster/admin')),
                array('label' => Yii::t('application', 'Create'), 'url' => array('/ptmaster/create', 'isAjaxRequest' => 1), 'active'=>Yii::app()->controller->id == 'ptmaster' && Yii::app()->controller->action->id == 'create'),
                array('label' => Yii::t('application', 'Update'), 'url' => array('/ptmaster/update', 'id' => isset($_REQUEST['id']) ? $_REQUEST['id'] : 0, 'isAjaxRequest' => 1), 'active'=>Yii::app()->controller->id == 'ptmaster' && Yii::app()->controller->action->id == 'update', 'visible'=>Yii::app()->controller->id == 'ptmaster' && Yii::app()->controller->action->id == 'update'),
//                array('label' => Yii::t('application', 'Fddemandreceipt'), 'url' => array('/fddemandreceipt/admin')),
            )
        ),
    	array('label' => Yii::t('application', 'Water Tax'), 'url' => array('/lgmisWM/wmmaster/admin'), 'items' => array(
                array('label' => Yii::t('application', 'Wmmaster'), 'url' => array('/lgmisWM/wmmaster/admin')),
                array('label' => Yii::t('application', 'Wmconfiguration'), 'visible' => Yii::app()->user->getName() == 'admin', 'url' => array('/lgmisWM/wmconfiguration/admin')),
                array('label' => Yii::t('application', 'Generate Property Tax'), 'visible' => Yii::app()->user->getName() == 'admin', 'url' => array('/lgmisWM/wmdemand/generate')),
        )
        ),*/
        array('label' => Yii::t('application', 'Report'), 'url' => '', 'active'=>(isset($_REQUEST['report'])) || Yii::app()->controller->action->id == "transactionReportForm" || Yii::app()->controller->action->id == "recoveryReportForm", 'items' => array(
                array('label' => Yii::t('application', 'Bill Report'), 'url' => array('/ptmaster/admin', 'report'=>'viewBill')),
                array('label' => Yii::t('application', 'Wardwise Demand'), 'url' => array('/ccward/admin', 'report'=>'wardwisedemand')),
				array('label' => Yii::t('application', 'Watertax Received Amount'), 'url' => array('/lgmisWM/report/transactionReportForm')),
				array('label' => Yii::t('application', 'Propertytax Received Amount'), 'url' => array('/report/transactionReportForm')),
				array('label' => Yii::t('application', 'Propertytax Recovery Receipt'), 'url' => array('/report/recoveryReportForm')),
            )
        ),
        array('label' => !Yii::app()->user->isGuest? Yii::t('application', 'My Account') . (' ( ' . Yii::app()->user->name . ' ) ') : Yii::t('application', 'Profile') , 'url' => array('/user/profile/profile'), 'items' => array(
                array('label' => Yii::t('application', 'Profile'), 'url' => array('/user/profile/profile'), 'visible' => !Yii::app()->user->isGuest),
                array('label' => Yii::t('application', 'Change Password'), 'url' => array('/user/profile/changepassword'), 'visible' => !Yii::app()->user->isGuest),
                array('label' => Yii::t('application', 'Login'), 'url' => array('/user/logout'), 'visible' => Yii::app()->user->isGuest),
                array('label' => Yii::t('application', 'Logout'), 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
            )
        ),        
        
//        array('label' => Yii::t('application', 'Login'), 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
//        array('label' => Yii::t('application', 'Logout') . ' (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
    );
    
    
    $this->widget('bootstrap.widgets.TbNavbar', array(
    		'fixed' => "top",
    		'brand' => '<i class="icon-home"></i>',
    		'brandUrl' => Yii::app()->createAbsoluteUrl('/ptmaster/admin'),
    		'brandOptions' => array(
    				'id' => 'brand'
    		),
    		'fluid' => false,
    		'collapse' => true,
    		'items' => array(
    				array(
    						'class' => 'bootstrap.widgets.TbMenu',
    						'items' => $items,
    				),
    		))
    );
    
    
?>
