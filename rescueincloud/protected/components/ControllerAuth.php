<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControllerAuth
 *
 * @author Ricardo
 */
class ControllerAuth extends Controller{
    
    public function init()
    {
        if(Yii::app()->user->getIsGuest()){
            $this->redirect(Yii::app()->request->baseUrl."/init/login"); 
        }
        
    }
}

?>
