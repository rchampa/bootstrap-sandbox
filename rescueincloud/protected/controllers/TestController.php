<?php

class TestController extends Controller
{
    //public $layout = 'webroot.themes.layoutit.views.layouts.plantilla';
    public $layout = 'plantilla';
    
    public function actionIndex()
    { 
        //$this->getLayoutFile('plantilla_vacia');
        $email_usuario = "ricardocb48@gmail.com";
        $this->render('index',array('email_usuario'=>$email_usuario));
    }
    
    public function actionHome()
    {        
        $this->layout = 'webroot.themes.layoutit.views.layouts.plantilla';
        $this->render('home');
    }
}

