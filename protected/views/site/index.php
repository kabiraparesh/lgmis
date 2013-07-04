<?php
    if(Yii::app()->user->getId()===null){
        $this->redirect(array('user/login'));
    }
    else{
        $this->redirect(array('ptmaster/admin'));        
    }
?>