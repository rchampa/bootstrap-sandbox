<?php

class HomeController extends Controller
{    
    public $layout = 'plantilla';
    
    public function actionIndex()
    { 
        $this->render('index');
    }
    
    public function actionFarmacos(){
        $this->redirect(array('farmacos/index'));
    }
    
    public function actionProtocolos(){
        $this->redirect(array('protocolos/index'));
    }
    
    public function actionNotas(){
        $this->redirect(array('notas/index'));
    }
    
}

